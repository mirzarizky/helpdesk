<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;

class FileController extends Controller
{
    /**
    * @method: GET
    *
    * @return Render view for uploads images
    */
    public function index() {
    	$images = File::get();
    	return view('upload',compact('images'));
    }

    /**
    * Method : POST
    *
    * @return Post image and store in database
    */

    public function storeFile()
    {
        $file = Input::file('file');
        $upload = new File;

        try {
            $upload->process($file);
        } catch(Exception $exception){
            // Something went wrong. Log it.
            Log::error($exception);
            $error = array(
                'name' => $file->getClientOriginalName(),
                'size' => $file->getSize(),
                'error' => $exception->getMessage(),
            );
            // Return error
            return Response::json($error, 400);
        }

        // If it now has an id, it should have been successful.
        if ( $upload->id ) {
            $newurl = URL::asset($upload->publicpath().$upload->filename);

            // this creates the response structure for jquery file upload
            $success = new stdClass();
            $success->name = $upload->filename;
            $success->size = $upload->size;
            $success->url = $newurl;
            $success->thumbnailUrl = $newurl;
            $success->deleteUrl = action('FileController@delete', $upload->id);
            $success->deleteType = 'DELETE';
            $success->fileID = $upload->id;

            return Response::json(array( 'files'=> array($success)), 200);
        } else {
            return Response::json('Error', 400);
        }
    }

    // public function storeFile(Request $request){
    // 	if($request->file('file') && $request->file('file')->isValid()){
    // 		$imageName = str_random(12).$request->file('file')->getClientOriginalExtension();
    //     print_r($imageName ).exit();
    //     $imageModel = new File;
    // 		$imageModel->image = $imageName;
    // 		$imageModel->caption = pathinfo($request->file('file')->getClientOriginalName(), PATHINFO_FILENAME);
    // 		$request->file('file')->move(public_path() . '/storage/uploads', $imageName);
    // 		if($imageModel->save()){
    // 			$images = File::get();
    // 			$view = view('partials.imagelist', compact('images'))->render();
    // 			return response()->json(['id'=>$imageModel->id,'html'=>$view]);
    // 		}else{
    // 			return response()->json(['message' => 'Error while saving image'],422);
    // 		}
    // 	}else{
    // 		return response()->json(['message' => 'Invalid image'],422);
    // 	}
    // }

    /**
    * Method : GET
    *
    * @return return all images
    */
    public function allFiles(){
    	$images = File::get();
		return view('partials.imagelist', compact('images'))->render();
    }

    /**
    * Method : DELETE
    *
    * @return delete images
    */
    public function deleteFile($id) {
    	$image = File::findOrFail($id);
        if ($image && count($image) > 0) {

            $file = public_path() . '/uploads/'.$image->image;
            if(is_file($file)){
                @unlink($file);
            }
            $image->delete();
        }
        $images = File::get();
		$view = view('partials.imagelist', compact('images'))->render();
        return response()->json(['html' => $view]);
    }
}
