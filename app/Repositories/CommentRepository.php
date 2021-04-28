<?php

namespace App\Repositories;

use App\Models\Comment;

class CommentRepository
{
    protected $comment;

    public function __construct()
    {
        $this->comment = new Comment();
    }
    public function storeComment($data)
    {
        return $this->comment->create($data);
    }

    public function loadComments()
    {
        return $this->comment->all();
    }

    public function storeSubComment($data)
    {
        return $this->comment->create($data);
    }
    public function commentsWithSubComments()
    {
        return $this->comment->with('level')->orderBy('created_at','DESC')->get();
    }
}
?>