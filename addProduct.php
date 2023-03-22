<?php

include_once './config/DB.php';
include_once './modules/Product.php';

$db = new Database();

$dbConnection = $db->connect();


$product = new Product($dbConnection);

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <title>Product Add</title>
  <style>
    body{
      font-size: 15px;
      font-family: Arial, Helvetica, sans-serif;
    }
    
    input{
      margin-top: 15px;
    }

    h1{
      display: inline-block;
    }

    button {
      margin: 20px 15px;
      float: right;
      cursor: pointer;
    }

    #save_btn{
      margin: 20px 15px;
      float: right;
      cursor: pointer;
    }
  </style>
 <script type="text/javascript">
     $(function () {
          $("#dvd_size").hide();
          $("#furniture_dimensions").hide();
          $("#weight_input").hide();
     });
     $(document).ready(function(){
        $("select#productType").change(function(){
          var value = $(this).children("option:selected").val();
          if(value == "DVD"){
            $("#dvd_size").show();
            $("#furniture_dimensions").hide().find('input').attr('required', false);
            $("#weight_input").hide().find('input').attr('required', false);
          }
          else if(value == "Furniture"){
            $("#dvd_size").hide().find('input').attr('required', false);
            $("#furniture_dimensions").show();
            $("#weight_input").hide().find('input').attr('required', false);
          }
          else{
            $("#dvd_size").hide().find('input').attr('required', false);
            $("#furniture_dimensions").hide().find('input').attr('required', false);
            $("#weight_input").show();
          }
          
    });
});
  </script>
</head>
<body>
  <a href='./productList.php'><button>Cancel</button></a>
  <form action="" method="POST" id='product_form'>
    <h1>Product Add</h1>

    <input type="submit" value="Save" id='save_btn'>
    <hr><br><br>
    
    SKU <input type="text"  id='sku' name='sku' required> <br>
    Name <input type="text" id='name' name='name' required><br>
    Price ($) <input type="text" id='price' name='price' required><br><br>
    
   
    <label style='font-weight: bold;'>Type Switcher: </label>
    <select id='productType' name='type' required>
      <option value="" disabled selected>Type Switcher</option>
      <option id='DVD'>DVD</option>
      <option id='Furniture'>Furniture</option>
      <option id='Book'>Book</option>
    </select><br><br>
  

    <div id='dvd_size'>
      <p>Please provide DVD size.</p>
       Size (MB) <input type="number" id="size" name='size' value='0' required><br>
       <p>"Product Information"</p>
    </div>

    <div id='furniture_dimensions'>
      <p>Please provide dimensions in HxWxL format.</p>
      Height (CM) <input type="number" id="height" value='0' name='height' required><br>
      Width (CM) <input type="number" id="width" value='0' name='width' required><br>
      Length (CM) <input type="number" id="length" value='0' name='length' required><br>

      <p>"Product Information"</p>
    </div>

    <div id='weight_input'>
      <p>Please provide book weight.</p>

      Weight (KG) <input type="number" id="weight" value='0' name='weight' required><br>

      <p>"Product Information"</p>
    </div>

    
  </form>
  
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $product->set_sku($_POST['sku']);
  $product->set_name($_POST['name']);
  $product->set_price($_POST['price']);
  $product->set_product_type($_POST['type']);
  $product->set_size($_POST['size']);
  $product->set_weight($_POST['weight']);
  $product->set_height($_POST['height']);
  $product->set_width($_POST['width']);
  $product->set_length($_POST['length']);
  if ($product->create_product()) {
      
        echo "<script>
        setTimeout(() => {
            window.location.href = './productList.php'; 
        }, 500);
        </script>" ;
        
  }
}
?>
</body>
</html>