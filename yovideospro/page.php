<?php get_header(); ?>

				<!-- container -->

                    <?php if(have_posts()) : the_post()?>
					<div class="single-grid">
						<a><?php the_title(); ?></a>
						<?php the_content();  ?>
					</div>
                    <?php // comments_template(); ?>
                    <?php endif; ?>

<?php get_footer(); ?>