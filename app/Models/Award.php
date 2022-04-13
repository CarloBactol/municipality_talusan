<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Award extends Model
{
    use HasFactory;
   use SoftDeletes;
    
    protected $table = 'awards';
    protected $fillable = ['name', 'description', 'image'];
}
