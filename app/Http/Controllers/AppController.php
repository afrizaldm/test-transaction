<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;

class AppController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function app()
    {
        return view('app');
    }

    public function redirect()
    {
        return redirect('/');
    }

    public function ping() {
        return 'pong';
    }
}
