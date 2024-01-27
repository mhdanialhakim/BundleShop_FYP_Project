<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\OrderNotification;
use Illuminate\Support\Facades\Notification;


class MainPageController extends Controller
{
    //

    public function home(){

        $product = Product::all();
        $latestProduct = Product::orderBy('created_at','DESC')->get()->take(6);
        return view('MainPage.home', compact('product','latestProduct'));
    }

    public function shop(Request $request, $grade = null){
        // dd(Auth::user()->role);

        $query = Product::query();

        if ($grade) {
            $query->where('pgrade', $grade);
        }
        $d['model'] = $query->get();
        // $d['role']=Auth::user()->role;
        return view('MainPage.shop',$d);
    }

    public function product($id){
        $model=Product::where('pid',$id)->first();
        //$product=Product::find($id);
        return view('MainPage.product',compact('model'));
    }

    public function add_cart($id){
        if(Auth::id()){
            //fetch user login id
            $user=Auth::User();
            //fetch specific product id
            $product=Product::find($id);
            //create new cart data
            $cart=new Cart;
            //product:
            $cart->product_id = $product->pid;
            $cart->product_name = $product->pname;
            $cart->product_price = $product->pprice;
            $cart->product_image = $product->image;
            $cart->product_brand = $product->pbrand;
            $cart->product_color = $product->pcolor;
            $cart->product_category = $product->pcategory;
            $cart->product_grade = $product->pgrade;
            $cart->product_size = $product->psize;
            //user:
            $cart->user_id = $user->id;
            $cart->user_name = $user->name;
            $cart->user_address = $user->address;
            $cart->user_pnumber = $user->pnumber;
            $cart->user_email = $user->email;

            $cart->save();
            session()->flash('success', 'Product added to cart successfully.');

            return redirect()->back();
        }
        else{
            //if the user not yet login
            return redirect('login');
        }
    }

    public function show_cart(){

        if (Auth::id()) {
            $id = Auth::user()->id;
            $cart = Cart::where('user_id', '=', $id)->get();
    
            // Get the product IDs from the cart
            $productIds = $cart->pluck('product_id')->toArray();
    
            // Get the availability status for each product from the products table
            $availabilityStatus = Product::whereIn('pid', $productIds)
                ->pluck('pavailability', 'pid')
                ->toArray();
    
            // Check if any product in the cart has availability set to "Not Available"
            $disableCheckout = in_array('Not Available', $availabilityStatus);
    
            if ($disableCheckout) {
                $unavailableProducts = array_keys($availabilityStatus, 'Not Available');
                $existingProducts = Order::whereIn('product_id', $unavailableProducts)
                    ->pluck('product_name')
                    ->toArray();
            } else {
                $existingProducts = [];
            }
    
            return view('MainPage.showcart', compact('cart', 'disableCheckout', 'existingProducts'));
        } else {
            return redirect('login');
        }
        
    }

    public function remove_cart($id){

        $cart = Cart::where('cartid',$id)->delete();

        return redirect()->back();
    }

    public function checkout_page(){

        if(Auth::id()){

            $id = Auth::User()->id;
            $cart = Cart::where('user_id','=',$id)->get();

            return view('MainPage.checkout',compact('cart'));
        }
        else{
            return redirect('login');
        }
    }

    public function checkout_order(){
        $user = Auth::user();
        $user_id = $user->id;
        // dd($user_id);
        $data = Cart::where('user_id','=',$user_id)->get();
        // dd($data);
        foreach($data as $data){

            $order = new Order;
            //cart product
            $order->product_id = $data->product_id;
            $order->product_name = $data->product_name;
            $order->product_price = $data->product_price;
            $order->product_image = $data->product_image;
            $order->product_brand = $data->product_brand;
            $order->product_color = $data->product_color;
            $order->product_category = $data->product_category;
            $order->product_grade = $data->product_grade;
            $order->product_size = $data->product_size;
            //cart user
            $order->user_id = $data->user_id;
            $order->user_name = $data->user_name;
            $order->user_address = $data->user_address;
            $order->user_pnumber = $data->user_pnumber;
            $order->user_email = $data->user_email;
            //order status
            $order->payment_status = 'Paid';
            $order->delivery_status = 'Preparing';

            $order->save();
            //notification on new order
            $userAdmin = User::where('role','admin')->get();
            Notification::send($userAdmin, new OrderNotification($order));
            //update product availability
            $product = Product::find($data->product_id);
            if ($product) {
                $product->pavailability = 'Not Available';
                $product->save();
            }
            //delete cart after checkout
            $cart_id = $data->cartid;
            $cart=Cart::find($cart_id);
            $cart->delete();

        }

        return redirect('confirmation')
                            ->with('message','Order has been place.');

    }

    public function confirmation(){

        return view('MainPage.confirmation');
    }

    public function orders(){
        
        if(Auth::id()){
            $id = Auth::User()->id;
            $order = Order::where('user_id','=',$id)->get();

            return view('MainPage.order',compact('order'));
        }
        else{
            return redirect('login');
        }
    }

    public function cancel_order($id){

        $order=Order::find($id);
        $order->delivery_status = 'Canceled';
        $order->save();

        $product = Product::find($order->product_id);
            if ($product) {
                $product->pavailability = 'Available';
                $product->save();
            }

        return redirect()->back();

    }

    public function receive_order($id){

        $order=Order::find($id);
        $order->delivery_status = 'Received';
        $order->save();

        return redirect()->back();

    }

    public function profile($id=null){

        if(Auth::check()){

            if (!$id){
                $id = Auth::id();
            }
            $user = User::find($id);

            return view('MainPage.profile',compact('user'));
        }
        else{
            return redirect('login');
        }
    }

    public function edit_profile_form($id=null){
        
        if(Auth::check()){

            if (!$id){
                $id = Auth::id();
            }
            $user = User::find($id);

            return view('MainPage.editprofile',compact('user'));
        }
        else{
            return redirect('login');
        }

    }

    public function update_profile(Request $request, $id=null){

        if (Auth::check()) {
            if (!$id) {
                $id = Auth::id();
            }
    
            $user = User::find($id);
    
            // Check if the authenticated user is the owner of the profile
            if ($user && $user->id == Auth::id()) {
                // Validate the request using the UpdateProfileRequest form request
                $request->validate([
                    'name' => 'required|string|max:250',
                    // 'email' => 'required|email|max:250|unique:users',
                    'address' => 'required|string|max:250',
                    'pnumber' => 'required|string|max:20'
                ]);
    
                // Update the user profile
                $user->update([
                    'name' => $request->name,
                    // 'email' => $request->email,
                    'address' => $request->address,
                    'pnumber' => $request->pnumber
                ]);
    
                // Redirect to the profile page or a confirmation page
                return redirect()->route('profile', ['id' => $user->id])->with('success', 'Profile updated successfully.');
            } else {
                // Redirect to a proper page or show an error message
                return redirect()->route('home')->with('error', 'You are not authorized to edit this profile.');
            }
        } 
        else {
            return redirect('login');
        }

    }
}
