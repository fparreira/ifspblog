<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Tag;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;

class PostsAdminController extends Controller
{

    private $post;

    public function __construct(Post $p){
        $this->post = $p;
    }

    public function index(){

        $posts = $this->post->paginate(4);

        return view('admin.posts.index', compact('posts'));
    }

    public function create(){
        return view('admin.posts.create');
    }

    public function store(PostRequest $request){

        //dd($tagsID);
        //dd($tags);
        //dd($request->all());
        //dd($this->post->create($request->all()));
        $post = $this->post->create($request->all());
        $post->tags()->sync($this->getTagsId($request->tags));

        return redirect()->route('admin.posts.index');
    }

    public function edit($id){
        $post_alterar = $this->post->find($id);

        return view('admin.posts.edit', compact('post_alterar'));
    }

    public function update($id, PostRequest $request){
        $this->post->find($id)->update($request->all());

        $post = $this->post->find($id);

        $post->tags()->sync($this->getTagsId($request->tags));
        return redirect()->route('admin.posts.index');
    }

    public function destroy($id){
        $this->post->find($id)->delete();
        return redirect()->route('admin.posts.index');
    }

    private function getTagsId($tags){
        $tagList = array_filter(array_map('trim', explode(',', $tags)));
        $tagsID = [];

        foreach($tagList as $tagName){
            $tagsID[] = Tag::firstOrCreate(['name'=>$tagName])->id;
        }

        return $tagsID;
    }

    /*public function auth(){
        $user = \App\User::find(1);
        Auth::login($user);
    }*/

}
