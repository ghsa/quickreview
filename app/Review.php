<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['content_id'];

    public function content()
    {
        return $this->belongsTo(Content::class);
    }
}
