<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Storage;

class BrandController extends Controller
{
    public function index()
    {
        $detail['data'] = Brand::all();
        return view('admin/brand',$detail);
    }
    public function manage_brand(Request $request, $id='')
    {
        if ($id>0) 
        {
            $arr = Brand::where(['id'=>$id])->get();

            $result['name'] = $arr['0']->name;
            $result['image'] = $arr['0']->image;
            $result['is_home'] = $arr['0']->is_home;
            $result['is_home_selected'] = "";
            if ($arr['0']->is_home == 1) 
            {
                 $result['is_home_selected'] = "checked";
            }
            $result['id'] = $arr['0']->id;
        }
        else
        {
            $result['name'] ="";
            $result['image'] ="";
            $result['is_home'] ="";
            $result['is_home_selected'] ="";
            $result['id'] =0;
        }
        return view('admin/manage_brand',$result);
    }

    public function manage_brand_process(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:brands,name,'.$request->post('id'),
        ]);
   
        if ($request->post('id')>0) 
        {
            $model = Brand::find($request->post('id'));
            $msg = 'Brand Updated';
        }
        else
        {
            $model = new Brand();
            $msg = 'Brand Inserted';
        }

        if ($request->hasfile('image')) 
        {
            if ($request->post('id')>0) 
            {
                $braImg = DB::table('brands')->where(['id'=>$request->post('id')])->get();
                if (Storage::exists('/public/media/brand/'.$braImg[0]->image)) 
                {
                    Storage::delete('/public/media/brand/'.$braImg[0]->image);
                }
            }
            $Ima = $request->file('image');
            $ext = $Ima->extension();
            $img_name = time().'.'.$ext;
            $Ima->storeAs('/public/media/brand',$img_name);
            $model->image = $img_name;
        }
        $model->is_home = 0;
        if ($request->post('is_home')!==null) 
        {
            $model->is_home = 1;
        }
        $model->name = $request->post('name');
        $model->save();
        $request->session()->flash('message',$msg);
        return redirect('admin/brand');
    }

    public function status(Request $request, $status, $id)
    {
        $delete = Brand::find($id);
        $delete->status = $status;
        $delete->save();
        $request->session()->flash('message','Status Changed Successfull');
        return redirect('admin/brand');
    }

    public function delete(Request $request, $id)
    {
        $delete = Brand::find($id);
        $delete->delete();
        $request->session()->flash('message','Brand Deleted');
        return redirect('admin/brand');
    }
}
