<!doctype html>
<html lang="ru">
<head><meta charset="UTF-8"><title>609-42</title></head>
<body>
<h2>Список товаров</h2>
<table border="1">
    <tr><td>id</td><td>Наименование</td><td>Вес</td><td>Категория</td></tr>
    @foreach ($products as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->weight}}</td>
            <td>{{$product->category->name}}</td>
        </tr>
    @endforeach
</table>
</body>
</html>
