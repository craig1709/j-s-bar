<?php defined('SYSPATH') or die('No direct script access.');

class Album_Model extends ORM {
	
	protected $has_many = array('images');
	
}
