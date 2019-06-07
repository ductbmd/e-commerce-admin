<?php

namespace Laraspace\Http\Controllers\admin;
use Laraspace\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Laraspace\Services\UploadFileService;
use Laraspace\Models\Product\Product;
use Laraspace\Models\Company;
use Laraspace\Models\Product\ProductFile;
use Laraspace\Models\Product\ProductDiscount;
use Laraspace\Models\Laptop\Laptop;
use Laraspace\Models\Laptop\LaptopDiscount;
use Laraspace\Models\Product\ProductDetail;
use Laraspace\Models\Discount;
use Laraspace\Models\User;
use Laraspace\Models\Category;
use Laraspace\Models\Order\Order;
use Laraspace\Models\Comment;
use Laraspace\Models\UserInfo;
class AdminController extends Controller
{
	private $model;
	private $product;
	public function __construct(User $model)
    {
        /*$this->middleware('auth', ['except'=>[]]);*/
        $this->model = $model;
        
    }
    public function getUser(Request $request)
    {
    	$listUser=User::withTrashed()->with('Info')->get();
    	// dd($listUser);
    	return view('statistic/user')->with('users',$listUser);
    }
    public function deleteUser($id,Request $request)
    {
    	
    	User::where('id',$id)->delete();
    	return redirect()->route('user.config');
    }
    public function activeUser($id)
    {
    	
    	User::where('id',$id)->restore();
    	return redirect()->route('user.config');
    }
    public function ecommerce()
    {
    	$category_count=Category::count();
    	$product_count=Product::count();
    	$laptop_count=Laptop::count();
    	$date=Carbon::now()->subDays(30);
    	$order_count=Order::where('created_at','>=',$date)->count();
    	$comment_count=Comment::where('created_at','>=',$date)->count();//thống kê
    	//vẽ biểu đồ thoogn tin
    	$month_now=Carbon::now()->month;
    	for ($i=0; $i <$month_now ; $i++) { 
    		$truc_hoanh[$i]='Tháng '.($i+1);
    		$tructung[$i]=Order::whereYear('created_at','=',Carbon::now()->year)->whereMonth('created_at','=',$i+1)->count();
    	}
    	
    	$truc_hoanh="'".implode("','" ,$truc_hoanh)."'";
    	$tructung=implode(',' ,$tructung);
    	//End ve bieu do
    	//Lay thong tin order
    	$orders=Order::where('status','DatDon')->with('user')->get();
    	$customers=UserInfo::whereYear('created_at','=',Carbon::now()->year)->whereMonth('created_at','=',Carbon::now()->month)->get();
    	// dd($orders);
    	return view('statistic/ecommerce')->with(['category_count'=>$category_count,
    		'product_count'=>$product_count,
    		'laptop_count'=>$laptop_count,
    		'order_count'=>$order_count,
    		'comment_count'=>$comment_count,
    		'truc_hoanh'=>$truc_hoanh,
    		'tructung'=>$tructung,
    		'orders'=>$orders,
    		'customers'=>$customers
    	]);
    }
    public function order()
    {
        $orders=Order::all();
        $order_done=Order::where('status','HOANTHANH')->with('user')->get();
        $order_do=Order::where('status','DatDon')->with('user')->get();
        $pay=array();
        $pay['the']=$orders->where('payment','THE')->count();
        $pay['buudien']=$orders->where('payment','BUUDIEN')->count();
        $pay['taiquay']=$orders->where('payment','TAIQUAY')->count();
        // dd($order_done);
        return view("statistic/order")->with([
            'order_done'=>$order_done,
            'order_do'=>$order_do,
            'pay'=>$pay
            ]);
    }
    public function viewOrder($id)
    {
    	$order=Order::where('id',$id)->with('user.userlogin')->with('detail')->first();
    	
    	$phoneid=[];$laptopid=[];
    	if($order->detail){
    		foreach ($order->detail as $orderDetail) {
    			//neu la dien thoai
    			if($orderDetail->type=='PHONE'){
    				array_push($phoneid, $orderDetail->product_id);
    			}else{
                    array_push($laptopid, $orderDetail->product_id);
                }
    		}
    	}
        if($phoneid){
            $order->phone=ProductDetail::whereIn('id',$phoneid)->with('product')->get();
        }
        if($laptopid){
            $order->laptop=Laptop::whereIn('id',$laptopid)->get();
        }
        return view("statistic/orderDetail")->with('order',$order);
    }
    public function orderDone($id)
    {
        $order=Order::find($id);
        $order->status="HOANTHANH";
        $order->save();
        return redirect()->route('viewOrder',$id);
    }
    public function statisticOrder()
    {
        $month_now=Carbon::now()->month;
        
        for ($i=0; $i <$month_now ; $i++) { 
            $thang[$i]='Tháng '.($i+1);
            $doanhthu[$i]=Order::whereYear('created_at','=',Carbon::now()->year)->whereMonth('created_at','=',$i+1)->sum('total_amount');
        }
        $thang="'".implode("','" ,$thang)."'";
        $doanhthu=implode(',' ,$doanhthu);
        return view("statistic/statisticOrder")->with([
            'thang'=>$thang,
            'doanhthu'=>$doanhthu
        ]);
    }
   
}