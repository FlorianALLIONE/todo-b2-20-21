<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class BoardUser extends Pivot
{


    use HasFactory;

    /** 
    * 
    *
    * @var bool
    */
    public $incrementing = true;


    /**
     * Renvoi le user par board
     * 
     * @return use Illuminate\Database\Eloquent\Relations\BelongsTo;
     */
    public function user() {
        return $this->belongsTo(User::class);
    }


    /**
     * Renvoi la board  par board
     * 
     * @return use Illuminate\Database\Eloquent\Relations\BelongsTo;
     */
    public function board() {
        return $this->belongsTo(Board::class);
    }


    /**
     * Renvoi les tasks par board
     * 
     * @return use Illuminate\Database\Eloquent\Relations\hasManyThrough;
     */
    public function tasks() {
        return $this->hasManyThrough(Task::class, Board::class, 'id', 'board_id', 'board_id');
    }
}
