<?php

namespace ucrnews\Http\Controllers;

use \Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use ucrnews\Http\Requests\CreatePostRequest;
use ucrnews\Post;
use Validator;

class PostController extends Controller
{
    /**
     * Quedan aislados del pÃºblico los accesos que hacen
     * transacciones con la BD.
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Obtiene todas las publicaciones
     */
    public function index()
    {
        $posts = Post::all();
        return view('post.index', compact('posts'));
    }

    public function indexAll()
    {
        return Post::all();
    }

    /**
     * Muestra el formulario para crear posts
     * @return type
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     *
     * @param Request $request
     */
    public function store(CreatePostRequest $request)
    {
        $rules = [
            'title' => 'required|unique:posts|max:255',
            'content' => 'required',
            'photo' => 'required|image'
        ];
        $this->validate($request, $rules);

        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $newName = 'uc-'. uniqid(uniqid(), true) . '.' . $file->getClientOriginalExtension();

            $file->move('photos', $newName);
        } else {
            $newName = 'default_pic.jpg';
        }
        Post::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'photo' => $newName
        ]);

        return redirect()->route('posts.index');

    }

    /**
    * Devuelve un post a partir de un ID
    **/
    public function view($id)
    {
        return Post::find($id);
    }
    
    public function show($slug)
    {
        $post = Post::findBySlug($slug);
        return view('post.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('post.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required',
            'content' => 'required',
            'photo' => 'sometimes'
        ]);
//        dd($validation->fails());
//        if($validation->fails()){
//            return redirect()->back()->withErrors($validation,'errors');
//        }
//        dd($request->all());
//        $rules = [
//            'title' => 'required|unique:posts|max:255',
//            'content' => 'required',
//            'photo' => ''
//        ];
//        $this->validate($request, [
//            'title' => 'required|unique:posts|max:255',
//        ]);
        $post = Post::find($id);
        $post->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);
        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $file->move('photos', $post->photo);
            Post::find($id)->update([
                    'title' => $request->input('title'),
                    'content' => $request->input('content')
            ]);
        } else {
            Post::find($id)->update([
                    'title' => $request->input('title'),
                    'content' => $request->input('content')
            ]);
        }

//        return redirect()->route('posts.index');
        return \Redirect::route('posts.index');
    }

    public function destroy($id)
    {
        Post::destroy($id);
        return Redirect::route('posts.index');
    }
}
