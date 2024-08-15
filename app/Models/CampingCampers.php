<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CampingCampers extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = 'camping_campers';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $dates = ['deleted_at'];

    public $fillable = [
        'id',
        'first_name',
        'last_name',
        'address',
        'no_telp',
        'email',
        'city',
        'state',
        'foto_identitas',
        'user_generate',
    ];
}
