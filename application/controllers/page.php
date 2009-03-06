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
class Page_Controller extends Template_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$db = new Database;
		$query = $db->getwhere('navigation', array('parent' => NULL));
		
		$menu = array();
		foreach ($query as $row) {
			$link = $row->link;
			$menu[$link] = $row->title;
		}
		
		$this->template->menu = $menu;
		
		//fetch submenu stuff - again, horrible code but it works
		if (uri::segment(1) !== 'admin') {
			$query = $db->getwhere('navigation', array('link' => uri::segment(1, 'home')));
			$this->template->submenu = NULL;
			$this->template->submenu_parent = NULL;
	
			$parent = $query[0]->parent;
			$parent_query = $db->getwhere('navigation', array('id' => $parent));
			if (count($parent_query) > 0) {
				$parent_query = $parent_query->result_array(FALSE);
				$parent_link = $parent_query[0]['link'];
			
				//get all pages in the same submenu as this page
				if ($parent !== NULL) {
					$query = $db->getwhere('navigation', array('parent' => $parent));
					$submenu = $query->result_array(FALSE);
					$this->template->submenu_parent = $parent_link;
					$this->template->submenu = $submenu;
				}
			}
		}
	}

}
