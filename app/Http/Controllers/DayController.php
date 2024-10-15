<?php

namespace App\Http\Controllers;

use App\Models\Day;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DayController extends Controller
{
    public function changeResult(Request $request)
    {
        $day = Day::find($request->day_id);
        if($day->user_id == Auth::id())
        {
            $day->update(['result' => $request->result]);
            return response()->json([
                'data' => 'success'
            ]);
        }
        return response()->json([
            'data' => 'error',
        ], 404);
    }
}
