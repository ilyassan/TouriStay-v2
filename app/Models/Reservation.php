<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'property_id',
        'from_date',
        'to_date',
        'total_price',
    ];


    public function tourist(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }

}
