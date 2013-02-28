<?php

class HomeModel extends BaseModel {


	public function show($id = '') {

		if ($id) {
			$id = 'WHERE id = ' . $id;
		}

		$sql = '
			SELECT *
			FROM 	User
			' . $id;

		$result = $this->db->query($sql);

		return $result->fetchAll();

	}

	
}

?>