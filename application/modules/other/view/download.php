<?php
	$name = $this->file;
	$name = eregi_replace(" ", "_", $name);
	header("Content-Disposition: attachment; filename=".$name."");
	header('Content-Type: application/x-unknown');
	readfile('/public/'.$this->file);
?>