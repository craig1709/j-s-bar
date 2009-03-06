<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Default Kohana controller. This controller should NOT be used in production.
 * It is for demonstration purposes only!
 *
 * @package    Core
 * @author     Kohana Team
 * @copyright  (c) 2007-2008 Kohana Team
 * @license    http://kohanaphp.com/license.html
 */
class Dishes_Controller extends Admin_Controller {

	public function add($menu_id)
	{
		
		$view = new View('dishes/add');
		$dish = ORM::factory('dish');
		
		$validation = new Validation($_POST);
		$validation->add_rules('title', 'required');
		$validation->add_rules('type', 'required');
		$validation->pre_filter('trim');
		
		if ($validation->validate()) {
			
			$dish->title = $_POST['title'];
			$dish->description = ($_POST['description'] == '') ? NULL : $_POST['description'];
			$dish->type = $_POST['type'];
			$dish->cost = $_POST['cost'];
			$dish->menu_id = $menu_id;
			
			$dish->save();
			
			url::redirect("/admin/menus/view/$menu_id");
			
		}
		
		$view->dish = $dish->as_array();
		$view->menu_id = $menu_id;
		$this->template->content = $view;
		
	}
	
	public function edit($dish_id)
	{
		
		$view = new View('dishes/add');
		$dish = ORM::factory('dish', $dish_id);
		
		$validation = new Validation($_POST);
		$validation->add_rules('title', 'required');
		$validation->add_rules('type', 'required');
		$validation->pre_filter('trim');
		
		if ($validation->validate()) {
			
			$dish->title = $_POST['title'];
			$dish->description = ($_POST['description'] == '') ? NULL : $_POST['description'];
			$dish->type = $_POST['type'];
			$dish->cost = $_POST['cost'];
			
			$dish->save();
			
			url::redirect("/admin/menus/view/{$dish->menu_id}");
			
		}
		
		$view->dish = $dish->as_array();
		$view->menu_id = $dish->menu_id;
		$this->template->content = $view;
		
	}
	
	public function delete($dish_id)
	{
		$dish = ORM::factory('dish', $dish_id);
		$menu_id = $dish->menu_id;
		
		if (isset($_POST['answer'])) {
			if (strtolower($_POST['answer']) == 'yes') {
				$dish->delete();
			}
			url::redirect("admin/menus/view/{$menu_id}");
		}
	
		$view = new View('dishes/delete');
		$view->dish = $dish;
		$this->template->content = $view;
	}
	
}
