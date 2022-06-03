<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Product;

class ProductsController extends Controller
{

    public function show($id){
        return view('products.show', [
            'products' => \App\Models\Product::find($id),
            'users' => \App\Models\User::all(),
        ]);
    }

    public function index(){
        return view('products.index',[
            'products' => \App\Models\Product::all(),
    ]);
    }


    //Profile functies

    public function Authprofile(){
        return view('products.authprofile',[
            'users' => \App\Models\User::find(Auth::id()),
            'products' => \App\Models\Product::find(Auth::id()),
            'allproducts' => \App\Models\Product::all(),
    ]);
    }   
        
    public function profile($id){
        return view('products.profile',[
            'users' => \App\Models\User::find($id),
            'allproducts' => \App\Models\Product::all(),
    ]);
    }

    //Product create functies


    public function create(){
        return view('products.create',[
            'products_categorie' => \App\Models\Categorie::all(),
    ]);
    }

    public function store(Request $request, \App\Models\Product $products){
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048',
        ]);

        $newImageName = time() . '-' . $request->name . '.' . $request->image->extension();
        $request->image->move(public_path('image'), $newImageName);
        $products->user_id = Auth::id();
        $products->name = $request->input('name');
        $products->categorie = $request->input('categorie');
        $products->description = $request->input('description');
        $products->image = "/image/" . $newImageName;
    
        try{
            $products->save();
            return redirect('/');
    
        }
        catch(Exception $e){
            return redirect('/products/create');
        }
    
        return redirect('/products/create');
    }



    // Leen functies


    public function lening($id){
        $products = Product::find($id);
        $products->lenen = "uitgeleend";
        $products->lener = Auth::id();

        $products->save();
        return redirect('/');
    }



    // Accepeteren functies


    public function accept($id){
        $products = Product::find($id);

        if($products->user_id == Auth::id() && $products->lenen == "terugkerend"){
            return view('products.accept', [
                'products' => \App\Models\Product::find($id),
                'users' => \App\Models\User::all(),
            ]);
        }
        else{
            return redirect('/');
        }

    }

    public function accepteren(Request $request,\App\Models\Review $review, $id){
        $products = Product::find($id);
        $review->review = $request->input("review");
        $review->user_id = $products->lener;
        if ($products->lenen =="terugkerend"){
            $products->lener = NULL;
            $products->lenen = "uit te lenen";
        }
        if($review->save()){
            $products->save();
            return redirect('/');
        }else{
            return redirect("/profile");
        }
    }

    

    // Terugkeren van product na een bepaalde tijd (default=60 seconden)
    
    public function terugkeren(){
        $products = Product::all();

        foreach($products as $pro){
            $beginTijd = $pro->updated_at;
            $unixBeginTijd = strtotime($beginTijd);
            $verlopenTijd = $unixBeginTijd + $pro->uitleenTijd;
            if($pro->lenen == "uitgeleend" && time() > $verlopenTijd){
                $pro->lenen = "terugkerend";
            }
            $pro->save();

        }
    }




 
}


