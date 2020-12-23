<?php
namespace App\Calendar;

/**
 * 
 * 空白の日を出力するためのクラス
 * 
 * */
 
class CalendarWeekBlankDay extends CalendarWeekDay{
    function getClassName(){
        return "day-blank";
    }
    
    function render(){
        return '';
    }
}