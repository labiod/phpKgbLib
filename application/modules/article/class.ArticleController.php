<?php
class ArticleController extends BasicController {
	private $articles = null;
	function initAll() {
		$this->articles = new Table("article");
	}
	function indexAction() {
		$this->_view->appendStyle("/public/css/style_article.css");
		$result = $this->articles->select("id_article, title, body, DATE_FORMAT(date_published, '%d-%m-%Y') AS date", "is_published = 1 and archive = 0", "date_published DESC");
		$this->_view->articles = $result;
	}
	function showAction() {
		$this->_view->appendStyle("/public/css/style_article.css");
		$id = $this->getParam("id", 0);
		$this->_view->articles = $this->articles->select("id_article, title, body, DATE_FORMAT(date_published, '%d-%m-%Y') AS date", "is_published = 1 AND id_article = ".$id, "date_published");
	}
	function archiveAction() {
		$this->_view->appendStyle("/public/css/style_article.css");
		$this->articles->groupBy("DATE_FORMAT(date_published, '%Y-%m')");
		$this->_view->articles = $this->articles->select("DATE_FORMAT(date_published, '%Y-%m') AS date", "archive = 1");
	}
	function showArchiveAction() {
		$this->_view->style = "/public/css/style_article.css";
		$month = $this->getParam("month", 0);
		$year = $this->getParam("year", 0);
		if($month != 0 && $year != 0) {
			$this->_view->articles = $this->articles->select("id_article, title, body, DATE_FORMAT(date_published, '%d-%m-%Y') AS date", "archive = 1 And DATE_FORMAT(date_published, '%Y-%m') = '".$year."-".$month."'");
		}
	}
	
}
