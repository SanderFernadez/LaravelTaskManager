<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'description',
    ];

    /**
     * @return /import Illuminate\Database\Eloquent\Relations\BelongsTo
     */

     public function user():BelongsTo
     {
        return $this->belongsTo(User::class);

    }

    /**
     * The sharedwith that belong to the Task
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function sharedTasks(): BelongsToMany
    {
        return $this->belongsToMany(User::class,'taks_user',)->withPivot('permission');
    }
}
