<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
// use Request;
use Session;
use Illuminate\Http\Request;
use Image;
use File;
use App\Models\Category;
use App\Models\Images;
use App\Models\CategoryTranslation;
use App\Models\ProvinceTranslation;
use App\Models\DistrictTranslation;
use App\Models\WardTranslation;
use App\Models\SectionTranslation;

class AjaxController extends Controller
{
    public function change_cate_lang($id)
    {
        $data = CategoryTranslation::where('category_id',$id)->get();
        foreach ($data as $key => $value) {
    		echo '<input value="'.$value->id.'" name="category_id:'.$value->locale.'" type="hidden">';
        }
    }

    public function change_province($id)
    {
        $Province = ProvinceTranslation::where('province_id',$id)->first();
        $data = DistrictTranslation::where('province_id',$Province->id)->get();
        echo '<option value="">...</option>';
        foreach ($data as $key => $value) {
    		echo '<option value="'.$value->district_id.'">'.$value->name.'</option>';
        }
    }
    public function change_province_lang($id)
    {
        $data = ProvinceTranslation::where('province_id',$id)->get();
        foreach ($data as $key => $value) {
            echo '<input value="'.$value->id.'" name="province_id:'.$value->locale.'" type="hidden">';
        }
    }

    public function change_district($id)
    {
        $District = DistrictTranslation::where('district_id',$id)->first();
        $data = WardTranslation::where('district_id',$District->id)->get();
        echo '<option value="">...</option>';
        foreach ($data as $key => $value) {
            echo '<option value="'.$value->ward_id.'">'.$value->name.'</option>';
        }
    }
    public function change_district_lang($id)
    { 
        $data = DistrictTranslation::where('district_id',$id)->get();
        foreach ($data as $key => $value) {
            echo '<input value="'.$value->id.'" name="district_id:'.$value->locale.'" type="hidden">';
        }
    }
    public function change_ward_lang($id)
    { 
        $data = WardTranslation::where('ward_id',$id)->get();
        foreach ($data as $key => $value) {
            echo '<input value="'.$value->id.'" name="ward_id:'.$value->locale.'" type="hidden">';
        }
    }

    public function change_SortBy($sort_by)
    {
        $locale = Session::get('locale');
        $data = CategoryTranslation::join('categories', 'categories.id', '=', 'category_translations.category_id')
            ->where('locale', $locale)->where('sort_by',$sort_by)->where('parent','0')->get();
            echo '<option value=""> --Root-- </option>';
        foreach ($data as $key => $value) {
            echo '<option value="'.$value->id.'">'.$value->name.'</option>';
        }
    }
    public function change_SortBy_parent($sort_by)
    {
        echo '<input type="hidden" value="0" name="category:en">
            <input type="hidden" value="0" name="category:vi">
            <input type="hidden" value="0" name="category:cn">';
    }

    public function change_parent($id)
    {
        $locale = Session::get('locale');
        $data = CategoryTranslation::where('category_id',$id)->get();
        foreach ($data as $key => $value) {
            echo '<input value="'.$value->id.'" type="hidden" name="category:'.$value->locale.'">';
        }
    }

    public function update_category_view($id,$view)
    {
        $data = Category::find($id);
        $data->view = $view;
        $data->save();
    }

    public function del_img_detail($id)
    {
        $data = Images::find($id);
        if(File::exists('data/product/detail/'.$data->img)) { File::delete('data/product/detail/'.$data->img);} // xóa ảnh cũ
        $data->delete();
    }

    public function del_section($id)
    {
        $data = SectionTranslation::where('section_id', $id)->get();
        foreach ($data as $key => $value) {
            
            SectionTranslation::find($value->id)->delete();
        }
    }
}
