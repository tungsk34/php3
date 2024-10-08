
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ</title>
</head>
<body>
    <h1>{{ $message ?? 'Chào mừng' }}</h1>

    <form action="/movies" method="get">
        <label for="age">Nhập tuổi bạn:</label>
        <input type="number" id="age" name="age" min="1" required>
        <button type="submit">Truy cập </button>
    </form>
</body>
</html>

