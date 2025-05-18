@extends('layouts.main')

@section('container')

<h3 class="text-center">FILM</h3>
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<a href="{{ route('film.create')}}" class="btn btn-success">Tambah Data</a><br><br>
<table class="table table-bordered">
    <thead class="table-dark ">
        <tr>
            <th class="text-center" style="width: 10px">No</th>
            <th class="text-center" style="width: 10px">Gambar</th>
            <th class="text-center" style="width: 180px">Judul</th>
            <th class="text-center" style="width: 100px">Tahun</th>
            <th class="text-center" style="width: 100px">Rating</th>
            <th class="text-center" style="width: 100px">Link Trailer</th>
            <th class="text-center" style="width: 100px">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @php
            $no = 1;
        @endphp
        @foreach ($film as $item)
        <tr>
            <td class="text-center" scope="row">{{ $no }}</td>
            <td><img src="{{ asset('img/'.$item->image) }}" class="rounded m-2" style="width: 150px"></td>
            <td>{{ $item->judul }}</td>
            <td>{{ $item->tahun }}</td>
            <td>{{ $item->rating }}</td>
            <td>{{ $item->link }}</td>
            <td>
                <a href="{{ route('film.edit', $item->id) }}" class="btn btn-primary" >Edit</a>
                <form action="{{ route('film.destroy',$item->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                <button class="btn btn-danger" onclick="confirm('Anda yakin akan menghapus data ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @php
            $no++;
        @endphp
        @endforeach
    </tbody>
</table>
@endsection