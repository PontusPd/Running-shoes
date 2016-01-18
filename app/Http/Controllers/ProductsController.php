<?php

namespace App\Http\Controllers;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Menu;
use DB;
class ProductsController extends GlobalController
{
    public function ProductsAction($order)
    {
        //sort by failed to do a foreach element columns = $value
                     if('products_id' == $order){
                        $products = DB::table('products')->orderBy($order, 'desc')->get();    
                        return View('Runningshoes/pages/Products')->with(
                        array(
                        'getProducts' => $products,
                        'getipsumText' => $this->getText("Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."),
                        ));
                     }
                      elseif('Products_price' == $order){
                        return View('Runningshoes/pages/Products')->with(
                        array(
                        'getProducts' => $products,
                        'getipsumText' => $this->getText("Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."),
                        ));
                    } elseif('products_name' == $order){
                        return View('Runningshoes/pages/Products')->with(
                        array(
                        'getProducts' => $products,
                        'getipsumText' => $this->getText("Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."),
                        ));
                    } elseif ('products_antal' == $order) {
                        return View('Runningshoes/pages/Products')->with(
                        array(
                        'getProducts' => $products,
                        'getipsumText' => $this->getText("Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."),
                        ));
                    } 
                    else{
                        return back();
                    }  
    }
    public function ProductsPage($pid)
    {
        $prodids = Products::where("products_id","=", $pid)->get();
        if (!count($prodids)) {
            return redirect('Products');
        } else {
            foreach ($prodids as $prodid) {
                $prodid->products_id;  
                $prodid->products_name;  
                $prodid->Products_price;  
                $prodid->products_image;  
             } 
             return View('Runningshoes/pages/productID')->with(
            array(
            'getProducts' => $prodids,
            ));
        }     
    } 

    public function Search(){
        if (!empty($_POST['search-control'])) {
                $search = $_POST['search-control'];
                $products = Products::where('products_name', 'LIKE', '%'.$search.'%')->get();   
                $test = count($products);
                if($test != 0){
                    foreach ($products as $product) {
                        echo $product->product_title;
                        echo $product->product_image;
                        echo $product->products_name;
                        echo $product->product_desc;
                        echo $product->Products_price;
                        echo $product->product_desc;                          
                    } 
        
                }else{
                  // Make redirect to 404 page
                    echo "404 page";
                }
        
            } else {
               echo "Empty field";
            }
    }
    public function ShoesView()
    {
        return View('Runningshoes.pages.Shoesproducts');
    }

}