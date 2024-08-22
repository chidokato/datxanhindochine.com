<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use App\Models\Category;
use App\Models\CategoryTranslation;
use App\Models\Post;
use App\Models\PostTranslation;
use App\Models\Images;
use App\Models\SectionTranslation;
use App\Models\SliderTranslation;
use App\Models\SettingTranslation;
use App\Models\ProvinceTranslation;

// $locale = App::currentLocale();

class HomeController extends Controller
{
    // function __construct()
    // {
        
    //     view()->share( [
            
    //     ]);
    // }

    public function index()
    {
        $locale = App::currentLocale();
        $setting = SettingTranslation::where('locale', $locale)->first();
        $category = CategoryTranslation::join('categories', 'categories.id', '=', 'category_translations.category_id')
            ->where('locale', $locale)->where('parent', 0)
            ->select('category_translations.*')->orderBy('categories.view', 'asc')->get();
        // end
        $slider = SliderTranslation::where('locale', $locale)->get();

        $Posts = PostTranslation::join('posts', 'posts.id', '=', 'post_translations.post_id')
            ->join('category_translations', 'category_translations.id', '=', 'post_translations.category_tras_id')
            ->join('categories', 'categories.id', '=', 'category_translations.category_id')
            ->select('post_translations.*', 'categories.slug as catslug')
            ->where('post_translations.locale', $locale)->where('posts.sort_by', 'Product')
            ->orderBy('post_translations.id', 'desc')->take('6')->get();

        
        $post_home = CategoryTranslation::where('locale', $locale)
            ->where('category_id', 44)
            ->first(); 

        

        $search_cat= CategoryTranslation::join('categories', 'categories.id', '=', 'category_translations.category_id')
            ->where('locale', $locale)->where('parent', '>', 0)->where('sort_by', 'Product')
            ->select('category_translations.*')->orderBy('categories.view', 'asc')->get();
        $search_province = ProvinceTranslation::where('locale', $locale)->get();

        return view('pages.home', compact(
            'category',
            'setting',
            'slider',
            'post_home',
            'search_cat',
            'search_province',
            'Posts',
        ));
    }

    public function about()
    {
        $locale = App::currentLocale();
        $setting = SettingTranslation::where('locale', $locale)->first();
        $category = CategoryTranslation::join('categories', 'categories.id', '=', 'category_translations.category_id')
            ->where('locale', $locale)->where('parent', 0)
            ->select('category_translations.*')->orderBy('categories.view', 'asc')->get();
        return view('pages.about', compact(
            'category',
            'setting',
        ));
    }

    public function contact()
    {
        $locale = App::currentLocale();
        $setting = SettingTranslation::where('locale', $locale)->first();
        $category = CategoryTranslation::join('categories', 'categories.id', '=', 'category_translations.category_id')
            ->where('locale', $locale)->where('parent', 0)
            ->select('category_translations.*')->orderBy('categories.view', 'asc')->get();
        return view('pages.contact', [
            'category'=>$category,
            'setting'=>$setting,
        ]);
    }

    public function sitemap()
    {
        $category = Category::all();
        $Post = PostTranslation::where('locale', 'vi')->get();
        return response()->view('sitemap', [
            'category' => $category,
            'Post' => $Post,
            ])->header('Content-Type', 'text/xml');
    }

    public function category($slug)
    {
        $locale = App::currentLocale();
        $setting = SettingTranslation::where('locale', $locale)->first();
        $category = CategoryTranslation::join('categories', 'categories.id', '=', 'category_translations.category_id')
            ->where('locale', $locale)->where('parent', 0)
            ->select('category_translations.*')->orderBy('categories.view', 'asc')->get();
        // end

        $data = CategoryTranslation::join('categories', 'categories.id', '=', 'category_translations.category_id')
            ->select('category_translations.*')
            ->where('slug', $slug)
            ->where('locale', $locale)->first();

        // cat_array
        $cat_array = [$data["id"]];
        $cates = CategoryTranslation::where('parent', $data["id"])->get();
        foreach ($cates as $key => $cate) {
            $cat_array[] = $cate->id;
        }
        // cat_array

        if ($data->category->sort_by == 'Product') {
            $post = PostTranslation::whereIn('category_tras_id', $cat_array)
                ->where('locale', $locale)
                ->orderBy('id', 'desc')->paginate(18);
            return view('pages.category', compact(
                'setting',
                'category',
                'data',
                'post'
            ));
        }elseif($data->category->sort_by == 'News'){
            $post = PostTranslation::whereIn('category_tras_id', $cat_array)
                ->where('locale', $locale)
                ->orderBy('id', 'desc')->paginate(7);
            return view('pages.news', compact(
                'category',
                'data',
                'post',
                'setting',
            ));
        }
    }

    public function post($catslug, $slug)
    {
        $locale = App::currentLocale();
        $setting = SettingTranslation::where('locale', $locale)->first();
        $category = CategoryTranslation::join('categories', 'categories.id', '=', 'category_translations.category_id')
            ->where('locale', $locale)->where('parent', 0)
            ->select('category_translations.*')->orderBy('categories.view', 'asc')->get(); //menu
        $post = PostTranslation::join('posts', 'posts.id', '=', 'post_translations.post_id')
            ->where('locale', $locale)
            ->select('post_translations.*')
            ->where('posts.slug', $slug)
            ->first();
        $related_post = PostTranslation::join('posts', 'posts.id', '=', 'post_translations.post_id')
            ->where('category_tras_id', $post->category_tras_id)
            ->where('locale', $locale)
            ->take(10)
            ->get();
        $Posthits = Post::find($post->Post->id);
        $Posthits->hits = $Posthits->hits + 1;
        $Posthits->save();
        if ($post->post->sort_by == 'Product') {
            $images = Images::where('post_id', $post->post->id)->get();
            $section = SectionTranslation::where('locale', $locale)->where('post_id', $post->post->id)->orderBy('view', 'asc')->get();
            return view('pages.project', compact(
                'setting',
                'category',
                'post',
                'images',
                'section',
                'catslug',
                'related_post',
            ));
        }elseif ($post->post->sort_by == 'News') {
            return view('pages.post', compact(
                'setting',
                'category',
                'post',
                'catslug',
                'related_post',
            ));
        }
    }
}
