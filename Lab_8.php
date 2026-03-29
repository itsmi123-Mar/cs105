<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Smart Receipt</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">

<style>
body {
    background: linear-gradient(135deg, #1e3c72, #2a5298);
    font-family: 'Poppins', sans-serif;
    display: flex;
    height: 100vh;
    align-items: center;
    justify-content: center;
}

.card {
    background: white;
    padding: 25px;
    width: 380px;
    border-radius: 15px;
    box-shadow: 0 15px 30px rgba(0,0,0,0.2);
}

.title {
    text-align: center;
    font-weight: 700;
    margin-bottom: 15px;
}

.receipt {
    border-top: 2px dashed #ccc;
    padding-top: 15px;
}

.line {
    display: flex;
    justify-content: space-between;
    margin: 6px 0;
}

.total {
    font-weight: 700;
    border-top: 1px solid #ddd;
    margin-top: 10px;
    padding-top: 10px;
}

.footer {
    text-align: center;
    margin-top: 15px;
    font-size: 14px;
    color: #777;
}
</style>
</head>

<body>

<div class="card">
<div class="title">🧾 Smart Receipt</div>

<div class="receipt">
<?php
//=====================
// FIXED DATA DO NOT CHANGE
//=====================
$name="             JUan DelA Cruz                    ";
$item="             Laptop                            ";
$quantity=3;
$price=59999.99;
$card='123409912316591';

// 1. remove trailing and leading whitespaces then convert the name and item to uppercase
$name = strtoupper(trim($name));
$item = strtoupper(trim($item));

// 2. Compute total
$total = $price * $quantity;

// 3. Compute VAT (12%)
$vat = $total * 0.12;

// 4. Compute grand total
$grand_total = $total + $vat;

// 6. add payment card but display only the first 2 and last 4 digits
$card_masked = substr($card, 0, 2) . str_repeat("*", strlen($card) - 6) . substr($card, -4);

// 5 & 7. DISPLAY OUTPUT (based on required format)

echo '<div class="line"><span class="label">CUSTOMER</span><span class="value">'.$name.'</span></div>';

echo '<div class="line"><span class="label">ITEM</span><span class="value">'.$item.'</span></div>';

echo '<div class="line"><span class="label">PRICE</span><span class="value">Php '.number_format($price,2).'</span></div>';

echo '<div class="line"><span class="label">QTY</span><span class="value">'.$quantity.'</span></div>';

echo '<div class="line"><span class="label">TOTAL</span><span class="value">Php '.number_format($total,2).'</span></div>';

echo '<div class="line"><span class="label">VAT (12%)</span><span class="value">Php '.number_format($vat,2).'</span></div>';

echo '<div class="line"><span class="label">CARD</span><span class="value">'.$card_masked.'</span></div>';

// GRAND TOTAL LAST
echo '<div class="line total"><span class="label">GRAND TOTAL</span><span class="value">Php '.number_format($grand_total,2).'</span></div>';

// THANK YOU MESSAGE
echo '<div class="footer">Thank you for your purchase!</div>';
?>
</div>
</div>

</body>
</html>
