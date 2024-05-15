<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Progress extends Model
{
    use HasFactory;
    protected $fillable = [
        'userId',
        'poids',
        'Mollet',
        'Bras',
        'TempsDeCourse',
        'PoidsLeve',
        'Hauteur',
        'Poitrine',
        'status',
    ];

    public function user(): BelongsTo
    {
        return  $this->belongsTo(User::class);
    }
}
