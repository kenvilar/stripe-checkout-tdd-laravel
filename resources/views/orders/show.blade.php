@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <hr>
                <h4>Success! Order for {{$order->email}} confirmed.</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5>Products</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @foreach($order->products as $product)
                            <div class="row">
                                <div class="col-md-2">
                                    <img src="https://via.placeholder.com/100x70" alt="image" class="card-img">
                                </div>
                                <div class="col-md-6">
                                    <h4>{{$product->name}}</h4>
                                </div>
                                <div class="col-md-6">
                                    <h6>${{$product->getPrice()}}</h6>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="panel-footer">
                        <div class="row text-center">
                            <div class="col-md-9">
                                <h4 class="text-right">Total <strong>$ {{ $order->totalPrice() }}</strong></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
