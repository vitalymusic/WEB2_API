<?php

namespace App\Controllers;
class Shop extends BaseController 
{
    public function index(){

       $products = [
        [
            "name" =>"Žurnāls 1",
            "image" =>"slide1.jpg",
            "id"=>123,
            "price"=>"10.99"

        ],
       ];     

       $data["products"] = $products;
       $data["title"] = "Veikals";

        return view('shop/main_screen',$data);
    }

}

