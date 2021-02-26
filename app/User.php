<?php

namespace App;

use App\Mail\BareMail;
use App\Notifications\PasswordResetNotification;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
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
        'name','nickname', 'email', 'password','self_introduction',
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
    
    public function like_books()
    {
        return $this->belongsToMany(Book::class, 'book_like', 'user_id', 'book_id')->withTimestamps();
    }
    
    public function review_user()
    {
        return $this->hasMany(\App\BookReview::class);
    }
    
    public function followings()
    {
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'follow_id')->withTimestamps();
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'follows', 'follow_id', 'user_id')->withTimestamps();
    }
    
    public function loadRelationshipCounts()
    {
        $this->loadCount(['like_books','review_user','followings','followers']);
    }
    
    
    //↓フォロー機能↓
    
    public function follow($userId)
    {
        $exist = $this->is_following($userId);
        
        $its_me = $this->id == $userId;
        
        if ($exist || $its_me) {
            
            return false;
        } else {
            
            $this->followings()->attach($userId);
            return true;
        }
    }
    
     public function unfollow($userId)
    {
        $exist = $this->is_following($userId);
        
        $its_me = $this->id == $userId;
        
        if ($exist || !$its_me) {
            
            $this->followings()->detach($userId);
            return true;
        } else {

            return false;
        }
    }
    
    public function is_following($userId)
    {
        return $this->followings()->where('follow_id',$userId)->exists();
    }
    
    
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new PasswordResetNotification($token, new BareMail()));
    }

    
}
