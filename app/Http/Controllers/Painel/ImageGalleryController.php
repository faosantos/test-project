<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ImageGallery;
use Gate;

class ImageGalleryController extends Controller
{

    // private $gallery;
    
    // public function __construct(Gallery $gallery)//injeta o objeto
    // {
    //     $this->gallery = $gallery;//chama ele
        
    //     if( Gate::denies('view_post') ) //da a permissão de visualizar
    //         return redirect()->back();
    // }

    /**
     * Listing Of images gallery
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$images = ImageGallery::get();
    	return view('painel.gallerys.image-gallery',compact('images'));
    }


    /**
     * Upload image function
     *
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
    	$this->validate($request, [
    		'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        $input['image'] = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $input['image']);


        $input['title'] = $request->title;
        ImageGallery::create($input);


    	return back()
    		->with('success','Uploaded da imagem realizado com sucesso .');
    }


    /**
     * Remove Image function
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	ImageGallery::find($id)->delete();
    	return back()
    		->with('success','Imagem removida com sucesso.');	
    }
}
