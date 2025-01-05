<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $table = 'wishlist';
    protected $primaryKey = 'id_wishlist';
    public $timestamps = false;

    protected $fillable = ['id_rekomendasi'];

    public function rekomendasi()
    {
        return $this->belongsTo(Rekomendasi::class, 'id_rekomendasi', 'id_rekomendasi');
    }
}
