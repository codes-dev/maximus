<?php
    /**
     * Global Toolbar Template
     * 
     * @package maximus
     */

    $maximus_show_global_toolbar = get_option( 'maximus_allow_global_toolbar', 0 );
    
    if ($maximus_show_global_toolbar) {
        # code...
        ?>
            <div class="c-globals btn-group btn-group-vertical">
                <?php
                    do_action('maximus_globals');
                ?>
            </div>
        <?php
    }
?>