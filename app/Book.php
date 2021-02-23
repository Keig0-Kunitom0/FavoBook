<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Book extends Model
{
    protected $fillable = [
        'title','author','publisher','img_url','release_date','affiliate',
    ];
    
    public function like_users(): BelongsToMany
    {
        return $this->belongsToMany('App\User', 'book_like')->withTimestamps();
    }

    public function isLikedBy(?User $user): bool
    {
        return $user
            ? (bool)$this->like_users->where('id', $user->id)->count()
            : false;
    }
    
    public function getCountLikesAttribute(): int
    {
        return $this->like_users->count();
    }
    
    public function review_book()
    {
        return $this->hasMany(\App\BookReview::class);
    }
    
     public function loadRelationshipCounts()
    {
        $this->loadCount('review_book');
    }
    
}
