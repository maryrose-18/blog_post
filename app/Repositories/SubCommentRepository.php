<?php

namespace App\Repositories;

use App\Models\Level;

class SubCommentRepository
{
    protected $level;
    protected $comment;

    public function __construct()
    {
        $this->level = new Level();
    }

    public function loadSubComment()
    {
        return $this->comment->all();
    }

    public function storeSubComment($data)
    {
        return $this->level->create($data);
    }
}
?>