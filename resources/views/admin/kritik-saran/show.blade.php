@extends('layouts.admin')

@section('content')
<div class="container">
    <h4>Kritik & Saran</h4>
    <div class="card mb-4">
        <div class="card-body">
            <h5>{{ $kritikSaran->nama_lengkap }} ({{ $kritikSaran->status_pengirim }})</h5>
            <p><strong>Kategori:</strong> {{ $kritikSaran->kategoriUnit->nama_unit ?? '-' }}</p>
            <p><strong>No. Ticket:</strong> {{ $kritikSaran->no_ticket }}</p>
            <p><strong>Kritik/Saran:</strong> {{ $kritikSaran->isi_kritik_saran }}</p>
            <p><strong>Status:</strong> {{ $kritikSaran->status ? 'Aktif' : 'Selesai' }}</p>
        </div>
    </div>

    <!-- Form Tanggapan -->
    <div class="card">
        <div class="card-body">
            <h5>Beri Tanggapan</h5>
            <form action="{{ route('admin.kritik-saran.tanggapan.store', $kritikSaran->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <textarea class="form-control" name="tanggapan" rows="3" placeholder="Tulis tanggapan Anda..."></textarea>
                    @error('tanggapan')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Kirim Tanggapan</button>
            </form>
        </div>
    </div>

    <!-- Daftar Tanggapan -->
    <div class="card mt-4">
        <div class="card-body">
            <h5>Tanggapan</h5>
            @if ($tanggapans->isEmpty())
                <p class="text-muted">Belum ada tanggapan.</p>
            @else
                <ul class="list-group">
                    @foreach ($tanggapans as $tanggapan)
                        <li class="list-group-item">
                            <strong>{{ $tanggapan->admin->name }}</strong> ({{ $tanggapan->created_at->format('d M Y H:i') }})
                            <p>{{ $tanggapan->tanggapan }}</p>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</div>
@endsection
