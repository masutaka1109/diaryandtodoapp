<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{
    protected $fillable = [
        'title','content','date','author'
        ]; //指定したカラムに対してcreateを使って値をまとめて入れられるようにする
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function favorite_users()
    {
        return $this->belongsToMany(User::class,'favorites','diary_id','user_id');
    }
}
