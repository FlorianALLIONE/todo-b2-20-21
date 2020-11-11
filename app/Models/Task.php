<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    public function categories() {
        return $this->belongsTo(Category::class);
    }

    public function boards() {
        return $this->belongsTo(Board::class);
    }

    public function attachments() {
        return $this->hasMany(Attachment::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function task_user() {
        return $this->belongsToMany(User::class);
    }
}
