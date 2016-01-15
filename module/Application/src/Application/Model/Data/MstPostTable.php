<?php

namespace Application\Model\Data;

use Application\Model\PostModel;
use Application\Model\AuthModel;

class MstPostTable extends TableModel
{
	protected $name = 'mst_post';

	public function searchRecord($pageNo,PostModel $post)
	{
		$data = array(
			'id' => $post->id,
            'post_cd' => $post->postCd,
            'post_name' => $post->postName,
          
        );

		return $this->searchRecordByData($pageNo, $data);

	}

	public function saveRecord(PostModel $post, AuthModel $auth)
	{

		$data = array(
            'post_cd' => $post->postCd,
            'post_name' => $post->postName,
          
        );

        return $this->saveRecordByData($post->id, $data ,$auth);

	}

}