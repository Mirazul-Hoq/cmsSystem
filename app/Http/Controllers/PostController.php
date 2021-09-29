<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\PostController;
use App\Post;

class PostController extends Controller
{

	public function index() {
		$posts = auth()->user()->posts()->paginate(5);
		return view('admin.posts.index', compact('posts'));
	}
    
	public function show(Post $post) {
		return view('post', compact('post'));
	}

	public function create() {
		return view('admin.posts.create');
	}

	public function store() {
		
		$this->authorize('create', Post::class);

		$inputs = request()->validate([
			'title' => 'required|max:255',
			'post_image' => 'file',
			'body' => 'required'
		]);

		if(request('post_image')) {
			$inputs['post_image'] = request('post_image')->store('images');
		}
		session()->flash('create-post-message', 'Post Created Successfully...');
		auth()->user()->posts()->create($inputs);
		return redirect()->route('admin.post.index');
	}

	public function edit(Post $post) {
		// $this->authorize('update', $post);
		return view('admin.posts.edit', compact('post'));
	}

	public function destroy(Post $post) {
		$this->authorize('delete', $post);
		$post->delete();
		session()->flash('message', 'Post deleted permanently....');
		return back();
	}

	public function update(Post $post) {
		
		$inputs = request()->validate([
			'title' => 'required|max:255',
			'post_image' => 'file',
			'body' => 'required'
		]);

		if(request('post_image')) {
			$inputs['post_image'] = request('post_image')->store('images');
			$post->post_image = $inputs['post_image'];
		}

		$post->title = $inputs['title'];
		$post->body = $inputs['body'];

		$this->authorize('update', $post);
		$post->update();
		session()->flash('update-post-message', 'Post Updated Successfully...');
		return redirect()->route('admin.post.index');
	}
}
