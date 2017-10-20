<?php get_header();?>
<section id="page">
	<div class="container">
		<?php get_template_part('inc/breadcrumbs'); ?>
		<h1 class="title-single"><?php pll_e('Resultados para') ?>: <strong><?php echo get_search_query(); ?></strong></h1>
		<div class="last-posts">
			<div class="row">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="col-md-4 col-sm-6 col-xs-6">
					<figure class="entry-post post-search">
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail('490x375', array('title' => get_the_title(), 'alt' => get_the_title())); ?>
						</a>
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<div class="excerpt">
							<?php the_excerpt(); ?>
						</div>
						<p class="date"><?php pll_e('Data'); ?>: <?php the_time('d/m/Y'); ?></p>
						<a class="read-more" href="<?php the_permalink(); ?>"><?php pll_e('Leia sobre'); ?></a>
					</figure>
				</div>
				<?php endwhile; endif; ?>
			</div>
		</div>
		
		<?php get_template_part('inc/totop');
		
		global $wp_query;
	    $big = 999999999;
	    $pg = array(
	        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	        'format' => '?paged=%#%',
	        'current' => max( 1, get_query_var('paged') ),
	        'total' => $wp_query->max_num_pages
	    );
    	$navigation = '<div class="navigation">'.paginate_links($pg).'</div>';
		echo $navigation; ?>
	</div>
</section>
<?php get_footer(); ?>