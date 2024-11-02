<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;

class UController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __invoke()
    {
        
        return response()->json(['data' => User::all(), 'message' => 'success'], 200);
    }
}