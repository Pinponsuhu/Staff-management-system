<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
    use HasFactory;

    protected $table = 'qualifications';

    protected $primaryKey = 'id';

    protected $fillable = ['type','start_date','end_date','staff_id','proof'];

    public function Staff(){
        return $this->belongsTo(Staff::class);
    }
}
