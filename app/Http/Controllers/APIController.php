<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\blogdetail;
use Illuminate\Support\Facades\Validator;

class APIController extends Controller
{
    public function getBlog()
    {
        return blogdetail::all();
    }
    public function getBlogId($id)
    {
        return blogdetail::find($id);
    }
    public function putBlog(Request $req)
    {
        //Validation
        $rules=array(
            'title'=>'required|min:2',
            'description'=>'required|min:3',
            'full_description'=>'required|min:10',
            'category_id'=>'required',
            'image'=>'required'
        );
        $validator=Validator::make($req->all(),$rules);
        if($validator->fails())
        {
            return response()->json($validator->errors(),401);
           // return $validator->errors();
        }
        else
        {
            $blogdetail=new blogdetail;
            $blogdetail->title=$req->title;
            $blogdetail->description=$req->description;
            $blogdetail->full_description=$req->full_description;
            $blogdetail->category_id=$req->category_id;
            $blogdetail->image=$req->image;
            $blogdetail->youtube=$req->youtube;
            $blogdetail->instagram=$req->instagram;
            $blogdetail->facebook=$req->facebook;
            $blogdetail->tweet=$req->tweet;
            // print_r($blogdetail);
            $insert=$blogdetail->save();
            if(!$insert)
            {
                return ["Result"=>"Error on insert data"];
            }
            else
            {
                return ["Result"=>"Data has been saved"];
            }
        }
    }
    //Delete record
    public function BlogDelete($id){
        $result=blogdetail::find($id)->delete();
        if(!$result)
        {
            return ["data"=>"Record not Deleted"];
        }
        else
        {
            return ["data"=>"Record Deleted"];
        }
    }
    //Update Record
    public function BlogUpdate(Request $req)
    {
        $blog = blogdetail::find($req->id);
        $blog->title=$req->title;
        $blog->description=$req->description;
        $blog->full_description=$req->full_description;
        $blog->category_id=$req->category_id;
        $blog->image=$req->image;
        $blog->youtube=$req->youtube;
        $blog->instagram=$req->instagram;
        $blog->facebook=$req->facebook;
        $blog->tweet=$req->tweet;
           // print_r($blog);
        $insert=$blog->save();
        if(!$insert)
        {
            return ["Result"=>"Error on Update data"];
        }
        else
        {
            return ["Result"=>"Data has been update"];
        }
    }
    //Search Recxord
    public function search($name)
    {
        return blogdetail::Where("title","like","%{$name}%")
                ->orWhere("description","like","%{$name}%")
                ->get();
    }
    
}
