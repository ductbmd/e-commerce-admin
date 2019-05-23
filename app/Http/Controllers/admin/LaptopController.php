<?php

namespace Laraspace\Http\Controllers\admin;
use Laraspace\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laraspace\Models\Laptop\Laptop;
use Laraspace\Models\Laptop\LaptopFile;
use Illuminate\Support\Facades\DB;
use Laraspace\Services\UploadFileService;

class LaptopController extends Controller
{
	private $model;
	public function __construct(Laptop $model)
    {
        /*$this->middleware('auth', ['except'=>[]]);*/
        $this->model = $model;
        
    }

    public function index()
    {
    	
		$laptops=$this->model->with('files.file')->get();
		/*dd($Laptops);*/
    	return view('laptop.create')->with('laptops',$laptops);
    }
    public function store(Request $request)
    {
    	
        DB::beginTransaction();
        try {
            $input=$request->except(['file','_token']);
            $laptop_file=array();
            $laptop_file['laptop_id']=$this->model->create($input)->id;
            if ( $request->file('file') ) {
            	foreach ($request->file('file') as $fileUpload) {
            		 $file_id=UploadFileService::uploadImage($fileUpload);
                    //Tao file
                   $laptop_file['file_id']=$file_id;
                    //truyen file id luu lai
                   laptopFile::create($laptop_file);
            	}
                 //end foreach  
                }
            //end if
            
        } catch (Exception $e) {
            DB::rollBack();
            flash()->error('Create Laptop Error:'.$e);
        }
    	DB::commit();
        flash()->success('Create Laptop success.');
    	return redirect()->route('laptop.index');
    }
    public function storeauto(Request $request)
    {
        DB::beginTransaction();
        try {
            $input=$request->except(['file','_token']);
            $Laptop_file=array();
            $Laptop_file['Laptop_id']=$this->model->create($input)->id;
            if ( $request->file('file') ) {
                foreach ($request->file('file') as $fileUpload) {
                     $file_id=UploadFileService::uploadImage($fileUpload);
                    //Tao file
                   $Laptop_file['file_id']=$file_id;
                    //truyen file id luu lai
                   LaptopFile::create($Laptop_file);
                }
                 //end foreach  
                }
                $LaptopDetail=[];
                $LaptopDetail['qty']=50;
                $LaptopDetail['Laptop_id']=$Laptop_file['Laptop_id'];
                $LaptopDetail['configuration']="Khong";
                $color=['black','white','gold'];
            for ($i=0; $i <3 ; $i++) { 
                $LaptopDetail['price']=$i*20;
                $LaptopDetail['color']=$color[$i];
                LaptopDetail::create($LaptopDetail);
            }

            //end if
            
        } catch (Exception $e) {
            DB::rollBack();
            flash()->error('Create Laptop Error:'.$e);
        }
        DB::commit();
        flash()->success('Create Laptop success.');
        return redirect()->route('Laptop.index');
    }
    public function storeDetail(Request $request)
    {
        dd($request);
    }
}
