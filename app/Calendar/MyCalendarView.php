<?php
namespace App\Calendar;

use Carbon\Carbon;

class MyCalendarView extends CalendarView
{
    protected $user;

    public function __construct($date, $user)
    {
        $this->carbon = new Carbon($date);
        $this->user = $user;
    }

    protected function getWeeks()
    {
        $weeks = [];
        
        $firstDay = $this->carbon->copy()->firstOfMonth();
        $lastDay = $this->carbon->copy()->lastOfMonth();
        
        $week = new MyCalendarWeek($firstDay->copy(), $this->user);
        $weeks[] = $week;
        
        $tmpDay = $firstDay->copy()->addDay(7)->startOFWeek();
        
        while ($tmpDay->lte($lastDay)) {
            $week = new MyCalendarWeek($tmpDay, $this->user, count($weeks));
            $weeks[] = $week;
            
            $tmpDay->addDay(7);
        }
        
        return $weeks;
    }
}
