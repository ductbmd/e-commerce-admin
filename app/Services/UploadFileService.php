<?php
namespace Laraspace\Services;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Laraspace\Models\File;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
class UploadFileService
{
	public static function uploadImage( $fileUploaded)
	{
        if (!$fileUploaded ) {
            throw new \Exception("Upload file not exist. File is invalid.", 1);
        }

        $test=Storage::putFileAs( 'public/photos', $fileUploaded, $fileUploaded->getClientOriginalName(), 'public');
        $file_link="storage/photos/".$fileUploaded->getClientOriginalName();
        $file_name=$fileUploaded->getClientOriginalName();
        $description="Upload anh";
        $file_id=File::create([
            'url' => $file_link,
            'file_name' => $file_name,
            'description' =>  $description,
            'type' => File::IMAGE,
            
        ])->id;
        return $file_id;
	}

}
 ?>