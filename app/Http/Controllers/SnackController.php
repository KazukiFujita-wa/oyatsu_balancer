<?php

namespace App\Http\Controllers;

use App\Models\Snack;
use Illuminate\Http\Request;

class SnackController extends Controller
{
    public function index()
    {
        return response()->json(Snack::all());
    }
}
