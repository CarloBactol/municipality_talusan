<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Events extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'events';
    protected $fillable = ['author', 'title', 'start', 'end', 'description', 'type', 'image'];
   
}
