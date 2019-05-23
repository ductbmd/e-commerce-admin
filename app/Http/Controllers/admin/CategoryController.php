<?php

namespace Laraspace\Http\Controllers\admin;
use Laraspace\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laraspace\Models\Product\Product;
use Laraspace\Models\Company;
use Laraspace\Models\Product\ProductFile;
use Laraspace\Models\Product\ProductCategory;
use Laraspace\Models\Laptop\Laptop;
use Laraspace\Models\Laptop\LaptopCategory;
use Illuminate\Support\Facades\DB;
use Laraspace\Services\UploadFileService;
use Laraspace\Models\Product\ProductDetail;
use Laraspace\Models\Category;

class CategoryController extends Controller
{
	private $model;
	private $product;
	public function __construct(Category $model,Product $product)
    {
        /*$this->middleware('auth', ['except'=>[]]);*/
        $this->model = $model;
        $this->product=$product;
        
    }
    public function index()
    {
    	$products=Product::all();
        $laptops=Laptop::all();
    	return view('category.index')
    	->with(['categories'=>$this->model->with('product.product')->get(),
    		'products'=>$products,'laptops'=>$laptops
    	]);
    }
    public function store(Request $request)
    {
    	
    	Category::Create($request->except('_token'));
        flash()->success('Create Category success.');
        
    	return redirect()->route('category.index');
    }
    public function storeProduct(Request $request)
    {
    	foreach ($request->listProduct as $product_id) {
    		ProductCategory::Create(['product_id'=>$product_id,'category_id'=>$request->categorty_id,'description'=>'Category dien thoai']);
    	}
    	flash()->success('Create Category-Product success.');
        
    	return redirect()->route('category.index');
    }
    public function storeLaptop(Request $request)
    {
        foreach ($request->listLaptop as $product_id) {
            LaptopCategory::Create(['laptop_id'=>$product_id,'category_id'=>$request->categorty_id,'description'=>'Category laptop']);
        }
        flash()->success('Create Category-Product success.');
        
        return redirect()->route('category.index');
    }
}