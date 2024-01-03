<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $detail['data'] = Category::all();
        return view('admin/category',$detail);
    }
    public function manage_category(Request $request, $id='')
    {
        if ($id>0) 
        {
            $arr = Category::where(['id'=>$id])->get();

            $result['category_name'] = $arr['0']->category_name;
            $result['category_slug'] = $arr['0']->category_slug;

            $result['parent_category_id'] = $arr['0']->parent_category_id;
            $result['is_home'] = $arr['0']->is_home;
            $result['is_home_selected'] = "";
            if ($arr['0']->is_home == 1) 
            {
                $result['is_home_selected'] = "checked";
            }
            $result['category_image'] = $arr['0']->category_image;
            $result['id'] = $arr['0']->id;

             $result['par_category_id'] = DB::table('categories')->where('status',1)->where('id','!=',$id)->get();
        }
        else
        {
            $result['category_name'] ="";
            $result['category_slug'] ="";
            $result['parent_category_id'] = "";
            $result['is_home'] = "";
            $result['is_home_selected'] = "";
            $result['category_image'] = "";
            $result['id'] =0;

             $result['par_category_id'] = DB::table('categories')->where('status',1)->get();
        }        
       
        return view('admin/manage_category',$result);
    }

    public function manage_category_process(Request $request)
    {
        $request->validate([
            'category_image'=>'mimes:jpeg,png,jpg',
            'category_name'=>'required',
            'category_slug'=>'required|unique:categories,category_slug,'.$request->post('id')
        ]);
   
        if ($request->post('id')>0) 
        {
            $model = Category::find($request->post('id'));
            $msg = 'Category Updated';
        }
        else
        {
            $model = new Category();
            $msg = 'Category Inserted';
        }

        if ($request->hasfile('category_image')) 
        {
            if($request->post('id')>0) 
            {
                $PAImg = DB::table('categories')->where(['id'=>$request->post('id')])->get();
                if(Storage::exists('/public/media/category/'.$PAImg[0]->category_image)) 
                {
                    Storage::delete('/public/media/category/'.$PAImg[0]->category_image);
                }
            }

            $imag = $request->file('category_image');
            $ext = $imag->extension();
            $img_name = time().'.'.$ext;
            $imag->storeAs('/public/media/category',$img_name);
            $model->category_image = $img_name;
        }

        $model->category_name = $request->post('category_name');
        $model->category_slug = $request->post('category_slug');
        $model->parent_category_id = $request->post('parent_category_id');
        $model->is_home = 0;
        if ($request->post('is_home')!==null) 
        {
            $model->is_home = 1;   
        }     

        $model->save();
        $request->session()->flash('message',$msg);
        return redirect('admin/category');
    }

    public function status(Request $request,$status,$id)
    {
        $delete = Category::find($id);
        $delete->status = $status;
        $delete->save();
        $request->session()->flash('message','Category Status Changed');
        return redirect('admin/category');
    }

    public function delete(Request $request, $id)
    {
        $delete = Category::find($id);
        $delete->delete();
        $request->session()->flash('message','Category Deleted');
        return redirect('admin/category');
    }


}
