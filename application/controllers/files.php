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
class Files_Controller {

	public function menus($id) {
		
		$db = new Database;
		$query = $db->getwhere('menus', array('id' => $id));
		
		$result = $query->result_array(FALSE);
		
		if (count($result) > 0) {
			if ($result[0]['pdf'] !== NULL) {
				header('Content-Type: application/pdf');
				echo $result[0]['pdf'];
			} else {
				echo 'Menu not uploaded';
			}
		} else {
			echo 'Menu not uploaded';
		}
		
	}

}
