<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Curriculo extends Model
{

    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'video_curriculum',
        'texto_curriculum'
    ];

    public static $filterColumns = [
        'id',
        'user_id',
        'video_curriculum',
        'texto_curriculum'
    ];

    /**
     * Get the user that owns the curriculo.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
