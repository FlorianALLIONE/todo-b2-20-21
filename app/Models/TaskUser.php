<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class TaskUser extends Pivot
{

    use HasFactory;
    
    /** 
    * 
    *
    * @var bool
    */
    public $incrementing = true;

    
    /**
     * Renvoi le proprio de la task
     * 
     * @return use Illuminate\Database\Eloquent\Relations\BelongsTo;
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    /**
     * Renvoi le task par task
     * 
     * @return use Illuminate\Database\Eloquent\Relations\BelongsTo;
     */
    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}
