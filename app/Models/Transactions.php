<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transactions extends Model
{
    use SoftDeletes;

    public $table = 'transaction';
    protected $primaryKey = 'id';
    public $incrementing = false;

    protected $dates = ['deleted_at'];

    public $fillable = [
        'id',
        'transaction_code',
        'transaction_reference',
        'transaction_unit',
        'transaction_billing',
        'transaction_order',
        'transaction_qty',
        'transaction_price',
        'user',
        'link_payment',
        'status',
    ];

    public function verifikasi_tiket()
    {
        return $this->belongsTo(\App\Models\VerifikasiTiket::class, 'id', 'transaction_id');
    }

    public function users()
    {
        return $this->belongsTo(\App\Models\User::class, 'user', 'generate');
    }

}
