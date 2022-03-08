<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Linea extends Pivot
{
    public $table = 'lineas';

    public $incrementing = true;

    /**
     * Get the factura that owns the Linea
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function factura(): BelongsTo
    {
        return $this->belongsTo(Factura::class);
    }

    /**
     * Get the zapato that owns the Linea
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function zapato(): BelongsTo
    {
        return $this->belongsTo(Zapato::class);
    }

}
