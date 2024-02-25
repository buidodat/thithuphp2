<?php
const ROOT_PATH = "http://localhost/exam/";
const ROOT_URI = "/exam/";

//hàm dd dùng để bug
function dd($data)
{
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
    die;
}

//Hàm chuyển hướng website
function redirect($route)
{
    header("location:" . ROOT_PATH . $route);
    die;
}
