<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Starship extends BaseModel
{
    public function pilots(): BelongsToMany
    {
        return $this->belongsToMany(Pilot::class, 'starship_pilot');
    }

    public function cargos(): HasMany
    {
        return $this->hasMany(Cargo::class);
    }

    public function maxatmospheringSpeedSlower(int $speed): float
    {
        $percent = 100;

        if ($this->max_atmosphering_speed) {
            $percent = $this->max_atmosphering_speed >= $speed ? 0 :
                (($speed - $this->max_atmosphering_speed) / $speed) * 100;
        }

        return $percent;
    }
}
