<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    public $table = 'usuario';
    protected $primaryKey = 'ID_Usuario'; 
}
