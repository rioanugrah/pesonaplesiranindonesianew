<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bromo extends Model
{
    use SoftDeletes;
    public $table = 'bromo';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $dates = ['deleted_at'];

    public $fillable = [
        'id',
        'slug',
        'title',
        'descriptions',
        'category_trip',
        'meeting_point',
        'images',
        'images_all',
    ];

    public function bromo_list()
    {
        return $this->hasMany(\App\Models\BromoList::class, 'bromo_id','id')->orderBy('departure_date','desc')->limit(14);
    }
}
