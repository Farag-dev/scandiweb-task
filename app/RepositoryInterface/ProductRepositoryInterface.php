<?php
namespace App\RepositoryInterface;

interface ProductRepositoryInterface{
    public function all();
    public function create(array $data);
    
}
