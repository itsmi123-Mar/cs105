<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🍕 Pizza Ordering System - Student Template</title>
    <style>
        /* CSS styles preserved from original design */
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', sans-serif; background: linear-gradient(135deg, #FF6B6B 0%, #FFA500 50%, #FFD700 100%); min-height: 100vh; padding: 40px 20px; }
        .container { max-width: 1200px; margin: 0 auto; }
        header { text-align: center; color: white; margin-bottom: 40px; text-shadow: 2px 2px 4px rgba(0,0,0,0.3); }
        h1 { font-size: 3.5em; margin-bottom: 10px; text-transform: uppercase; }
        .card { background: white; border-radius: 20px; padding: 35px; box-shadow: 0 15px 35px rgba(0,0,0,0.2); border: 3px solid #FF6B6B; margin-bottom: 30px; }
        .card h2 { color: #FF6B6B; border-bottom: 3px solid #FFA500; padding-bottom: 10px; margin-bottom: 20px; }
        .content { display: grid; grid-template-columns: 1fr 1fr; gap: 30px; }
        .full-width { grid-column: 1 / -1; }
        .form-group { display: flex; flex-direction: column; gap: 8px; margin-bottom: 15px; }
        input[type="text"], input[type="number"] { padding: 12px; border: 2px solid #FF6B6B; border-radius: 10px; }
        .price { color: #FFA500; font-weight: 700; }
        button { padding: 15px; background: linear-gradient(135deg, #FF6B6B, #FFA500); color: white; border: none; border-radius: 10px; font-weight: 700; cursor: pointer; width: 100%; }
        .summary-item { display: flex; justify-content: space-between; padding: 10px; background: #fff5f5; border-radius: 8px; margin-bottom: 10px; border-left: 4px solid #FFA500; }
        .total { font-weight: bold; color: white; font-size: 1.5em; background: linear-gradient(135deg, #FF6B6B, #FFA500); padding: 20px; border-radius: 10px; text-align: center; }
        .menu-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); gap: 15px; }
        .menu-item { background: #FFF5E6; padding: 15px; border-radius: 12px; border: 2px solid #FFA500; text-align: center; }
        .order-counter { background: linear-gradient(135deg, #FF6B6B, #FFA500); color: white; }
        .order-item { background: rgba(255,255,255,0.2); padding: 10px; border-radius: 8px; margin-bottom: 5px; }
    </style>
</head>
<body>

    <?php
        // Pre-defined Associative Arrays for the Menu
        $pizzaMenu = [
            "Cheese" => 150,
            "Margherita" => 160,
            "Veggie" => 170,
            "Pepperoni" => 180,
            "Four Cheese" => 190,
            "Hawaiian" => 200,
            "BBQ Chicken" => 220,
            "Meat Lovers" => 250
        ];

        $toppingsMenu = [
            "Onions" => 15,
            "Green Peppers" => 15,
            "Mushroom" => 20,
            "Jalapenos" => 20,
            "Olives" => 25,
            "Pineapple" => 25,
            "Extra Cheese" => 30,
            "Sausage" => 35,
            "Bacon" => 40
        ];
        
        // TODO: 1. Define your computePizzaTotal Function here

        function computePizzaTotal($pizzaPrice, $toppings, $toppingsMenu, $quantity) {
            $total = $pizzaPrice;

            if (!empty($toppings)) {
                foreach ($toppings as $topping) {
                    if (isset($toppingsMenu[$topping])) {
                        $total += $toppingsMenu[$topping];
                    }
                }
            }
            $total = $total * $quantity;

            return $total;
        }
    ?>

    <div class="container">
        <header>
            <h1><span>🍕</span> Pizza Bites Express</h1>
            <p>Laboratory Exercise: PHP Control Structures & Functions</p>
        </header>

        <div class="content">
            <div class="card">
                <h2>🍴 Order Now</h2>
                <form method="post">
                    <div class="form-group">
                        <label>Customer Name</label>
                        <input type="text" name="customer" required>
                    </div>

                    <div class="form-group">
                        <label>Select Your Pizza</label>
			<?php
			foreach ($pizzaMenu as $name => $price) {
			    echo "<label>
			    <input type='radio' name='pizza' value='$name'> $name - ₱$price 
			    </label><br>";

			}
			?>
                        <div class="radio-group">
                            </div>
                    </div>

                    <div class="form-group">
                        <label>Add Toppings</label>
			<?php
			foreach ($toppingsMenu as $name => $price) {
			    echo "<label>
			    <input type='checkbox' name='toppings[]' value='$name'> $name - ₱$price <br>
			    </label><br>";
			}
			?>

                        <div class="checkbox-group">
                            </div>
                    </div>

                    <div class="form-group">
                        <label>Quantity</label>
                        <input type="number" name="qty" min="1" value="1">
                    </div>

                    <button type="submit" name="order">🚀 Place Order</button>
                </form>
            </div>

            <div class="card">
                <h2>📋 Order Summary</h2>
                <?php
                    if (isset($_POST['order'])) {
                        // TODO: 4. Capture Form Data
            $customer = $_POST['customer'];
            $pizza = $_POST['pizza'];
            $toppings = $_POST['toppings'] ?? [];
            $quantity = $_POST['qty'];
            $pizzaPrice = $pizzaMenu[$pizza];

            $total = computePizzaTotal($pizzaPrice, $toppings, $toppingsMenu, $quantity);
			
			// TODO: 5. Call function and calculate Grand Total
            echo "<div class='summary-item'> <span> Name: </span><span>$customer</span></div>";
            echo "<div class='summary-item'> <span> Pizza: </span><span>$pizza</span></div>";
            echo "<div class='summary-item'> <span> Quantity: </span><span>$quantity</span></div>";

            echo "<div class='summary-item'> <span> Toppings: </span><span>";
            echo empty($toppings) ? "None" : implode(", ", $toppings);
            echo "</span></div>";

            echo "<div class='total'> Total: Php$total </div>";

                        // TODO: 6. Display Results
                    } else {
                        echo "<p style='text-align: center; color: #999;'>Place an order to see summary</p>";
                    }
                ?>
            </div>

            <div class="card full-width">
                <h2>📚 Menu Price List</h2>
                <div class="menu-grid">
			<?php
			foreach ($pizzaMenu as $name => $price) {
			    echo "<div class='menu-item'>$name <br> ₱$price</div>";
			}

			foreach ($toppingsMenu as $name => $price) {
			    echo "<div class='menu-item'>$name <br> ₱$price</div>";
			}
			?>
                    </div>
            </div>

            <div class="card full-width order-counter">
                <h2>🎯 Order Counter</h2>
                <?php
                    if (isset($_POST['order'])) {
                        // TODO: 8. Use a FOR loop to display the order line based on Quantity		
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>
