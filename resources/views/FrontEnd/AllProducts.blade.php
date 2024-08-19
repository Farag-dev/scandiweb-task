@extends('FrontEnd.layout.app')
@section('title')
Products
@endsection
@section('content')
 <div class=" p-0">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
   @endif
    <form action="{{ route('product.delete') }}" method="post" id="deleteForm">
        @csrf
        @method('DELETE')
<div>
    <a href="{{ route('product.create') }}" class="btn btn-lg btn-primary m-2"> Add Product</a>
    <button type="submit" class="btn btn-lg btn-danger m-2">Delete Selected</button>
</div>
@if (count($Products)>0 )
   <div class="container mb-5">
    <div class="row">
        @foreach ($Products as $Product)
     <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
        <div class="card m-2 p-2 ">
           <input type="checkbox" class="mb-4" value="{{ $Product->id }}" name="ids[]">
           <p class="text-center">SKU: {{ $Product->SKU }}</p>
           <p class="text-center">Name: {{ $Product->name }}</p>
           <p class="text-center">price: {{ $Product->price }} $</p>
           @switch($Product)
               @case($Product->category == 'DVD-disc')
                     <p class="text-center">Description:</p>
                     <p class="text-center">Size: {{ $Product->size }} MB</p>
                   @break
               @case($Product->category == 'Furniture')
                     <p class="text-center">Description:</p>
                     <p class="text-center">Dimension: {{ $Product->H }}CM x {{ $Product->W }}CM x {{ $Product->L }}CM</p>
                   @break
               @case($Product->category == 'Book')
                     <p class="text-center">Description:</p>
                     <p class="text-center">Weight: {{ $Product->weight }} KG</p>
                   @break
               @default
                     <p class="text-center">NO Description.</p>
           @endswitch
        </div>
    </div>
        @endforeach
    </div>
   </div>
</form>
   @else
   <h1 class="text-center">No Products</h1>
    @endif

 </div>
<script>
    document.getElementById('deleteForm').addEventListener('submit', function(e) {
    if(!confirm('Are you sure you want to delete the selected items?')) {
        e.preventDefault();
    }
});

</script>

@endsection
