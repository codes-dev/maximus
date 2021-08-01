<?php
    /**
     * Author Posts Template
     * 
     * @package maximus
     */

    get_header(maximus_get_site_theme());

    $maximus_author = get_query_var( 'author' );
    $maximus_author_posts = get_the_author_posts(  );
    $maximus_author_posts_count = count_user_posts( $maximus_author );
    $maximus_author_display = get_the_author_meta( 'display_name', $maximus_author );
    //$maximus_author_posts_url = get_author_posts_url( $maximus_author ); 
    $maximus_author_description = get_the_author_meta( 'description', $maximus_author );
    $maximus_author_website= get_the_author_meta( 'user_url', $maximus_author );
    ?>
        <div class="row w-100 mx-auto pt-4 pb-5">
            <div class="col col-12 col-md-4 col-lg-3">
                <h1 class="text-center">
                    <?php
                        esc_html_e( 'Author Info', 'maximus' );
                    ?>
                </h1>
                <div class="card">
                    <img
                        src="<?php echo esc_url( get_avatar_url( $author ) ); ?>"
                        class="c-author-image img-fluid mx-auto"
                        alt="..."
                    />
                    <div class="card-body">
                        <h2 class="card-title text-center">
                            <?php esc_html_e( $maximus_author_display, 'maximus' ); ?>
                        </h2>
                        <p class="text-center lead">
                            <?php 
                                /* translators: %s is the nmber of post */
                                printf(
                                    esc_html( 
                                        _n( '%s post', '%s posts', $maximus_author_posts_count, 'maximus' )
                                    ),
                                    number_format_i18n( $maximus_author_posts_count)
                                );
                            ?>
                        </p>
                        <?php
                            if ($maximus_author_website) {
                                # code...
                                ?>
                                    <div class="text-center">
                                        <a href="<?php echo esc_url( $maximus_author_website); ?>">
                                            <?php esc_html_e( $maximus_author_website, 'maximus' ); ?>
                                        </a>
                                    </div>
                                <?php
                            }
                        ?>
                        <?php
                            if ($maximus_author_description) {
                                # code...
                                ?>
                                    <p class="card-text">
                                        <h4>Bio</h4>
                                        <?php esc_html_e( $maximus_author_description, 'maximus' ); ?>
                                    </p>
                                <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col col-12 col-md-8 col-lg-9">
                <?php get_template_part( 'template-parts/loops/loop', 'archive' ); ?>
            </div>
        </div>
    <?php
    get_footer();
    
?>