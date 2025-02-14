<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchasingSchedule extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'supplier', 'schedule_date', 'status'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
