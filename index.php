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
					<p><?php echo get_post_meta(get_the_ID(), 'post-description-meta-box-text', true); ?></p>
				</div>
				<div class="meta">
					<time class="published" datetime="2015-11-01"><?php the_date() ?></time>
					<a href="#" class="author"><span class="name"><?php the_author(); ?></span><img src="<?php echo get_avatar_url(  get_the_author_meta('user_email') ) ?>" alt="" /></a>
				</div>
			</header>
			<a href="<?php the_permalink(); ?>" class="image featured"><?php the_post_thumbnail('main_post_thumbnails') ?></a>
			<p><?php the_excerpt(); ?></p>
			<footer>
				<ul class="actions">
					<li><a href="<?php the_permalink(); ?>" class="button large">Continue Reading</a></li>
				</ul>
				<ul class="stats">
					<li><a href="#">General</a></li>
					<li><a href="javascript:void(0)" class="likebutton icon solid fa-heart" data-postid="<?php the_ID(); ?>"><?php echo getPostLikes(get_the_ID()); ?></a></li>
					<li><a href="<?php the_permalink(); ?>#comments" class="icon solid fa-comment"><?php echo get_comments_number( )?></a></li>
				</ul>
			</footer>
		</article>
		<?php 
		endwhile;
		endif;
		?>
	<!-- Pagination -->
		
		<div class="posts pagination">
			<?php posts_nav_link() ?>
			
		</div>

</div>
<?php get_sidebar(); ?>
<?php get_footer() ?>

