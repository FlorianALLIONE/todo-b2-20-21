<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Task;

class Category extends Model
{
    use HasFactory;

    /**
     * Renvoi la liste des tâches possédant cette catégorie
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */


    /**
    * Renvoi les categories par task
    * 
    * @return use Illuminate\Database\Eloquent\Relations\hasMany;
    */
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
