@extends('layouts.data')

@section('container')
<h3 class="text-center">Edit Data Film</h3>
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-5 border rounded mt-2 p-4">
              <form action="{{ route('film.update', $film->id) }}" method="POST">
                @method('put')
                @csrf
                <div class="mb-3">
                 <label for="judul_input" class="form-label">Judul</label>
                    <input type="text" class="form-control" name="judulInput" id="judul_input" value="{{ $film->judul }}">
                 </div>
                <div class="mb-3">
                 <label for="tahun_input" class="form-label">Tahun</label>
                    <input type="text" class="form-control" id="tahun_input" name="tahunInput" value="{{ $film->tahun }}">
                </div>
                <div class="mb-3">
                 <label for="rating_input" class="form-label">Rating</label>
                    <input type="text" class="form-control" id="rating_input" name="ratingInput" value="{{ $film->rating }}">
                </div>
                <div class="mb-3">
                  <label class="form-label">Link Trailer</label>
                  <input type="text" class="form-control" id="link" name="link" value="{{ $film->link }}" >
                </div>
                <button type="submit" class="btn btn-secondary mb-3" href="/film">Back</button>
                <button type="submit" class="btn btn-primary mb-3">Submit</button> 
              </form>
            </div>
        </div>
    </div>
@endsection