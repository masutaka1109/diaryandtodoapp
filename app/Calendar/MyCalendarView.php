<?php
namespace App\Calendar;

use Carbon\Carbon;

class MyCalendarView extends CalendarView
{
    protected function getWeeks()
    {
        $weeks = [];
        
        $firstDay = $this->carbon->copy()->firstOfMonth();
        $lastDay = $this->carbon->copy()->lastOfMonth();
        
        $week = new MyCalendarWeek($firstDay->copy());
        $weeks[] = $week;
        
        $tmpDay = $firstDay->copy()->addDay(7)->startOFWeek();
        
        while ($tmpDay->lte($lastDay)) {
            $week = new MyCalendarWeek($tmpDay, count($weeks));
            $weeks[] = $week;
            
            $tmpDay->addDay(7);
        }
        
        return $weeks;
    }
}
