<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Carrito extends Pivot
{
    public $table = 'carritos';

    public $incrementing = true;

    /**
     * Get the user that owns the Carrito
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the zapato that owns the Carrito
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function zapato(): BelongsTo
    {
        return $this->belongsTo(Zapato::class);
    }
}
