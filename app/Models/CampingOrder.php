<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CampingOrder extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = 'camping_order';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $dates = ['deleted_at'];

    public $fillable = [
        'id',
        'camping_reservation_id',
        'kode_order',
        'order',
        'total',
        'status',
    ];

    public function transactions()
    {
        return $this->belongsTo(\App\Models\Transactions::class, 'kode_order','transaction_code');
    }

    public function camping_reservation()
    {
        return $this->belongsTo(\App\Models\CampingReservation::class, 'camping_reservation_id','id');
    }
}
