<?php
    /**
     * Template Name: Blank Page
     * 
     * @package maximus
     */
?>
<?php get_header(maximus_get_site_theme()); ?>
    <!-- Start your project here-->  
    <div class="row m-0 p-0 w-100">
        <?php
            $maximus_show_title = get_post_meta( get_the_ID(), '_maximus_show_page_title', true );
        ?>
        <?php if ($maximus_show_title) {?>
            <div class="d-flex justify-content-start align-items-center p-2 c-page__title">
                <div>
                    <h1 class="mb-3">
                        <?php esc_html_e( get_the_title(), 'maximus' ); ?>
                    </h1>
                </div>
            </div>
        <?php } ?>
        <div class="col col-12 m-0 p-0">
            <?php while (have_posts()) { ?>
                <?php the_post(); ?>
                <article <?php post_class() ?>>
                    <?php the_content(); ?>
                </article>
                <?php
                if (comments_open() || get_comments_number()) {
                    # code...
                    comments_template();
                }
                ?>
            <?php } ?>
        </div>
    </div>
    <!-- End your project here-->


<?php get_footer(); ?>