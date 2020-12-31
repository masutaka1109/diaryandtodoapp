<?php
namespace App\Calendar;

use Carbon\Carbon;

class MyCalendarWeek extends CalendarWeek
{
    public function getDays()
    {
        $days = [];
        
        $startDay = $this->carbon->copy()->startOfWeek();
        $lastDay = $this->carbon->copy()->endOfWeek();
        
        $tmpDay = $startDay->copy();
        
        while ($tmpDay->lte($lastDay)) {
            if ($tmpDay->month != $this->carbon->month) {
                $day = new CalendarWeekBlankDay($tmpDay->copy());
                $days[] = $day;
                $tmpDay->addDay(1);
                continue;
            }
            
            $day = new MyCalendarWeekDay($tmpDay->copy());
            $days[] = $day;
            $tmpDay->addDay(1);
        }
        
        return $days;
    }
}
