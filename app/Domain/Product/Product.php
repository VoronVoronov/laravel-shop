<?php

namespace App\Domain\Product;

use App\Domain\Inventory\Projections\Inventory;
use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Selectors;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'manages_inventory' => 'boolean',
    ];

    protected static function newFactory(): ProductFactory
    {
        return new ProductFactory();
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function selectors(): hasMany
    {
        return $this->hasMany(Selectors::class, 'product_id', 'id');
    }

    public function getItemPrice(): Price
    {
        return new Price($this->item_price, $this->vat_percentage);
    }

    public function managesInventory(): bool
    {
        return $this->manages_inventory ?? false;
    }

    public function inventory(): HasOne
    {
        return $this->hasOne(Inventory::class);
    }

    public function hasAvailableInventory(int $requestedAmount): bool
    {
        return $this->inventory->amount >= $requestedAmount;
    }
}
