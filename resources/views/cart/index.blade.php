<h1>Cart Items</h1>
@foreach($cart->items as $item)
    <div class="row">
        <div class="col-md-4">
            <h4>{{$item->name}}</h4>
        </div>
        <div class="col-md-4">
            <h6>${{$item->getPrice()}}</h6>
        </div>
    </div>
@endforeach
