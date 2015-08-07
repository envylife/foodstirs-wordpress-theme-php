<?php
$img_width 	= 870;
$img_height = 360;
$thumb = get_post_thumbnail_id();
$img_url = wp_get_attachment_url( $thumb,'full' ); //get full URL to image (use "large" or "medium" if the images too big)
$image = aq_resize( $img_url, $img_width, $img_height, true ); //resize & crop the image
$post_permalink = get_permalink();
$post_comments = get_comments_number();
?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="nova_entry">
        <?php if($image) : ?>
            <div class="entry_image">
                <img src="<?php echo esc_url( $image ) ?>" alt="" />
                <div class="entry_format"><span class="entry_format_icon"><i class="fa fa-picture-o"></i></span></div>
            </div>
        <?php endif; ?>
        <div class="entry_title">
            <h2><a href="<?php echo the_permalink() ; ?>"><?php the_title(); ?></a></h2>
        </div>
        <div class="entry_meta_archive"><?php bazien_entry_archives(); ?></div>
        <div class="entry_content">
            <?php if (get_option('rss_use_excerpt') == 0) : ?>
                <?php echo the_content(''); ?>
                <div class="entry_readmore">
                    <a href="<?php the_permalink(); ?>" class="more-link">
                        <?php  echo __('Read More', 'bazien'); ?>
                    </a>
                </div>
            <?php elseif (get_option('rss_use_excerpt') == 1) : ?>
                <?php echo the_excerpt(); ?>
                <div class="entry_readmore">
                    <a href="<?php the_permalink(); ?>" class="more-link">
                        <?php  echo __('Read More', 'bazien'); ?>
                    </a>
                </div>
            <?php else : ?>
                <?php echo the_content(__('Read More', 'bazien')); ?>
            <?php endif ?>
        </div>
    </div>
</div>