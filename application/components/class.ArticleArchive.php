<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Archive
 *
 * @author admin
 */
class ArticleArchive extends Component {
    //put your code here
    public function show() {
        $table = new Table("article");
        $result = $table->fetchAll("archive = 1", "date_published");
    }
}

?>
