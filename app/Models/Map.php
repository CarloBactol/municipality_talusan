<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Map extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'maps';
    protected $fillable = ['name', 'description', 'image'];
}
