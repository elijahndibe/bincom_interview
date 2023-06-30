<?php

// Define your routing rules
$routes = [
    '/' => "views/home.php",
    '/result' => "views/result.php",
    '/lga-result' => "views/lga_result.php",
    '/result/upload' => "views/upload_result.php",
    
    '/lga/ajax/:id' => "controller/resultController.php",
    '/ward/ajax/:id' => "controller/resultController.php",
    '/polling-unit/ajax/:id' => "controller/resultController.php",
    '/pu-results/ajax/:id' => "controller/resultController.php",
    '/lga-results/ajax/:id' => "controller/resultController.php",
    '/result/store' => "controller/resultUploadController.php",
    
    
   
    '/404' => "views/404.php",
];

// Parse the requested URL
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Route the request
foreach ($routes as $route => $file) {
    // Replace any variables in the route
    $route = preg_replace('/:[^\/]+/', '([^\/]+)', $route);

    // Match the route to the URL
    if (preg_match('#^' . $route . '$#', $url, $matches)) {
        // Extract any variables from the URL
        $vars = array();
        preg_match_all('/:[^\/]+/', $route, $var_names);
        foreach ($var_names[0] as $var_name) {
            $vars[substr($var_name, 1)] = $matches[array_search($var_name, $var_names[0]) + 1];
        }

        // Route the request to the appropriate script
        require $file;
        exit;
    }
}

// If no route was matched, return a 404 error
header('HTTP/1.1 404 Not Found');
echo '404 Not Found';
