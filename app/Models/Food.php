<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Food extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'food';
    protected $fillable = ['name', 'description',  'image'];
}
