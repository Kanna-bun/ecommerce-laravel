@extends('layouts.app')

@section('content')
    
<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">Notre collection</h1>
    </div>
</section>

<div class="col">
    <div class="row">
        @foreach ($products as $product)
        <div class="col-12 col-md-6 col-lg-4 mb-4">
            <div class="card">
                <img class="card-img-top" src="{{ $product->picture }}" alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title"><a href="/products/{{ $product->id }}" title="View Product">{{ $product->name }}</a></h4>
                    <p class="card-text">{{ $product->description }}.</p>
                    <div class="row">
                        <div class="col">
                            <p class="btn btn-danger w-100">{{ $product->price }} &euro;</p>
                        </div>
                        <div class="col">
                            <a href="/products/{{ $product->id }}" class="btn btn-success w-100">Ajouter</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        @endforeach

{{ $products->links() }}
@endsection