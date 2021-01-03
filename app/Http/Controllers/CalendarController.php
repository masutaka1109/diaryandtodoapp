<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calendar\CalendarView;
use App\Calendar\MyCalendarView;
use App\Diary;
use App\User;

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

    public function showMyCalendar(Request $request)
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

        $calendar = new MyCalendarView($date);

        return view('users.mycalendar', [
            "calendar" => $calendar,
        ]);
    }

    public function showUserMyCalendar($id)
    {
        $user = User::findOrFail($id);

        $calendar = new MyCalendarView(time());

        return view('users.usermycalendar', [
            "user" => $user,
            "calendar" => $calendar,
        ]);
    }
}
