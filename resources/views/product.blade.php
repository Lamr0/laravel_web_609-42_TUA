<!doctype html>
<html lang="ru">
<head><meta charset="UTF-8"><title>609-42</title></head>
<body>
<h2>{{ $product ? 'Товар: '.$product->name.' (категория: '.$product->category->name.')' : 'Неверный ID товара' }}</h2>
@if($product)
    <h3>Приходные накладные с этим товаром:</h3>
    <table border="1">
        <tr><td>№ накладной</td><td>Дата</td><td>Поставщик</td><td>Количество</td><td>Цена</td></tr>
        @foreach ($product->invoices as $invoice)
            <tr>
                <td>{{$invoice->id}}</td>
                <td>{{$invoice->invoice_date}}</td>
                <td>{{$invoice->supplier_name}}</td>
                <td>{{$invoice->pivot->quantity}}</td>
                <td>{{$invoice->pivot->price}}</td>
            </tr>
        @endforeach
    </table>
@endif
</body>
</html>
