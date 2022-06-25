<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fotografi extends Model
{
    use HasFactory;

    protected $guarded = ["id"];
    protected $with = ['user'];
    public function scopeFilter($query, array $filters){
        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where('judul', 'like', '%' . $search . '%')
                        ->orWhere('headline', 'like' , '%' . $search . '%')
                        ->orWhere('body', 'like' , '%' . $search . '%');
        });
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function komentarFotografi(){
        return $this->hasMany(KomentarFotografi::class, 'komentar_fotografi_id');
    }

    public function post_fotografi() {
        return $this->hasMany(self::class, 'fotografi_id');
    }

    // supaya url mengarah ke slug

    public function getRouteKeyName(){
        return 'slug';
    }
}
