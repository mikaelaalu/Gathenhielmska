<?php /* Template Name: Event */ ?>
<?php get_header(); ?>

<?php
$args = [
    'numberposts' => 10,
    'post_type' => 'Evenemang',
    'orderby' => 'date',
    'order' => 'ASC'
];
?>
<?php $events = get_posts($args); ?>

<?php

$terms = get_terms(array(
    'taxonomy' => 'category',
    'hide_empty' => false,
)); ?>
<div class="category-list">
    <?php foreach ($terms as $term) : ?>

        <a href="<?php echo get_term_link($term) ?> ">
            <img src=" <?php echo get_field('image_icon', $term)  ?>" alt="">
            <p> <?php echo get_field('title', $term)  ?></p>
        </a>

    <?php endforeach; ?>
</div>


<?php if (count($events)) : ?>
    <div class="event-container">
        <?php foreach ($events as $post) : ?>
            <a href="<?php echo get_permalink($post); ?>">
                <div class="event-cards">
                    <img class="thumbnail" src="<?php the_field('thumbnail') ?>" alt="">
                    <?php the_post_thumbnail('thumbnail'); ?>
                    <div>
                        <p class="entrance"> <?php echo the_field('entrance') ?> </p>
                    </div>
                    <?php get_field('Event info') ?>
                    <div class="event-text">
                        <div>
                            <h3><?php echo $post->post_title; ?></h3>
                        </div>

                        <div class="time-info">
                            <div>
                                <p> <?php echo the_field('date') ?> </p>
                                <p> <?php echo the_field('end_date') ?> </p>
                            </div>
                            <div>
                                <p> <?php echo the_field('time') ?> </p>
                                <p> <?php echo the_field('end_time') ?> </p>
                            </div>
                        </div>
                        <div>
                            <p> <?php echo the_field('descript') ?></p>
                        </div>
                        <div class="ticket-wrapper">
                            <button class="ticket-btn" href="www.biletto.se">Boka plats</button>
                            <?php $categories = get_the_terms($post, 'category')  ?>
                            <?php foreach ($categories as $category) : ?>

                                <a href="<?php echo get_term_link($category) ?>"> <?php echo $category->name ?></a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </a> <?php endforeach; ?> </div>
<?php endif; ?>
<?php get_footer(); ?>