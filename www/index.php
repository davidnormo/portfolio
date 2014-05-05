<? include 'includes/header.php' ?>
<p id="intro">Welcome to my site. Here I write about software development, coding and similar things.</p>
<hr />
<?php
$files = scandir('posts/');
sort($files, SORT_NATURAL | SORT_FLAG_CASE);
$files = array_reverse($files);

foreach($files as $i => $file){
	if($file != '.' && $file != '..'){
		 include 'posts/'.$file;
		 //if this isn't the last post to display
		 if($i !== (count($files) - 3)){
			  echo '<hr />';
		 }
	}
}

include 'includes/footer.php';
