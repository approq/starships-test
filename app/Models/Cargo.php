<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cargo extends BaseModel
{
    public function starship(): BelongsTo
    {
        return $this->belongsTo(Starship::class);
    }
}
