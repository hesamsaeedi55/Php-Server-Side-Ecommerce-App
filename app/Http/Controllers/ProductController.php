<?php

namespace App\Http\Controllers;
use App\Models\Products;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($cat,$page) {


        // return DB::table('products')->paginate(2);


        return DB::table('products')->where('category_id_id','=',$cat)->paginate($page);

        //baraye bargardandane faqat yek sotun az jadval :
        // return DB::table('products')->pluck('name');

    }
    

    public function store(Request $request) {

        $request->validate([
            'brand_id' => 'required',
            'category_id_id' => 'required',
            'name' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'price' => 'required',
            'entity' => 'required',
            'image' => 'required',
            'image2' => 'required',
            'image3' => 'required',
            'available' => 'required'

        ]);

        return Products::create($request->all());

    }


    public function find(Request $request,$id) {

        $product = Products::find($id);

        return $product;
    }

    public function update(Request $request,$id) {
        $product = Products::find($id);
        $product->update($request->all());
        return $product;
    }

    public function destroy(Request $request,$id) {
        return Products::destroy($id);
    }

    public function show() {
        return Products::get();
    }

    public function showbyid($id) {
        return Products::find($id);
    }

    public function reduce($id) {

        return DB::table('products')->WHERE('id',$id)->WHERE('entity','<>',0)->decrement('entity', 1);

    }

    public function search($name,$page) {

        return DB::table('products')->where('name','like','%'.$name.'%')->simplePaginate($page);
        
    }

    public function purchase(Request $request) {

       
        $request->validate ([
            
            'userID' => 'required',
            'productID' => 'required',
            'name' => 'required',
            'image' => 'required',
            'price' => 'required'

        ]);

            $query = DB::table('purchaseditems')->insert([

                'userID'=>$request->input('userID'),
                'productID'=>$request->input('productID'),
                'name'=>$request->input('name'),
                'image'=>$request->input('image'),
                'price'=>$request->input('price')
            ]);
           

        
        }

        public function wishlist(Request $request) {

       
            $request->validate ([
                
                'userID' => 'required',
                'productID' => 'required',
                'name' => 'required',
                'image' => 'required',
                'price' => 'required'
    
            ]);
    
                $query = DB::table('wishlist')->insert([
    
                    'userID'=>$request->input('userID'),
                    'productID'=>$request->input('productID'),
                    'name'=>$request->input('name'),
                    'image'=>$request->input('image'),
                    'price'=>$request->input('price')
                ]);
               
    
            
            }
            public function wishlistid($uid,$pid) {

                return DB::table('wishlist')->WHERE('userID',$uid)->WHERE('productID',$pid)->get();
        
            }

            public function wishlistshow($id,$page) {
                return DB::table('wishlist')->where('userID','=',$id)->paginate($page);

            }
    

}

