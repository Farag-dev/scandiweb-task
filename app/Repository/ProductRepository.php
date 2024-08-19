<?php

namespace App\Repository;

use App\Models\products;
use App\RepositoryInterface\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface {
    public function all() {
        return products::all();
    }


    public function create(array $data) {
        return products::create($data);
    }

}
