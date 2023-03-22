<!DOCTYPE html>
<html lang="en">

<?php
include_once './config/DB.php';
include_once './modules/Product.php';


$db = new Database();

$dbConnection = $db->connect();


$product = new Product($dbConnection);

$result = $product->list_products();

$num = $result->rowCount();

?>



<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <title>Product List</title>
  <style>
    body{
      font-size: 12px;
      font-family: Arial, Helvetica, sans-serif;
    }

    h1{
      display: inline-block;
    }
    button{
      margin: 20px 15px;
      float: right;
      cursor: pointer;
    }
    .delete-checkbox{
      float: left;
      margin-right: -20px;
    }
    .box{
      border: 1px solid black;
      text-align:center;
      height: 200px;
      width: 200px;
      padding: 10px;
      margin-top: 10px;
      margin-right: 15px;
      box-sizing: border-box;
      display: inline-block;
    }
  </style>

  <script>
    function removeItem(arr, value) {
    var index = arr.indexOf(value);
    if (index > -1) {
        arr.splice(index, 1);
    }
    return arr;
}

  </script>
  <script>
    function sendRequest(pk) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {};
    xhttp.open('GET', './config/massDeleteProducts.php?sku=' + pk , true);
    xhttp.send();
}
  </script>
  <script>
    var sku = [];
    $(document).ready(function(){            
      $('.delete-checkbox').change(function(){
        if($(this).is(":checked")){
          sku.push($(this).attr("id"));
         
          $('#delete-product-btn').click(function(){
            for(let i = 0; i < sku.length; i++){
              sendRequest(sku[i]);
            }
            // if($(this).prop("checked") == false)
            //   sku = removeItem(sku, $(this).attr("id"));
            setTimeout(() => {location.reload()}, 500);
          });
        }else if($(this).prop("checked") == false){
          sku = removeItem(sku, $(this).attr("id"));
        }
        
    });    
    
  });
  </script>
</head>

<body>
  <h1>Product List</h1>
  <a ><button id="delete-product-btn">MASS DELETE</button></a>
  <a href="./addProduct.php"><button>ADD</button></a>

  <hr>
  
  
  
  <?php

if ($num > 0) {
  while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
?><div class='box'>
  <input type="checkbox" name="" class="delete-checkbox" id='<?php echo $row['sku']; ?>' style='cursor: pointer;'>
  <?php
    echo "<h4>" . $row['sku'] . "</h4>";
    echo "<h4>" . $row['name'] . "</h4>";
    echo "<h4>" . number_format($row['price'], 2) . " $</h4>";
    if ($row['size'] != null)
      echo "<h4>Size: " . $row['size'] . " MB</h4>";

    if ($row['weight'] != null)
      echo "<h4>Weight: " . $row['weight'] . "KG</h4>";


    if ($row['height'] != null && $row['width'] != null && $row['length'] != null)
      echo "<h4>Dimension: " . $row['height'] . "x" . $row['width'] . "x" . $row['length'] . "</h4>";



?>
    </div>

<?php

  }
}
?>

<br><br><br><br><hr>
<footer style='text-align: center'>
  <p>Scandiweb Test Assignment</p>
</footer>

</body>

</html>