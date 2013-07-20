<?php
class Articles extends Component {
	public function show() {
		$articles = new Table("article");
		$articles = $articles->select("id_article, title, body, DATE_FORMAT(date_published, '%d-%m-%Y') AS date", "is_published = 1 and archive = 0", "date_published DESC");
		$content = "";
		if(!$articles->isNull()) {
				$articles = $articles->toArray();	
				foreach($articles as $article) {
					$date = DateFormat::format($article['date']);
					$content .=<<<EOD
		<div class="mini_article">
			<h3>{$article['title']}</h3>
			<span class="art_date">{$article['date']}</span>			
			<div class="akapit" >
				{$article['body']}	
			</div>
		</div>
EOD;
				}
		} else {
			$content =<<<EOD
			<div class="mini_article">
			<h3>Brak aktualności</h3>		
			</div>
EOD;
		}
		return $content;
	}
}