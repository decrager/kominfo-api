<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index()
    {
        return response()->json([
            'message' => 'Response success'
        ], Response::HTTP_OK);
    }
}
