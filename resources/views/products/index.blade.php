<h1>Products</h1>
@foreach($products as $product)
    <div>
        <h4>{{ $product->name }}</h4>
        <p>{{ $product->getPrice() }}</p>
    </div>
@endforeach
