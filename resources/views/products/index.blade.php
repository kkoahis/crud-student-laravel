<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Document</title>
</head>
<body>
   <h1>Product</h1>
   
   <div>
      @if(session()->has('success'))
         <div>
            {{ session('success') }}
         </div>
      @endif
   </div>

   <div>
      <a href="{{route("product.create")}}">Create new product</a>
      <br><br>
      <table border="1">
         <thead>
            <tr>
               <th>Name</th>
               <th>Quantity</th>
               <th>Price</th>
               <th>Description</th>
               <th>Edit</th>
               <th>Delete</th>
            </tr>
         </thead>

         <tbody>
            @foreach ($products as $product)
               <tr>
                  <td>{{ $product->name }}</td>
                  <td>{{ $product->qty }}</td>
                  <td>{{ $product->price }}</td>
                  <td>{{ $product->description }}</td>
                  <td>
                     <a href="{{route("product.edit", $product->slug)}}">Edit</a>
                  </td>
                  <td>
                     <form action="{{route("product.destroy", $product)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Remove">
                     </form>
                  </td>
               </tr>
            @endforeach
         </tbody>
   </div>
</body>
</html>