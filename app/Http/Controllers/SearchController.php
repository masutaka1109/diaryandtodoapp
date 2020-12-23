<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Diary;

class SearchController extends Controller
{
    public function show()
    {
        $diaries = Diary::latest()->take(10)->get();

        return view('diary.search', [
            'diaries' => $diaries,
        ]);
    }

    public function result(Request $request)
    {
        $keyword = $request->input('keyword');

        $query = Diary::query();

        if (!empty($keyword)) {
            $query->where('title', 'LIKE', "%{$keyword}%")
                ->orWhere('content', 'LIKE', "%{$keyword}%")
                ->latest();
        }

        $diaries_count = $query->get()->count();
        $diaries = $query->paginate(10);

        return view('diary.result', [
            'diaries_count' => $diaries_count,
            'keyword' => $keyword,
            'diaries' => $diaries,
        ]);
    }
}
