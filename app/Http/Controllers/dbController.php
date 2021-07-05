<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\blogdetail;
use App\Models\category;
use App\Models\feedback;
use App\Models\subscriber;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class dbController extends Controller
{
    
    public function addBlog(Request $req)
    {
        $req->validate([
            'bImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        //make image name
        $imageName = time().'.'.$req->bImage->extension(); 
         //upload image in publoc/images
        //$req->image->move(public_path('images'), $imageName);
        //upload image in storage/app/images folder
        $req->bImage->storeAs('images', $imageName);

        $blogdetail=new blogdetail;
        $blogdetail->title=$req->bTitle;
        $blogdetail->description=$req->bDescriptionn;
        $blogdetail->full_description=$req->bFullDes;
        $blogdetail->category_id=$req->bCategory;
        $blogdetail->image=$imageName;
        $blogdetail->youtube=$req->youtube;
        $blogdetail->instagram=$req->instagram;
        $blogdetail->facebook=$req->facebook;
        $blogdetail->tweet=$req->tweet;
           // print_r($blogdetail);
        $insert=$blogdetail->save();
        if(!$insert=0)
        {
            return redirect('add')->with('success', 'Blog added Successfully');
           //echo "sucess";
        }
        else
        {
            return redirect('add')->with('fail', 'Blog Not added');
            //echo "error";
        }
        
    }
    public function addCategory(Request $req)
    {

        $category=new category;
        $category->name=$req->bCategory;
        $insert=$category->save();
        if(!$insert=0)
        {
            return redirect('category')->with('success', 'Category added Successfully');
        }
        else
        {
            return redirect('category')->with('fail', 'Category Not added');
        }
        
    }
    function getData()
    {
        /*$collection = blogdetail::join('categories','categories.id','=','blogdetails.category_id')
        ->select('blogdetails.*','categories.name')
        ->where('categories.id','=','blogdetails.category_id')
        ->get(['categories.name']);*/
      //  $collection = blogdetail::all();
       $collection = blogdetail::leftjoin('categories', 'blogdetails.id', '=', 'categories.id')
               ->select('blogdetails.*', 'categories.name')
               ->paginate(5);
        //echo $collection;
       /* $collection = blogdetail::leftjoin('categories', 'blogdetails.id', '=', 'categories.id')
                    ->select('blogdetails.id','blogdetails.title','blogdetails.description','blogdetails.image','blogdetails.full_description','blogdetails.tweet','blogdetails.status', 'categories.name')
                    ->get();*/
       return view('viewBlog',['collection'=>$collection]);
    }

    function getCategoryData()
    {
        $coll = category::paginate(5);
       return view('viewCategory',['coll'=>$coll]);
    }
    function getDashboard()
    {
       $cat = category::count();
       $bg = blogdetail::all();
       $sub = subscriber::count();
       //$bdetails = blogdetail::all();
       return view('dashboard',['cat'=>$cat, 'bg'=>$bg, 'sub'=>$sub]);
    }
    function getCategory()
    {
        $get_category = category::all(['id','name']);
        return view('addBlog',['categories'=>$get_category]);
       // return view('add',compact('category'));
    }

    function showCategory()
    {
        $show_category = category::all(['id','name']);
        return view('addBlog',['categories'=>$show_category]);
       // return view('add',compact('category'));
    }

    function getSubscriber()
    {
        $sub = subscriber::paginate(5);
        return view('viewSubscribers',['sub'=>$sub]);

    }
    function getFeedback()
    {
        $feed = feedback::paginate(5);
        return view('viewFeedback',['feed'=>$feed]);

    }
    function sendNotification()
    {

    }
    function changePassword(Request $request)
    {
        $request->validate([
            'npassword'=>'required_with:cPassworrd|same:cPassworrd|min:3|max:16',
            'cPassworrd'=>'required|min:3|max:16'
        ]);
        
        $email=$request->session()->get('email');
        $user_info = User::where('email','=',$email)
                        ->update(['password'=>Hash::make($request->npassword)]);

        if (!$user_info) 
        {
            return back()->with('fail','Somthing went wrong in passwor change');
        } 
        else 
        {
            return back()->with('success','Password change successfully');
            
        }
        

    }
    function getDetail($id)
    {
        $blog = blogdetail::WHERE('id', $id)
                    ->get();
        return view('viewIndetail',['blog'=>$blog]);
    }
    function editBlog($id)
    {
        $blog = blogdetail::WHERE('id', $id)
                    ->get();
        $get_category = category::all(['id','name']);
        return view('editBlog',['blog'=>$blog,'categories'=>$get_category]);
    }
    public function updateBlog(Request $req)
    {
        $req->validate([
            'bImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        //make image name
        $imageName = time().'.'.$req->bImage->extension(); 
        $req->bImage->storeAs('images', $imageName);
        //$id = dd($req->input('id'));
        $blog = blogdetail::WHERE('id', $req->id)
                    ->Update(['title'=>$req->bTitle,
                    'category_id'=>$req->bCategory,
                    'description'=>$req->bDescriptionn,
                    'image'=>$imageName,
                    'full_description'=>$req->bFullDes,
                    'youtube'=>$req->youtube,
                    'instagram'=>$req->instagram,
                    'facebook'=>$req->facebook,
                    'tweet'=>$req->tweet]);
        if (!$blog) 
        {
            return back()->with('fail','Oops something wents to wrong!!!!');
        }
        else
        {
            return back()->with('success','Blog Updated Successfully!!!!');
        }
        
        //return view('viewIndetail',['blog'=>$blog]);
    }
    function deleteBlog($id)
    {
        $blog = blogdetail::WHERE('id', $id)
                    ->delete();
        return back()->with('success','Blog deleted successfully!!!');
        //return view('viewIndetail',['blog'=>$blog]);
    }
    function inactiveStatus($id)
    {
        $blog = blogdetail::WHERE('id', $id)
                    ->update(['status'=>0]);
        return back();
    }
    function activeStatus($id)
    {
        $blog = blogdetail::WHERE('id', $id)
                ->update(['status'=>1]);
        return back();
    }
}
