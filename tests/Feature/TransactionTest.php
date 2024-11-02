<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Transaction;

class TransactionTest extends TestCase
{

    use RefreshDatabase;

    /**
     * @test
     */
    public function test_can_fetch_all_transactions(): void
    {
        $response = $this->get('/api/transaction');
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function test_can_create_a_transaction(): void
    {
        $data = Transaction::factory()->make();
        $response = $this->post('/api/transaction', $data);
        $response->assertStatus(201);
    }

    /**
     * @test
     */
    public function test_fetch_a_single_transaction(): void
    {
        $data = Transaction::factory()->create();
        $response = $this->get('/api/transaction/' . $data->id);
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function test_update_a_transaction(): void
    {
        $data = Transaction::factory()->create();
        $newData = [
            'amount' => 100,
            'status' => 'pending',
        ];
        $response = $this->put('/api/transaction/' . $data->id, $newData);
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function test_delete_a_transaction(): void
    {
        $data = Transaction::factory()->create();
        $response = $this->delete('/api/transaction/' . $data->id);
        $response->assertStatus(204);
    }
}
