<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KategoriCorporate extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = 'kategori_corporate';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $dates = ['deleted_at'];

    public $fillable = [
        'id',
        'nama_kategori',
        'deskripsi',
        'status',
    ];
}
