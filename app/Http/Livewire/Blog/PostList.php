<?php

namespace App\Http\Livewire\Blog;

use App\Models\Post;
use Livewire\Component;

class PostList extends Component
{
    public $numResults = 6;
    public $results;
    public $total;
    public $finished = false;

    public function mount(){
        $this->results = $this->numResults;
        $this->total = Post::list()->count();
    }

    public function loadMore(){
        $this->results += $this->numResults;
        if($this->results >= $this->total){
            $this->finished = true;
        }
    }

    public function render()
    {
        $posts = Post::list()->paginate($this->results);
        return view('livewire.blog.post-list', compact('posts'));
    }
}
