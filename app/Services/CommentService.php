<?php
namespace App\Services;

use App\Repositories\CommentRepository;

class CommentService
{
    protected $commentRepository;
    public function __construct()
    {
        $this->commentRepository = new CommentRepository();
    }

    public function storeComment($data)
    {
        return $this->commentRepository->storeComment($data);
    }

    public function loadComments()
    {
        return $this->commentRepository->loadComments();
    }

    public function storeSubComment($data)
    {
        return $this->commentRepository->storeSubComment($data);
    }
}
?>