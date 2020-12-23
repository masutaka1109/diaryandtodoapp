<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function diaries()
    {
        return $this->hasMany(Diary::class);
    }
    
    public function favorites()
    {
        return $this->belongsToMany(Diary::class, 'favorites', 'user_id', 'diary_id')->withTimestamps();
    }
    
    public function loadRelationshipCounts()
    {
        $this->loadCount(['diaries','favorites']);
    }
    
    public function favorite($diaryId)
    {
        // すでにお気に入りしているかの確認
        $exist = $this->is_favorite($diaryId);

        if ($exist) {
            // すでにお気に入りしていれば何もしない
            return false;
        } else {
            // お気に入りしていなければお気に入りをする
            $this->favorites()->attach($diaryId);
            return true;
        }
    }
    
    public function unfavorite($diaryId)
    {
         $exist = $this->is_favorite($diaryId);

        if ($exist) {
            // すでにお気に入りしていれば削除
            $this->favorites()->detach($diaryId);
            return true;
        } else {
            // お気に入りしていなければ何もしない
            return false;
        }
    }
    
    
    public function is_favorite($diaryId)
    {
        return $this->favorites()->where('diary_id', $diaryId)->exists();
    }
    
}
