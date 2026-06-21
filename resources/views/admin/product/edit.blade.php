@extends('layouts.admin')

@section('title', $viewData["title"])

@section('content')
<div class="card">
  <div class="card-header">Edit Product</div>
  <div class="card-body">
    @if($errors->any())
      <ul class="alert alert-danger list-unstyled">
        @foreach($errors->all() as $error)<li>- {{ $error }}</li>@endforeach
      </ul>
    @endif

    <form method="POST" action="{{ route('admin.product.update', ['id' => $viewData['product']->getId()]) }}" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="mb-3">
        <label>Name</label>
        <input name="name" type="text" class="form-control" value="{{ $viewData['product']->getName() }}">
      </div>
      <div class="mb-3">
        <label>Price</label>
        <input name="price" type="number" class="form-control" value="{{ $viewData['product']->getPrice() }}">
      </div>
      <div class="mb-3">
        <label>Image</label>
        <input class="form-control" type="file" name="image">
      </div>
      <div class="mb-3">
        <label>Description</label>
        <textarea class="form-control" name="description" rows="3">{{ $viewData['product']->getDescription() }}</textarea>
      </div>
      <button type="submit" class="btn btn-primary">Update</button>
    </form>
  </div>
</div>
@endsection