<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductLog extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'type', 'quantity', 'date'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
