<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function show($id)
    {
        $user = User::findOrFail($id);
        
        return view('users.show',[
                'user' => $user,
            ]);
    }
    
    public function edit($id)
    {
        $user = User::findOrFail($id);
        
        return view('users.edit',[
                'user' => $user,
            ]);
    }
    
    public function update(Request $request,$id)
    {
        $user = User::findOrFail($id);
        
        $user->self_introduction = $request->self_introduction;
        if($request->file('image')){
            $path = $request->file('image')->store('public');
            $user->image_url = basename($path);
        }
        $user->save();
        
        return redirect(route('users.show',[
                'user' => $id
            ]));
    }
    
    public function favorites($id)
    {
        $user = User::findOrFail($id);
        
        $user->loadRelationshipCounts();
        
        $diaries = $user->favorites()->paginate(10);
        
        return view('users.favorites',[
                'user' => $user,
                'diaries' => $diaries,
            ]);
    }
}
