@extends('layouts.app')

@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])

@section('content')
@foreach ($viewData["orders"] as $order)
  <div class="card mb-3">
    <div class="card-header">Order #{{ $order->getId() }} — Total: ${{ $order->getTotal() }}</div>
    <div class="card-body">
      <table class="table table-bordered table-striped text-center">
        <thead>
          <tr><th>Product</th><th>Qty</th><th>Price</th></tr>
        </thead>
        <tbody>
          @foreach ($order->items as $item)
            <tr>
              <td>{{ $item->product->getName() }}</td>
              <td>{{ $item->getQuantity() }}</td>
              <td>${{ $item->getPrice() }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endforeach
@endsection