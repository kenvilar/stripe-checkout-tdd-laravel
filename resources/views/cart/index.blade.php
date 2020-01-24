@foreach($cart->items as $item)
    <div class="row">
        <div class="col-md-4">
            <h4>{{$item->product->name}}</h4>
        </div>
        <div class="col-md-4">
            <h6>${{$item->product->getPrice()}}</h6>
        </div>
    </div>
@endforeach
