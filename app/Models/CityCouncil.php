<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CityCouncil extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = 'city_councils';
    protected $fillable = ['name', 'age', 'sex', 'status', 'religion', 'address', 'contact', 'education','date-elected', 'type', 'description', 'image'];
}
