<?php
    /**
     * Search Filters
     * 
     * @package maximus
     */

    if (!function_exists('maximus_get_search_posts')) {
        # code...
        function maximus_get_search_posts($query)
        {
            # code...
            if ($query->is_main_query() && !is_admin()) {
                # code...
                $query->set('posts_per_page', 6);

                if ($query->is_search) {
                    # code...
                    $query->set('post_type', array('post', 'product'));
                }
            }
        }

        add_action( 'pre_get_posts', 'maximus_get_search_posts', 10, 1);
    }
?>