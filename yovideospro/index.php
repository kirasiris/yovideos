<?php get_header(); ?>
				<div class="col-md-8 show-grid-left main-grids">
					<div class="recommended">
						<div class="recommended-grids english-grid">
							<div class="recommended-info">
								<div class="heading">
									<h3><?php wp_title('') ?></h3>
								</div>
								<div class="clearfix"> </div>
							</div>
                            <?php if(have_posts()) : while(have_posts()) : the_post() ; ?>
							<div class="col-md-4 resent-grid recommended-grid movie-video-grid" style="margin: 1em 0;">
								<div class="resent-grid-img recommended-grid-img">
									<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('blog'); ?></a>
									<div class="time small-time show-time movie-time" style="color:red">
										<?php the_time('M j, Y'); ?>
									</div>
								</div>
								<div class="resent-grid-info recommended-grid-info recommended-grid-movie-info">
									<h5><a href="<?php the_permalink(); ?>" class="title"><?php the_title(); ?></a></h5>
									<ul>
<li><p class="author author-info"><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" class="author"><i class="fa fa-user" aria-hidden="true"></i> <?php the_author(); ?></a></p></li>
										<li class="right-list"><p class="views views-info"><?php echo getPostViews(get_the_ID()); ?></p></li>
									</ul>
								</div>
							</div>
                            <?php endwhile; ?>
                            <?php else: ?>
                            <div class="alert alert-danger">No post found</div>
                            <?php endif; ?>
                            <div class="clearfix"></div>
                            <!-- Pagination -->
                            <nav aria-label="...">
                              <ul class="pager">
                                <li class="previous"> <?php previous_posts_link( 'Newer' ); ?></li>
                                <li class="next"><?php next_posts_link( 'Older' ); ?></li>
                              </ul>
                            </nav>
                            <!-- /Pagination -->
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
                <?php include("includes/sidebar.php"); ?>
<?php get_footer(); ?>