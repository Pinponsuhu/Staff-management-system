<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskReply extends Model
{
    use HasFactory;

    protected $table = 'task_replies';

    protected $primaryKey = 'id';

    protected $fillable = ['message','status','from','to'];

    public function Task(){
        return $this->belongsTo(Task::class);
    }

    public function TaskReplyFile(){
        return $this->hasMany(TaskReplyFile::class);
    }
}
