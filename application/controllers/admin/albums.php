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
class Albums_Controller extends Admin_Controller {

	public function index()
	{
		$view = new View('albums');
		$view->albums = ORM::factory('album')->find_all();
		$this->template->content = $view;
	}
	
	public function create()
	{
		$view = new View('albums/edit');
		$album = ORM::factory('album');
		
		$validation = new Validation($_POST);
		$validation->add_rules('title', 'required');
		$validation->pre_filter('trim');
		
		if ($validation->validate()) {
			
			$album->title = $_POST['title'];
			$album->save();
			url::redirect("admin/albums/view/{$album->id}");
			
		}
		
		$view->album = $album->as_array();
		$this->template->content = $view;
	}
	
	public function edit($album_id)
	{
		$view = new View('albums/edit');
		$album = ORM::factory('album', $album_id);
		
		$validation = new Validation($_POST);
		$validation->add_rules('title', 'required');
		$validation->pre_filter('trim');
		
		if ($validation->validate()) {
			
			$album->title = $_POST['title'];
			$album->save();
			url::redirect("admin/albums/view/{$album->id}");
			
		}
		
		$view->album = $album->as_array();
		$this->template->content = $view;
	}
	
	public function view($album_id)
	{
		
		$view = new View('albums/view');
		$view->album = ORM::factory('album', $album_id);
		
		$view->images = $view->album->images;
		
		$this->template->content = $view;
		
	}
	
	public function delete($album_id)
	{
		$album = ORM::factory('album', $album_id);
		
		if (isset($_POST['answer'])) {
			if (strtolower($_POST['answer']) == 'yes') {
				$menu->delete();
			}
			url::redirect('admin/albums');
		}
	
		$view = new View('albums/delete');
		$view->album = $album;
		$this->template->content = $view;
	}
	
}
