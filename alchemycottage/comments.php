<div class="site-brand-wrap-reverse" style="margin-bottom: -16px;">
    <section class="container py-5">
        <div class="mx-auto" style="max-width: 800px;">
            <h2 class="product-section-title mb-2">Reviews (<?php echo get_comments_number() ; ?>)</h2>
            <p class="text-muted mb-4">Community reviews.</p>

            <?php if ( have_comments() ) : ?>
                <ul class="list-unstyled">
                    <?php
                    wp_list_comments( array(
                        'type'     => 'comment',
                        'callback' => 'alchemycottage_review_comment',
                    ) );
                    ?>
                </ul>
            <?php else : ?>
                <p class="text-muted mb-4">No reviews yet.</p>
            <?php endif; ?>
        </div>
    </section>

    <?php if ( is_user_logged_in() ) : ?>
        <section style="padding-bottom: 16px;">
            <div class="container">
                <?php
                $current_user = wp_get_current_user();
                $username = is_user_logged_in()
                    ? $current_user->user_login
                    : '';

                comment_form( array(
                    'title_reply' => 'Leave a review',
                    'class_form'  => 'comment-form',

                    'logged_in_as' => '',
                    'comment_notes_before' => '',

                    'comment_field' =>
                        ( $username
                            ? '<label for="comment"><p class="text-muted mb-2">Reviewing as ' . esc_html( $username ) . '</p></label>'
                            : ''
                        ) .
                        '<div class="form-group">' .
                            
                            '<textarea class="form-control bg-light" id="comment" name="comment" rows="5" required></textarea>' .
                        '</div>',

                    'submit_button' =>
                        '<button name="%1$s" type="submit" id="%2$s" class="%3$s">%4$s</button>',

                    'class_submit' => 'btn btn-dark site-brand-wrap-soft-reverse text-dark',
                    'label_submit' => 'Submit review',
                ) );
                ?>
            </div>
        </section>
    <?php endif; ?>
</div>
