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
class Images_Controller extends Admin_Controller {

	public function add($album_id)
	{
		
		$view = new View('images/add');
		$image = ORM::factory('image');
		
		$validation = new Validation($_POST);
		$validation->pre_filter('trim');
		
		if ($validation->validate()) {
			
			$imgdata = $_FILES['image']['tmp_name'];
			$imgdata = file_get_contents($imgdata);
			$image->image = $imgdata;
			
			$image->caption = ($_POST['caption'] == '') ? NULL : $_POST['caption'];
			$image->album_id = $album_id;
			
			$image->save();
			
			url::redirect("/admin/albums/view/$album_id");
			
		}
		
		$view->image = $image->as_array();
		$view->album_id = $album_id;
		$this->template->content = $view;
		
	}
	
	public function edit($image_id)
	{
		
		$view = new View('images/add');
		$image = ORM::factory('image', $image_id);
		
		$validation = new Validation($_POST);
		$validation->pre_filter('trim');
		
		if ($validation->validate()) {
			
			$image->caption = ($_POST['caption'] == '') ? NULL : $_POST['caption'];
			
			$image->save();
			
			url::redirect("/admin/albums/view/{$image->album_id}");
			
		}
		
		$view->image = $image->as_array();
		$view->album_id = $image->album_id;
		$this->template->content = $view;
		
	}
	
	public function delete($image_id)
	{
		$image = ORM::factory('image', $image_id);
		$album_id = $image->album_id;
		
		if (isset($_POST['answer'])) {
			if (strtolower($_POST['answer']) == 'yes') {
				$image->delete();
			}
			url::redirect("admin/albums/view/{$album_id}");
		}
	
		$view = new View('images/delete');
		$view->image = $image;
		$this->template->content = $view;
	}
	
}
