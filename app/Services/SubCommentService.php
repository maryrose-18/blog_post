<?php
namespace App\Services;

use App\Repositories\SubCommentRepository;

class SubCommentService
{
    protected $subCommentRepository;
    public function __construct()
    {
        $this->subCommentRepository = new SubCommentRepository();
        $this->commentSubCommentService = new CommentSubCommentService();
    }

    public function loadSubComment()
    {
        return $this->commentSubCommentService->commentsWithSubComments();
    }

    public function storeSubComment($data)
    {
        return $this->subCommentRepository->storeSubComment($data);
    }

    // public function commentsWithSubComments()
    // {
       
    // }
}
?>