@extends('layouts.admin')

@section('title', 'Kritik & Saran')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h4>Data Kritik & Saran</h4>
        <form action="{{ route('admin.kritik-saran.index') }}" method="GET">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Cari..." value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">Cari</button>
            </div>
        </form>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No. Tiket</th>
                    <th>Nama</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($kritikSarans as $kritikSaran)
                    <tr>
                        <td>{{ $kritikSaran->no_ticket }}</td>
                        <td>{{ $kritikSaran->nama_lengkap }}</td>
                        <td>{{ ucfirst($kritikSaran->status_pengirim) }}</td>
                        <td>{{ $kritikSaran->created_at->format('d M Y') }}</td>
                        <td>
                            <a href="{{ route('admin.kritik-saran.show', $kritikSaran->id) }}" class="btn btn-info btn-sm">Lihat</a>
                            <form action="{{ route('admin.kritik-saran.destroy', $kritikSaran->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Data tidak ditemukan</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        {{ $kritikSarans->links() }}
    </div>
</div>
@endsection
