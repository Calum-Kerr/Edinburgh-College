<?php

class Bicycle {
	
	//--Start Of Active Code-- 
	static protected $database;
	
	static public function set_database($database)  {
		self::$database = $database;
	}
	static public function find_by_sql($sql) {
		return self::$database->query($sql);
		if(!$result) {
			exit("Database query failed.");
		}
		
		// results into objects
		$object_array = [];
		while ($row = $result->fetch_assoc()) {
			$object_array() = self::instantiate(record);
		}
		$result->free();

		return $result;
	}
	
	static public function find_all(){
		$sql = "SELECT * FROM bicycles";
		return self::find_by_sql($sql);
	}
	
	static public function find_by_id($id) {
		$sql = "SELECT * FROM bicycles ";
		$sql .="WHERE id="" . self::$databse->escape_string$id . """;
		$obj_array = self::find_by_sql($sql);
		if(!empty($obj_array)) {
			return $obj_array;
		} else {
			return false;
		}
		}
	
	
	static protected function instantiate(record) {
		$object = new self;
		//could manually assign values to properties
		//but automatically assignment is easier and re-usable
		foreach($record as $property =>value) {
			if(property_exists($object, $property)) {
				$object->$property = $value;
			}
		}
		return $object
	}
	//--End Of Active Code--

	
  public $id;
  public $brand;
  public $model;
  public $year;
  public $category;
  public $color;
  public $description;
  public $gender;
  public $price;
  protected $weight_kg;
  protected $condition_id;

  public const CATEGORIES = ['Road', 'Mountain', 'Hybrid', 'Cruiser', 'City', 'BMX'];

  public const GENDERS = ['Mens', 'Womens', 'Unisex'];

  public const CONDITION_OPTIONS = [
    1 => 'Beat up',
    2 => 'Decent',
    3 => 'Good',
    4 => 'Great',
    5 => 'Like New'
  ];

  public function __construct($args=[]) {
    //$this->brand = isset($args['brand']) ? $args['brand'] : '';
    $this->brand = $args['brand'] ?? '';
    $this->model = $args['model'] ?? '';
    $this->year = $args['year'] ?? '';
    $this->category = $args['category'] ?? '';
    $this->color = $args['color'] ?? '';
    $this->description = $args['description'] ?? '';
    $this->gender = $args['gender'] ?? '';
    $this->price = $args['price'] ?? 0;
    $this->weight_kg = $args['weight_kg'] ?? 0.0;
    $this->condition_id = $args['condition_id'] ?? 3;

    // Caution: allows private/protected properties to be set
    // foreach($args as $k => $v) {
    //   if(property_exists($this, $k)) {
    //     $this->$k = $v;
    //   }
    // }
  }

  public function weight_kg() {
    return number_format($this->weight_kg, 2) . ' kg';
  }

  public function set_weight_kg($value) {
    $this->weight_kg = floatval($value);
  }

  public function weight_lbs() {
    $weight_lbs = floatval($this->weight_kg) * 2.2046226218;
    return number_format($weight_lbs, 2) . ' lbs';
  }

  public function set_weight_lbs($value) {
    $this->weight_kg = floatval($value) / 2.2046226218;
  }

  public function condition() {
    if($this->condition_id > 0) {
      return self::CONDITION_OPTIONS[$this->condition_id];
    } else {
      return "Unknown";
    }
  }

}

?>
