<!DOCTYPE html>

<?php
$product_name="";
$product_name_error="";
$category="";
$category_error=""; 
$price="";
$price_error="";
$stock_quantity="";
$stock_quantity_error="";
$expiration_date="";
$expiration_date_error="";
$status="";
$status_error="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_name = trim(htmlspecialchars($_POST["product_name"]));
    if (empty($product_name)) {
        $product_name_error = "Product Name is required";
    }

    $category = trim(htmlspecialchars($_POST["category"]));
    if (empty($category)) {
        $category_error = "Category is required";
    }

    $price = trim(htmlspecialchars($_POST["price"]));
    if (empty($price)) {
        $price_error = "Price is required";
    } elseif (!is_numeric($price)) {
        $price_error = "Price must be a number";
    } elseif ($price <= 0) {
        $price_error = "Price must not be lesser or equal to zero";
    }

    $stock_quantity = trim(htmlspecialchars($_POST["stock_quantity"]));
    if (empty($stock_quantity)) {
        $stock_quantity_error = "Stock Quantity is required";
    } elseif (!is_numeric($stock_quantity)) {
        $stock_quantity_error = "Stock Quantity must be a number";
    } elseif ($stock_quantity < 0) {
        $stock_quantity_error = "Stock Quantity must not be lesser than zero";
    }

    $expiration_date = trim(htmlspecialchars($_POST["expiration_date"]));
    if (empty($expiration_date)) {
        $expiration_date_error = "Expiration Date is required";
    } elseif (strtotime($expiration_date) <= strtotime(date("Y-m-d"))) {
        $expiration_date_error = "Expiration Date must not be in the past or today";
    }
    $status = isset($_POST["status"]) ? trim(htmlspecialchars($_POST["status"])) : "";
    if (empty($status)) {
        $status_error = "Status is required";
    }
        if (
            empty($product_name_error) &&
            empty($category_error) &&
            empty($price_error) &&
            empty($stock_quantity_error) &&
            empty($expiration_date_error) &&
            empty($status_error)
        ) {
            header("Location: redirect.php");
            exit;
        }
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body {
        background: linear-gradient(135deg, #c5b4f4ff 0%, #32144aff 100%);
        font-family: Arial, sans-serif;
        margin: 20px;
    }
     h1 {
        text-align: center;
        color: #6c3283ff;
    }
    form {
        max-width: 400px;
        margin: auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f9f9f9;
    }
    label {
        display: block;
        margin-bottom: 3px;
        font-weight: bold;
    }
    input[type="text"],
    input[type="number"],
    input[type="date"],
    select {
        width: 95%;
        padding: 3px;
        margin-bottom: 10px;
        border: 2px solid #7f2697ff;
        border-radius: 4px;
    }
    input[type="radio"] {
        margin-right: 5px;
    }
    input[type="submit"] {
        background-color: #ca89e1ff;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.5s ease, color 0.3s ease;
        display: block;
        margin: 20px auto 0 auto;
    }
    input[type="submit"]:hover {
        background-color: #501667ff;
        color: white;
    }
    .error {
        color: red;
        font-size: 0.9em;
    }
</style>
<body>
    <!-- The difference between the get and post form methods is that in the get method, once submitting all information needed from the form, 
     it clears out the form and it displays the data entered in a Url form in which it exposes the data inputted in while the post method is that once the 
     information inputted have submitted, it clears out the form and hides the data inputted from the user in which it keeps the data hidden and secured  -->
    <form action="" method="post">
        <h1>Add New Product</h1>
       <label>Product Name: </label><br>
    <input type="text" name="product_name" value="<?php echo htmlspecialchars($product_name); ?>"><br>
       <p style="color:red;"><?php echo $product_name_error; ?></p>
       <label>Category: </label>
      <select name="category">
         <option value=""> Select Category </option>
         <option value="Category A" <?php if(htmlspecialchars($category)=="Category A") echo "selected";?>>Category A</option>
         <option value="Category B" <?php if(htmlspecialchars($category)=="Category B") echo "selected";?>>Category B</option>
         <option value="Category C" <?php if(htmlspecialchars($category)=="Category C") echo "selected";?>>Category C</option>
          <?php echo htmlspecialchars($_POST["category"]); ?>
      </select><br>
       <p style="color:red;"><?php echo $category_error; ?></p>
       <label>Price (&#8369): </label><br>
    <input type="number" name="price" step="0.01" value="<?php echo htmlspecialchars($price); ?>"><br>
       <p style="color:red;"><?php echo $price_error; ?></p>
       <label>Stock Quantitty: </label><br>
    <input type="number" name="stock_quantity" min="0" value="<?php echo htmlspecialchars($stock_quantity); ?>" placeholder="Enter No. of Stocks"><br>
        <p style="color:red;"><?php echo $stock_quantity_error; ?></p>
       <label>Expiration Date: </label>
    <input type="date" name="expiration_date" value="<?php echo htmlspecialchars($expiration_date); ?>"><br>
        <p style="color:red;"><?php echo $expiration_date_error; ?></p>
       <label>Status: </label><br>
    <input type="radio" name="status" value="active" <?php if($status=="active") echo "checked";?>>Active<br>
    <input type="radio" name="status" value="inactive" <?php if($status=="inactive") echo "checked";?>>Inactive<br>
    <p style="color:red;"><?php echo $status_error; ?></p>
    <br>
       <input type="submit" value="Save Product">
    </form>
</body>
</html>