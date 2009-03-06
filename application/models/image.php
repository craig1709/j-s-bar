<?php defined('SYSPATH') or die('No direct script access.');

class Image_Model extends ORM {
	
	protected $belongs_to = array('album');
	
}
