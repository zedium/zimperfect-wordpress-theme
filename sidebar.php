<?php 
global $zimperfect;
?>
<!-- Sidebar -->
<section id="sidebar">

<!-- Intro -->
    <section id="intro">
        <a href="#" class="logo"><img src="<?php echo $zimperfect['zopt-logo']['url']; ?>" alt="" /></a>
        <header>
            <h2><?php echo (!empty($zimperfect) && !empty($zimperfect['zopt-site-title'])) ? $zimperfect['zopt-site-title'] : bloginfo( 'title' )  ?></h2>
            <p><?php echo (!empty($zimperfect) && !empty($zimperfect['zopt-site-description'])) ? $zimperfect['zopt-site-description'] : bloginfo( 'description' )  ?></p>
            
        </header>
    </section>

<!-- Mini Posts -->
    <section>
        <div class="mini-posts">
            <?php 
            
            $recent_posts = wp_get_recent_posts( array('numberposts'=>4) );
            foreach($recent_posts as $recent_post){
                //var_dump($recent_post);
            ?>
            <!-- Mini Post -->
                <article class="mini-post">
                    <header>
                        <h3><a href="<?php echo get_permalink( $recent_post['ID'] );?>"><?php echo $recent_post['post_title'] ?></a></h3>
                        <time class="published" datetime="2015-10-20"><?php echo $recent_post['post_date'] ?></time>
                        <a href="#" class="author"><img src="<?php echo get_avatar_url( get_the_author_meta('user_email', $recent_post['post_author']) ) ?>" alt="" /></a>
                    </header>
                    <a href="<?php the_permalink( $recent_post['ID'] ) ?>" class="image"><?php echo get_the_post_thumbnail($recent_post['ID'], $size = array(350, 175)) ?></a>
                </article>

            <?php }
            wp_reset_query(); 
            ?>

        </div>
    </section>

<!-- Posts List -->
    <section>
        <ul class="posts">
            <li>
                <article>
                    <header>
                        <h3><a href="single.html">Lorem ipsum fermentum ut nisl vitae</a></h3>
                        <time class="published" datetime="2015-10-20">October 20, 2015</time>
                    </header>
                    <a href="single.html" class="image"><img src="images/pic08.jpg" alt="" /></a>
                </article>
            </li>
            <li>
                <article>
                    <header>
                        <h3><a href="single.html">Convallis maximus nisl mattis nunc id lorem</a></h3>
                        <time class="published" datetime="2015-10-15">October 15, 2015</time>
                    </header>
                    <a href="single.html" class="image"><img src="images/pic09.jpg" alt="" /></a>
                </article>
            </li>
            <li>
                <article>
                    <header>
                        <h3><a href="single.html">Euismod amet placerat vivamus porttitor</a></h3>
                        <time class="published" datetime="2015-10-10">October 10, 2015</time>
                    </header>
                    <a href="single.html" class="image"><img src="images/pic10.jpg" alt="" /></a>
                </article>
            </li>
            <li>
                <article>
                    <header>
                        <h3><a href="single.html">Magna enim accumsan tortor cursus ultricies</a></h3>
                        <time class="published" datetime="2015-10-08">October 8, 2015</time>
                    </header>
                    <a href="single.html" class="image"><img src="images/pic11.jpg" alt="" /></a>
                </article>
            </li>
            <li>
                <article>
                    <header>
                        <h3><a href="single.html">Congue ullam corper lorem ipsum dolor</a></h3>
                        <time class="published" datetime="2015-10-06">October 7, 2015</time>
                    </header>
                    <a href="single.html" class="image"><img src="images/pic12.jpg" alt="" /></a>
                </article>
            </li>
        </ul>
    </section>

<!-- About -->
    <section class="blurb">
        <h2>About</h2>
        <p>Mauris neque quam, fermentum ut nisl vitae, convallis maximus nisl. Sed mattis nunc id lorem euismod amet placerat. Vivamus porttitor magna enim, ac accumsan tortor cursus at phasellus sed ultricies.</p>
        <ul class="actions">
            <li><a href="#" class="button">Learn More</a></li>
        </ul>
    </section>

<!-- Footer -->
    <section id="footer">
        <ul class="icons">
            <li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
            <li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
            <li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
            <li><a href="#" class="icon solid fa-rss"><span class="label">RSS</span></a></li>
            <li><a href="#" class="icon solid fa-envelope"><span class="label">Email</span></a></li>
        </ul>
        <p class="copyright">&copy; Untitled. Design: <a href="http://html5up.net">HTML5 UP</a>. Images: <a href="http://unsplash.com">Unsplash</a>.</p>
    </section>

</section>