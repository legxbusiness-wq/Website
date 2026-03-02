<?php
/**
 * Fallback index template.
 *
 * @package InstitutionalForexBroker
 */

get_header();
?>
<main id="primary" class="site-main container">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('institutional-entry'); ?>>
                <h1 class="entry-title"><?php the_title(); ?></h1>
                <div class="entry-content"><?php the_content(); ?></div>
            </article>
        <?php endwhile; ?>
    <?php else : ?>
        <p><?php esc_html_e('Content is currently unavailable.', 'institutional-forex-broker'); ?></p>
    <?php endif; ?>
</main>
<?php
get_footer();
