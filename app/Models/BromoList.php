<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BromoList extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $table = 'bromo_list';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $dates = ['deleted_at'];

    public $fillable = [
        'id',
        'bromo_id',
        'departure_date',
        'quota',
        'max_quota',
        'discount',
        'price',
    ];

    public function bromo()
    {
        return $this->belongsTo(\App\Models\Bromo::class, 'bromo_id','id');
    }
}
