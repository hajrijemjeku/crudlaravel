<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = ['title', 'content', 'user_id'];

    //Define relationship between post and user (a post belongs to a user)
    public function user(){
        return $this->belongsTo(User::class);
    }
}
