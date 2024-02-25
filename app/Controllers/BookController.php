<?php
namespace App\Controllers;

use App\Models\BookModel;
use App\Models\CategoryModel;

class BookController extends BaseController implements InterfaceController {
    public function index()
    {
        $books = BookModel::all();
        return $this->view(
            "list",
            ["books" => $books]
        );
    }
    public function create(){
        $cts = CategoryModel::all();
        return $this->view(
            "add",
            ["cts" => $cts]
        );
    }
    public function storeCreate(){
        $data = $_POST;
            $err = [];
            if($data['tensach']==""){
                $err['tensach']="Bạn chưa nhập trường này";
            }
            if($data['gia']==""){
                $err['gia']="Bạn chưa nhập trường này";
            }
            if($data['mota']==""){
                $err['mota']="Bạn chưa nhập trường này";
            }
            if($data['soluong']==""){
                $err['soluong']="Bạn chưa nhập trường này";
            }
            $file = $_FILES['anh'];
            if($file['size']==0){
                $err['anh']="Bạn chưa nhập trường này";
            }else {
                $imgs =['jpg','png'];
                $name_img = $file['name'];
                $ext_img = pathinfo($name_img,PATHINFO_EXTENSION);
                if(in_array($ext_img,$imgs)==false){
                    $err['anh']="Ảnh phải là file jpg hoặc png";
                }else{
                    $data['anh'] =$name_img;
                    move_uploaded_file($file['tmp_name'],"images/".$name_img);
                }
            }
            if($err){
                $cts = CategoryModel::all();
                return $this->view(
                    "add",
                    ["cts" => $cts,"err"=>$err]
                );
            }
        BookModel::insert($data);
        header("location:".ROOT_PATH);
        die;
    }
    public function edit(){
        $id = $_GET['id'];
        $book = BookModel::find($id);
        $cts = CategoryModel::all();
        return $this->view(
            "edit",
            ["cts" => $cts,"book"=>$book]
        );
    }
    public function storeEdit(){
        $id = $_GET['id'];
        $data = $_POST;
        $err = [];
        if($data['tensach']==""){
            $err['tensach']="Bạn chưa nhập trường này";
        }
        if($data['gia']==""){
            $err['gia']="Bạn chưa nhập trường này";
        }
        if($data['mota']==""){
            $err['mota']="Bạn chưa nhập trường này";
        }
        if($data['soluong']==""){
            $err['soluong']="Bạn chưa nhập trường này";
        }
        $file = $_FILES['anh'];
        if($file['size']>0){
            $imgs =['jpg','png'];
            $name_img = $file['name'];
            $ext_img = pathinfo($name_img,PATHINFO_EXTENSION);
            if(in_array($ext_img,$imgs)==false){
                $err['anh']="Ảnh phải là file jpg hoặc png";
            }else{
                $data['anh'] =$name_img;
                move_uploaded_file($file['tmp_name'],"images/".$name_img);
            }
        }
        if($err){
            $book = BookModel::find($id);
            $cts = CategoryModel::all();
            return $this->view(
                "edit",
                ["cts" => $cts,"book"=>$book,"err"=>$err]
            );
        }
        BookModel::update($id,$data);
        header("location:".ROOT_PATH);
        die;
    }
    public function delete(){
        $id = $_GET['id'];
        BookModel::delete($id);
        header("location:".ROOT_PATH);
        die;
    }
}

