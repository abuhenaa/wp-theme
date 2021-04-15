<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Saiful
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comment_area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
            <div class="wrapper_title">
		<h4 class="comments-title">
			<?php
			$saiful_comment_count = get_comments_number();
			if ( '1' === $saiful_comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( '1 thought on &ldquo;%1$s&rdquo;', 'saiful' ),
					'<span>' . get_the_title() . '</span>'
				);
			} else {
				printf( // WPCS: XSS OK.
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $saiful_comment_count, 'comments title', 'saiful' ) ),
					number_format_i18n( $saiful_comment_count ),
					'<span>' . get_the_title() . '</span>'
				);
			}
			?>
		</h4><!-- .comments-title -->
            </div>
		<?php the_comments_navigation(); ?>
                <?php
                wp_list_comments( array(
                        'style' => 'ol',
                        'callback' => 'saiful_comments',
                        'avatar_size' => 60,
                ) );
                ?>

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'saiful' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().
        

	$req      = get_option( 'require_name_email' );
	$html_req = ( $req ? " required='required'" : '' );
        $comment_args = array( 'fields' => apply_filters( 'comment_form_default_fields', array(
                   
                   'author' => '<div class="row required-fields"><div class="col-lg-6">'
                            . '<div class="form_group"><p class="comment-form-author">'.
                               '<input id="author" name="author" type="text" class="form_control" placeholder="'.esc_attr__( 'Your Name','saiful').
                               ( $req ? '*' : '' ).'" value="' .
                               esc_attr( $commenter['comment_author'] ) . '" size="30"' . $html_req . ' />' .
                               '</p></div></div><!-- #form-section-author .form-section -->',
                   'email'  => '<div class="col-lg-6"><div class="form_group"><p class="comment-form-email">'.
                               '<input id="email" name="email" type="text" class="form_control" placeholder="'.esc_attr__( 'Your Email','saiful').
                               ( $req ? '*' : '' ) .'" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $html_req . ' />' .
                               '</p></div></div><!-- #form-section-email .form-section -->',
                   'url'    => '<div class="col-lg-12"><div class="form_group"><p class="comment-form-url"><input id="url" name="url" type="url" class="form_control" placeholder="'.esc_attr__( 'Your Website','saiful').'" size="30" maxlength="200"></p></div></div></div>' ) ),
             
                   'comment_field' => '<div class="row"> <div class="col-lg-12"><div class="form_group"><p class="comment-form-comment">'.
                               '<textarea id="comment" name="comment" class="form_control" placeholder="'.esc_attr__( 'Your Message','saiful').'" cols="45" rows="8" aria-required="true"></textarea>' .
                               '</p></div></div><!-- #form-section-comment .form-section -->',
                    'submit_button'   => '<div class="col-lg-12"><div class="button"> <input name="%1$s" type="submit" id="%2$s" class="%3$s saiful_btn" value="%4$s" /></div></div></div>',
                    'comment_notes_after' => '',
                    'title_reply' => esc_html__('Leave a Comment', 'saiful'),
            
               );
            comment_form($comment_args); ?>

</div><!-- #comments -->
