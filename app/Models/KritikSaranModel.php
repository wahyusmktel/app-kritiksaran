<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class KritikSaranModel extends Model
{
    use HasFactory;

    protected $table = 'kritik_sarans';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'uuid';

    protected $fillable = [
        'no_ticket',
        'nama_lengkap',
        'status_pengirim',
        'kategori',
        'isi_kritik_saran',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }

    public function kategoriUnit()
    {
        return $this->belongsTo(UnitTujuan::class, 'kategori', 'id');
    }
}
