<div class="hep-textwidget">
    <div class="hep-latest-posts">
        <?php 
        foreach( $hep_posts as $hep_single_post ) : 
            $hep_post_title             = hep_get_limited_words( $hep_single_post->post_title, $hep_title_word_limit );
            $hep_post_permalink         = get_the_permalink( $hep_single_post->ID );
            $hep_post_date              = get_the_date( '', $hep_single_post->ID );
            $hep_post_date_link         = get_bloginfo('home') . '/' . get_the_date( 'Y/m/d', $hep_single_post->ID );
            $hep_post_thumbnail_link    = get_the_post_thumbnail_url( $hep_single_post->ID );
            $hep_post_no_image_link     = $hep_assets_url . '/no-image-available.png';
        ?> 
        <div class="heps1 hep-single-post <?php echo esc_attr( $hep_text_align ); ?>">
            <?php if( $hep_hide_thumbnail != "on" ) : ?>
            <a href="<?php echo esc_url( $hep_post_permalink ); ?>" class="hep-post-thumbnail">
                <?php if( $hep_post_thumbnail_link ) : ?>
                <img src="<?php echo esc_url( $hep_post_thumbnail_link ); ?>" alt="thumbnail">
                <?php else : ?>
                <img src="<?php echo esc_url( $hep_post_no_image_link ); ?>" alt="no-image">
                <?php endif; ?>
            </a>
            <?php endif; ?>
            <div class="hep-post-description" style="<?php if( $hep_hide_thumbnail == "on" ) echo esc_attr( 'width: 100%' ); ?>">
                <a href="<?php echo esc_url( $hep_post_permalink ); ?>" class="hep-post-title">
                    <?php echo esc_html( $hep_post_title ); ?>
                </a>
                <?php if( $hep_hide_date != "on" ) : ?>
                <div class="hep-post-date">
                    <a href="<?php echo esc_url( $hep_post_date_link ); ?>">
                        <?php echo esc_html( $hep_post_date ); ?>
                    </a>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>