@extends('FrontEnd.layout.app')
@section('title')
Add New Product
@endsection
@section('content')
<div>
    <a href="{{ route('product.index') }}" class="btn btn-lg btn-secondary m-2"> Cancel</a>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-sm-12 mx-auto">
 <div class="card-body p-3  mx-auto">
        <form action="{{ route('product.store') }}" method="post">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @csrf
            <div class="form-group">
                <label for="SKU">SKU</label>
                <input type="text" class="form-control "  name="SKU" id="SKU" value="{{ Str::random(10) }}">
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control "  name="name" id="name" placeholder="name">
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" class="form-control "  name="price" id="price" placeholder="price">
            </div>
            <div class="form-group">
                <label >Category</label>
                <select name="category" class="form-control " id="optionSelect">
                    <option selected disabled >select type </option>
                    <option value="DVD-disc">DVD-disc</option>
                    <option value="Furniture">Furniture </option>
                    <option value="Book">Book</option>
                </select>
            </div>
            <div id="DVD-disc" class="form-group" style="display:none;">
                <label for="size">Size(MB)</label>
                <input type="text" class="form-control "  name="size" id="size" placeholder="Size in MB">
            </div>
            <div id="Furniture" class="form-group" style="display:none;">
                <label for="height">Height (CM)</label>
                <input type="text" class="form-control "  name="H" id="height" placeholder="Height in CM">

                <label for="width">Width (CM)</label>
                <input type="text" class="form-control "  name="W" id="width" placeholder="Width in CM">

                <label for="length">Length (CM)</label>
                <input type="text" class="form-control "  name="L" id="length" placeholder="Length in CM">
            </div>
            <div id="Book" class="form-group" style="display:none;">
                <label for="weight">Weight(KG)</label>
                <input type="text" class="form-control "  name="weight" id="weight" placeholder="Weight in KG">
            </div>

            <div class="form-group d-block text-center">
                <button type="submit" class="btn btn-lg btn-primary btn-block">Add Product</button>
            </div>


        </form>
    </div>
        </div>
    </div>

</div>
@endsection
