<!doctype html>
<html lang="ru">
<head><meta charset="UTF-8"><title>609-42</title></head>
<body>
<h2>{{ $invoice ? 'Приходная накладная № '.$invoice->id.' от '.$invoice->invoice_date.' ('.$invoice->supplier_name.')' : 'Неверный ID накладной' }}</h2>
@if($invoice)
    <table border="1">
        <tr><td>id</td><td>Наименование</td><td>Количество</td><td>Цена</td></tr>
        @foreach ($invoice->products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->pivot->quantity}}</td>
                <td>{{$product->pivot->price}}</td>
            </tr>
        @endforeach
    </table>
@endif
</body>
</html>
