<?php

namespace Laraspace\Http\Controllers\admin;

use Illuminate\Http\Request;
use Laraspace\Services\UploadFileService;
use Laraspace\Models\Company;
use Laraspace\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class CompanyController extends Controller
{
	private $model;

	public function __construct(Company $model)
    {
        /*$this->middleware('auth', ['except'=>[]]);*/
        $this->model = $model;
        
    }

    public function index()
    {
        $companies=$this->model->with('file')->get();
    	return view('company.create')->with('companies',$companies);
    }
    /**
     * [store description]
     * @param  string $value [description]
     * @return [type]        [description]
     */
    
    public function store(Request $request)
    {
        
        request()->validate([

            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        DB::beginTransaction();
        try {
            $input=$request->except(['file','_token']);
            if ( $request->file('file') ) {
                    $file_id=UploadFileService::uploadImage($request->file('file'));
                    //Tao file
                   $input['file_id']=$file_id;
                    //truyen file id luu lai
                }
            $this->model->create($input);
        } catch (Exception $e) {
            DB::rollBack();
            flash()->error('Create Company Error:'.$e);
        }
    	DB::commit();
        flash()->success('Create Company success.');
    	return redirect()->route('company.index');
    }
}
