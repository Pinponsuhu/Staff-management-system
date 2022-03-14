<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskFile extends Model
{
    protected $table = 'task_files';

    protected $primaryKey = 'id';

    protected $fillable = ['file_name','task_id'];

    public function Task(){
        return $this->belongsTo(Task::class);
    }
}
