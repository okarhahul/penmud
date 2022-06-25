<?php

namespace App\Http\Controllers;

use App\Models\Fotografi;
use App\Http\Requests\StoreFotografiRequest;
use App\Http\Requests\UpdateFotografiRequest;
use Illuminate\Http\Request;
use App\Models\KomentarFotografi;

class FotografiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('fotografi', [
            "tittle" => "Fotografi",
            "active" => 'fotografi',
            "fotografi" => Fotografi::latest()->filter(request(['search']))->paginate(6)->withQueryString()
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fotografi  $fotografi
     * @return \Illuminate\Http\Response
     */
    public function show(Fotografi $fotografi)
    {
        return view('post_fotografi', [
            "tittle" => "Single Post",
            "active" => 'fotografi',
            "post_fotografi" => $fotografi,
            "comments" => KomentarFotografi::where('post_fotografi_id', $fotografi->id)->get(),
            // "comments" => KomentarFotografi::all(),
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
     * @param  \App\Http\Requests\StoreFotografiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFotografiRequest $request)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fotografi  $fotografi
     * @return \Illuminate\Http\Response
     */
    public function edit(Fotografi $fotografi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFotografiRequest  $request
     * @param  \App\Models\Fotografi  $fotografi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFotografiRequest $request, Fotografi $fotografi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fotografi  $fotografi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fotografi $fotografi)
    {
        //
    }

        // Komentar
        public function komentar (Request $request, Fotografi $fotografi)
        {   
            // disini kita definisikan terlebih dahulu atau untuk mencreate data komentar
            $request->request->add(['user_id' =>  auth()->user()->id]);
            $komentarfotografi = KomentarFotografi::create($request->all());
    
            $id_komen = KomentarFotografi::where('id', $komentarfotografi->id)->first()->id;
    
            // kita sesuaikan dengan id post fotografi
            $id_fotografi = $request->post_fotografi_id;
            Fotografi::where('id', $id_fotografi)
                    ->update(['komentar_fotografi_id' => $id_komen]);
    
            // return $komentarfotografi;
            return redirect()->back();
        }

        public function search(){
            $filter = request()->query();
            return Fotografi::where('judul', 'like', "%{$filter['search']}%")->get();
        }
}
