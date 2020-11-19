<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;

    /**
     * Renvoi le proprio de la board
     * 
     * @return use Illuminate\Database\Eloquent\Relations\BelongsTo;
     */
    public function owner() {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Renvoi les tâches de la board
     * 
     * @return use Illuminate\Database\Eloquent\Relations\hasMany;
     */
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }



    /**
     * Renvoi les users qui participent à une tâche, et associe le modèle pivot Boarduser
     * 
     * @return use Illuminate\Database\Eloquent\Relations\belongsToMany;
     */
    public function users()
    {
        return $this->belongsToMany(User::class)
                    ->using(BoardUser::class)
                    ->withPivot('id')
                    ->withTimestamps();
    }
    
}
