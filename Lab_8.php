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
</style>
</head>

<body>

<div class="card">
<div class="title">🧾 Smart Receipt</div>

<div class="receipt">
<?php
//=====================
//FIXED DATA DO NOT CHANGE
//=====================
$name="             JUan DelA Cruz                    ";
$item="             Laptop                            ";
$quantity=3;
$price=59999.99;
$card='123409912316591';
//DO TASKS HERE
/* 
// 1. remove trailing and leading whitespaces then convert the name and item to uppercase
// 2. Compute total
// 3. Compute VAT (12%)
// 4. Compute grand total
// 5. DISPLAY OUTPUT
// 6. add payment card but display only the first 2 and last 4 digits.
// 7. refer to picture for output.


// IMPORTANT:
// You may display values directly OR organize them first.

// REQUIRED LABELS:
// CUSTOMER, ITEM, PRICE, QTY, TOTAL, VAT (12%), GRAND TOTAL
utilize this line for the outputs:
echo '<div class="line"><span class="label">...</span><span class="value">'...'</span></div>';
*/
// Add class "total" to GRAND TOTAL line

// =====================================

?>
</div>
</div>

</body>
</html>