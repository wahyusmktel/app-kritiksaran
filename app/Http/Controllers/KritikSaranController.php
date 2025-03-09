<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KritikSaranModel;
use App\Models\UnitTujuan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Exception;

class KritikSaranController extends Controller
{
    public function store(Request $request)
    {
        try {
            // Validasi input
            $validator = Validator::make($request->all(), [
                'nama_lengkap' => 'required|string|max:255',
                'status_pengirim' => 'required|string|in:student,parent,teacher,other',
                'kategori' => 'required|exists:unit_tujuan,id',
                'isi_kritik_saran' => 'required|string|min:10',
            ], [
                'nama_lengkap.required' => 'Nama lengkap wajib diisi.',
                'status_pengirim.required' => 'Status wajib dipilih.',
                'kategori.required' => 'Kategori wajib dipilih.',
                'kategori.exists' => 'Kategori tidak valid.',
                'isi_kritik_saran.required' => 'Kritik/saran tidak boleh kosong.',
                'isi_kritik_saran.min' => 'Kritik/saran minimal 10 karakter.',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            // Generate nomor tiket
            $lastTicket = KritikSaranModel::latest('created_at')->first();
            $lastNumber = $lastTicket ? intval(substr($lastTicket->no_ticket, 2)) : 0;
            $newTicketNumber = 'TS' . str_pad($lastNumber + 1, 5, '0', STR_PAD_LEFT);

            // Simpan data ke database
            $kritikSaran = new KritikSaranModel();
            $kritikSaran->id = Str::uuid();
            $kritikSaran->no_ticket = $newTicketNumber;
            $kritikSaran->nama_lengkap = $request->nama_lengkap;
            $kritikSaran->status_pengirim = $request->status_pengirim;
            $kritikSaran->kategori = $request->kategori;
            $kritikSaran->isi_kritik_saran = $request->isi_kritik_saran;
            $kritikSaran->status = true;
            $kritikSaran->save();

            return response()->json([
                'success' => 'Kritik dan saran berhasil dikirim!',
                'ticket_number' => $newTicketNumber
            ], 200);
        } catch (Exception $e) {
            return response()->json(['error' => 'Terjadi kesalahan saat mengirim kritik dan saran!'], 500);
        }
    }
}
