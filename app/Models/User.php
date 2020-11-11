<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory, Notifiable;

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function ownedBoards() {
        return $this->hasMany(Board::class, 'user_id');
    }

    public function assignedTasks() {
        return $this->hasMany(Task::class, 'task_id');
    }

    public function allTasks() {
        return $this->hasManyThrough(Task::class, 'task_id');
    }

    public function boards() {
        return $this->hasMany(Board::class);
    }

    public function attachments() {
        return $this->hasMany(Attachment::class);
    }
}
