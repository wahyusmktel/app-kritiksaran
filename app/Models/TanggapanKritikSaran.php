<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class TanggapanKritikSaran extends Model
{
    use HasFactory;

    protected $table = 'tanggapan_kritik_saran';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'uuid';

    protected $fillable = [
        'kritik_saran_id',
        'admin_id',
        'tanggapan'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }

    public function kritikSaran()
    {
        return $this->belongsTo(KritikSaranModel::class, 'kritik_saran_id');
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
}
