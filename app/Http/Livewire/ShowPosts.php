<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class ShowPosts extends Component
{
    /* SHOW POSTS */
    public $search = '';
    public $sort = 'id';
    public $direction = 'asc';

    /* MODAL */
    public $modal = true;
    public $postTitle = '';
    public $postContent = '';
    public $postId = 0;

    public function render()
    {
        $posts = Post::select('id', 'title', 'content')->orderBy($this->sort, $this->direction)->get();
        if ($this->search !== '') {
            $posts = Post::where('content', 'LIKE', '%' . $this->search . '%')
                ->orWhere('content', 'LIKE', '%' . $this->search . '%')
                ->orderBy($this->sort, $this->direction)
                ->get();
        }
        return view('livewire.show-posts', compact('posts'));
    }
    public function order($sortItem)
    {
        if ($this->sort === $sortItem) {
            $this->direction === 'asc' ? $this->direction = 'desc' : $this->direction = 'asc';
        } else {
            $this->sort = $sortItem;
            $this->direction = 'asc';
        }
    }

    /* CREATE & EDIT */
    public function create()
    {
        $this->cleanForm();
        $this->modal = true;
    }
    public function save()
    {
        Post::updateOrInsert(
            ['id' => $this->postId],
            ['title' => $this->postTitle, 'content' => $this->postContent]
        );
        $this->closeModal();
        $this->cleanForm();
    }
    public function edit($selectedPost = 0)
    {
        $post = Post::findOrFail($selectedPost);
        $this->postTitle = $post->title;
        $this->postContent = $post->content;
        $this->postId = $post->id;
        $this->modal = true;
    }
    public function delete($selectedPost = 0)
    {
        $post = Post::findOrFail($selectedPost)->delete();
    }
    public function closeModal()
    {
        $this->modal = false;
    }
    public function cleanForm()
    {
        $this->postContent = '';
        $this->postTitle = '';
        $this->postId = 0;
    }
}
