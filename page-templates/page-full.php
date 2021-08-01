<?php
    /**
     * Template Name: Full Width Page
     * 
     * @package maximus
     */
?>
<?php get_header(maximus_get_site_theme()); ?>
    <!-- Start your project here-->  
    <div class="mt-5 mb-5">
        <div class="row w-100">
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
            <div class="col col-12">
                <?php get_template_part( 'template-parts/loop', 'page') ?> 
            </div>
        </div>
    </div>
    <!-- End your project here-->


<?php get_footer(); ?>