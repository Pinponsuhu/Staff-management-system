<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $table = 'staff';

    protected $primaryKey = 'id';

    protected $fillable = ['picture','surname','othername','id_number','date_of_birth','gender','department','phone_number','email'];

    public function Qualification(){
        return $this->hasMany(Qualification::class);
    }
}
