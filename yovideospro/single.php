<?php get_header(); ?>
			<div class="row">
				<div class="col-md-10 single">
                <?php if(have_posts()) : the_post()?>
                <?php setPostViews(get_the_ID()); ?>
                <div class="song"><div class="song-info"><h3><?php the_title(); ?></h3></div></div>
                <div class="clearfix"></div>
<!-- Menu-tabs) -->
<?php if (!empty($iframe)) : ?>
<?php else : ?>
<ul class="nav nav-pills nav-justified" id="myTab" role="tablist">
<?php $links = get_post_custom_values( 'Iframe' ); ?>
<?php if (is_array($links)) : ?>
<?php foreach ($links as $key=>$li) :  ?>
<li class="nav-item <?php echo $key == 0 ? 'active ' : ''; ?>">
<a class="nav-link " data-toggle="tab" href="#tab<?php echo $key; ?>" role="tab" aria-controls="tab" aria-expanded="true">Option</a>
</li>
<?php endforeach ; ?>
<?php endif; ?>
</ul>
<div class="tab-content" id="myTabContent">
<!-- Content-tabs / Iframes players -->
<?php $player = get_post_custom_values( 'Iframe' ); ?>
<?php if (is_array($player)) : ?>
<?php foreach ($player as $key=>$iframe) : ?>
<div class="tab-pane <?php echo $key == 0 ? 'active ' : ''; ?>" id="tab<?php echo $key; ?>" role="tabpanel" aria-labelledby="tab">
<br>
<div class="song">
<div class="video-grid">
<?php echo $iframe; ?>
</div>
</div>
</div>             
<?php endforeach ?>
<div class="song-grid-right hidden-xs">
      <div class="share">
          <h5>Share this</h5>
          <ul>
<li><a rel="nofollow" href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php echo urlencode(get_the_title($id)); ?>"><i class="fa fa-facebook-official" aria-hidden="true"></i> Facebook</a></li>
<li><a rel="nofollow" href="https://plus.google.com/share?url=<?php the_permalink();?>"><i class="fa fa-google-plus" aria-hidden="true"></i> Google</a></li>
<li><a rel="nofollow" href="http://twitter.com/share?text=<?php the_title(); ?>&url=<?php the_permalink(); ?>"><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</a></li>
<li><a rel="nofollow" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&description=<?php the_title(); ?>"><i class="fa fa-pinterest" aria-hidden="true"></i> Pinterest</a></li>
<li><a rel="nofollow" href="whatsapp://send?text=<?php the_permalink(); ?>"><i class="fa fa-whatsapp" aria-hidden="true"></i> Whatsapp</a></li>
<li><a href="#comments" class="icon comment-icon"><i class="fa fa-comments" aria-hidden="true"></i> <?php comments_number( 'no responses', 'one response', '% responses' ); ?></a></li>
<li><i class="fa fa-eye" aria-hidden="true"></i> <?php echo getPostViews(get_the_ID()); ?></li>
          </ul>
      </div>
  </div>
  <div class="clearfix"> </div>  
<?php endif; ?>
<?php endif; ?>
<!-- Content -->
    	<div class="single-grid">
        	<a><?php the_title(); ?></a>
            	<?php the_content();  ?>
        </div>
                                  <hr>
<a class="btn btn-primary btn-sm" el="nofollow" href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php echo urlencode(get_the_title($id)); ?>"><i class="fa fa-facebook-official" aria-hidden="true"></i> Facebook</a>
<a class="btn btn-danger btn-sm" rel="nofollow" href="https://plus.google.com/share?url=<?php the_permalink();?>"><i class="fa fa-google-plus" aria-hidden="true"></i> Google</a>
<a class="btn btn-info btn-sm" rel="nofollow" href="http://twitter.com/share?text=<?php the_title(); ?>&url=<?php the_permalink(); ?>"><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</a>
<a class="btn btn-danger btn-sm" rel="nofollow" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&description=<?php the_title(); ?>"><i class="fa fa-pinterest" aria-hidden="true"></i> Pinterest</a>
<a class="btn btn-success btn-sm" rel="nofollow" href="whatsapp://send?text=<?php the_permalink(); ?>"><i class="fa fa-whatsapp" aria-hidden="true"></i> Whatsapp</a>
<hr>
<?php comments_template(); ?>
<?php endif; ?>

          </div>
      </div>
</div>
<?php get_footer(); ?>
<script type="text/javascript">
<!-- Custom made by Kevin Fonseca - You can add your own scripts here -->
$(function () {
    $('a.removeBlank').on('click', function () {

        if ($(this).attr('target') == "_blank") {
            $(this).attr('target', '_self');
        }

        $(this).click();

        return false;
    })
});
// Solution to stop current video when a different option is clicked
$('a.nav-link').click(function(e) {    
    $('div#myTabContent div.tab-pane.active iframe').attr('src',function() { return $(this).attr('src'); });
});

$('a.nav-link:first').trigger('click');
</script>
