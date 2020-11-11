<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;

    public function owner() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function users() {
        return $this->belongsToMany(User::class);
    }

    public function tasks() {
        return $this->hasMany(Task::class);
    }

    // public function board_users() {
    //     return $this->belongsToMany(User::class);
    // }
}
