<!DOCTYPE html>
<html>
<head>
	<title>David Normington | Portfolio</title>
	<meta name="viewport" content="width=device-width, user-scalable=false">
	<link rel="stylesheet" href="css/desktop.css" media="screen and (min-width: 500px)" />
	<link rel="stylesheet" href="css/mobile.css" media="screen and (max-width: 500px)" />
	<? if(preg_match('#blog\.php#', $_SERVER['SCRIPT_FILENAME'])): ?>
	<link rel="stylesheet" href="css/pojoaque.css" />
	<script src="js/highlight-min.js"></script>
	<script>hljs.initHighlightingOnLoad();</script>
	<? endif  ?>	

	<script type="application/javascript" src="js/fastclick.min.js"></script>
	<script type="text/javascript">
		(function(){
			var utils = {};
			window.onload = function(e){
				FastClick.attach(document.body);
				utils.nav = document.getElementById('nav');
				utils.navOpen = function(){
					return window.getComputedStyle(nav).display === 'inline-block' 
						|| utils.nav.style.display == 'inline-block';
				};
				utils.menuButton = document.getElementById('mobile-menu');
				utils.menuButtonVisible = function(){
					return window.getComputedStyle(utils.menuButton).display === 'block';
				};

				mobileMenu(e);
			
				document.body.addEventListener('click', function(e){
					if(utils.navOpen() && utils.menuButtonVisible()){
						utils.nav.style.display = 'none';
						e.cancelBubble = true;
					}
				}, false);

				utils.menuButton.addEventListener('click', function(e){
					if(!utils.navOpen()){
						utils.nav.style.display = 'inline-block';
						e.cancelBubble = true;
					}
				});
			};
		
			var mobileMenu = function(){
				utils.nav.style.display = (!utils.menuButtonVisible() ? 'inline-block' : 'none');
			};

			window.onresize = mobileMenu;
		})();
	</script>
</head>
<body>
	<div id="wrap">
	<section id="header">
		<div class="container">
			<div id="flagship">david normington</div>
			<a href="#" id="mobile-menu">-</a>
			<div id="nav">	
				<div class="nav-item"><a href="blog.php">Blog</a></div>	
				<div class="nav-item"><a href="#">Works</a></div>	
				<div class="nav-item"><a href="#">Contact</a></div>	
			</div>
		</div>
	</section>
	<section id="body">
		<div class="container">
