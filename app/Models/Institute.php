<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Institute extends Model
{
    public $table = 'institutes';

    public $fillable = [
        'name',
        'address',
        'phone',
        'email',
        'pan',
        'image'
    ];

    protected $casts = [
        'name' => 'string',
        'address' => 'string',
        'phone' => 'string',
        'email' => 'string',
        'pan' => 'string',
        'image' => 'string'
    ];

    public static array $rules = [
        'name' => 'required',
        'address' => 'required',
        'phone' => 'required'
    ];

    
}
