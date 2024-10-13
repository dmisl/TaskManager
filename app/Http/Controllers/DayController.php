<?php

namespace App\Http\Controllers;

use App\Models\Day;
use Illuminate\Http\Request;

class DayController extends Controller
{
    public function store(Request $request)
    {
        $day = Day::find($request->day_id);
        return response()->json([
            'data' => 'error',
        ], 404);
    }
}
