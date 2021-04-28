<?php
namespace App\Services;

use App\Repositories\CommentRepository;
use App\Models\Comment;

class CommentSubCommentService
{
    protected $commentRepository;

    public function __construct()
    {
        $this->commentRepository = new CommentRepository(new Comment());
    }

    public function commentsWithSubComments()
    {
        return $this->commentRepository->commentsWithSubComments();
    }
}


?>