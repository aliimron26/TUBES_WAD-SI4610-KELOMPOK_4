<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'title',
        'content',
        'image'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    /**
     * Get formatted created date
     *
     * @return string
     */
    public function getFormattedCreatedDateAttribute(): string
    {
        return $this->created_at->format('d F Y H:i');
    }

    /**
     * Get formatted updated date
     *
     * @return string
     */
    public function getFormattedUpdatedDateAttribute(): string
    {
        return $this->updated_at->format('d F Y H:i');
    }

    /**
     * Get image URL
     *
     * @return string
     */
    public function getImageUrlAttribute(): string
    {
        if ($this->image) {
            return asset('storage/' . $this->image);
        }
        return asset('assets/img/default-image.png');
    }

    /**
     * Get excerpt from content
     *
     * @param int $length
     * @return string
     */
    public function getExcerptAttribute($length = 100): string
    {
        return \Str::limit(strip_tags($this->content), $length);
    }
}
