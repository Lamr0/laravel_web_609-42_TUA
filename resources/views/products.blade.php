<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>609-42</title>
    <style> .is-invalid { color: red; } .ok { color: green; } </style>
</head>
<body>
<h2>Список товаров</h2>
@if(session('status'))
    <div class="ok">{{ session('status') }}</div>
@endif
@if(session('error'))
    <div class="is-invalid">{{ session('error') }}</div>
@endif
<p><a href="{{ url('product/create') }}">Добавить товар</a></p>
<table border="1">
    <tr><td>id</td><td>Наименование</td><td>Вес</td><td>Категория</td><td>Действия</td></tr>
    @foreach ($products as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->weight}}</td>
            <td>{{$product->category->name}}</td>
            <td>
                <a href="{{ url('product/edit/'.$product->id) }}">Редактировать</a>
                <a href="{{ url('product/destroy/'.$product->id) }}" onclick="return confirm('Удалить товар?')">Удалить</a>
            </td>
        </tr>
    @endforeach
</table>
</body>
</html>
