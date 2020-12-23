<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavoritesController extends Controller
{
    public function store($diaryId)
    {
        \Auth::user()->favorite($diaryId);
        return back();
    }
    
    public function destroy($diaryId)
    {
        \Auth::user()->unfavorite($diaryId);
        return back();
    }
}
