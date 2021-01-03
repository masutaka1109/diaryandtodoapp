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
        
        //laravelではbooleanが1か0で処理され、trueやfalseを入れられないので変更する。
        if ($request->is_todo) {
            $request->is_todo = 1;
        } else {
            $request->is_todo = 0;
        }

        if ($request->is_private) {
            $request->is_private = 1;
        } else {
            $request->is_private = 0;
        }
            
        //新しい変数を作るときは$fillableに追加するのを忘れないように
        $request->user()->diaries()->create([
                'title' => $request->title,
                'content' => $request->content,
                'date' => $request->date,
                'author' => $request->name,
                'is_todo' => $request->is_todo,
                'is_private' => $request->is_private
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

        if ($request->is_private) {
            $request->is_private = 1;
        } else {
            $request->is_private = 0;
        }

        $diary->is_private = $request->is_private;
        
        $diary->save();
        
        return redirect(route('diary.show', [
            'id' => $id,
        ]));
    }

    public function destroy($id)
    {
        $diary = Diary::findOrFail($id);
        $diary->delete();

        return redirect('/');
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

    public function completed($id)
    {
        $diary = Diary::findOrFail($id);

        $diary->is_completed = 1;
        $diary->save();

        return back();
    }
}
