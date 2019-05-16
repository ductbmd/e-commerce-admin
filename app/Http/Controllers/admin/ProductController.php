<?php

namespace Laraspace\Http\Controllers\admin;
use Laraspace\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laraspace\Models\Product\Product;
use Laraspace\Models\Company;
use Laraspace\Models\Product\ProductFile;
use Illuminate\Support\Facades\DB;
use Laraspace\Services\UploadFileService;

class ProductController extends Controller
{
	private $model;
	public function __construct(Product $model)
    {
        /*$this->middleware('auth', ['except'=>[]]);*/
        $this->model = $model;
        
    }

    public function index()
    {
    	$companies=Company::all()->mapWithKeys(function ($item) {
		    return [$item['id'] => $item['name']];
		});
		$products=$this->model->with('files.file')->with('company')->with('details')->get();
		/*dd($products);*/
    	return view('product.create')->with('companies',$companies)->with('products',$products);
    }
    public function store(Request $request)
    {
    	
        DB::beginTransaction();
        try {
            $input=$request->except(['file','_token']);
            $product_file=array();
            $product_file['product_id']=$this->model->create($input)->id;
            if ( $request->file('file') ) {
            	foreach ($request->file('file') as $fileUpload) {
            		 $file_id=UploadFileService::uploadImage($fileUpload);
                    //Tao file
                   $product_file['file_id']=$file_id;
                    //truyen file id luu lai
                   ProductFile::create($product_file);
            	}
                 //end foreach  
                }
            //end if
            
        } catch (Exception $e) {
            DB::rollBack();
            flash()->error('Create Product Error:'.$e);
        }
    	DB::commit();
        flash()->success('Create Product success.');
    	return redirect()->route('product.index');
    }
}
