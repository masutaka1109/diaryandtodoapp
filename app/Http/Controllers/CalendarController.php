<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calendar\CalendarView;
use App\Diary;

class CalendarController extends Controller
{
    public function show(Request $request)
    {
        $date = $request->input("date");
        
        if ($date && preg_match("/^[0-9]{4}-[0-9]{2}$/", $date)) {
            $date = strtotime($date . "-02");
        } else {
            $date = null;
        }
        
        if (!$date) {
            $date = time();
        }
        
        $calendar = new CalendarView($date);

        $diaries = Diary::latest()->take(10)->get();
        
        return view('calendar', [
                "diaries" => $diaries,
                "calendar" => $calendar
            ]);
    }
}
