<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\user\category;
use App\Model\user\tag;
use App\Model\user\post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        //
        $posts = post::join('users','users.id','=','posts.posted_by')->select('posts.*','users.name as name')->get();
        return view('admin.post.show',compact('posts'));
    }


    public function create()
    {
        //
        $categories = category::all();
        $tags = tag::all();
        return view('admin.post.create',compact('categories','tags'));
    }


    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'feature_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'title'=>'required | unique:posts',
            'subtitle'=>'required',
            'body'=>'required',
        ]);



        $post = new post;
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->subtitle = $request->subtitle;

        //if user can publish post
        if(Auth::user()->can('posts.viewAny'))
        {
            $post->status = $request->status;
        }

        //save image
        if($request->hasFile('image'))
        {

            $post->image = $request->image->store('public/files/blog_images');

        }

        //if user can feature post
        if(Auth::user()->can('posts.view'))
        {
            $post->featured = $request->featured;
            if($request->hasFile('feature_image'))
            {
                $post->feature_image = $request->feature_image->store('public/files/blog_images');
            }
        }



        $post->meta_title = $request->meta_title;
        $post->meta_author = $request->meta_author;
        $post->meta_description = $request->meta_description;
        $post->meta_keywords = $request->meta_keywords;
        $post->body = $request->body;
        $post->keywords = $request->title .' '. $request->subtitle .' '. strip_tags(trim($request->body));
        $post->posted_by = Auth::user()->id;
        $post->save();
        $post->tags()->sync($request->tags);
        $post->categories()->sync($request->categories);

        return redirect(route('post.index'))->with('success','Post created successfully');

    }

    public function edit($id)
    {
        //

        if(Auth::user()->can('posts.update'))
        {
            $post = post::with('tags','categories')->where('id',$id)->first();
            $tags = tag::all();
            $categories = category::all();
            return view('admin.post.edit',compact('post','tags','categories'));
        }

        return redirect(url('admin/unauthorised'));


    }


    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'title'=>'required',
            'subtitle'=>'required',
            'body'=>'required',
        ]);

        $post = post::find($id);

        //logic if new default image is uploaded
        if($request->hasFile('image')){

            //delete old image
            $old_d_i = 'storage/files/blog_images/'.substr($request->c_default_image,25);
            $file = substr($request->c_default_image,25);
            if(file_exists($old_d_i) && strlen($file)>0)
            {
                unlink($old_d_i);
            }
            //save new to database
            $post->image = $request->image->store('public/files/blog_images');

        }


        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->subtitle = $request->subtitle;

        //if user can publish post
        if(Auth::user()->can('posts.viewAny'))
        {
            $post->status = $request->status;
        }

        //if user can feature post
        if(Auth::user()->can('posts.view'))
        {
            $post->featured = $request->featured;
            //logic if new feature image is uploaded
            if($request->hasFile('feature_image'))
            {
                //delete old image
                $old_f_i = 'storage/files/blog_images/'.substr($request->c_feature_image,25);
                $file = substr($request->c_feature_image,25);
                if(file_exists($old_f_i)  && strlen($file)>0)
                {
                    unlink($old_f_i);
                }
                //save new to database
                $post->feature_image = $request->feature_image->store('public/files/blog_images');
            }
        }





        $post->meta_title = $request->meta_title;
        $post->meta_author = $request->meta_author;
        $post->meta_description = $request->meta_description;
        $post->meta_keywords = $request->meta_keywords;
        $post->body = $request->body;
        $post->keywords = $request->title .' '. $request->subtitle .' '. strip_tags(trim(preg_replace('/\s+/',' ', $request->body)));
        $post->tags()->sync($request->tags);
        $post->categories()->sync($request->categories);
        $post->save();

        return redirect()->back()->with('success','Post updated successfully');

    }


    public function destroy($id)
    {
        //
        post::where('id',$id)->delete();
        return redirect()->back()->with('success','Post deleted successfully');
    }
}
