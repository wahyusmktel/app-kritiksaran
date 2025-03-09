<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KritikSaranModel;
use App\Models\TanggapanKritikSaran;
use Illuminate\Support\Facades\Auth;

class AdminKritikSaranController extends Controller
{
    public function index(Request $request)
    {
        // Ambil kata kunci pencarian
        $search = $request->input('search');

        // Query kritik & saran dengan pencarian
        $kritikSarans = KritikSaranModel::when($search, function ($query) use ($search) {
                return $query->where('nama_lengkap', 'LIKE', "%{$search}%")
                    ->orWhere('no_ticket', 'LIKE', "%{$search}%")
                    ->orWhere('status_pengirim', 'LIKE', "%{$search}%");
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.kritik-saran.index', compact('kritikSarans', 'search'));
    }

    public function show($id)
    {
        $kritikSaran = KritikSaranModel::with('kategoriUnit')->findOrFail($id);
        $tanggapans = TanggapanKritikSaran::where('kritik_saran_id', $id)->orderBy('created_at', 'desc')->get();

        return view('admin.kritik-saran.show', compact('kritikSaran', 'tanggapans'));
    }

    public function storeTanggapan(Request $request, $id)
    {
        $request->validate([
            'tanggapan' => 'required|string|min:10',
        ], [
            'tanggapan.required' => 'Tanggapan tidak boleh kosong.',
            'tanggapan.min' => 'Tanggapan minimal 10 karakter.',
        ]);

        TanggapanKritikSaran::create([
            'kritik_saran_id' => $id,
            'admin_id' => Auth::id(),
            'tanggapan' => $request->tanggapan,
        ]);

        return redirect()->route('admin.kritik-saran.show', $id)->with('success', 'Tanggapan berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $kritikSaran = KritikSaranModel::findOrFail($id);
        $kritikSaran->delete();

        return redirect()->route('admin.kritik-saran.index')->with('success', 'Data berhasil dihapus.');
    }
}
