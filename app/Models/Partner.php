<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    // fields that will be filled by Request::all()
    protected $fillable = array('name', 'email', 'type', 'cpf', 'cep', 'state', 'city', 'neighborhood', 'address', 'number', 'complement');
}
