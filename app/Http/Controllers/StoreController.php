<?php namespace App\Http\Controllers;
use DB;
use Mail;
use App\Events\CartsEvent;
use Event;
use Input;
use Session;
use App\Models\User;
use App\Models\Wishlist;
use App\Models\Menu;
use App\Models\Slides;
use App\Models\Products;
use App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests\ContactRequest;

class StoreController extends GlobalController
{
    private $limit = 8;
    private $qtyC;

//  public $test;
/*
    public function __construct(FlatVarRepositories $test)
    {
        $this->test = $test;
        \View::share('test', $this->test->getAll());
         
    }
*/
    public function StoreAction()
    {
        //Make a log in to header and a log out button
        //echo Session::get('username'),Session::get('password'),Session::get('token'), Session::get('user_id');
        //$test = DB::connection('mongodb')->collection('testTable')->get();
        //dd($test);
        return View('Runningshoes/pages/Home')->with(
            array(
                'getRandomProducts' => $this->getProducts(Products::randomize($this->limit)),
                'Slides' => $this->Slides(),
                )
            );
    }

    private function getProducts($productsModel)
    {
        return $products = $productsModel->get();
    }

    private function Slides()
    {
        return $this->fetchTable(Slides::all());
    }
    public function CartView()
    {
        if (count(Session::get('user_id')) == 0){
            return redirect('Login');
        } else {

            $CartMany = DB::table('shoppingcart')->where('cart_user_id', "=", Session::get('user_id'))->get();
            if(count($CartMany) == 0) {
                $noPro = 'There are no Products';
                return View('Runningshoes/pages/Cart')->with(
                    array(
                    'noPro' => $noPro,    
                    'getAllCarts' => $CartMany,
                    'totalCart' => $this->totalCart(),    
                    ));
            }else{
                $noPro = '';
                return View('Runningshoes/pages/Cart')->with(
                    array(
                    'noPro' => $noPro, 
                    'getAllCarts' => $CartMany,
                    'totalCart' => $this->totalCart(),    
                    ));
            }
        }

    }
    private $getFullPriceProd;
    
    public function addCart()
    {   
        if (count(Session::get('user_id')) == 0){
            return redirect('Login');
        } else {    
        $Pros = Products::leftJoin('shoppingcart', 'products_id', '=', 'prod_id')->where("products_id","=", Input::get('btn_hidden_id'))->get();
        foreach ($Pros as $Pro){
                if ($Pro->prod_id == true && $Pro->cart_user_id == true) { 
                   for ($this->qtyC = $Pro->cart_pro_qty; $this->qtyC <= $Pro->cart_pro_qty; $this->qtyC++) { 
                       $qtyCart = $this->qtyC += 1;
                       $this->getFullPriceProd = $Pro->Products_price * $this->qtyC; 
                        DB::table('shoppingcart')->where('prod_id', "=", Input::get('btn_hidden_id'))->update(
                            array(
                                'cart_pro_qty' => $qtyCart, 
                                'full_prise_prod' => $this->getFullPriceProd,
                            )); 
                   }
                   return redirect('Shoppingcart');
                   exit();
                } else {
                    $this->qtyC = '1';
                    $this->getFullPriceProd = $Pro->Products_price * $this->qtyC;
                    DB::table('shoppingcart')->insert([
                        'shoppingcart_prod_name' => $Pro->products_name,
                        'shoppingcart_prod_price' => $Pro->Products_price,
                        'full_prise_prod' => $this->getFullPriceProd,
                        'shoppingcart_prod_title' => $Pro->product_title,
                        'shoppingcart_prod_label' => $Pro->products_label,
                        'shoppingcart_prod_img' => $Pro->product_image,
                        'cart_pro_qty' => $this->qtyC,
                        'cart_user_id' => Session::get('user_id'),
                        'prod_id' => $Pro->products_id,
                        ]);
                    return redirect('Shoppingcart'); 
                }
        }
        }
    }
    public function removeCartspro()
    {
        if (count(Session::get('user_id')) == 0) {
            return redirect('/');
        }else 
        $removepro = DB::table('shoppingcart')->where('prod_id', '=', $_GET['prod_id'])->take(1)->delete();
        return redirect('Shoppingcart');
    }


