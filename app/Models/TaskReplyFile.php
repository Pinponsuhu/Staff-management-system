<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskReplyFile extends Model
{
    use HasFactory;

    protected $table = 'task_reply_files';

    protected $primaryKey = 'id';

    protected $fillable = ['file_name','task_id','task_reply_id'];

    public function TaskReply(){
        return $this->belongsTo(TaskReply::class);
    }
}
