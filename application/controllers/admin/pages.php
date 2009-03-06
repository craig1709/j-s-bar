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
class Pages_Controller extends Admin_Controller {

	public function index()
	{
		$view = new View('pages');
		$view->pages = ORM::factory('page')->find_all();
		$this->template->content = $view;
	}
	
	public function edit($page_id)
	{
		$view = new View('pages/edit');
		$page = ORM::factory('page', $page_id);
		
		$validation = new Validation($_POST);
		$validation->add_rules('title', 'required');
		$validation->pre_filter('trim');
		
		if ($validation->validate()) {
			
			$page->title = $_POST['title'];
			$page->content = $_POST['content'];
			$page->menu = ($_POST['menu'] == '') ? NULL : $_POST['menu'];
			$page->save();
			url::redirect("admin/pages/");
			
		}
		
		$menus = ORM::factory('menu')->find_all();
		
		$view->menus = $menus;
		$view->page = $page->as_array();
		$this->template->content = $view;
	}
	
}
