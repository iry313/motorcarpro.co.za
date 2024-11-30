<?php
/**
 * The template part for displaying grid layout
 * @package Storefront Ecommerce
 * @subpackage storefront_ecommerce
 * @since 1.0
 */
?>
<?php
  $archive_year  = get_the_time('Y');
  $archive_month = get_the_time('m');
  $archive_day   = get_the_time('d');
?>
<div class="col-lg-4 col-md-4 gridbox">
  <article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>     
    <div class="box-image">
      <?php if( get_theme_mod( 'storefront_ecommerce_post_featured_image',true) != '') { ?>
        <div class="box-image">
          <?php the_post_thumbnail(); ?>
        </div>
      <?php }?>
    </div>
    <h2><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2> 
    <?php if( get_theme_mod( 'storefront_ecommerce_grid_post_date',true) != '' || get_theme_mod( 'storefront_ecommerce_grid_post_author',true) != '' || get_theme_mod( 'storefront_ecommerce_grid_post_comment',true) != '' || get_theme_mod( 'storefront_ecommerce_grid_post_time',true) != '') { ?>
      <div class="metabox py-2 mb-1">
        <?php if( get_theme_mod( 'storefront_ecommerce_grid_post_date',true) != '') { ?>
          <span class="entry-date me-1"><i class="<?php echo esc_attr(get_theme_mod('storefront_ecommerce_grid_post_date_icon','far fa-calendar-alt')); ?> me-2 my-2"></i><a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span><span class="ms-1"><?php echo esc_html( get_theme_mod('storefront_ecommerce_grid_post_meta_seperator','|') ); ?></span>
        <?php }?>
        <?php if( get_theme_mod( 'storefront_ecommerce_grid_post_author',true) != '') { ?>
          <span class="entry-author mx-1"><i class="<?php echo esc_attr(get_theme_mod('storefront_ecommerce_grid_post_author_icon','fas fa-user')); ?> me-2 my-2"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a></span><span class="ms-1"><?php echo esc_html( get_theme_mod('storefront_ecommerce_grid_post_meta_seperator','|') ); ?></span>
        <?php }?>
        <?php if( get_theme_mod( 'storefront_ecommerce_grid_post_comment',true) != '') { ?>
          <span class="entry-comments mx-1"><i class="<?php echo esc_attr(get_theme_mod('storefront_ecommerce_grid_post_comment_icon','fas fa-comments')); ?> me-2 my-2"></i> <?php comments_number( __('0 Comment', 'storefront-ecommerce'), __('0 Comments', 'storefront-ecommerce'), __('% Comments', 'storefront-ecommerce') ); ?></span><span class="ms-1"><?php echo esc_html( get_theme_mod('storefront_ecommerce_grid_post_meta_seperator','|') ); ?></span>
        <?php }?>
        <?php if( get_theme_mod( 'storefront_ecommerce_grid_post_time',true) != '' ) { ?>
          <span class="entry-time mx-1"><i class="<?php echo esc_attr(get_theme_mod('storefront_ecommerce_grid_post_time_icon','fas fa-clock')); ?> me-2 my-2"></i> <?php echo esc_html( get_the_time() ); ?></span>
        <?php }?>
      </div>
    <?php }?>
    <div class="new-text">
    <?php $storefront_ecommerce_excerpt = get_the_excerpt(); echo esc_html( storefront_ecommerce_string_limit_words( $storefront_ecommerce_excerpt, esc_attr(get_theme_mod('storefront_ecommerce_grid_post_excerpt_number','30')))); ?>  <?php echo esc_html( get_theme_mod('storefront_ecommerce_post_discription_suffix','[...]') ); ?>
    </div> 
    <?php if( get_theme_mod('storefront_ecommerce_button_text','View More') != ''){ ?>
      <div class="postbtn mt-4 text-start">
        <a href="<?php the_permalink(); ?>"><?php echo esc_html(get_theme_mod('storefront_ecommerce_button_text','View More'));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('storefront_ecommerce_button_text','View More'));?></span></a>
      </div>
    <?php }?>
  </article>
</div>