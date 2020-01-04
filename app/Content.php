<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Content extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'content',
        'category_id',
        'last_review_date',
        'next_review_date',
    ];

    protected $casts = [
        'last_review_date' => 'date',
        'next_review_date' => 'date'
    ];

    public function scopeLoggedUser($query)
    {
        $query->where('user_id', Auth::user()->id);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function setReviewed()
    {
        $this->last_review_date = Carbon::now();
        $daysToNextReview = $this->getDaysToNextReview();
        $this->next_review_date = Carbon::now()->addDays($daysToNextReview);
        $this->save();

        Review::create([
            'content_id' => $this->id
        ]);
    }

    public function getDaysToNextReview()
    {
        $reviews = $this->reviews()->count();
        if ($reviews <= 1) {
            return 1;
        } else if ($reviews <= 3) {
            return 7;
        } else if ($reviews <= 4) {
            return 15;
        } elseif ($reviews <= 5) {
            return 30;
        } else {
            return 120;
        }
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
