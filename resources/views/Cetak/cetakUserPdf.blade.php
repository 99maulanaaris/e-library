@extends('Layouts.print')

@section('content')
    <div class="row">
        <table class='table table-lg text-center'>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>User</th>
                    <th>Peminjaman</th>
                    <th>Batas Waktu</th>
                    <th>Pengembalian</th>
                    <th>Telat</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $d)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $d->book->judul }}</td>
                        <td>{{ $d->user->nama }}</td>
                        <td>{{ $d->formatPinjam($d->tglPinjam) }}</td>
                        <td>{{ $d->formatBatasWaktu($d->batasWaktu) }}</td>
                        <td>{{ $d->formatKembali($d->tglKembali) }}</td>
                        @if ($tanggal > $d->batasWaktu)
                            <td class="text-bold">Telat</td>
                        @else
                            <td class="text-bold">Tidak</td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
