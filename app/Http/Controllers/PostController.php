<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\Outcome;
use App\Models\Post;
use App\Models\Image;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('posts.posts')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $activities = Activity::orderBy('name')->get();
        $outcomes = Outcome::orderBy('name')->get();

        return view('posts.posts-create')->with('activities', $activities)->with('outcomes', $outcomes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = $request->validate([

            'description' => 'required',
            'activity_id' => 'required',
            'cover_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1999',
            'title' => 'required|max:255',
            'image' => 'mimes:jpeg,png,jpg,gif,svg',
       
        ]);

        //Save Post
        $post= new Post;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->activity_id = $request->activity_id;

        if($request->hasFile('cover_image')) {

            $coverImageToStore = time() . '-' . $request->title . '.' . $request->cover_image->getClientOriginalExtension();

        // Upload Image
            $path = $request->cover_image->storeAs('public/images', $coverImageToStore);

        } else {

        //if no image

            $coverImageToStore = 'noimage.jpg';

        };

        // Save the image name
        $post->cover_image = $coverImageToStore;

        $post->save();

        //pivot table (attach?)

        $post->outcomes()->sync($request->outcomes, false);

        //save post images
        
        if ($request->hasFile('image')) {

            $files = $request-> file('image');

            foreach ($files as $file) {
                
                $imageName  = time() . '-' . $request->title . '.' . $file->getClientOriginalName();
                $path2 = $file->storeAs('public/images', $imageName);
                $image = Image::create ([
                    'image' => $imageName,
                    'post_id' => $post->id,
                ]);
            }
        
        }

        //Return redirect
        return redirect('dashboard/posts')->with('status', 'Post has been added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Post::findOrFail($id);
        $activities = Activity::orderBy('name')->get();
        $outcomes = Outcome::orderBy('name')->get();
        $selectedOutcomes = $post->outcomes;
     

        return view('posts.posts-edit')->with('post', $post)->with('activities', $activities)->with('outcomes', $outcomes)->with('selectedOutcomes', $selectedOutcomes);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
