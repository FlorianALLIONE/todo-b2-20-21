<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
 


    /**
     * Renvoi la task par catégorie
     * 
     * @return use Illuminate\Database\Eloquent\Relations\BelongsTo;
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    /**
     * Renvoi les participants à une task
     * 
     * @return use Illuminate\Database\Eloquent\Relations\hasManyThrough;
     */
    public function participants() {
        return $this->hasManyThrough(User::class, BoardUser::class, 'board_id', 'id', 'board_id', 'user_id');
    }


    /**
     * Renvoi les users assigné par task
     * 
     * @return use Illuminate\Database\Eloquent\Relations\BelongsTo;
     */
    public function assignedUsers() {
        return $this->belongsToMany(User::class)
                    ->using(TaskUser::class)
                    ->withPivot('id')
                    ->withTimestamps();
    }

    /**
     * Renvoi le task par board
     * 
     * @return use Illuminate\Database\Eloquent\Relations\BelongsTo;
     */
    public function board()
    {
        return $this->belongsTo(Board::class);
    }


    /**
     * Renvoi les fichiers par task
     * 
     * @return use Illuminate\Database\Eloquent\Relations\hasMany;
     */
    public function attachments()
    {
        return $this->hasMany(Attachment::class);
    }


    /**
     * Renvoi les commentaires par task
     * 
     * @return use Illuminate\Database\Eloquent\Relations\hasMany;
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}
