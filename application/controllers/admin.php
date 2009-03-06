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
class Admin_Controller extends Page_Controller {

	public $template = 'admin_template';

	public function __construct()
	{
		parent::__construct();
		if (cookie::get('auth', NULL) == NULL && uri::segment(2) != 'login') {
			url::redirect('admin/login');
		}
		$this->template->menu = array(
			'/' => 'Site',
			'/admin/menus/' => 'Menus',
			'/admin/pages/' => 'Pages',
			'/admin/albums/' => 'Albums'
			);
	}

	public function index()
	{
		
		// redirect to the first admin page
		url::redirect('admin/menus');
		
	}

}
