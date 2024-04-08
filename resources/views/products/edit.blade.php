<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit a Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .error {
            color: #dc3545;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit a Product</h1>
        <div class="error">
            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>

        <form action="{{ route('product.update', ['product' => $product]) }}" method="post">
            @csrf
            @method('put')
            
            <div>
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="Enter name" value="{{ $product->name }}">
            </div>

            <div>
                <label for="qty">Qty</label>
                <input type="text" id="qty" name="qty" placeholder="Enter quantity" value="{{ $product->qty }}">
            </div>

            <div>
                <label for="price">Price</label>
                <input type="text" id="price" name="price" placeholder="Enter price" value="{{ $product->price }}">
            </div>

            <div>
                <label for="description">Description</label>
                <input type="text" id="description" name="description" placeholder="Enter description" value="{{ $product->description }}">
            </div>

            <div>
                <input type="submit" value="Update">
            </div>
        </form>
    </div>
</body>
</html>
