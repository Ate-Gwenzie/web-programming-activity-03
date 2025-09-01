<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Details</title>
  <style>
    body {
      background: linear-gradient(135deg, #c5b4f4ff 0%, #32144aff 100%);
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }
    table {
      margin: 30px auto;
      border-collapse: collapse;
      background: #fff;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      width: 400px;
      border: 1px solid #000;
    }
    th{
        background: #f6f6f6ff;
        color: #64129bff;
        font-weight: bold;
        text-align: center;
        border: 1px solid #000;
    }
    td {
      padding: 12px 16px;
      text-align: left;
      font-size: 16px;
      border: 1px solid #000;
    }
    th {
      background: #c49edaff;
      color: #64129bff;
      font-weight: bold;
    }
    tr:last-child td {
      border-bottom: none;
    }
  </style>
</head>
<body>
  <h2 style="text-align:center; color:#64129bff;">Product Details</h2>
  <table>
    <tr>
      <th>Field</th>
      <th>Value</th>
    </tr>
    <tr>
      <td>Product Name</td>
      <td><?php echo isset($_POST["product_name"]) ? htmlspecialchars($_POST["product_name"]) : ''; ?></td>
    </tr>
    <tr>
      <td>Category</td>
      <td><?php echo isset($_POST["category"]) ? htmlspecialchars($_POST["category"]) : ''; ?></td>
    </tr>
    <tr>
      <td>Price</td>
      <td>&#8369; <?php echo isset($_POST["price"]) ? number_format((float)$_POST["price"],2) : '0.00'; ?></td>
    </tr>
    <tr>
      <td>Stock Quantity</td>
      <td><?php echo isset($_POST["stock_quantity"]) ? htmlspecialchars($_POST["stock_quantity"]) : ''; ?></td>
    </tr>
    <tr>
      <td>Expiration Date</td>
      <td><?php echo isset($_POST["expiration_date"]) ? htmlspecialchars($_POST["expiration_date"]) : ''; ?></td>
    </tr>
    <tr>
      <td>Status</td>
      <td><?php echo isset($_POST["status"]) ? htmlspecialchars($_POST["status"]) : ''; ?></td>
    </tr>
  </table>
</body>
</html>