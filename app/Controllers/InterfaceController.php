<?php
namespace App\Controllers;
interface InterfaceController{
    public function index();
    public function create();
    public function storeCreate();
    public function edit();
    public function storeEdit();
    public function delete();
}