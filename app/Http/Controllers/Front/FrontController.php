<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{

    public function index(Request $request)
    {
        $result['home_categories'] = DB::table('categories')
        ->where(['is_home'=>1])
        ->where(['status'=>1])
        ->get();

        foreach ($result['home_categories'] as $list) 
        {
            $result['home_categories_product'][$list->id]=
            DB::table('products')
            ->where(['status'=>1])
            ->where(['category_id'=>$list->id])
            ->get();

            foreach($result['home_categories_product'][$list->id] as $list1)
            {
                $result['home_product_attr'][$list1->id]=
                DB::table('product_attr')
                ->leftJoin('sizes','sizes.id','=','product_attr.size_id')
                ->leftJoin('colors','colors.id','=','product_attr.color_id')
                ->where(['product_attr.product_id'=>$list1->id])
                ->get();                
            }
        }

        // echo "<pre>";
        // print_r($result['home_product_attr'][$list1->id]);
        // die;
     
        return view('front.index',$result);
    }
}
