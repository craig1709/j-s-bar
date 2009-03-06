<?php

/*
This file scans the current directory for '.css' files and includes them in one
large CSS file for simplicity and ease. It also creates a contents index at the
top of the file and appropriate headers thereafter.

Example usage: <link rel="stylesheet" href="/css/main.php" type="text/css">

DEBUG PARAMATERS
e.g. ?debug=highlight
highlight    Highlights the file using GeSHi
files        Lists the files included and excluded from the CSS
*/

// define the location of GeSHi, or null if not applicable
define('GESHI', null);

// scan the directory for files
$files = scandir('./');
array_shift($files); // remove ./
array_shift($files); // remove ../

// limit files to those with a '.css' extension
foreach ($files as $index => $file) {
    if (substr($file, -4) != '.css') {
        unset($files[$index]);
    }
}

// clean up the array (unnecessary really)
sort($files);

// initialise the contents array
$contents = array();

// start buffering the complete CSS
ob_start();

// loop through each CSS file
foreach ($files as $index => $css) {
    $name = strtoupper(substr($css, 0, -4)) . ' CSS';
    
    // add this file to the contents array
    $contents[] = "$index. $name";
    
    // create a header
    echo "/*******************************************************************************\r\n";
    echo "$index. $name\r\n";
    echo "*******************************************************************************/\r\n";
    
    // echo the CSS
    echo file_get_contents($css);
    echo "\r\n";
}

// get the CSS from the buffer and stop buffering
$css = ob_get_contents();
ob_end_clean();

// output an index/contents of the complete CSS
$css_contents = "/*\r\n";
$css_contents .= "CONTENTS\r\n";
foreach ($contents as $content) {
    $css_contents .= "$content\r\n";
}
$css_contents .= "\r\nOptions for this file: ?debug=highlight, ?debug=files\r\n";
$css_contents .="*/\r\n\r\n";

// prepend the contents to the output
$css = $css_contents . $css;

// check for debug parameters
switch ($_GET['debug']) {
    case 'highlight':
        // highlight the CSS code
        if (GESHI != null) {
            include(GESHI);
            geshi_highlight($css, 'css');
            die();
        }
    break;
    case 'files':
        header('Content-type: text/plain');
        
        echo "INCLUDED FILES\r\n\r\n";
        
        foreach ($files as $file) {
            echo "$file\r\n";
        }
        
        echo "\r\nEXCLUDED FILES\r\n\n";
        
        // calculate which files were excluded
        $diff = array_diff(scandir('./'), $files);
        
        foreach ($diff as $file) {
            echo "$file\r\n";
        }
        die();
    break;
}


// set the content type to CSS
header('Content-type: text/css');

//finish up
echo $css;

?>

