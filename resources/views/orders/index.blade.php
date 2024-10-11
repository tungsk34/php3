{{-- resources/views/orders/index.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order List</title>
</head>
<body>
    <h1>Order List</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Customer</th>
            <th>Total</th>
        </tr>
        @foreach($orders as $order)
        <tr>
            <td>{{ $order['id'] }}</td>
            <td>{{ $order['customer'] }}</td>
            <td>{{ $order['total'] }} USD</td>
        </tr>
        @endforeach
    </table>
</body>
</html>
