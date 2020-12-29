<?php
namespace App\Calendar;

use Carbon\Carbon;

class MyCalendarWeekDay extends CalendarWeekDay
{
    public function getDiary($date)
    {
        $query = Diary::query();
        $query->where('date', $date);
        $query->where('user_id', \Auth::id());

        $diaries = $query->get();

        return $diaries;
    }

    public function render()
    {
        $html = [];
        $html[] = '<span class="day">';
        $html[] = $this->carbon->format('j');
        $html[] = '</span><br>';

        return implode("", $html);
    }
}
