<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class IncomingInvoice extends Model
{

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'incoming_invoice_items', 'invoice_id', 'product_id')
            ->withPivot(['quantity', 'price']);
    }
}
