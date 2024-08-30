<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slider extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = 'slider';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'id',
        'title',
        'slug',
        'images',
        'status',
    ];
}
