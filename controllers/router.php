<?php
echo("<script>console.log('PHP');</script>");

echo "deded";
/** This controller routes all incoming requests to the appropriate controller */

// Automatically includes files containing classes that are called 
spl_autoload_register(function ($className) {
   // parse out the filename where class should be located
   list($filename , $suffix) = explode('_', $className);

   //compose file name
   $file = SERVER_ROOT . '/models/' . strtolower($filename) . '.php';
   echo("<script>console.log('PHP: ".$file."');</script>");

   // fecth file
   if(file_exists($file)){
      //get file
      include_once($file);
   } else {
      // file does not exist
      die("File '$filename' containing class '$className' not found.");
   }
});

//fetch the passed request
$request = $_SERVER['QUERY_STRING'];

//parse the page request and other GET variables
$parsed = explode('&' , $request);

//the page is the first element
$page = array_shift($parsed);

//the rest of the array are get statements, parse them out.
$getVars = array();
foreach ($parsed as $argument) {
   
   list($variable , $value) = explode('=' , $argument);
   $getVars[$variable] = $value;
}

// compute the path to the file
$target = SERVER_ROOT . '/controllers/' . $page . '.php';

//get target
if(file_exists($target)){
   include_once($target);

   //modify page to fit naming convention
   $class = ucfirst($page) . '_Controller';

   //instantiate the appropriate class
   if (class_exists($class)){
      $controller = new $class;
   } else {
      // did we name our class correctly
      die('class does not exist');
   }
   // once we have the controller instantiated, execute the default function
   // pass any GET variables to the main method
   $controller -> main($getVars);

}