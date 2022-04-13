<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NewsUpdate extends Model
{

    use HasFactory;
    use SoftDeletes;

    protected $table = 'news_updates';
    protected $dates = ['deleted_at'];
    protected $fillable = ['author', 'title', 'description', 'type', 'image'];
    protected $hidden = ['created_at', 'updated_at'];
}
