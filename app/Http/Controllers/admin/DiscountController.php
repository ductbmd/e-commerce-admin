<?php

namespace Laraspace\Http\Controllers\admin;
use Laraspace\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laraspace\Models\Product\Product;
use Laraspace\Models\Company;
use Laraspace\Models\Product\ProductFile;
use Laraspace\Models\Product\ProductDiscount;
use Laraspace\Models\Laptop\Laptop;
use Laraspace\Models\Laptop\LaptopDiscount;
use Illuminate\Support\Facades\DB;
use Laraspace\Services\UploadFileService;
use Laraspace\Models\Product\ProductDetail;
use Laraspace\Models\Discount;

class DiscountController extends Controller
{
	private $model;
	private $product;
	public function __construct(Discount $model,Product $product)
    {
        /*$this->middleware('auth', ['except'=>[]]);*/
        $this->model = $model;
        $this->product=$product;
        
    }
    public function index()
    {
    	$products=Product::all();
        $laptops=Laptop::all();
    	return view('discount.index')
    	->with(['discounts'=>$this->model->get(),
    		'products'=>$products,'laptops'=>$laptops
    	]);
    }
    public function store(Request $request)
    {
    	$input=$request->except('_token');
        $input['time_start']= date('Y-m-d H:i:s',strtotime( $input['time_start']));
        $input['time_expired']=  date('Y-m-d H:i:s',strtotime( $input['time_expired']));
       
        
    	Discount::Create($input);
        flash()->success('Create discount success.');
        
    	return redirect()->route('discount.index');
    }
    public function storeProduct(Request $request)
    {
    	foreach ($request->listProduct as $product_id) {
            $product=$this->product->find($product_id);
            $product->discount_id=$request->discount_id;
            $product->save();
    		/*ProductDiscount::Create(['product_id'=>$product_id,'discount_id'=>$request->discount_id,'description'=>'Discount dien thoai']);*/
    	}
    	flash()->success('Create Discount-Product success.');
        
    	return redirect()->route('discount.index');
    }
    public function storeLaptop(Request $request)
    {   
        foreach ($request->listLaptop as $product_id) {
            $laptop=Laptop::find($product_id);
            $laptop->discount_id=$request->discount_id;
            $laptop->save();
            // LaptopDiscount::Create(['laptop_id'=>$product_id,'discount_id'=>$request->discount_id,'description'=>'Discount laptop']);
        }
        flash()->success('Create Discount-Product success.');
        
        return redirect()->route('discount.index');
    }
}