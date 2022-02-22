<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Slide;
use App\Product;
use App\ProductType;
use App\Customer;
use App\Bill;
use App\BillDetail;
use App\User;
use App\Country;
use Session;
use Hash;
use Auth;
use Cart;

class PageController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(){
    	$slide=Slide::all();
    	$new_product=Product::where('new',1)->take(9)->get();
    	$top_product=Product::where('promotion_price','<>',0)->take(8)->get();
    	//return view('page.index',['slide'=>$slide]);
    	return view('main.index',compact('slide','new_product','top_product'));
    }

    public function category($type){
    	$category_type = Product::where('id_type',$type)->paginate(6);
    	$category_other = Product::where('id_type','<>',$type)->take(3)->get();
    	$category_name = ProductType::where('id',$type)->first();
        $typea=ProductType::all();
        $country=Country::all();
    	return view('main.category',compact('category_type','category_other','category_name','typea','country'));
    }













    // public function category(){
    // 	return view('page.category');
    // }

    

    public function product_detail($id){
    	$product = Product::where('id',$id)->first();
    	$product_related = Product::where('id_type',$product->id_type)->take(3)->inRandomOrder()->get();
    	$category_name = ProductType::where('id',$product->id_type)->first();
    	$new_product=Product::where('new',1)->take(4)->inRandomOrder()->get();
    	$top_product=Product::where('promotion_price','<>',0)->take(4)->inRandomOrder()->get();   	
    	return view('page.product_detail',compact('product','product_related','new_product','top_product','category_name'));
    }



    public function muahang(Request $req, $id){
        $cartInfor = Cart::content();
        $soluong = $req->soluong;
        $product = Product::where('id',$id)->first();
    //nếu cart đang rỗng, chèn vào cart(bug)
    if($cartInfor->isEmpty()){
        if($soluong > $product->quantity)
        {
            return redirect()->back()->with('alert','Số lượng hàng không đủ');
        }
        else {
            if($product->promotion_price != 0){
            Cart::add(array('id'=>$id,'name'=>$product->name,'qty'=>$soluong,'price'=>$product->promotion_price,'weight'=>0,'options'=>array('img'=>$product->image)));
            //Cart::add('293ad', 'Product 1', 1, 9.99, 550, ['size' => 'large']);
            $content = Cart::content();
            return redirect()->back()->with('alert','Đã thêm hàng vào giỏ');
            }
            else{
            Cart::add(array('id'=>$id,'name'=>$product->name,'qty'=>$soluong,'price'=>$product->unit_price,'weight'=>0,'options'=>array('img'=>$product->image)));
            //Cart::add('293ad', 'Product 1', 1, 9.99, 550, ['size' => 'large']);
            $content = Cart::content();
            return redirect()->back()->with('alert','Đã thêm hàng vào giỏ');
            }
        }

    }//nếu đã có hàng trong cart
    else{

     // iterate through the products and store them into the database
     // vòng foreach lấy từng item hàng trong cart
     foreach($cartInfor as $key => $item){
            if($item->qty + $soluong > $product->quantity)   //nếu sl của item trong cart + 1 lớn hơn sl của hàng trên DB gọi từ id URL
            {
                return redirect()->back()->with('alert','Số lượng hàng có sẵn không đủ');
            }
        }
            if($product->promotion_price != 0){
            Cart::add(array('id'=>$id,'name'=>$product->name,'qty'=>$soluong,'price'=>$product->promotion_price,'weight'=>0,'options'=>array('img'=>$product->image)));
            //Cart::add('293ad', 'Product 1', 1, 9.99, 550, ['size' => 'large']);
            $content = Cart::content();
            return redirect()->back()->with('alert','Đã thêm hàng vào giỏ');
            }
            else{
            Cart::add(array('id'=>$id,'name'=>$product->name,'qty'=>$soluong,'price'=>$product->unit_price,'weight'=>0,'options'=>array('img'=>$product->image)));
            //Cart::add('293ad', 'Product 1', 1, 9.99, 550, ['size' => 'large']);
            $content = Cart::content();
            return redirect()->back()->with('alert','Đã thêm hàng vào giỏ');
            }
        




    }


    }
    public function cart(){
    	$content = Cart::content();
    	$total = Cart::subtotal();
    	return view('page.checkout',compact('content','total'));
    }

    // public function cartheader(){
    // 	$content = Cart::content();
    // 	$total = Cart::subtotal();
    // 	return view('page.header',compact('content','total'));
    // }





    public function deletesp($id){
    	Cart::remove($id);
    	return redirect()->route('cart');
    }
    //need to store another value reducesp/{id}/{qty}
    public function reducesp($id){
        $item = Cart::get($id);

        Cart::update($id, $item->qty - 1);

		return redirect()->route('cart');
    }



    
    public function addsp($id){
        $cartInfor = Cart::content();
    //nếu cart đang rỗng, chèn vào cart(bug)
    if($cartInfor->isEmpty()){

            $product = Product::where('id',$id)->first();
            if($product->promotion_price != 0){
            Cart::add(array('id'=>$id,'name'=>$product->name,'qty'=>1,'price'=>$product->promotion_price,'weight'=>0,'options'=>array('img'=>$product->image)));
            //Cart::add('293ad', 'Product 1', 1, 9.99, 550, ['size' => 'large']);
            $content = Cart::content();
            return redirect()->back()->with('alert','Đã thêm hàng');
            }
            else{
            Cart::add(array('id'=>$id,'name'=>$product->name,'qty'=>1,'price'=>$product->unit_price,'weight'=>0,'options'=>array('img'=>$product->image)));
            //Cart::add('293ad', 'Product 1', 1, 9.99, 550, ['size' => 'large']);
            $content = Cart::content();
            return redirect()->back()->with('alert','Đã thêm hàng');
            }

    }//nếu đã có hàng trong cart
    else{

     // iterate through the products and store them into the database
     // vòng foreach lấy từng item hàng trong cart
     foreach($cartInfor as $key => $item){
        $pro = Product::where('id',$item->id)->first(); //lấy id từ item trong cart
        $product = Product::where('id',$id)->first();   //lấy id từ URL
        
            if($item->qty + 1 > $product->quantity)   //nếu sl của item trong cart + 1 lớn hơn sl của hàng trên DB gọi từ id URL
            {
                return redirect()->back()->with('alert','Số lượng hàng có sẵn không đủ');
            }    
        
    }
        
            if($product->promotion_price != 0){
            Cart::add(array('id'=>$id,'name'=>$product->name,'qty'=>1,'price'=>$product->promotion_price,'weight'=>0,'options'=>array('img'=>$product->image)));
            //Cart::add('293ad', 'Product 1', 1, 9.99, 550, ['size' => 'large']);
            $content = Cart::content();
            return redirect()->back()->with('alert','Đã thêm hàng');
            }
            else{
            Cart::add(array('id'=>$id,'name'=>$product->name,'qty'=>1,'price'=>$product->unit_price,'weight'=>0,'options'=>array('img'=>$product->image)));
            //Cart::add('293ad', 'Product 1', 1, 9.99, 550, ['size' => 'large']);
            $content = Cart::content();
            return redirect()->back()->with('alert','Đã thêm hàng');
            }


        

    }










    }



    //about checkout contact login signin

    public function about(){
    	return view('page.about');
    }

    public function contact(){
    	return view('page.contact');
    }









    public function login(){
    	return view('page.login');
    }
    public function postLogin(Request $req){
        $this->validate($req,
            [
                'email'=>'required|email',
                'pass'=>'required|min:6',
            ],
            [
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Vui lòng nhập đúng định dạng email',
                'pass.required'=>'Vui lòng nhập password',
                'pass.min'=>'Password có ít nhất 6 kí tự',
            ]);

        $credentials = array('email'=>$req->email,'password'=>$req->pass);
        if(Auth::attempt($credentials)){
            return redirect()->route('index')->with('alert','Đăng nhập thành công'); 
        }
        else {
            return redirect()->back()->with('alert','Hãy điền đúng email hoặc mật khẩu');
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('index');
    }











    public function signin(){
    	return view('page.signin');
    }   
    public function postSignin(Request $req){
        $this->validate($req,
            [
                'email'=>'required|email|unique:users,email',
                'pass'=>'required|min:6',
                'name'=>'required',
                'repass'=>'required|same:pass',
                'address'=>'required',
                'phone'=>'required'
            ],
            [
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Vui lòng nhập đúng định dạng email',
                'email.unique'=>'Đã có email này',
                'name.required'=>'Vui lòng nhập tên',
                'address.required'=>'Vui lòng nhập địa chỉ',
                'phone.required'=>'Vui lòng nhập SĐT',
                'pass.required'=>'Vui lòng nhập password',
                'pass.min'=>'Password có ít nhất 6 kí tự',
                'repass.same'=>'Vui lòng nhập đúng mật khẩu'
            ]);

        $user = new User;
        $user->full_name = $req->name;
        $user->email = $req->email;
        $user->password = Hash::make($req->pass);
        $user->phone = $req->phone;
        $user->address = $req->address;
        $user->save();
        return redirect()->back()->with('alert','Đã tạo tài khoản thành công, vui lòng đăng nhập');
    }

    public function userinfo(){
        return view('page.user_info');
    }   
    public function postUserinfo(Request $req){
        $this->validate($req,
            [
                'email'=>'required|email',
                'pass'=>'required|min:6',
                'name'=>'required',
                'address'=>'required',
                'phone'=>'required'
            ],
            [
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Vui lòng nhập đúng định dạng email',
                'name.required'=>'Vui lòng nhập tên',
                'address.required'=>'Vui lòng nhập địa chỉ',
                'phone.required'=>'Vui lòng nhập SĐT',
                'pass.required'=>'Vui lòng nhập password',
                'pass.min'=>'Password có ít nhất 6 kí tự'
            ]);
        $email = $req->email;
        $newname = $req->name;
        $newphone = $req->phone;
        $newaddress = $req->address;

        $credentials = array('email'=>$email,'password'=>$req->pass);
        if(Auth::attempt($credentials)){
            User::where('email',$email)->update(['full_name' => $newname,'phone'=>$newphone,'address'=>$newaddress]);
            return redirect()->route('index')->with('alert','Sửa thông tin thành công'); 
        }
        else {
            return redirect()->back()->with('alert','Hãy điền đúng mật khẩu');
        }
    }
    public function changepass(){
        return view('page.changepass');
    }   

    public function postChangepass(Request $req){
        $this->validate($req,
            [
                
                
                'passnew'=>'required|min:6',
                'repassnew'=>'required|min:6|same:passnew'
            ],
            [

                
                'passnew.required'=>'Vui lòng nhập password',
                'passnew.min'=>'Password có ít nhất 6 kí tự',
                'repassnew.required'=>'Vui lòng nhập password',
                'repassnew.min'=>'Password có ít nhất 6 kí tự',
                'repassnew.same'=>'Vui lòng nhập đúng mật khẩu'
            ]);
        $passnew = Hash::make($req->passnew);

        User::where('id',Auth::user()->id)->update(['password' => $passnew]);
        return redirect()->route('index')->with('alert','Sửa mật khẩu thành công'); 

    }









    public function postCheckout(Request $req){
        $cartInfor = Cart::content();

        $customer = new Customer;
        $customer->name = $req->name;
        $customer->gender = $req->gender;
        $customer->email = $req->email;
        $customer->address = $req->address;
        $customer->phone_number = $req->phone;
        $customer->save();



        $bill = new Bill;
        $bill->id_customer = $customer->id;
        $bill->date_order = date('Y-m-d');
        $bill->total = str_replace(',', '', Cart::subtotal());
        $bill->payment = $req->payment_method;
        $bill->note = $req->notes;
        $bill->save();

     // iterate through the products and store them into the database
     foreach($cartInfor as $key => $item){
        $bill_detail = new BillDetail;
        $bill_detail->id_bill = $bill->id;
        $bill_detail->id_product = $item->id;
        $bill_detail->quantity = $item->qty;
        $bill_detail->unit_price = $item->price;
        $bill_detail->save();
     }
        Cart::destroy();
        return redirect()->back()->with('alert','Đặt hàng thành công');


    }











    public function search(Request $req){
        $ten_sp=$req->searchbox;
        $danhmuc=$req->danhmuc;
        $price=$req->price;
        $sort=$req->sort;
        $country=$req->origin;


        $conditions = ['status' => 'onl'];


        if($danhmuc != null){
            $conditions = array_merge($conditions, ['id_type' => $req->danhmuc]);
        }
        if($country != null){
            $conditions = array_merge($conditions, ['id_country' => $req->origin]);
        }

        $product = Product::where($conditions);

        if($ten_sp != null){
            $product = $product->where('name', 'like', '%'.$ten_sp.'%');
        }




        if($price != null){
            switch ($price) {
                case '1':
                    $product->where('unit_price', '<', '100000');
                    break;
                case '2':
                    $product->where('unit_price', '>=', '100000')->where('unit_price', '<', '300000');
                    break;
                case '3':
                    $product->where('unit_price', '>=', '300000')->where('unit_price', '<', '500000');
                    break;
                case '4':
                    $product->where('unit_price', '>=', '500000')->where('unit_price', '<', '1000000');
                    break;
                case '5':
                    $product->where('unit_price', '>=', '1000000');
                    break;
                default:
                    // code...
                    break;
            }
        }



        if($sort != null){
            switch ($sort) {
                case '1':
                    $product->orderBy('id', 'ASC');
                    break;
                case '2':
                    $product->orderBy('unit_price', 'ASC');
                    break;
                case '3':
                    $product->orderBy('unit_price', 'DESC');
                    break;
                case '4':
                    $product->orderBy('name', 'ASC');
                    break;
                case '5':
                    $product->orderBy('name', 'DESC');
                    break;
                case '6':
                    $product->orderBy('updated_at', 'DESC');
                    break;
                default:
                    // code...
                    break;
            }
        }






        $product = ($product)->paginate(5);
        $type=ProductType::all();
        return view('main.search',compact('ten_sp','product','type'));

    }






    public function sortcat($type,Request $req){
        $danhmuc=$req->danhmuc;
        $price=$req->price;
        $sort=$req->sort;
        $country=$req->origin;


        $conditions = ['id_type' => $type];

        if($country != null){
            $conditions = array_merge($conditions, ['id_country' => $req->origin]);
        }


        $product = Product::where($conditions);






        if($price != null){
            switch ($price) {
                case '1':
                    $product->where('unit_price', '<', '100000');
                    break;
                case '2':
                    $product->where('unit_price', '>=', '100000')->where('unit_price', '<', '300000');
                    break;
                case '3':
                    $product->where('unit_price', '>=', '300000')->where('unit_price', '<', '500000');
                    break;
                case '4':
                    $product->where('unit_price', '>=', '500000')->where('unit_price', '<', '1000000');
                    break;
                case '5':
                    $product->where('unit_price', '>=', '1000000');
                    break;
                default:
                    // code...
                    break;
            }
        }



        if($sort != null){
            switch ($sort) {
                case '1':
                    $product->orderBy('id', 'ASC');
                    break;
                case '2':
                    $product->orderBy('unit_price', 'ASC');
                    break;
                case '3':
                    $product->orderBy('unit_price', 'DESC');
                    break;
                case '4':
                    $product->orderBy('name', 'ASC');
                    break;
                case '5':
                    $product->orderBy('name', 'DESC');
                    break;
                case '6':
                    $product->orderBy('updated_at', 'DESC');
                    break;
                default:
                    // code...
                    break;
            }
        }






        $product = ($product)->paginate(5);
        $category_name = ProductType::where('id',$type)->first();
        $type=ProductType::all();
        return view('main.sort',compact('product','type','category_name'));

    }




}


