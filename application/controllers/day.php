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
class Day_Controller extends Page_Controller {

	public function index()
	{
	
		//horrible way of doing it but it works:
		
		$db = new Database;
		//get this page's entry in the database table
		$query = $db->getwhere('navigation', array('link' => 'day'));
		$query->next();
		//get all pages with this page's id as the parent
		$query2 = $db->getwhere('navigation', array('parent' => $query[0]->id));
		//fetch array instead of object
		$result2 = $query2->result_array(FALSE);
		//redirect to first page in submenu
		url::redirect($result2[0]['link']);
		
	}

}
