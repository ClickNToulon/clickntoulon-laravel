<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Timetable extends Model
{
    use HasFactory;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array<int, string>
	 */
    protected $fillable = [
        'hour_open',
        'hour_close',
        'day'
    ];

	/**
	 * Get the shop that owns the timetable.
	 */
    public function shop(): BelongsTo
    {
        return $this->belongsTo(Shop::class);
    }
}
