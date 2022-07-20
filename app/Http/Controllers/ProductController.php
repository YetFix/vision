<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use App\Models\Settings;

use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\App;

class ProductController extends Controller
{
   
    function index(){
        $products = Product::get();
        return view('backend.Product.index',compact('products'));
    }


    function create(){
        $categories = Category::get();
        return view('backend.Product.create',compact('categories'));
    }
    function store(Request $request){
  
        $request->validate([
            'name'=>'required',
            'category'=>'required', 
        ]);
        $product = new Product();
        $category = Category::find($request->category);
  
       if($request->hasfile('products'))
         {

            foreach($request->file('products') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/product_images/', $name);  
                $data[] = $name;  
            }
         }
        if ($pdf = $request->file('pdf')) {
            $destinationPath = public_path('pdfs/');
            $pdfPath = date('YmdHis') . "." . $pdf->getClientOriginalExtension();
          
            $pdf->move($destinationPath, $pdfPath);
            $product->pdf=$pdfPath;
        }
      
        $product->name=$request->name;
        
        $product->compostion=$request->compostion;
        $product->indication=$request->indication;
        $product->dosage=$request->dosage;
        $product->contraindication=$request->contraindication;
        $product->effects=$request->effects;
        $product->others=$request->others;
        $product->precaution=$request->precaution;
        $product->interaction=$request->interaction;
        $product->withdral=$request->withdral;
        $product->storage=$request->storage;
        $product->supply=$request->supply;
        $product->desc=$request->desc;
        $product->type=$request->type;
        $product->price=$request->price;
        $product->images=json_encode($data);
        $category->products()->save($product);
        
        Toastr::success('Added New Product Succesfully ', 'Product', ["positionClass" => "toast-top-right"]);
        return redirect('/products');
    }

    public function show(Request $request,$id){
        $categories= Category::get();
        $products=Product::get()->count();
        $product = Product::find($id);
      
        return view('product',compact('product','products','categories'));
    }
   
    function edit(Request $request,$id){
        $product = Product::find($id);
        $categories = Category::get();
        return view('backend.Product.edit',compact('product','categories'));
    }
    function update(Request $request,$id){
     
        $request->validate([
            'name'=>'required',
            'category'=>'required',
        ]);
        if($request->hasfile('products'))
        {
           $product= Product::find($id);
           foreach($request->file('products') as $image)
           {
               $name=$image->getClientOriginalName();
               $image->move(public_path().'/product_images/', $name);  
               $data[] = $name;  
           }
           foreach(json_decode($product->images) as $img ){
            if(File::exists(public_path('product_images/').$img)) {
                unlink(public_path('product_images/').$img);
            }
          }
           Product::where('id',$id)
                ->update([
                'name'=>$request->name,
                'category_id'=>$request->category,
                'compostion'=>$request->compostion,
                'indication'=>$request->indication,
                'dosage'=>$request->dosage,
                'contraindication'=>$request->contraindication,
                'effects'=>$request->effects,
                'others'=>$request->others,
                'precaution'=>$request->precaution,
                'interaction'=>$request->interaction,
                'withdral'=>$request->withdral,
                'storage'=>$request->storage,
                'supply'=>$request->supply,
                'desc'=>$request->desc,
                'type'=>$request->type,
                'price'=>$request->price,
                'images'=>json_encode($data)
        ]);
           

        }else{

            Product::where('id',$id)
                ->update([
                'name'=>$request->name,
                'category_id'=>$request->category,
                'compostion'=>$request->compostion,
                'indication'=>$request->indication,
                'dosage'=>$request->dosage,
                'contraindication'=>$request->contraindication,
                'effects'=>$request->effects,
                'others'=>$request->others,
                'precaution'=>$request->precaution,
                'interaction'=>$request->interaction,
                'withdral'=>$request->withdral,
                'storage'=>$request->storage,
                'supply'=>$request->supply,
                'desc'=>$request->desc,
                'type'=>$request->type,
                'price'=>$request->price,
        ]);
           
        }
        if ($pdf = $request->file('pdf')) {
            $product= Product::find($id);
            
            File::delete(public_path('pdfs/'. $product->pdf));
            
            $destinationPath = public_path('pdfs/');;
            $pdfPath = date('YmdHis') . "." . $pdf->getClientOriginalExtension();
         
            $pdf->move($destinationPath, $pdfPath);
          
            Product::where('id',$id)
          
                 ->update([
            'name'=>$request->name,
            'pdf'=>$pdfPath,
            'category_id'=>$request->category,
            'compostion'=>$request->compostion,
            'indication'=>$request->indication,
            'dosage'=>$request->dosage,
            'contraindication'=>$request->contraindication,
            'effects'=>$request->effects,
            'others'=>$request->others,
            'precaution'=>$request->precaution,
            'interaction'=>$request->interaction,
            'withdral'=>$request->withdral,
            'storage'=>$request->storage,
            'supply'=>$request->supply,
            'desc'=>$request->desc,
            'type'=>$request->type,
            'price'=>$request->price
        ]);
        
        }else{
          
            Product::where('id',$id)
            ->update([
                'name'=>$request->name,
                'category_id'=>$request->category,
                'compostion'=>$request->compostion,
                'indication'=>$request->indication,
                'dosage'=>$request->dosage,
                'contraindication'=>$request->contraindication,
                'effects'=>$request->effects,
                'others'=>$request->others,
                'precaution'=>$request->precaution,
                'interaction'=>$request->interaction,
                'withdral'=>$request->withdral,
                'storage'=>$request->storage,
                'supply'=>$request->supply,
                'desc'=>$request->desc,
                'type'=>$request->type,
                'price'=>$request->price
            ]);
            
        }

       
        Toastr::success('Product updated Succesfully ', 'Product', ["positionClass" => "toast-top-right"]);
        return redirect('/products');
    }
    function delete($id){
           $product= Product::find($id);
           if($product->images!=null){
              
                foreach(json_decode($product->images) as $img ){
                    if(File::exists(public_path('product_images/').$img)) {
                        unlink(public_path('product_images/').$img);
                    }
                }
           }
           if($product->pdf!=null){
            if(File::exists(public_path('pdfs/').$product->pdf)) {
                unlink(public_path('pdfs/').$product->pdf);
            }
           }
        Product::find($id)->delete();
        Toastr::success('Product deleted Succesfully ', 'Product', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }





    function viewPdf(Request $request,$id){
        $product= Product::find($id);
        if($product->pdf){
           
            return view('pdfView',compact('product'));
        }
        else{
            $pdf = App::make('dompdf.wrapper');
            $pdf->loadView('pdfView',compact('product'));
            return $pdf->stream();
        }
    }
    function Download(Request $request,$id){
        $product= Product::find($id);
        if($product->pdf){
            return response()->download(public_path('pdfs/').$product->pdf);
        }
        else{
            $pdf= PDF::loadView('pdfView',compact('product'));
            return $pdf->Download('product.pdf');
        }
    }
}