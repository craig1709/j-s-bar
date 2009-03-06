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
class Images_Controller {

	public function thumbnail($imageid)
	{
		$image = ORM::factory('image', $imageid);
		
		header('Content-Type: image/jpeg');
		
		$image = $image->image;
		$im = imagecreatefromstring($image); 
		
		$width = imagesx($im);
		$height = imagesy($im);
		
		$imgw = 128;
		$imgh = $height / $width * $imgw;

	    $thumb = imagecreatetruecolor($imgw,$imgh);
	    
        imagecopyresampled($thumb,$im,0,0,0,0,$imgw,$imgh,ImageSX($im),ImageSY($im));
		
	    $out = imagejpeg($thumb);
	    imagedestroy ($im);
	    imagedestroy ($thumb);
		
	}
	
	public function full($imageid)
	{
		$image = ORM::factory('image', $imageid);
		
		header('Content-Type: image/jpeg');
		
		echo $image->image;
	}

}
