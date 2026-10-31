<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>609-42</title>
    <style> .is-invalid { color: red; } </style>
</head>
<body>
<h2>Добавление товара</h2>
<form method="post" action="{{ url('product') }}">
    @csrf
    <label>Наименование</label>
    <input type="text" name="name" value="{{ old('name') }}">
    @error('name')
    <div class="is-invalid">{{ $message }}</div>
    @enderror
    <br>
    <label>Вес</label>
    <input type="text" name="weight" value="{{ old('weight') }}">
    @error('weight')
    <div class="is-invalid">{{ $message }}</div>
    @enderror
    <br>
    <label>Категория:</label>
    <select name="category_id">
        <option value="" style="display:none"></option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>{{ $category->name }}</option>
        @endforeach
    </select>
    @error('category_id')
    <div class="is-invalid">{{ $message }}</div>
    @enderror
    <br><br>
    <input type="submit" value="Отправить">
</form>
</body>
</html>
