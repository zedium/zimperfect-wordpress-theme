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
			<p><?php the_content(); ?></p>
			<footer>
				
				<ul class="stats">
					<li><a href="#">General</a></li>
					<li><a href="javascript:void(0)" class="likebutton icon solid fa-heart" data-postid="<?php the_ID(); ?>"><?php echo getPostLikes(get_the_ID()); ?></a></li>
					<li><a href="#comments" class="icon solid fa-comment"><?php echo get_comments_number( )?></a></li>
				</ul>
			</footer>
		</article>
		<?php 
         if ( comments_open() || get_comments_number() ) {
            comments_template();
        }
        endwhile;
		endif;
		?>
	

</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>


