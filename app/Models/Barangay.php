<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Barangay extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = 'barangays';
    protected $fillable = ['name', 'brgy_captain_name', 'contact', 'address', 'description', 'map', 'widget', 'image'];

}
