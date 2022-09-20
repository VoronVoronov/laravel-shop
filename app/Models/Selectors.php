<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Domain\Product\Product;

class Selectors extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'filter_id',
    ];

    public function filters()
    {
        return $this->belongsTo(Filters::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
