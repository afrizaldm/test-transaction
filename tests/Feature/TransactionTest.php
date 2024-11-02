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
        $response = $this->get('/api/transactions');
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function test_can_create_a_transaction(): void
    {
        $data = [
            'user_id' => 1,
            'amount' => 100,
            'status' => 'pending',
        ];
        $response = $this->post('/api/transactions', $data);
        $response->assertStatus(201);
    }

    /**
     * @test
     */
    public function test_fetch_a_single_transaction(): void
    {
        $data = Transaction::factory()->create();
        $response = $this->get('/api/transactions/' . $data->id);
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
        $response = $this->put('/api/transactions/' . $data->id, $newData);
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function test_delete_a_transaction(): void
    {
        $data = Transaction::factory()->create();
        $response = $this->delete('/api/transactions/' . $data->id);
        $response->assertStatus(204);
    }
}
