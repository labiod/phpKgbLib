<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Content
 *
 * @author admin
 */
class Content extends Component {
    //put your code here
    /**
     * @param int $id
     * @return string 
     */
    public function show($id = 0) {
        $content = new Table("content");
	$result = $content->fetchAll("id_content = ".$id);
	if($result->count() > 0) {
		$res = $result->toArray();
		return $res[0]['text'];

	}
	return "";
    }
}

?>
