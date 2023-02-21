<?php

use Phroute\Phroute\RouteCollector;

$url = !isset($_GET['url']) ? "/" : $_GET['url'];

$router = new RouteCollector();

// filter check đăng nhập
$router->filter('auth', function(){
    if(!isset($_SESSION['auth']) || empty($_SESSION['auth'])){
        header('location: ' . BASE_URL . 'login');
        die;
    }
});


// bắt đầu định nghĩa ra các đường dẫn
// Home Page
$router->get('/', [App\Controllers\HomeController::class, 'index']);

// Category Page
$router->get('list-category', [App\Controllers\CategoryController::class, 'index']);
$router->get('form-add-category', [App\Controllers\CategoryController::class, 'formAdd']);
$router->post('form-add-category-post', [App\Controllers\CategoryController::class, 'formAddPost']);
$router->get('delete-catgory/{id}', [App\Controllers\CategoryController::class, 'deleteCategory']);
$router->get('form-edit-category{id}', [App\Controllers\CategoryController::class, 'formEdit']);
$router->post('form-edit-category-post/{id}', [App\Controllers\CategoryController::class, 'formEditPost']);

// Product Page
$router->get('list-product', [App\Controllers\ProductController::class, 'index']);
$router->get('form-add-product', [App\Controllers\ProductController::class, 'formAdd']);
$router->post('form-add-product-post', [App\Controllers\ProductController::class, 'formAddPost']);
$router->get('delete-product/{id}', [App\Controllers\ProductController::class, 'deleteProduct']);
$router->get('form-edit-product{id}', [App\Controllers\ProductController::class, 'formEdit']);
$router->post('form-edit-product-post/{id}', [App\Controllers\ProductController::class, 'formEditPost']);


// Staff Page
$router->get('list-staff', [App\Controllers\StaffController::class, 'index']);
$router->get('form-add-staff', [App\Controllers\StaffController::class, 'formAdd']);
$router->post('form-add-staff-post', [App\Controllers\StaffController::class, 'formAddPost']);
$router->get('delete-staff/{id}', [App\Controllers\StaffController::class, 'deleteStaff']);
$router->get('form-edit-staff{id}', [App\Controllers\StaffController::class, 'formEdit']);
$router->post('form-edit-staff-post/{id}', [App\Controllers\StaffController::class, 'formEditPost']);

// Account Page
$router->get('list-account', [App\Controllers\AccountController::class, 'index']);
$router->get('form-add-account', [App\Controllers\AccountController::class, 'formAdd']);
$router->post('form-add-account-post', [App\Controllers\AccountController::class, 'formAddPost']);
$router->get('delete-account/{id}', [App\Controllers\AccountController::class, 'deleteAccount']);

// Account Brand
$router->get('list-brand', [App\Controllers\BrandController::class, 'index']);
$router->get('form-add-brand', [App\Controllers\BrandController::class, 'formAdd']);
$router->post('form-add-brand-post', [App\Controllers\BrandController::class, 'formAddPost']);
$router->get('delete-brand/{id}', [App\Controllers\BrandController::class, 'deleteBrand']);
$router->get('form-edit-brand/{id}', [App\Controllers\BrandController::class, 'formEdit']);
$router->post('form-edit-brand-post/{id}', [App\Controllers\BrandController::class, 'formEditPost']);












# NB. You can cache the return value from $router->getData() so you don't have to create the routes each request - massive speed gains
$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $url);

// Print out the value returned from the dispatched function
echo $response;


?>