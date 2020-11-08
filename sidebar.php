<?php 
global $zimperfect;
?>
<!-- Sidebar -->
<section id="sidebar">

<!-- Intro -->
    <section id="intro">
        <a href="/" class="logo"><img src="<?php echo $zimperfect['zopt-logo']['url']; ?>" alt="" /></a>
        <header>
            <h2><?php echo (!empty($zimperfect) && !empty($zimperfect['zopt-site-title'])) ? $zimperfect['zopt-site-title'] : bloginfo( 'title' )  ?></h2>
            <p><?php echo (!empty($zimperfect) && !empty($zimperfect['zopt-site-description'])) ? $zimperfect['zopt-site-description'] : bloginfo( 'description' )  ?></p>
            
        </header>
    </section>

<!-- Mini Posts -->
    

    <?php
    dynamic_sidebar('zim-about-sidebar');
    ?>
<!-- About 
    <section class="blurb">
        <h2>About</h2>
        <p>Mauris neque quam, fermentum ut nisl vitae, convallis maximus nisl. Sed mattis nunc id lorem euismod amet placerat. Vivamus porttitor magna enim, ac accumsan tortor cursus at phasellus sed ultricies.</p>
        <ul class="actions">
            <li><a href="#" class="button">Learn More</a></li>
        </ul>
    </section>-->

<!-- Footer -->

    <section id="footer">
        <ul class="icons">
            <?php if (!empty($zimperfect) && !empty($zimperfect['zopt-social-twitter'])){  ?>
            <li><a href="<?php echo $zimperfect['zopt-social-twitter'] ?>" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
            <?php } ?>
            <?php if (!empty($zimperfect) && !empty($zimperfect['zopt-social-facebook'])){  ?>
            <li><a href="<?php echo $zimperfect['zopt-social-facebook'] ?>" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
            <?php } ?>
            <?php if (!empty($zimperfect) && !empty($zimperfect['zopt-social-instagram'])){  ?>
            <li><a href="<?php echo $zimperfect['zopt-social-instagram'] ?>" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
            <?php } ?>
            <?php if (!empty($zimperfect) && !empty($zimperfect['zopt-social-rss'])){  ?>
            <li><a href="<?php echo $zimperfect['zopt-social-rss'] ?>" class="icon solid fa-rss"><span class="label">RSS</span></a></li>
            <?php } ?>
            <?php if (!empty($zimperfect) && !empty($zimperfect['zopt-social-email'])){  ?>
            <li><a href="<?php echo $zimperfect['zopt-social-email'] ?>" class="icon solid fa-envelope"><span class="label">Email</span></a></li>
            <?php } ?>
        </ul>
        <?php echo $zimperfect['zopt-site-footer-text'] ?>
        
    </section>

</section>