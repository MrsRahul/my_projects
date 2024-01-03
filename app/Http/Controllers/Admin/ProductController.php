<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Storage;

class ProductController extends Controller
{
    public function index()
    {
        $product['data'] = Product::all();
        return view('admin/product',$product);
    }

    public function manage_product(Request $request, $id='')
    {

        if ($id>0) 
        {
            $arr = Product::where(['id'=>$id])->get();
            $result['category_id'] = $arr['0']->category_id;
            $result['name'] = $arr['0']->name;
            $result['slug'] = $arr['0']->slug;
            $result['image'] = $arr['0']->image;
            $result['brand'] = $arr['0']->brand;
            $result['model'] = $arr['0']->model;
            $result['short_desc'] = $arr['0']->short_desc;
            $result['desc'] = $arr['0']->desc;
            $result['keywords'] = $arr['0']->keywords;
            $result['technical_specification'] = $arr['0']->technical_specification;
            $result['uses'] = $arr['0']->uses;
            $result['warranty'] = $arr['0']->warranty;
            $result['lead_time'] = $arr['0']->lead_time;
            $result['tax_id'] = $arr['0']->tax_id;
            $result['is_promo'] = $arr['0']->is_promo;
            $result['is_featured'] = $arr['0']->is_featured;
            $result['is_discounted'] = $arr['0']->is_discounted;
            $result['is_tranding'] = $arr['0']->is_tranding ;

            $result['id'] = $arr['0']->id;
            $result['productAttrArr'] = DB::table('product_attr')->where(['product_id'=>$id])->get();
        }
        else
        {
            $result['category_id'] = "";
            $result['name'] = "";
            $result['slug'] = "";
            $result['image'] = "";
            $result['brand'] = "";
            $result['model'] = "";
            $result['short_desc'] = "";
            $result['desc'] = "";
            $result['keywords'] = "";
            $result['technical_specification'] = "";
            $result['uses'] = "";
            $result['warranty'] = "";
            $result['lead_time'] = "";
            $result['tax_id'] = "";
            $result['is_promo'] = "";
            $result['is_featured'] = "";
            $result['is_discounted'] = "";
            $result['is_tranding'] = "";
            $result['id'] = 0;
            
            $result['productAttrArr'][0]['id']="";
            $result['productAttrArr'][0]['product_id']="";
            $result['productAttrArr'][0]['sku']="";
            $result['productAttrArr'][0]['attr_image']="";
            $result['productAttrArr'][0]['mrp']="";
            $result['productAttrArr'][0]['price']="";
            $result['productAttrArr'][0]['qty']="";
            $result['productAttrArr'][0]['size_id']="";
            $result['productAttrArr'][0]['color_id']="";
        }
        
        $result['category'] = DB::table('categories')->where('status',1)->get();
        $result['sizes'] = DB::table('sizes')->where('status',1)->get();
        $result['colors'] = DB::table('colors')->where('status',1)->get();
        $result['taxs'] = DB::table('taxs')->where('status',1)->get();
        return view('admin/manage_product',$result);
    }

