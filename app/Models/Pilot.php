<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Pilot extends BaseModel
{
    public function starships(): BelongsToMany
    {
        return $this->belongsToMany(Starship::class, 'starship_pilot');
    }
}
