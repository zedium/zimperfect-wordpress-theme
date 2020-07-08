<?php 
global $zimperfect;
get_header();
?>
<!-- Main -->
<div id="main">
		<?php 
		if(have_posts()):
		while(have_posts()) : the_post(); 
		?>
	<!-- Post -->
		<article class="post">
			<header>
				<div class="title">
					<h2><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h2>
					<p>Post Description</p>
				</div>
				<div class="meta">
					<time class="published" datetime="2015-11-01"><?php the_date() ?></time>
					<a href="#" class="author"><span class="name"><?php the_author(); ?></span><img src="<?php echo get_avatar_url(  get_the_author_meta('user_email') ) ?>" alt="" /></a>
				</div>
			</header>
			<a href="<?php the_permalink(); ?>" class="image featured"><?php the_post_thumbnail('full') ?></a>
			<p>Mauris neque quam, fermentum ut nisl vitae, convallis maximus nisl. Sed mattis nunc id lorem euismod placerat. Vivamus porttitor magna enim, ac accumsan tortor cursus at. Phasellus sed ultricies mi non congue ullam corper. Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
			<footer>
				<ul class="actions">
					<li><a href="<?php the_permalink(); ?>" class="button large">Continue Reading</a></li>
				</ul>
				<ul class="stats">
					<li><a href="#">General</a></li>
					<li><a href="#" class="icon solid fa-heart">28</a></li>
					<li><a href="#" class="icon solid fa-comment"><?php echo get_comments_number( )?></a></li>
				</ul>
			</footer>
		</article>
		<?php 
		endwhile;
		endif;
		?>
	<!-- Pagination -->
		<ul class="actions pagination">
			<li><a href="" class="disabled button large previous">Previous Page</a></li>
			<li><a href="#" class="button large next">Next Page</a></li>
		</ul>

</div>
<?php get_sidebar(); ?>
<?php get_footer() ?>

