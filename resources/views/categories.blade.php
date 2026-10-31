<!doctype html>
<html lang="ru">
<head><meta charset="UTF-8"><title>609-42</title></head>
<body>
<h2>Список категорий:</h2>
<table border="1">
    <tr><td>id</td><td>Наименование</td></tr>
    @foreach ($categories as $category)
        <tr><td>{{$category->id}}</td><td>{{$category->name}}</td></tr>
    @endforeach
</table>
</body>
</html>
