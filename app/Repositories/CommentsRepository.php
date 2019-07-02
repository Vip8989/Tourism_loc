<?php

namespace Tour\Repositories;

use Tour\Comment;

class CommentsRepository extends Repository {
	
	
	public function __construct(Comment $comment) {
		$this->model = $comment;
	}
	
}

?>