    public function manage_product_process(Request $request)
    {
        // echo "<pre>";
        // print_r($request->post());
        // die;
        if ($request->post('id')>0) 
        {
            $images = ""; 
        }
        else
        {
            $images = "required"; 
        }

        $request->validate([
            'name'=>'required',
            'slug'=>'required|unique:products,slug,'.$request->post('id'),
            'image'=>$images,
            'brand'=>'required',
            'model'=>'required',
            'short_desc'=>'required',
            'attr_image.*'=>'mimes:jpeg,png,jpg',
        ]);

        $paidArr = $request->post('paid');
        $skuArr = $request->post('sku');
        $mrpArr = $request->post('mrp');
        $priceArr = $request->post('price');
        $qtyArr = $request->post('qty');
        $size_idArr = $request->post('size_id');
        $color_idArr = $request->post('color_id');

        foreach ($skuArr as $key => $value) 
        {
            $check = DB::table('product_attr')->where('sku','=',$skuArr[$key])->where('id','!=',$paidArr[$key])->get();
            if (isset($check[0])) 
            {
                $request->session()->flash('sku_error',$skuArr[$key].'SKU already Used');
                return redirect(request()->headers->get('referer'));
            }
        }

        if($request->post('id')>0) 
        {
            $modal = Product::find($request->post('id'));
            $msg = "Product Updated";
        }
        else
        {
            $modal= new Product();
            $msg = "Product Inserted";
        }

        if ($request->hasfile('image')) 
        {
            if($request->post('id')>0) 
            {
                $PAImg = DB::table('products')->where(['id'=>$request->post('id')])->get();
                if(Storage::exists('/public/media/'.$PAImg[0]->image)) 
                {
                    Storage::delete('/public/media/'.$PAImg[0]->image);
                }
            }
            $imag = $request->file('image');
            $ext = $imag->extension();
            $img_name = time().'.'.$ext;
            $imag->storeAs('/public/media',$img_name);
            $modal->image = $img_name;
        }

        $modal->category_id = $request->post('category_id');
        $modal->name = $request->post('name');
        $modal->slug = $request->post('slug');
        $modal->brand = $request->post('brand');
        $modal->model = $request->post('model');
        $modal->short_desc = $request->post('short_desc');
        $modal->desc = $request->post('desc');
        $modal->keywords = $request->post('keywords');
        $modal->technical_specification = $request->post('technical_specification');
        $modal->uses = $request->post('uses');
        $modal->warranty = $request->post('warranty');
        $modal->lead_time = $request->post('lead_time');
        $modal->tax_id = $request->post('tax_id');
        $modal->is_promo = $request->post('is_promo');
        $modal->is_featured = $request->post('is_featured');
        $modal->is_discounted = $request->post('is_discounted');
        $modal->is_tranding = $request->post('is_tranding');
        //$modal->status = 1;
        $modal->save();
        $pid =$modal->id;

        // product attr start
        $paidArr = $request->post('paid');
        $skuArr = $request->post('sku');
        $mrpArr = $request->post('mrp');
        $priceArr = $request->post('price');
        $qtyArr = $request->post('qty');
        $size_idArr = $request->post('size_id');
        $color_idArr = $request->post('color_id');

        foreach ($skuArr as $key => $value) 
        {
            $productAttrArr = [];
            $productAttrArr['product_id'] = $pid;
            $productAttrArr['sku'] = $skuArr[$key];
            $productAttrArr['mrp'] = $mrpArr[$key];
            $productAttrArr['price'] = $priceArr[$key];
            $productAttrArr['qty'] = $qtyArr[$key];
            //$productAttrArr['attr_image'] = 1;
            if($size_idArr[$key] =="") 
            {
                $productAttrArr['size_id'] = 0;
            }
            else
            {
                $productAttrArr['size_id'] = $size_idArr[$key];
            }

            if ($color_idArr[$key] == "") 
            {
                $productAttrArr['color_id'] = 0;
            }
            else
            {
                $productAttrArr['color_id'] = $color_idArr[$key];
            }

            //$productAttrArr['image'] = $skuArr[$key];
            $rand = rand('111111111', '999999999');
            if ($request->hasfile("attr_image.$key")) 
            {
                if($paidArr[$key]!="") 
                {
                    $PAImg = DB::table('product_attr')->where(['id'=>$paidArr[$key]])->get();
                    if(Storage::exists('/public/media/'.$PAImg[0]->attr_image)) 
                    {
                        Storage::delete('/public/media/'.$PAImg[0]->attr_image);
                    }
                }
                $attr_image = $request->file("attr_image.$key");
                $ext = $attr_image->extension();
                $image_name = $rand.'.'.$ext;
                $request->file("attr_image.$key")->storeAs('/public/media',$image_name);
                $productAttrArr['attr_image'] = $image_name;
            }

            if($paidArr[$key]!="") 
            {
                DB::table('product_attr')->where(['id'=>$paidArr[$key]])->update($productAttrArr);
            }
            else
            {
                DB::table('product_attr')->insert($productAttrArr);
            }
 
  
 
        }
        
        //product attr end
        $request->session()->flash('message',$msg);
        return redirect('admin/product');
    }

    public function product_attr_delete(Request $request, $paid, $pid)
    {
        $PAImg = DB::table('product_attr')->where(['id'=>$paid])->get();
        if(Storage::exists('/public/media/'.$PAImg[0]->attr_image)) 
        {
            Storage::delete('/public/media/'.$PAImg[0]->attr_image);
        }
        DB::table('product_attr')->where(['id'=>$paid])->delete();
        return redirect('admin/product/manage_product/'.$pid);
    }

    public function status(Request $request, $status, $id)
    {
        $delete = Product::find($id);
        $delete->status = $status;
        $delete->save();
        $request->session()->flash('message','Status Changed Successfull');
        return redirect('admin/product');
    }

    public function delete(Request $request, $id)
    {
        $delete = Product::find($id);
        $delete->delete();
        $request->session()->flash('message','Product Deleted');
        return redirect('admin/product');
    }
}
