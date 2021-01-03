<?php
namespace App\Calendar;

use Carbon\Carbon;
use App\Diary;

class MyCalendarWeekDay extends CalendarWeekDay
{
    protected $user;
    
    //日付を渡してオブジェクトを生成
    public function __construct($date, $user)
    {
        $this->carbon = new Carbon($date);
        $this->user = $user;
    }

    public function getDiary($date, $user)
    {
        $query = Diary::query();
        $query->where('date', $date);
        $query->where('user_id', $user->id);

        $diaries = $query->get();

        return $diaries;
    }

    public function render()
    {
        $html = [];
        $html[] = '<span class="day">';
        $html[] = link_to_route('write.get', $this->carbon->format('j'), ['date' => $this->carbon->format('Y-m-d')], []);
        $html[] = '</span><br>';

        $diaries = $this->getDiary($this->carbon->format('Y-m-d'), $this->user);

        foreach ($diaries as $diary) {
            if ($diary->is_private and \Auth::id() != $diary->user_id) {
                continue;
            }

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
