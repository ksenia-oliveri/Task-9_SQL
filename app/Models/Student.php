<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';
    protected $guarded = false;

    protected $fillable = [
        'group_id',
        'first_name',
        'last_name',
    ];
}
