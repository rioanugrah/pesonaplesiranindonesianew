<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmailMarketing extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = 'email_marketing';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $dates = ['deleted_at'];

    public $fillable = [
        'id',
        'subject',
        'to',
        'descriptions',
        'attachment',
        'status',
    ];
}
