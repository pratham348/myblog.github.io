<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\blogdetail;
use App\Models\category;
use App\Models\feedback;
use App\Models\subscriber;


class BlogController extends Controller
{
    //
    public function getBlog()
    {
        $blog = blogdetail::WHERE('status',1)
                ->paginate(3);
        $category = category::all();
        return view('blog',['blog'=>$blog, 'category'=>$category]);
    }
    public function getCategory()
    {
        $category = category::all();
        return view('category',['category'=>$category]);
    }
    public function getNew()
    {
        $blog = blogdetail::orderByDesc('id')
                ->WHERE('status',1)
                ->paginate(3);
        return view('new',['blog'=>$blog]);
    }
    public function getCatDetail($id)
    {
        $cb = blogdetail::WHERE('category_id',$id)
                ->WHERE('status',1)
                ->paginate(3);
        return view('categoryDetail',['cb'=>$cb]);
    }
    public function SeeBlog($id)
    {
        $sblog = blogdetail::WHERE('id', $id)
                    ->get();
        return view('show',['sblog'=>$sblog]);
    }
   
    //About us
    public function showAbout()
    {
        return view('AboutUs');
    }
    //Feedback
    public function showFeedback()
    {
        return view('FeedbackUs');
    }
    //Insert Feedback
    public function insertFeedback(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'email' => 'required',
            'feedback' => 'required',
        ]);

        $feedback=new feedback;
        $feedback->name=$req->name;
        $feedback->email=$req->email;
        $feedback->feed_back=$req->feedback;
        $insert=$feedback->save();
        if(!$insert=0)
        {
            return View('FeedbackUs')->with('success', 'Feedback submitted Successfully');
        }
        else
        {
            return View('FeedbackUs')->with('fail', 'Feedback Not submitted');
        }
        // return view('FeedbackUs');
    }
    //Insert Subscriber
    public function insertSubscriber(Request $req)
    {
        $req->validate([
            'email'=>'required|email',
        ]);
        
        $sub = new subscriber;
        $sub->email=$req->email;
        $input=$sub->save();
        if (!$input=0) {
            return back()->with('success','Subscribe Successfuly');
        } else {
            return back()->with('fail','Something went wrong, try again later');
        }
        
    }

    //Search Bar
    public function search(Request $request)
    {
        //get the general information about the website
        //$website = General::query()->firstOrFail();

        $key = trim($request->get('q'));

        $posts = blogdetail::query()
            ->where('title', 'like', "%{$key}%")
            ->orWhere('description', 'like', "%{$key}%")
            ->orWhere('full_description', 'like', "%{$key}%")
            ->orderBy('created_at', 'desc')
            ->paginate(3);

        //get all the categories
        //$categories = Category::all();

        //get all the tags
       // $tags = Tag::all();

        //get the recent 5 posts
        $c_posts = category::query()
            ->where('name', 'like', "%{$key}%")
            ->orderBy('created_at', 'desc')
            ->get();

        return view('search', [
            'posts' => $posts,
            'key' => $key,
            'c_posts' => $c_posts
        ]);
    }

    
}
