<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CampingPricelist extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = 'camping_pricelist';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $dates = ['deleted_at'];

    public $fillable = [
        'id',
        'camping_category_id',
        'nama_barang',
        'price',
        'stock',
        'status',
    ];
}
