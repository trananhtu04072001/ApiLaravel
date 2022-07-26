<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user() {
        return $this->belongsTo('App\Models\User','user_id');
    }
    protected $table = "posts";

    protected $fillable = [
        'title',
        'content',
        'user_id',
    ];
    use HasFactory;
}
