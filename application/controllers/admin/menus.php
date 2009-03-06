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
class Menus_Controller extends Admin_Controller {

	public function index()
	{
		$view = new View('menus');
		$view->menus = ORM::factory('menu')->find_all();
		$this->template->content = $view;
	}
	
	public function create()
	{
		$view = new View('menus/edit');
		$menu = ORM::factory('menu');
		
		$validation = new Validation($_POST);
		$validation->add_rules('title', 'required');
		$validation->pre_filter('trim');
		
		if ($validation->validate()) {
			
			$menu->title = $_POST['title'];
			$menu->save();
			url::redirect("admin/menus/view/{$menu->id}");
			
		}
		
		$view->menu = $menu->as_array();
		$this->template->content = $view;
	}
	
	public function edit($menu_id)
	{
		$view = new View('menus/edit');
		$menu = ORM::factory('menu', $menu_id);
		
		$validation = new Validation($_POST);
		$validation->add_rules('title', 'required');
		$validation->pre_filter('trim');
		
		if ($validation->validate()) {
			$menu->title = $_POST['title'];
			$file = $_FILES['pdf']['tmp_name'];
			$file = file_get_contents($file);
			$menu->pdf = $file;
			$menu->save();
			url::redirect("/admin/menus/view/{$menu->id}");
		}
		
		$view->menu = $menu->as_array();
		$this->template->content = $view;
	}
	
	public function view($menu_id)
	{
		
		$view = new View('menus/view');
		$view->menu = ORM::factory('menu', $menu_id);
		//$view->dishes = $view->menu->dishes;
		
		$menu = new Menu($menu_id);
		$sections = array();
		$sections['starter'] = $menu->get_type(0);
		$sections['main'] = $menu->get_type(1);
		$sections['dessert'] = $menu->get_type(2);
		$view->sections = $sections;
		
		$this->template->content = $view;
		
	}
	
	public function delete($menu_id)
	{
		$menu = ORM::factory('menu', $menu_id);
		
		if (isset($_POST['answer'])) {
			if (strtolower($_POST['answer']) == 'yes') {
				$menu->delete();
			}
			url::redirect('admin/menus');
		}
	
		$view = new View('menus/delete');
		$view->menu = $menu;
		$this->template->content = $view;
	}
	
}
