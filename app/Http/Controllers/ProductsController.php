<?php

namespace App\Http\Controllers;

use App\Models\products;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use App\RepositoryInterface\ProductRepositoryInterface;

class ProductsController extends Controller
{
    protected $ProductRepo;

    public function __construct(ProductRepositoryInterface $ProductRepo) {
        $this->ProductRepo = $ProductRepo;
    }
    public function index()
    {
        $Products=$this->ProductRepo->all();
        return view('FrontEnd.AllProducts',compact('Products'));
    }


    public function create()
    {
        return view('FrontEnd.AddProduct');
    }


    public function store(ProductRequest $request)
    {
        $this->ProductRepo->create($request->all());

        return redirect()->route('product.index')->with('status','Product Added Successfully!');
    }

    public function destroy(Request $request)
    {

        $ids = $request->input('ids');

        if (!empty($ids)) {
            products::whereIn('id', $ids)->delete();
        }

        return redirect()->route('product.index')->with('status', 'Selected items deleted successfully.');
    }
    }

