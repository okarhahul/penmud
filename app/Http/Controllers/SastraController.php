<?php

namespace App\Http\Controllers;

use App\Models\Sastra;
use App\Http\Requests\StoreSastraRequest;
use App\Http\Requests\UpdateSastraRequest;
use App\Models\KomentarSastra;
use App\Models\CategorySastra;
use Illuminate\Http\Request;

class SastraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keterangan = '';
        if(request('categorySastra')) {
            $categorySastra = CategorySastra::firstWhere('slug', request('categorySastra'));
            $keterangan = ' dengan pilihan kategori ' . $categorySastra->name;
        }
        return view('sastra', [
            "tittle" => "Sastra",
            "keterangan" => $keterangan,
            "active" => 'sastra',
            "sastra" => Sastra::latest()->filter(request(['search', 'categorySastra']))->paginate(6)->withQueryString()
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sastra  $sastra
     * @return \Illuminate\Http\Response
     */
    public function show(Sastra $sastra)
    {
        return view('post_sastra', [
            "tittle" => "Single Post",
            "active" => 'sastra',
            "post_sastra" => $sastra,
            "comments" => KomentarSastra::where('post_sastra_id', $sastra->id)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSastraRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSastraRequest $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sastra  $sastra
     * @return \Illuminate\Http\Response
     */
    public function edit(Sastra $sastra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSastraRequest  $request
     * @param  \App\Models\Sastra  $sastra
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSastraRequest $request, Sastra $sastra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sastra  $sastra
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sastra $sastra)
    {
        //
    }

    // Komentar
    public function komentar (Request $request, Sastra $sastra)
    {   
        // disini kita definisikan terlebih dahulu atau untuk mencreate data komentar
        $request->request->add(['user_id' =>  auth()->user()->id]);
        $komentarsastra = KomentarSastra::create($request->all());

        $id_komen = KomentarSastra::where('id', $komentarsastra->id)->first()->id;

        // kita sesuaikan dengan id post sastra
        $id_sastra = $request->post_sastra_id;
        Sastra::where('id', $id_sastra)
                ->update(['komentar_sastra_id' => $id_komen]);

        // return $komentarsastra;
        return redirect()->back();
    }

    public function search(){
        $filter = request()->query();
        return Sastra::where('judul', 'like', "%{$filter['search']}%")->get();
    }
}
