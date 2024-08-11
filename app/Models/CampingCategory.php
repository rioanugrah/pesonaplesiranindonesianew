<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CampingCategory extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = 'camping_category';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $dates = ['deleted_at'];

    public $fillable = [
        'id',
        'nama_kategori',
        'status',
    ];

    public function camping_pricelist()
    {
        return $this->hasMany(\App\Models\CampingPricelist::class, 'camping_category_id','id');
    }
}