    private function totalCart()
    {
        $TotalsCost = DB::table('shoppingcart')->where("cart_user_id", "=", Session::get('user_id'))->sum('full_prise_prod');
            $partC = $TotalsCost;
            $onlyM = $TotalsCost * 0.25;
            $totalCM = $TotalsCost * 1.25;
            if(count($totalCM) == 0){
                return 0 . ' '. '$';
            } else {
                $setSession = Session::put([
                'partC' => $partC,
                'onlyM' => $onlyM,
                'totalCM' => $totalCM,
            ]);
                return $totalCM;
            }
    }

    public function sublink($createsubje)
    {
       $createSub = DB::table('submenu')->join('forum_cat', 'submenu_id', '=', 'submenu_id')->where('submenu_link', '=', $createsubje);   
       $getforumCats = $this->fetchTable(DB::table('forum_cat')->lists('Forum_cat_name', 'Forum_cat_id'));
       if (!count($createSub)) {
            return redirect('Products');
        } else
        return View('Runningshoes/pages/'.$createsubje)->with(
            array(
            'getforumCats' => $getforumCats,
            )); 
    } 
    public function aboutUsView()
    {
        return View('Runningshoes.pages.aboutUs')->with(
            array(
            'infoPages' => DB::table('menus')->where('menu_name', '=', 'About us')->get(),
            ));
    }

    public function contactUsView()
    {
        return View('Runningshoes.pages.contactUs')->with(
           array(
            'infoPages' => DB::table('menus')->where('menu_name', '=', 'About us')->get(),
            ));
    }
    private $email;
    private $text;
    private $name;
    public function sendEmail(ContactRequest $request)
    {
        if ($request) {
            $this->email = $request->email_contact;
            $this->text = $request->text_contact;
            $this->name = $request->name_contact;
            $data = array('email' => $this->email, 'name' => $this->name);
            Mail::send('Runningshoes.pages.emails.reminder', ['text' => $this->text, 'name' => $this->name, 'email' => $this->email], function ($message) use ($data) {
            $message->from($data['email'], $data['name']);
            $message->to('pontusp66@hotmail.com', 'Pontus')->subject('Runningshoes');
        });            
            return back()->with('resived', 'We have resived your Email');
        } else 
        return back();
    }

    public function cat($id)
    {
        $Ca = DB::table('cats')->join('products', 'Cat_id','=', 'product_cat')->where('cat_title', '=', $id)->get();  
        if (count($Ca) > 0) {
            return View('Runningshoes.pages.cats')->with(
                array(
            'cats' => $Ca,
            ));
        } else 
        return back();
    }

    public function brand($id)
    {
        $Ba = DB::table('brands')->join('products', 'Brand_id','=', 'product_brand')->where('Brand_title', '=', $id)->get();  
        if (count($Ba) > 0) {
            return View('Runningshoes.pages.brands')->with(
                array(
            'brands' => $Ba,
            ));
        } else 
        return back();        
    }

    public function WishlistView($username)
    {
        $getUsers = User::where('username','=', $username)->select('username')->get();
        //foreach ($getUsers as $getUser => $value) {if($username != $getUser->username){return redirect('http://localhost/sites/Running-shoes/public/Login');}}
        $wishlist = Wishlist::all();
        dd($wishlist);
        return View('Runningshoes.pages.wishlist.Wishlist');
    } 

    public function addwishlist()
    {
                
    }
    public function Terms_ConditionView()
    {
        return View('Runningshoes.pages.TermsCondition')->with(
            array(
            'TermsCondition' => $this->getText('Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?'),    
            ));
    }
    public function BloggView()
    {
        $getBloggs = Menu::where('menu_name','=', 'Blogg')->select('info')->get();
        return View('Runningshoes.pages.blogg.BloggView')->with(array(
            'getBloggs' => $getBloggs,
            ));
    }

}