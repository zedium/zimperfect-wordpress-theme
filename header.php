<?php
global $zimperfect;
?><!DOCTYPE HTML>
<!--
	Future Imperfect WP by Zedium
	github.com/zedium
	Free for personal and commercial use under the CCA 3.0 license (GPL V3.0)
-->
<html>
	<head>
		<?php $main_title = get_bloginfo('title'); ?>
		<title><?php echo empty($main_title)? 'Future Imperfect WP': $main_title ?></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<?php 
		wp_enqueue_style('main-style', get_template_directory_uri(). '/assets/css/main.css'); 
		wp_enqueue_style('main-menu-style', get_template_directory_uri(). '/assets/css/mainmenu.css'); 
		
		
		
		?>
        <?php wp_head(); ?>
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<h1><a href="/"><?php echo $zimperfect['zopt-site-title'] ?></a></h1>
						<?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
						<!--<nav class="links">
							<ul>
								<li><a href="#">Lorem</a></li>
								<li><a href="#">Ipsum</a></li>
								<li><a href="#">Feugiat</a></li>
								<li><a href="#">Tempus</a></li>
								<li><a href="#">Adipiscing</a></li>
							</ul>
						</nav>-->
						<nav class="main">
							<ul>
								<li class="search">
									<a id="main-search-icon" class="fa-search" href="#search">Search</a>
									<form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
										<input type="text" name="s" placeholder="Search" /><br />
									</form>
								</li>
								<li class="menu">
									<a class="fa-bars" href="#menu">Menu</a>
								</li>
							</ul>
						</nav>
					</header>

				<!-- Menu -->
					<section id="menu">

						<!-- Search -->
							<section>
								<form role="search"  id="search" class="search" method="get" action="action="<?php echo esc_url( home_url( '/' ) ); ?>">
									<input type="text" name="query" placeholder="Search" />
								</form>
							</section>

						<!-- Links -->
							<section>
								<ul class="links">
									<li>
										<a href="#">
											<h3>Lorem ipsum</h3>
											<p>Feugiat tempus veroeros dolor</p>
										</a>
									</li>
									<li>
										<a href="#">
											<h3>Dolor sit amet</h3>
											<p>Sed vitae justo condimentum</p>
										</a>
									</li>
									<li>
										<a href="#">
											<h3>Feugiat veroeros</h3>
											<p>Phasellus sed ultricies mi congue</p>
										</a>
									</li>
									<li>
										<a href="#">
											<h3>Etiam sed consequat</h3>
											<p>Porta lectus amet ultricies</p>
										</a>
									</li>
								</ul>
							</section>

						<!-- Actions -->
							<section>
								<ul class="actions stacked">
									<li><a href="#" class="button large fit">Log In</a></li>
								</ul>
							</section>

					</section>
