<?php get_header(); ?>

<?php $gallery_page_query = new WP_Query( array(

    'post_type' => 'page',

    'name'=>'gallery'

) );

if($gallery_page_query -> have_posts()) :

    while ($gallery_page_query -> have_posts()) :

        $gallery_page_query -> the_post();

        $gallery_page_title = get_field('gallery_page_title');

    endwhile;

    wp_reset_postdata();

endif; ?>


<?php get_template_part('template-parts/breadcrumb'); ?>

<section class="gallery">

    <div class="gallery__content">

        <h2 class="gallery__title">

            <?php echo $gallery_page_title; ?>

        </h2>

        <div class="gallery__table">

            <?php if ( have_posts() ) :

                while ( have_posts() ) :

                    the_post();

                    $image = get_field('photo'); ?>

                    <div class="gallery__item">

                        <?php if( !empty($image) ): ?>

                            <a href="<?php the_permalink(); ?>">

                                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="gallery__item__image">

                            </a>

                        <?php endif; ?>

                    </div>

                <?php endwhile;

            endif; ?>

        </div>

    </div>

</section>

<?php get_template_part('template-parts/find-franchise'); ?>

<?php get_footer(); ?>
