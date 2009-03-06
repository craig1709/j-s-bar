<?php defined('SYSPATH') or die('No direct script access.');

class Menu_Core {

	protected $menu;

	public function __construct($menu_id)
	{
		$this->menu = new Menu_Model($menu_id);
	}
	
	public function html()
	{
		$html = '<p>View our <a href="/files/menus/'.$this->menu->id.'/">'.$this->menu->title.' Menu</a></p>';
		
		return $html;
	}

}
