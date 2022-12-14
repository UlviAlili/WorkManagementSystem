<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Task extends Model
{
    use HasFactory;

    protected $guarded = [];

    const NOT_STARTED = 1;
    const IN_PROGRESS = 2;
    const DONE = 3;

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'task_id')->orderBy('created_at', 'desc');
    }

    public function delete()
    {
        $this->comments()->delete();
        return parent::delete(); // TODO: Change the autogenerated stub
    }

    public function getStatusAttribute($status)
    {
        if ($status == self::NOT_STARTED) {
            return 'Not Started';
        }
        if ($status == self::IN_PROGRESS) {
            return 'In Progress';
        }
        if ($status == self::DONE) {
            return 'Done';
        }
    }
}
