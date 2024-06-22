<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usuarios extends Model
{
    use HasFactory;
    public $fillable = ['name', 'last_name', 'user', 'email', 'password', 'password_confirmation'];
}