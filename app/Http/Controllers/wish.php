<?php

namespace App\Http\Controllers;
use App\Models\wish;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class wishController extends Controller
{
    public function index($id,$page) {


        // return DB::table('products')->paginate(2);


        return DB::table('wishlist')->WHERE('userID','=',$id)->paginate($page);

        //baraye bargardandane faqat yek sotun az jadval :
        // return DB::table('products')->pluck('name');

    }
  

}

