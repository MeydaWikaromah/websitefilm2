<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\File;
use Illuminate\Http\RedirectResponse;


class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['film'] = DB::select('SELECT * FROM film');
        return view('film', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tambahFilm');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'judul' => 'required',
            'tahun' => 'required',
            'rating' => 'required',
            'link' => 'required',
        ]);

        if ($request->hasfile('image')) {            
            $image = round(microtime(true) * 1000).'-'.str_replace(' ','-',$request->file('image')->getClientOriginalName());
            $request->file('image')->move(public_path('img'), $image);
        }
        
        $judulInput = $request->input('judulInput');
        $tahunInput = $request->input('tahunInput');
        $ratingInput = $request->input('ratingInput');
        $linkInput = $request->input('link');
        
        $query = DB::table('film')->insert([
                'image' => $image,
                'judul' => $judulInput,
                'tahun' => $tahunInput,
                'rating' => $ratingInput,
                'link' => $linkInput
        ]);
        if ($query) {
            return redirect()->route('film')->with('success', 'Data Berhasil Ditambahkan');
        } else {
            return redirect()->route('film')->with('failed', 'Data Gagal Ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $data['film'] = DB::select('SELECT * FROM film');
        return view('home', $data);
    }

    public function cari(Request $request)
    {
		$cari = $request->cari;
 
        $query = DB::table('film')->where('judul','like',"%".$cari."%")->paginate();

        return view('home',['film' => $query]);

    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['film'] = DB::table('film')->where('id', $id)->first();
        return view('editFilm', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $judulInput = $request->input('judulInput');
        $tahunInput = $request->input('tahunInput');
        $ratingInput = $request->input('ratingInput');
        $linkInput = $request->input('link');
    
        $query = DB::table('film')->where('id', $id)->update([
            'judul' => $judulInput,
            'tahun' => $tahunInput,
            'rating' => $ratingInput,
            'link' => $linkInput
            
        ]);
        if ($query) {
            return redirect()->route('film')->with('success', 'Data Berhasil Diupdate');
        } else {
            return redirect()->route('film')->with('failed', 'Data Gagal Diupdate');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $query = DB::table('film')->where('id', $id)->delete();
        if ($query) {
            return redirect()->route('film')->with('success', 'Data Berhasil Dihapus');
        } else {
            return redirect()->route('film')->with('failed', 'Data Gagal Dihapus');
        }
    }
}
