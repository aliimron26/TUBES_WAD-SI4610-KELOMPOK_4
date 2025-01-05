<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Rekomendasi extends Model
{
    use HasFactory;

    /**
     * Nama tabel yang terkait dengan model
     *
     * @var string
     */
    protected $table = 'rekomendasi';

    /**
     * Primary key tabel
     *
     * @var string
     */
    protected $primaryKey = 'id_rekomendasi';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'nama_fashion',
        'deskripsi_fashion',
        'harga',
        'link_affiliate_shopee',
        'link_affiliate_tokopedia',
        'link_affiliate_lazada',
        'image',
        'status',
        'kategori'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'harga' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    /**
     * Scope a query untuk mendapatkan rekomendasi yang sudah diupload.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUploaded($query)
    {
        return $query->where('status', 'Upload');
    }

    /**
     * Scope a query untuk memfilter berdasarkan kategori.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string  $kategori
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeByKategori($query, $kategori)
    {
        return $query->where('kategori', 'LIKE', '%' . $kategori . '%');
    }

    /**
     * Get the wishlist items associated with the rekomendasi.
     */
    public function wishlists()
    {
        return $this->hasMany(Wishlist::class, 'id_rekomendasi', 'id_rekomendasi');
    }

    /**
     * Format harga ke format Rupiah
     *
     * @return string
     */
    public function getFormattedHargaAttribute(): string
    {
        return 'Rp ' . number_format($this->harga, 0, ',', '.');
    }

    /**
     * Get image URL
     *
     * @return string
     */
    public function getImageUrlAttribute(): string
    {
        if ($this->image) {
            return asset('storage/rekomendasi/' . $this->image);
        }
        return asset('images/no-image.jpg');
    }
}
