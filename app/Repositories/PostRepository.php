<?php
namespace App\Repositories;

use App\Models\Post;

class PostRepository
{
    protected $post;

    public function __construct()
    {
        $this->post = new Post();
    }

    public function loadPost()
    {
        return $this->post->all();
    }
}
?>