<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Index</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1, h2, h3 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f9f9f9;
        }

        .add-product-btn {
            text-align: center;
            margin-top: 20px;
        }

        .add-product-btn a {
            text-decoration: none;
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
        }

        .add-product-btn a:hover {
            background-color: #0056b3;
        }

        .success-message {
            margin-top: 20px;
            padding: 10px;
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
            border-radius: 5px;
        }
        .add-product-btn {
    text-align: center;
    margin-top: 20px;
}

.add-product-btn h3 {
    font-size: 1.2rem;
    margin-bottom: 10px;
}

.add-product-button {
    display: inline-block;
    padding: 10px 20px;
    background-color: #28a745;
    color: #fff;
    border: none;
    border-radius: 5px;
    font-size: 1rem;
    text-decoration: none;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.add-product-button:hover {
    background-color: #218838;
}

    </style>
</head>
<body>
    <div class="container">
        <h1>Product</h1>
        <div>
            <h2>Index</h2> 
            @if(session('success'))
                <div class="success-message">
                    {{ session('success') }}
                </div>
            @endif
        </div>
        <div>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Add Date</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->qty }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->created_at }}</td>
                        <td>
                            <a href="{{ route('product.edit', ['product' => $product]) }}">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('product.delete', ['product' => $product]) }}" method="post">
                                @csrf
                                @method('delete')
                                <input type="submit" value="Delete"> 
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="add-product-btn">
            <h3>To add new products:</h3>
            <button class="add-product-button"><a href="{{ route('product.create') }}">Add Product</a></button>
        </div>
        
    </div>
</body>
</html>
    