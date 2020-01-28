@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>Shopping Cart</h5>
                                </div>
                                <div class="col-md-6">
                                    <a href="/products" class="btn btn-primary btn-block">Continue Shopping</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @foreach($cart->items as $item)
                            <div class="row">
                                <div class="col-md-2">
                                    <img src="https://via.placeholder.com/100x70" alt="image" class="card-img">
                                </div>
                                <div class="col-md-6">
                                    <h4>{{$item->name}}</h4>
                                </div>
                                <div class="col-md-6">
                                    <h6>${{$item->getPrice()}}</h6>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="panel-footer">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
