<?php defined('SYSPATH') or die('No direct script access.');

class Menu_Model extends ORM {
	
	protected $has_many = array('dishes');
	
}
