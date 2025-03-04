<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cooperation extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = 'cooperation';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $dates = ['deleted_at'];

    public $fillable = [
        'id',
        'kode_corporate',
        'nik',
        'nama',
        'email',
        'nama_usaha',
        'logo_usaha',
        // 'kategori_corporate_id',
        'alamat_usaha',
        'kecamatan_id',
        'kota_id',
        'provinsi_id',
        'negara',
        'no_telp',
        'berkas',
        'ttd_1',
        'ttd_2',
        'status',
    ];

    public function kategori_corporate()
    {
        return $this->belongsTo(\App\Models\KategoriCorporate::class, 'kategori_corporate_id','id');
    }

    public function kecamatan()
    {
        return $this->belongsTo(\App\Models\Kecamatan::class, 'kecamatan_id','id');
    }

    public function kota()
    {
        return $this->belongsTo(\App\Models\KabupatenKota::class, 'kota_id','id');
    }

    public function provinsi()
    {
        return $this->belongsTo(\App\Models\Provinsi::class, 'provinsi_id','id');
    }
}
