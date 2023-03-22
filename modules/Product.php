<?php
class Product
{
  private $conn;
  private $table = 'products';
  private $sku;
  private $name;
  private $price;
  private $type;
  private $size;
  private $weight;
  private $height;
  private $width;
  private $length;


  public function __construct($db)
  {
    $this->conn = $db;
  }


  public function set_sku($sku)
  {
    $this->sku = $sku;
  }
  public function set_name($name)
  {
    $this->name = $name;
  }
  public function set_price($price)
  {
    $this->price = $price;
  }
  public function set_product_type($type)
  {
    $this->type = $type;
  }
  public function set_size($size)
  {
    $this->size = $size;
  }
  public function set_weight($weight)
  {
    $this->weight = $weight;
  }
  public function set_height($height)
  {
    $this->height = $height;
  }
  public function set_width($width)
  {
    $this->width = $width;
  }
  public function set_length($length)
  {
    $this->length = $length;
  }



  public function get_sku()
  {
    return $this->sku;
  }
  public function get_name()
  {
    return $this->name;
  }
  public function get_price()
  {
    return $this->price;
  }
  public function get_product_type()
  {
    return $this->type;
  }
  public function get_size()
  {
    return $this->size;
  }
  public function get_weight()
  {
    return $this->weight;
  }
  public function get_height()
  {
    return $this->height;
  }
  public function get_width()
  {
    return $this->width;
  }
  public function get_length()
  {
    return $this->length;
  }


  public function list_products()
  {
    $query = 'SELECT sku, name, price, type, size, weight, height, width, length
              FROM ' . $this->table;


    $stmt = $this->conn->prepare($query);
    $stmt->execute();

    return $stmt;
  }


  public function create_product()
  {
    $query = " INSERT INTO " . $this->table . "(sku, name, price, type, size, weight, height, width, length) 
    VALUES(?,?,?,?,NULLIF(?, 0),NULLIF(?, 0),NULLIF(?, 0),NULLIF(?, 0),NULLIF(?, 0)) ";


    $stmt = $this->conn->prepare($query);
    $stmt->execute([htmlspecialchars(strip_tags($this->get_sku())),
      htmlspecialchars(strip_tags($this->get_name())),
      htmlspecialchars(strip_tags($this->get_price())),
      htmlspecialchars(strip_tags($this->get_product_type())),
      htmlspecialchars(strip_tags($this->get_size())),
      htmlspecialchars(strip_tags($this->get_weight())),
      htmlspecialchars(strip_tags($this->get_height())),
      htmlspecialchars(strip_tags($this->get_width())),
      htmlspecialchars(strip_tags($this->get_length()))

    ]);

    return $stmt;
  }


  public function mass_delete_products($sku)
  {
    $query = " DELETE FROM " . $this->table . " WHERE sku = ? ";

    $stmt = $this->conn->prepare($query);
    $stmt->execute([$sku]);

    return $stmt;
  }
}
