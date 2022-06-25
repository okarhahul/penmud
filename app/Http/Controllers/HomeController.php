<?php

namespace App\Http\Controllers;

use App\Models\Jurnalistik;
use App\Models\Sastra;
use App\Models\Fotografi;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $jurnalistik = Jurnalistik::latest()->take(3)->get();
        $fotografi = Fotografi::latest()->take(3)->get();
        $sastra = Sastra::latest()->take(3)->get();

        return view ('home', [
            "tittle" => "Beranda",
            "jurnalistik" => $jurnalistik,
            "sastra" => $sastra,
            "fotografi" => $fotografi
        ]);
    }

    // public function search(){
    //     $filter = request()->query();
    //     return Jurnalistik::where('judul', 'like', "%{$filter['search']}%")->get();
    // }

}
