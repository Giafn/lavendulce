<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'description', 'photo', 'stock', 'deadstock', 'expired_at'];

    public function logs()
    {
        return $this->hasMany(ProductLog::class);
    }

    public function purchasingSchedules()
    {
        return $this->hasMany(PurchasingSchedule::class);
    }
}
