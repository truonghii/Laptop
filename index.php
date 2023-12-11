<?php 
    session_start();
    require_once "config.php";
    spl_autoload_register(function($class){
        require "controllers/".$class.".php";
    });
    $baseDir="/PHP_2/lab1/banhang/";

    
    $router = [
        'get' => [
            ''  =>  [new SanphamController, 'index'] , 
            'sp' => [new SanphamController, 'detail'] , 
            'loai'=>[new SanphamController, 'cat'] , 
            'tk'  =>[new SanphamController, 'searchForm'] ,
            'addtocart' => [new SanphamController, 'addtocart'],
            'showcart' => [new SanphamController, 'showcart'],
            'checkout' => [new SanphamController, 'checkout'],

            'register' => [new UserController, 'register'],
            'login' => [new UserController, 'login'],
            'changepass' => [new UserController, 'changepass'],
            'logout' => [new UserController, 'logout'],
            
            'admin/sp' => [new AdminSPController, 'index'],
            'admin/addsp' => [new AdminSPController, 'add'],
            'admin/editsp' => [new AdminSPController, 'edit'],
            'admin/deletesp' => [new AdminSPController, 'delete'],

            'admin/loai' => [new AdminLoaiSPController, 'index'],
            'admin/addloai' => [new AdminLoaiSPController, 'add'],
            'admin/editloai' => [new AdminLoaiSPController, 'edit'],
            'admin/deleteloai' => [new AdminLoaiSPController, 'delete'],

            'admin' => [new AdminController, 'index'],
            'admin/login' => [new AdminController, 'login'],
            'admin/logout' => [new AdminController, 'logout'],

            'doitac' => [new DoitacController, 'index'],
            'doitac/adddt' => [new DoitacController, 'add'],
            'doitac/editdt' => [new DoitacController, 'edit'],
            'doitac/deletedt' => [new DoitacController, 'delete'],

            'baiviet' => [new BaivietController, 'index'],
            'baiviet/addbv' => [new BaivietController, 'add'],
            'baiviet/editbv' => [new BaivietController, 'edit'],
            'baiviet/deletebv' => [new BaivietController, 'delete'],
            
        ], 
        'post' => [
            'tk' =>[new SanphamController, 'searchResult'],
            'checkout_' => [new SanphamController, 'checkout_'], 

            'register_' => [new UserController, 'register_'],
            'login_' => [new UserController, 'login_'],
            'changepass_' => [new UserController, 'changepass_'],
            
            'admin/addsp_' => [new AdminSPController, 'add_'],
            'admin/editsp_' => [new AdminSPController, 'edit_'],
            'admin/addloai_' => [new AdminLoaiSPController, 'add_'],
            'admin/editloai_' => [new AdminLoaiSPController, 'edit_'],

            'admin/login_' => [new AdminController, 'login_'],

            'doitac/adddt_' => [new DoitacController, 'add_'],
            'doitac/editdt_' => [new DoitacController, 'edit_'],

            'baiviet/addbv_' => [new BaivietController, 'add_'],
            'baiviet/editbv_' => [new BaivietController, 'edit_'],
        ]
    ];


    $path = substr($_SERVER['REQUEST_URI'], strlen($baseDir));//Loai?idloai=1&page=3
    $arr = explode("?",$path);  // ['Loai', 'idloai=1&page=3]
    $route = strtolower($arr[0]);  //loai
    if (count($arr)>=2) parse_str($arr[1],$params);  // [idloai=>1, page=>3]
    else $params = [];
    $method = strtolower($_SERVER['REQUEST_METHOD']); //get
    if (!array_key_exists($method, $router)) die("Method kô phù hợp:". $method);
    if (!array_key_exists($route, $router[$method])) die("Route đâu có:". $route);
    $action = $router[$method][$route];  // [0 => SanphamController, 1 => detail]
    call_user_func( $action );
?>
