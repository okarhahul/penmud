<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomentarSastra extends Model
{
    use HasFactory;
    protected $tabel =["komentar_sastras"];
    protected $guarded = ["id"];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function sastra(){
        return $this->belongsTo(Sastra::class);
    }

    public function post_sastra(){
        return $this->belongsTo(Sastra::class);
    }
}
