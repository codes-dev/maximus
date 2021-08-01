<?php
    /**
     * Global Filters
     * 
     * @package maximus
     */

     function maximus_scroll_to_top()
     {
         # code...
         $maximus_show_scroll_to_top = get_option( 'maximus_show_scroll_to_top', 0);
         if ($maximus_show_scroll_to_top) {
             # code...
             ?>
                <button type="button" class="btn btn-lg btn-floating c-scroll-to-top">
                    <i class="fas fa-long-arrow-alt-up"></i>
                </button>
            <?php
         }
     }

     add_action( 'maximus_globals', 'maximus_scroll_to_top', 10);
?>