<?php
function maximus_comment_callback( $comment, $args, $depth ) {
	// code...
	?>
			<li id="comment-<?php comment_ID(); ?>" <?php comment_class( array( 'c-comment', ( $comment->comment_parent ) ? 'c-comment--child' : '', 'mt-2', 'mb-5', 'media' ) ); ?>>
				<div id="div-comment-<?php comment_ID(); ?>" class="container">
                    <div class="c-comment__info">
                        <div class="d-flex justify-content-between">
                            <?php 
                                if ( $args['avatar_size'] != 0 ) {
                                    echo get_avatar( $comment, $args['avatar_size'], false, false, array( 'class' => 'c-comment__avatar media-image z-depth-1 rounded-circle' ) );
                                } 
                            ?>
                            <h6>
                                <a class="c-comment__time" href="<?php echo esc_url( get_comment_link( $comment, $args ) ); ?>">
                                    <time datetime="<?php comment_time( 'c' ); ?>">
                                    <?php
                                        printf(
                                            esc_html__( 
                                                '%s ago', 
                                                'maximus' 
                                            ),
                                            human_time_diff( get_comment_time( 'U' ), current_time( 'U' ) )
                                        );
                                    ?>
                                    </time>
                                </a>
                            </h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h5 class="mt-0 font-weight-bold c-comment__author">
                                <?php echo get_comment_author_link( $comment ); ?>
                            </h5>
                            <?php
                                comment_reply_link( 
                                    array_merge(
                                        $args,
                                        array(
                                            'reply_text' => __( '<i class="fas fa-reply"></i>&nbsp;Reply', 'maximus' ),
                                            'depth'      => $depth,
                                            'max_depth'  => $args['max_depth'],
                                            'add_below'  => 'div-comment',
                                            'before'     => '<span class="c-comment__reply-link">',
                                            'after'      => '</span>',
                                        )
                                    ), 
                                    $comment
                                );
                            ?>
                        </div>
                    </div>                    
					<div class="c-comment__text text-center text-md-left">
						<?php 
						if ( $comment->comment_approved == '0' ) {
							// code...
							?>
									<p class="c-comment__awaiting-moderation">
									<?php
										esc_html_e( 
											'Your comment is awaiting moderation.', 
											'maximus'
										);
									?>
									</p>
								<?php
						} else {
								
							if ( $comment->comment_type == 'comment' || ( ( $comment->comment_type == 'pingback' || $comment->comment_type == 'trackback' ) && ! $args['short_pings'] ) ) {
								// code...
								comment_text( $comment );
							}
						}
						?>
					</div>
					<div class="c-comment__footer d-flex justify-content-center justify-content-md-end mt-2">
						<div class="d-flex justify-content-between w-100">                                    
						<?php 
							edit_comment_link( 
								__( '<i class="fas fa-edit"></i>&nbsp;Edit Comment', 'maximus' ), 
								'<span class="c-comment__edit-link">', 
								'</span>' 
							);
                            if (current_user_can( 'edit_comment', $comment )) {
                                # code...
                                ?>
                                    <span class="ml-2">
                                        <a href="">
                                            <i class="fas fa-trash-alt"></i>&nbsp;Trash Comment
                                        </a>
                                    </span>
                                <?php
                            }
						?>							
						</div>
					</div>
				</div>
			</li>
		<?php
}
?>
