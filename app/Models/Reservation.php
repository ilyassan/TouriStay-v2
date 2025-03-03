<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation extends Model
{

    protected $fillable = [
        'user_id',
        'property_id',
        'from_date',
        'to_date',
        'total_price',
    ];

    
    public function getPrimaryKey()
    {
        return $this->id;
    }

    public function getTotalPrice()
    {
        return $this->total_price;
    }

    public function getFromDate()
    {
        return $this->from_date;
    }

    public function getToDate()
    {
        return $this->to_date;
    }


    public function tourist(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }

}
