<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class User extends Model
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function ownedBoards() {
        return $this->hasMany(Board::class, "user_id");
    }

    public function boards() {
        return $this->belongsToMany(Board::class);
    }
    
    public function attachments()
    {
        return $this->hasMany(Attachment::class);
    }

    public function allTasks()
    {
        return $this->allManyThrough(Task::class, "task_id");
    }

    public function assignedTasks()
    {
        return $this->belongsToMany(Task::class, "task_id");
    }
}
