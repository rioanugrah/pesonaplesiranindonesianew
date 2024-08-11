<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CampingReservation extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = 'camping_reservation';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $dates = ['deleted_at'];

    public $fillable = [
        'id',
        'camping_campers_id',
        'resv_date',
        'resv_night',
        'status',
    ];

    public function camping_campers()
    {
        return $this->belongsTo(\App\Models\CampingCampers::class, 'camping_campers_id','id');
    }
}
