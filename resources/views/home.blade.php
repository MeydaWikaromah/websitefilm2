    @extends('layouts.main')

    @section('container')
    
    <h2 class="text-center">FILBIE</h2>
    <div class="row justify-content-center">
        <form action=" " method="GET" class="d-flex col-lg-6 m-5" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="cari" value="{{request('cari')}}">
            <button class="btn btn-outline-success" type="submit">Search</button>
            <a class="btn btn-outline-danger ml-2" href="/home" >Reset</a>
        </form>
        
    </div>
    
    <div class= "d-flex flex-wrap mb-3">

        @foreach ($film as $item)
        <div class="card m-3 p-2" style="width: 14rem;">
            <img src="" class="card-img-top" alt="">
            <div class="card-body">
                <img src="{{ asset('img/'.$item->image) }}" class="rounded m-2" style="width: 150px">
                <h5 class="card-title">{{ $item->judul }}</h5>
                <p class="card-text">{{ $item->tahun }}</p>
                <p class="card-text">{{ $item->rating }}</p>
                <a href="{{ $item->link }}" target="_blank" class="btn btn-primary">Lihat Trailer</a>
            </div>
        </div>
        @endforeach
    </div>

    @endsection