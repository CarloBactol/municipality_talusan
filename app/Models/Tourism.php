<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tourism extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'tourisms';
    protected $fillable = ['name', 'address', 'description',  'image'];
}
