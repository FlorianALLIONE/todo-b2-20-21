<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;



    /**
     * Renvoi le commentaire par user
     * 
     * @return use Illuminate\Database\Eloquent\Relations\BelongsTo;
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    /**
     * Renvoi la task avec son commentaire
     * 
     * @return use Illuminate\Database\Eloquent\Relations\BelongsTo;
     */
    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}
