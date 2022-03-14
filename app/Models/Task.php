<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = 'tasks';

    protected $primaryKey = 'id';

    protected $fillable = ['subject','desc','assigned_to','deadline','created_by','status'];

    public function TaskFile(){
        return $this->hasMany(TaskFile::class);
    }
    public function TaskReply(){
        return $this->hasMany(TaskReply::class);
    }
}
