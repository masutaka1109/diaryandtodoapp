<?php
namespace App\Calendar;

use Carbon\Carbon;

class CalendarWeekDay
{
    protected $carbon;
    
    public function __construct($date)
    {
        $this->carbon = new Carbon($date);
    }
    
    public function getClassName()
    {
        return "day-" . strtolower($this->carbon->format("D")); //day-sun,day-monなどを取得
    }
    
    public function isToday()
    {
        $dt = Carbon::now();
        if ($dt->format("Y-m-d") == $this->carbon->format("Y-m-d")) {
            return true;
        } else {
            return false;
        }
    }
    
    public function render()
    {
        return '<span class="day">' . $this->carbon->format("j") . '</span><br>'
        .link_to_route('write.get', 'write', ['date' => $this->carbon->format("Y-m-d")], [])
        . '<br>' .link_to_route('read.get', 'read', ['date' => $this->carbon->format("Y-m-d")], []);
        //0なしの日付を取得
    }
}
