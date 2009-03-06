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
class Gallery_Controller extends Page_Controller {

	public function index()
	{
		
		$page = new Page_Model(6);
		
		$this->template->content = $page->content;
		
		$view = new View('gallery');
		$view->albums = ORM::factory('album')->find_all();
		
		if (count($view->albums) == 1) {
			// display the album if there's only one
			$this->album($view->albums[0]->id);
		} else {
			// else present them all
			$this->template->content .= $view;
		}
		
	}
	
	public function album($album_id)
	{
		
		$view = new View('album');
		$view->album = ORM::factory('album', $album_id);
		
		$this->template->content = $view;
		
	}

}
