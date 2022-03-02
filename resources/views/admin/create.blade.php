@extends('layouts.admin')

@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <ul class="mb-0 list-unstyled">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="" method="post">
    @csrf
    <input type="text" name="name" placeholder="nom du produit" class="form-control" value="{{ old('name') }}">
    <input type="text" name="description" placeholder="description" class="form-control" value="{{ old('description') }}">
    <input type="number" name="price" placeholder="prix" class="form-control" value="{{ old('price') }}">
    <input type="file" name="picture" placeholder="image du produit" class="form-control">

    <button class="btn btn-primary mt-3">Créer</button>
</form>
@endsection