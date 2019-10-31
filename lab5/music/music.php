<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Music Library</title>
		<meta charset="utf-8" />
		<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/5/music.jpg" type="image/jpeg" rel="shortcut icon" />
		<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/labResources/music.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		<h1>My Music Page</h1>
		
		<!-- Ex 1: Number of Songs (Variables) -->
		<?php $song_count=116; ?>
		<p>
			I love music.
			I have <?= $song_count ?> total songs,
			which is over <?= $song_count/10 ?> hours of music!
		</p>

		

		<div class="section">
			<h2>Billboard News</h2>
			<ol>
				<!-- Ex 2: Top Music News (Loops) -->
				<!-- "http://www.aaa.com/<?php print $uid; ?>" -->
				<?php if(isset($_GET["newspages"]))
					$newspages=$_GET["newspages"];
					else
						$newspages=10;
				?>
				<?php for ($news_pages= 11; $news_pages>=12-$newspages; $news_pages--) { ?>
				<li><a href="https://www.billboard.com/archive/article/2019<?php echo sprintf("%02d",$news_pages); ?>">2019-<?= $news_pages ?>  </a></li>
				<?php } ?>

				<!-- Ex 3: Query Variable ?? 뭐하라는거-->
				
			</ol>
		</div>

		<div class="section">
			<h2>My Favorite Artists</h2>
			<!-- Ex 4: Favorite Artists (Arrays) -->
			<!-- <?php $array = array("Guns N' Roses","Green Day","Blink182","Bruno Mars");  ?>
			<ol>
				<?php for ($i=0; $i<count($array); $i++) { ?>
					<li><?= $array[$i] ?></li> 
				<?php }?>
			</ol> -->

			<!-- Ex 5: Favorite Artists from a File (Files) -->
			<?php $array = file("./favorite.txt",FILE_IGNORE_NEW_LINES);  ?>
			<ol>
				<?php for ($i=0; $i<count($array); $i++) { ?>
					<li><a href="http://en.wikipedia.org/wiki/<?= $array[$i] ?>"> <?= $array[$i] ?></a></li> 
				<?php }?>
			</ol> 
		</div>
		
		<!-- Ex 6: Music (Multiple Files) -->
		<!-- Ex 7: MP3 Formatting -->
		<div class="section">
			<h2>My Music and Playlists</h2>

			<ul id="musiclist">
				<?php 

				function arr_sort($array, $key, $sort='asc') //정렬대상 array, 정렬 기준 key, 오름/내림차순
				{
				 $keys = array();
				 $vals = array();
				 foreach ($array as $k=>$v)
				 {
				  $i = $v[$key].'.'.$k;
				  $vals[$i] = $v;
				  array_push($keys, $k);
				 }
				 unset($array);

				 if ($sort=='asc') {
				  ksort($vals);
				 } else {
				  krsort($vals);
				 }

				 $ret = array_combine($keys, $vals);
				 unset($vals);
				unset($keys);
				 return $ret;
				}

				$size = array();  
				foreach (glob("lab5/musicPHP/songs/*.mp3") as $filename ) { 
					array_push($size,array("name" => basename($filename),"size" =>(filesize($filename))));
				}
				$size = arr_sort($size,"size",'desc');
				foreach($size as $value){ ?>
					<li class="mp3item"><a href="lab5/musicPHP/songs/<?= $value['name'] ?>"><?php echo $value['name'] ?> </a><?php echo" (".(int)($value['size']/1024)." KB)" ?></li>
				<?php } ?>

				
				<!-- Exercise 8: Playlists (Files) -->
				<?php 
				foreach (glob("lab5/musicPHP/songs/*.m3u") as $filename) { 
					$a = array(); ?> 
					<li class="playlistitem"><?= basename($filename) ?></li>
					<ul>
					<?php 
					foreach(file("$filename") as $line){ 
						$pos = strpos($line,"#");
						if ($pos === false)
							array_push($a,$line);
						}
						shuffle($a);
						for ($i=0; $i<count($a); $i++) {?>
							<li> <?= $a[$i] ?> </li>
						<?php } ?>
					</ul>
				<?php } ?>
				</ul>
			</ul>
		</div>

		<div>
			<a href="https://validator.w3.org/check/referer">
				<img src="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/w3c-html.png" alt="Valid HTML5" />
			</a>
			<a href="https://jigsaw.w3.org/css-validator/check/referer">
				<img src="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/w3c-css.png" alt="Valid CSS" />
			</a>
		</div>
	</body>
</html>
