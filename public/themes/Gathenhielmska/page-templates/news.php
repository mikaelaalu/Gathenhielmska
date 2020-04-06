<?php /* Template Name: News */ ?>
<?php get_header(); ?>

<?php
$args = [
    'numberposts' => 10,
    'post_type' => 'News',
    'orderby' => 'date',
    'order' => 'ASC'
];
?>
<?php $news = get_posts($args); ?>

<?php if (count($news)) : ?>


    <div class="news-container">
        <?php foreach ($news as $post) : ?>
            <div class="news-cards">
                <?php if (get_field('image') != NULL) : ?>
                    <img class="news-thumbnail" src="<?php the_field('image') ?>" alt="">
                    <h3 class="news-title"><?php echo the_field('title') ?> </h3>
                    <p class="news-short"><?php echo the_field('description') ?></p>
                    <div class="read-more-container">
                        <a class="read-more" href="<?php echo get_permalink($post); ?>">Läs mer...</a>
                    </div>
                <?php else : ?>
                    <h3 class="news-title"><?php echo the_field('title') ?> </h3>
                    <p class="news-short"><?php echo the_field('description') ?></p>
                    <div class="read-more-container">
                        <a class="read-more" href="<?php echo get_permalink($post); ?>">Läs mer...</a>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
    </div>
<?php endif; ?>
<?php get_footer(); ?>