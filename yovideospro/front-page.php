<?php get_header(); ?>
<div class="container">
<!-- Recent Post -->
<h3 id="section-title">Recent Videos</h3>
<?php $postslist = get_posts('numberposts=3&order=DESC'); foreach ($postslist as $post) : setup_postdata($post); ?>
<div class="col-md-4 resent-grid recommended-grid slider-top-grids">
    <div class="resent-grid-img recommended-grid-img">
        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('recientes'); ?></a>
        <div class="time">
            <p><?php the_time('M j, Y'); ?></p>
        </div>
</div>
<div class="resent-grid-info recommended-grid-info">
    <h5><a href="<?php the_permalink(); ?>" class="title"><?php the_title(); ?></a></h5>
    <ul>
		<li><p class="author author-info"><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" class="author"><i class="fa fa-user" aria-hidden="true"></i> <?php the_author(); ?></a></p></li>
        <li class="right-list"><p class="views views-info"><i class="fa fa-eye" aria-hidden="true"></i> <?php echo getPostViews(get_the_ID()); ?></p></li>
    </ul>
</div>
</div>
<?php  endforeach; ?>
<div class="clearfix"> </div>

				<!-- by Number of Comments  -->
					<div class="recommended-grids">
						<h3 id="section-title">by Comments</h3>
						<?php $postslist = get_posts('numberposts=4&orderby=comment_count&order=DESC'); foreach ($postslist as $post) : setup_postdata($post);?>
                            <div class="col-md-3 resent-grid recommended-grid" style="margin: 1em 0;">
                                <div class="resent-grid-img recommended-grid-img">
                                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('second&third&fourth'); ?></a>
                                    <div class="time small-time">
                                        <?php the_time('M j, Y'); ?>
                                    </div>
                                </div>
                                <div class="resent-grid-info recommended-grid-info">
                                    <h5><a href="<?php the_permalink(); ?>" class="title"><?php the_title(); ?></a></h5>
                                    <ul>
<li><p class="author author-info"><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" class="author"><i class="fa fa-user" aria-hidden="true"></i> <?php the_author(); ?></a></p></li>
                                        <li class="right-list"><p class="views views-info"><?php echo getPostViews(get_the_ID()); ?></p></li>
                                    </ul>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <div class="clearfix"> </div>
					</div>
				<!-- By popularity -->
                <div class="recommended">
					<div class="recommended-grids">
						<h3 id="section-title">by Popularity</h3>
                        <?php $postslist = get_posts('numberposts=8&meta_key=post_views_count&orderby=meta_value_num&order=DESC'); foreach ($postslist as $post) : setup_postdata($post); ?>
						<div class="col-md-3 resent-grid recommended-grid" style="margin: 1em 0;">
							<div class="resent-grid-img recommended-grid-img">
								<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('second&third&fourth'); ?></a>
								<div class="time small-time">
									<?php the_time('M j, Y'); ?>
								</div>
							</div>
							<div class="resent-grid-info recommended-grid-info">
								<h5><a href="<?php the_permalink(); ?>" class="title"><?php the_title(); ?></a></h5>
								<ul>
<li><p class="author author-info"><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" class="author"><i class="fa fa-user" aria-hidden="true"></i> <?php the_author(); ?></a></p></li>
									<li class="right-list"><p class="views views-info"><?php echo getPostViews(get_the_ID()); ?></p></li>
								</ul>
							</div>
						</div>
                        <?php endforeach; ?>
						<div class="clearfix"> </div>
					</div>
				</div>
                <!-- By best actress -->
				<div class="recommended">
					<div class="recommended-grids">
						<h3 id="section-title">by Category "Best Actress"</h3>
                        <?php $postslist = get_posts('numberposts=8&category_name=best-actress&order=DESC'); foreach ($postslist as $post) : setup_postdata($post); ?>
						<div class="col-md-3 resent-grid recommended-grid" style="margin: 1em 0;">
							<div class="resent-grid-img recommended-grid-img">
								<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('second&third&fourth'); ?></a>
								<div class="time small-time">
									<?php the_time('M j, Y'); ?>
								</div>
							</div>
							<div class="resent-grid-info recommended-grid-info">
								<h5><a href="<?php the_permalink(); ?>" class="title"><?php the_title(); ?></a></h5>
								<ul>
<li><p class="author author-info"><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" class="author"><i class="fa fa-user" aria-hidden="true"></i> <?php the_author(); ?></a></p></li>
									<li class="right-list"><p class="views views-info"><?php echo getPostViews(get_the_ID()); ?></p></li>
								</ul>
							</div>
						</div>
                        <?php endforeach; ?>
						<div class="clearfix"> </div>
					</div>
				</div>
			</div>
<?php get_footer(); ?>