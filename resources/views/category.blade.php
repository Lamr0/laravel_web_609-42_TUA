<!doctype html>
<html lang="ru">
<head><meta charset="UTF-8"><title>609-42</title></head>
<body>
<h2>{{ $category ? 'Товары категории '.$category->name : 'Неверный ID категории' }}</h2>
@if($category)
    <table border="1">
        <tr><td>id</td><td>Наименование</td><td>Вес</td></tr>
        @foreach ($category->products as $product)
            <tr><td>{{$product->id}}</td><td>{{$product->name}}</td><td>{{$product->weight}}</td></tr>
        @endforeach
    </table>
@endif
</body>
</html>
