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
class Contact_Controller extends Page_Controller {

	public function index()
	{
		
		$view = new View('contact');
		
		$this->template->content = $view;
		
	}

}
