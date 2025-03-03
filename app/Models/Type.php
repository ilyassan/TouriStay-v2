<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Type extends Model
{
    use HasFactory;

    protected $table = "types";

    protected $fillable = [
        "name"
    ];

    public function getPrimaryKey()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }


    public function properties(): HasMany
    {
        return $this->hasMany(Property::class);
    }
}
