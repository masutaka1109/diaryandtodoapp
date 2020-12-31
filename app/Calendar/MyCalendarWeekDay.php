<?php
namespace App\Calendar;

use Carbon\Carbon;
use App\Diary;

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
        $html[] = link_to_route('write.get', $this->carbon->format('j'), ['date' => $this->carbon->format('Y-m-d')], []);
        $html[] = '</span><br>';

        $diaries = $this->getDiary($this->carbon->format('Y-m-d'));

        foreach ($diaries as $diary) {
            if (!($diary->is_todo)) {
                $html[] = '<div class="diary-title">';
            } else {
                if (!($diary->is_completed)) {
                    $html[] = '<div class="not-completed-todo">';
                } else {
                    $html[] = '<div class="completed-todo">';
                }
            }
            $html[] = link_to_route('diary.show', $diary->title, ['id' => $diary->id], []);
            $html[] = '</div>';
        }

        return implode("", $html);
    }
}
