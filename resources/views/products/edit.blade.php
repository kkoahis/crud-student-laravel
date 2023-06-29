<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Edit Product</h1>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('product.update', $product) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label>Name</label>
            <input type="text" name="name" placeholder="name" value="{{ $product->name }}">
        </div>
        <div>
            <label>Quantity</label>
            <input type="text" name="qty" placeholder="qty" value="{{ $product->qty }}">
        </div>
        <div>
            <label>Price</label>
            <input type="text" name="price" placeholder="price" value="{{ $product->price }}">
        </div>
        <div>
            <label>Description</label>
            <input type="text" name="description" placeholder="description" value="{{ $product->description }}">
        </div>

        <div>
            <input type="submit" value="Update product">
            <button type="button" onclick="window.location='{{ route('product.index') }}'">Back</button>
        </div>
    </form>
</body>

</html>
