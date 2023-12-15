<?php

namespace App\Http\Controllers;

use App\Models\Images;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    //

    public function index(){
        $d['model']=Product::select('product.*','images.location')
        ->join('images', 'images.pid', '=', 'product.pid','left')
        ->get();

        return view('Product.index',$d);
        
    }

    public function addform(){
        return view('Product.add');
    }

    public function store(Request $request){
        $request->validate([
            'pname' => 'required',
            'pcategory' => 'required',
            'pbrand' => 'required',
            'pgrade' => 'required',
            'pcolor' => 'required',
            'psize' => 'required',
            'pavailability' => 'required',
            'pprize' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gi',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')){
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = $profileImage;
        }
        Product::create($input);
      
        return redirect()->route('index-product')
                        ->with('success','Product created successfully.');
        
    }

    public function show($id){
        $model=Product::where('pid',$id)->first();
        return view('Product.show',compact('model'));
    }

    // public function add(Request $request){
    //     // dd($request->file);
    //     $model=new Product;
    //     $model->pname = $request->pname;
    //     $model->pcategory = $request->pcategory;
    //     $model->pbrand = $request->pbrand;
    //     $model->pgrade = $request->pgrade;
    //     $model->pcolor = $request->pcolor;
    //     $model->psize = $request->psize;
    //     $model->preview = $request->preview;
    //     $model->pprize = $request->pprize;
    //     $model->save();
    //     // dd($model);
    //         $fileName = time().'_'.$model->id.'.'.$request->file->getClientOriginalExtension();
    //         $filePath = $request->file('file')->storeAs('uploads/productImage'.$model->id, $fileName, 'public');
    //         $modelimages=new Images;
    //         $modelimages->name = $fileName;
    //         $modelimages->location = '/storage/'.$filePath;
    //         $modelimages-> ext = $request->file->getMimeType();
    //         $modelimages-> pid = $model->id;
    //         $modelimages ->save();
    //     return redirect()->route('index-product');
    // }
    

    public function editform($id){     
        // return view('Product.edit', compact('product'));
        $d['model']=Product::where('pid',$id)->first();
        return view('Product.edit',$d);
    }

    public function updatee(Request $request,$id){
        $model=Product::where('pid',$id)->first();
        // dd($model);
        $model->update([
            'pname'=>$request->pname,
            'pcategory'=>$request->pcategory,
            'pbrand'=>$request->pbrand,
            'pgrade'=>$request->pgrade,
            'pcolor'=>$request->pcolor,
            'psize'=>$request->psize,
            'pavailability'=>$request->pavailability,
            'pprize'=>$request->pprize,
        ]);

        if($request->hasFile('image'))
            {
                $destination = 'images/'.$model->image;
                // $destination = public_path('uploads/' . $destination);
                // dd(File::delete($destination));
                if(File::exists($destination)){
                    File::delete($destination);
                }
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time().'.'.$extension;
                $file->move('images/', $filename);
                // $model->image = $filename;
                $model->update([
                    'image'=>$filename
                ]);
            }

        return redirect()->route('index-product');
    }

    public function delete($id){
        Product::where('pid',$id)->delete();
        return redirect()->route('index-product');
    }
}
