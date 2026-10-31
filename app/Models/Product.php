<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
class Product extends Model
{

    public function category(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    public function invoices(): BelongsToMany
    {
        return $this->belongsToMany(IncomingInvoice::class, 'incoming_invoice_items', 'product_id', 'invoice_id')
            ->withPivot(['quantity', 'price']);
    }
}
