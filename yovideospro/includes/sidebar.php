<div class="col-md-4 single-right">
  <h3>Recent Posts</h3>
  <div class="single-grid-right">
      	<?php $postslist = get_posts('numberposts=3&order=DESC'); foreach ($postslist as $post) : setup_postdata($post); ?>
        <div class="single-right-grids">
          <div class="col-md-4 single-right-grid-left">
              <a href="<?php the_permalink() ?>"><?php the_post_thumbnail('sidebar-recientes') ?></a>
          </div>
          <div class="col-md-8 single-right-grid-right">
              <a href="<?php the_permalink() ?>" class="title"> <?php the_title() ?></a>
              <p class="author"><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" class="author"><?php the_author(); ?></a></p>
              <?php the_excerpt(); ?>
              <p class="views"><?php if(function_exists('addview')) {   echo addview(get_the_ID()); }?></p>
          </div>
          <div class="clearfix"> </div>
      	</div>
        <?php endforeach; ?>
<h3>Archives</h3>
<select name="archive-dropdown" onchange="document.location.href=this.options[this.selectedIndex].value;" class="form-control">
  <option value=""><?php echo esc_attr( __( 'Select Month' ) ); ?></option> 
  <?php wp_get_archives( array( 'type' => 'monthly', 'format' => 'option', 'show_post_count' => 1 ) ); ?>
</select>
		<!-- Dinamic Sidebar -->
		<?php if(is_active_sidebar('sidebar')) : ?>
		  <?php dynamic_sidebar('sidebar'); ?>
        <?php endif; ?>
  </div>
</div>
<div class="clearfix"> </div>