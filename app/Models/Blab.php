<?php

namespace App\Models;

use App\Events\BlabCreated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Blab extends Model
{
    use HasFactory;

    protected $fillable = [
        'message',
    ];

    protected  $dispatchesEvents = [
        'created' => BlabCreated::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
