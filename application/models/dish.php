<?php defined('SYSPATH') or die('No direct script access.');

class Dish_Model extends ORM {
	
	protected $belongs_to = array('menu');
	
}
