<?php wp_footer(); ?>
          </div>
			<!-- footer -->
			<div class="footer">
				<div class="footer-grids">
					<div class="footer-top">
						<div class="footer-top-nav">
							<?php
                               wp_nav_menu( array(
                                   'menu'              => 'secondary',
                                   'theme_location'    => 'secondary',
                                   'depth'             => 2,
                                   'container'         => '',
                                   'container_class'   => '',
                                   'container_id'      => '',
                                   'menu_class'        => '',
                                   'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                                   'walker'            => new wp_bootstrap_navwalker())
                               );
                           ?>
						</div>
					</div>
                        <div class="footer-bottom">
                                <?php
                                   wp_nav_menu( array(
                                       'menu'              => 'tertiary',
                                       'theme_location'    => 'tertiary',
                                       'depth'             => 2,
                                       'container'         => '',
                                       'container_class'   => '',
                                       'container_id'      => '',
                                       'menu_class'        => '',
                                       'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                                       'walker'            => new wp_bootstrap_navwalker())
                                   );
                               ?>
</div>
				</div>
			</div>
			<!-- //footer -->
<div class="clearfix"> </div>
	<div class="drop-menu">
		<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu4">
		  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Regular link</a></li>
		  <li role="presentation" class="disabled"><a role="menuitem" tabindex="-1" href="#">Disabled link</a></li>
		  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another link</a></li>
		</ul>
	</div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php bloginfo('template_url');?>/js/jquery.js" type="text/javascript"></script>
    <script src="<?php bloginfo('template_url');?>/js/modernizer.js" type="text/javascript"></script>
    <script src="<?php bloginfo('template_url');?>/js/bootstrap.js" type="text/javascript"></script>
	<!--<script src="<?php bloginfo('template_url');?>/js/master.js" type="text/javascript"></script>-->
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
  </body>
</html>