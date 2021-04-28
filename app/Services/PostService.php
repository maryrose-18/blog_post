<?php
namespace App\Services;

use App\Models\Post;
use App\Repositories\PostRepository;

class PostService
{
    protected $postRepository;

    public function __construct()
    {
        $this->postRepository = new PostRepository();
    }

    public function loadPost()
    {
        return $this->postRepository->loadPost();
    }
}
?>