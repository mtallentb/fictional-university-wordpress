<!-- Includes header.php file -->
<?php get_header(); ?>

  <div class="page-banner">
      <!-- get_theme_file_uri() prepends the full theme path to whatever you enter as the argument. You echo the action since it is a GET. -->
    <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/library-hero.jpg') ?>);"></div>
        <div class="page-banner__content container t-center c-white">
        <h1 class="headline headline--large">Welcome!</h1>
        <h2 class="headline headline--medium">We think you&rsquo;ll like it here.</h2>
        <h3 class="headline headline--small">Why don&rsquo;t you check out the <strong>major</strong> you&rsquo;re interested in?</h3>
        <a href="#" class="btn btn--large btn--blue">Find Your Major</a>
        </div>
    </div>

    <div class="full-width-split group">
        <div class="full-width-split__one">
        <div class="full-width-split__inner">
            <h2 class="headline headline--small-plus t-center">Upcoming Events</h2>
            <!-- Creates a custom query for all posts with the 'event' type (custom post type). Creates a meta key and sorts by the key in ascending order. The meta_query removes events that have already happened (event_date <= $today). -->
            <?php 
                $today = date('Ymd');
                $homepage_events = new WP_Query(array(
                    'posts_per_page' => 2,
                    'post_type' => 'event',
                    'meta_key' => 'event_date',
                    'orderby' => 'meta_value_num',
                    'order' => 'ASC',
                    'meta_query' => array(
                        array(
                            'key' => 'event_date',
                            'compare' => '>=',
                            'value' => $today,
                            'type' => 'numeric'
                        )
                    )
                ));
                // While there are posts, the_post() provides all the info for each post. You can now use helpers such as the_permalink(), the_field(), the_title(), the_author(), the_content(), the excerpt().
                while ($homepage_events->have_posts()) {
                    $homepage_events->the_post(); ?>
                    <div class="event-summary">
                        <a class="event-summary__date t-center" href="<?php the_permalink(); ?>">
                            <span class="event-summary__month"><?php
                                // Instantiates a new php DateTime object with the event_date passed as it's argument. Then formats the given date string. 
                                $event_date = new DateTime(get_field('event_date'));
                                echo $event_date->format('M');
                            ?></span>
                            <span class="event-summary__day"><?php
                                echo $event_date->format('d');
                            ?></span>  
                        </a>
                        <div class="event-summary__content">
                            <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                            <p><?php if (has_excerpt()) {
                                echo get_the_excerpt();
                            } else {
                                // wp_trim_words() takes to arguments. The first argument is the string that you want to trim. The second argument is how many words you want to show before trimming the rest.
                                echo wp_trim_words(get_the_content(), 18);
                            } ?><a href="<?php the_permalink(); ?>" class="nu gray"> Read more</a></p>
                        </div>
                    </div>
                    <!-- Adding wp_reset_postdata() after leveraging custom post types and queries is good practice. -->
                <?php } wp_reset_postdata();
            ?>
            
            <!-- get_post_type_archive_link('[POST TYPE]') fetches the actual path to the post type entered as the agument. Good alternative to hardcoding a link. -->
            <p class="t-center no-margin"><a href="<?php echo get_post_type_archive_link('event'); ?>" class="btn btn--blue">View All Events</a></p>

        </div>
        </div>
        <div class="full-width-split__two">
        <div class="full-width-split__inner">
            <h2 class="headline headline--small-plus t-center">From Our Blogs</h2>
            <?php 
                $homepage_posts = new WP_Query(array(
                    'posts_per_page' => 2
                )); 
                while ($homepage_posts->have_posts()) {
                    $homepage_posts->the_post(); ?>
                    <div class="event-summary">
                        <a class="event-summary__date event-summary__date--beige t-center" href="<?php the_permalink(); ?>">
                            <span class="event-summary__month"><?php the_time('M'); ?></span>
                            <span class="event-summary__day"><?php the_time('d'); ?></span>  
                        </a>
                        <div class="event-summary__content">
                            <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                            <p><?php if (has_excerpt()) {
                                echo get_the_excerpt();
                            } else {
                                echo wp_trim_words(get_the_content(), 18);
                            } ?><a href="<?php the_permalink(); ?>" class="nu gray"> Read more</a></p>
                        </div>
                    </div>
                <?php } wp_reset_postdata();
            ?>
            <!-- echo site_url() prepends the full URL to the given endpoint parameter and prints it. -->
            <p class="t-center no-margin"><a href="<?php echo site_url('/blog'); ?>" class="btn btn--yellow">View All Blog Posts</a></p>
        </div>
        </div>
    </div>

    <div class="hero-slider">
    <div class="hero-slider__slide" style="background-image: url(<?php echo get_theme_file_uri('/images/bus.jpg') ?>);">
        <div class="hero-slider__interior container">
        <div class="hero-slider__overlay">
            <h2 class="headline headline--medium t-center">Free Transportation</h2>
            <p class="t-center">All students have free unlimited bus fare.</p>
            <p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
        </div>
        </div>
    </div>
    <div class="hero-slider__slide" style="background-image: url(<?php echo get_theme_file_uri('/images/apples.jpg') ?>);">
        <div class="hero-slider__interior container">
        <div class="hero-slider__overlay">
            <h2 class="headline headline--medium t-center">An Apple a Day</h2>
            <p class="t-center">Our dentistry program recommends eating apples.</p>
            <p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
        </div>
        </div>
    </div>
    <div class="hero-slider__slide" style="background-image: url(<?php echo get_theme_file_uri('/images/bread.jpg') ?>);">
        <div class="hero-slider__interior container">
        <div class="hero-slider__overlay">
            <h2 class="headline headline--medium t-center">Free Food</h2>
            <p class="t-center">Fictional University offers lunch plans for those in need.</p>
            <p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
        </div>
        </div>
    </div>
    </div>
<!-- Includes footer.php file. -->
<?php get_footer(); ?>