<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Diary;

class DiariesController extends Controller
{
    public function showwrite($date='unknown')
    {
        $diary = new Diary;
        
        $data = ['date' => $date,'diary' => $diary];
        return view('diary.write', $data);
    }
    
    public function index($date)
    {
        $diaries = Diary::where('date', $date)->latest()->paginate(10);
        
        return view('diary.index', [
                'date' => $date,
                'diaries' => $diaries,
            ]);
    }
    
    public function store(Request $request)
    {
        $request->validate([
                'title' => 'required',
                'content' => 'required',
            ]);
            
        $request->user()->diaries()->create([
                'title' => $request->title,
                'content' => $request->content,
                'date' => $request->date,
                'author' => $request->name,
            ]);
        
        return redirect('calendar'); //前のURLへリダイレクト
    }
    
    public function show($id)
    {
        $diary = Diary::findOrFail($id);
        
        return view('diary.show', [
                'diary' => $diary,
            ]);
    }
    
    public function edit($id)
    {
        $diary = Diary::findOrFail($id);
        
        return view('diary.edit', [
                'diary' => $diary,
            ]);
    }
    
    public function update(Request $request, $id)
    {
        $diary = Diary::findOrFail($id);
        
        $diary->title = $request->title;
        $diary->content = $request->content;
        $diary->save();
        
        return redirect(route('diary.show', [
            'id' => $id,
        ]));
    }
    
    public function users_diaries($id)
    {
        $user = User::findOrFail($id);
        $diaries = Diary::where('user_id', $id)->latest()->paginate(10);
        
        return view('users.diaries', [
                'user' => $user,
                'diaries' => $diaries,
            ]);
    }
}
