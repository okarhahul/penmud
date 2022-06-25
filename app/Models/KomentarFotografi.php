<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomentarFotografi extends Model
{
    use HasFactory;
    protected $tabel =["komentar_fotografis"];
    protected $guarded = ["id"];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function fotografi(){
        return $this->belongsTo(Fotografi::class);
    }

    public function post_fotografi(){
        return $this->belongsTo(Fotografi::class);
    }
}
