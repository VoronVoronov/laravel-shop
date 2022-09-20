<?php

namespace App\Http\Controllers\Products;

use App\Domain\Product\Product;
use App\Models\Filters;
use App\Models\Selectors;
use DB;

class ProductIndexController
{
    public function __invoke()
    {
        $filters = Filters::all();
        $categories = [];
        $citites = [];
        foreach ($filters as $filter) {
            if($filter->key == 'Категории') {
                $categories[] = $filter;
            }else{
                $citites[] = $filter;
            }
        }
        $ids = [];
        if(isset($_GET['id']) && $_GET['id'] != null) {
            $ids = $_GET['id'];
        }
        if(!empty($_GET['id'])) {
            $products = Product::join('selectors', 'products.id', '=', 'selectors.product_id')
                ->join('filters', 'selectors.filter_id', '=', 'filters.id')
                ->whereColumn([
                    ['products.id', '=', 'selectors.product_id'],
                    ['filters.id', '=', 'selectors.filter_id'],
                ])
                ->whereIn('filters.id', $ids)
                ->paginate();
        }else{
            $products = Product::paginate();
        }
        return view('products.index', ['products' => $products, 'categories' => $categories, 'cities' => $citites, 'ids' => $ids]);
    }
}
