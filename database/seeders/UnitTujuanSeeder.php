<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UnitTujuanSeeder extends Seeder
{
    /**
     * Jalankan seeder database.
     */
    public function run(): void
    {
        $units = [
            ['id' => Str::uuid(), 'nama_unit' => 'Akademik'],
            ['id' => Str::uuid(), 'nama_unit' => 'Fasilitas'],
            ['id' => Str::uuid(), 'nama_unit' => 'Pelayanan'],
            ['id' => Str::uuid(), 'nama_unit' => 'Keamanan'],
            ['id' => Str::uuid(), 'nama_unit' => 'Kebersihan'],
        ];

        DB::table('unit_tujuan')->insert($units);
    }
}
