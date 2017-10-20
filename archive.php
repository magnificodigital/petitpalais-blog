<?php

	get_header();
    $items = array();
    if (have_posts()) : while (have_posts()) : the_post();

    	$id = get_the_ID();
		$item['titulo'] = get_the_title();
		$item['link'] = get_the_permalink();
		$item['data'] = get_the_time('d/m/Y');
		$item['excerpt'] = get_the_excerpt();
		$item['big'] = get_the_post_thumbnail($id,'630x465', array('title' => get_the_title(), 'alt' => get_the_title()));
		$item['medium'] = get_the_post_thumbnail($id,'490x375', array('title' => get_the_title(), 'alt' => get_the_title()));
		$item['small'] = get_the_post_thumbnail($id,'320x375', array('title' => get_the_title(), 'alt' => get_the_title()));
	    array_push($items, $item);

	endwhile;
	endif;

	global $wp_query;
    $big = 999999999;
    $pg = array(
        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format' => '?paged=%#%',
        'current' => max( 1, get_query_var('paged') ),
        'total' => $wp_query->max_num_pages
    );
    
    $navigation = '<div class="navigation">'.paginate_links($pg).'</div>';

?>

<section id="page">
	<div class="container">
		<?php get_template_part('inc/breadcrumbs'); ?>
		<h1 class="title-single"><?php single_cat_title('',true); ?></h1>
		<?php if (isset($items[0]) && !empty($items[0])) : ?>
		<div class="gray-row-wrapper">
			<div class="row">
				<div class="col-md-6 col-sm-6 col-xs-12">
					<div class="thumb">
						<a href="<?php echo $items[0]['link']; ?>" title="<?php the_title(); ?>">
							<?php echo $items[0]['big']; ?>
						</a>
					</div>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-12">
					<figure class="entry-post">
						<h2 class="title"><a href="<?php echo $items[0]['link']; ?>"><?php echo $items[0]['titulo']; ?></a></h1>
						<p class="vintage"><?php pll_e('Data'); ?>: <?php echo $items[0]['data']; ?></p>
						<div class="excerpt first-letter">
							<?php echo $items[0]['excerpt']; ?>
						</div>
						<a class="read-more" href="<?php echo $items[0]['link']; ?>"><?php pll_e('Leia Sobre'); ?></a>
					</figure>
				</div>
				
			</div>
		</div>
		<?php endif; ?>

		<div class="last-posts">
			<div class="row">
				<?php if (isset($items[1]) && !empty($items[1])) : ?>
				<div class="col-md-5">
					<div class="more-views">
						<div class="thumb">
							<a href="<?php echo $items[1]['link']; ?>">
								<?php echo $items[1]['medium']; ?>
							</a>
						</div>
						<figure class="entry-post">
							<h3><a href="<?php echo $items[1]['link']; ?>"><?php echo $items[1]['titulo']; ?></a></h3>
							<div class="excerpt">
								<?php echo $items[1]['excerpt']; ?>
							</div>
							<p class="date"><?php pll_e('Data'); ?>: <?php echo $items[1]['data']; ?></p>
							<a class="read-more" href="<?php echo $items[1]['link']; ?>"><?php pll_e('Leia Sobre'); ?></a>
						</figure>
					</div>
				</div>
				<?php endif; ?>
				<div class="col-md-7">
					<div class="row">

						<?php if (isset($items[2]) && !empty($items[2])) : ?>
						<div class="col-md-6 col-sm-6 col-xs-6">
							<a href="<?php echo $items[2]['link']; ?>">
								<?php echo $items[2]['small']; ?>
							</a>
							<figure class="entry-post">
								<h3><a href="<?php echo $items[2]['link']; ?>"><?php echo $items[2]['titulo']; ?></a></h3>
								<div class="excerpt">
									<?php echo $items[2]['excerpt']; ?>
								</div>
								<p class="date"><?php pll_e('Data'); ?>: <?php echo $items[2]['data']; ?></p>
								<a class="read-more" href="<?php echo $items[2]['link']; ?>"><?php pll_e('Leia Sobre'); ?></a>
							</figure>
						</div>
						<?php endif; ?>

						<?php if (isset($items[3]) && !empty($items[3])) : ?>
						<div class="col-md-6 col-sm-6 col-xs-6">
							<a href="<?php echo $items[3]['link']; ?>">
								<?php echo $items[3]['small']; ?>
							</a>
							<figure class="entry-post">
								<h3><a href="<?php echo $items[3]['link']; ?>"><?php echo $items[3]['titulo']; ?></a></h3>
								<div class="excerpt">
									<?php echo $items[3]['excerpt']; ?>
								</div>
								<p class="date"><?php pll_e('Data'); ?>: <?php echo $items[3]['data']; ?></p>
								<a class="read-more" href="<?php echo $items[3]['link']; ?>"><?php pll_e('Leia Sobre'); ?></a>
							</figure>
						</div>
						<?php endif; ?>


					</div>
				</div>
			</div>
		</div>
		<div class="more-views">
			<div class="row">
				<?php if (isset($items[4]) && !empty($items[4])) : ?>
				<div class="col-md-7 col-sm-12">
					<div class="gray-row-wrapper">
						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-6">
								<a href="<?php echo $items[4]['link']; ?>">
									<?php echo $items[4]['small']; ?>
								</a>
								<figure class="entry-post">
									<h3><a href="<?php echo $items[4]['link']; ?>"><?php echo $items[4]['titulo']; ?></a></h3>
									<div class="excerpt">
										<?php echo $items[4]['excerpt']; ?>
									</div>
									<p class="date"><?php pll_e('Data'); ?>: <?php echo $items[4]['data']; ?></p>
									<a class="read-more" href="<?php echo $items[4]['link']; ?>"><?php pll_e('Leia Sobre'); ?></a>
								</figure>
							</div>

							<?php if (isset($items[5]) && !empty($items[5])) : ?>
							<div class="col-md-6 col-sm-6 col-xs-6">
								<a href="<?php echo $items[5]['link']; ?>">
									<?php echo $items[5]['small']; ?>
								</a>
								<figure class="entry-post">
									<h3><a href="<?php echo $items[5]['link']; ?>"><?php echo $items[5]['titulo']; ?></a></h3>
									<div class="excerpt">
										<?php echo $items[5]['excerpt']; ?>
									</div>
									<p class="date"><?php pll_e('Data'); ?>: <?php echo $items[4]['data']; ?></p>
									<a class="read-more" href="<?php echo $items[4]['link']; ?>"><?php pll_e('Leia Sobre'); ?></a>
								</figure>
							</div>
							<?php endif; ?>

						</div>
					</div>
				</div>
				<?php endif; ?>
				<?php if (isset($items[6]) && !empty($items[6])) : ?>
				<div class="col-md-5 col-sm-12">
					<br />
					<div class="thumb">
						<a href="<?php echo $items[6]['link']; ?>">
							<?php echo $items[6]['medium']; ?>
						</a>
					</div>
					<figure class="entry-post">
						<h3><a href="<?php echo $items[6]['link']; ?>"><?php echo $items[6]['titulo']; ?></a></h3>
						<div class="excerpt">
							<?php echo $items[6]['excerpt']; ?>
						</div>
						<p class="date"><?php pll_e('Data'); ?>: <?php echo $items[6]['data']; ?></p>
						<a class="read-more" href="<?php echo $items[6]['link']; ?>"><?php pll_e('Leia Sobre'); ?></a>
					</figure>
				</div>
				<?php endif; ?>
			</div>
		</div>
		<?php get_template_part('inc/totop'); ?>
		<?php echo $navigation; ?>
	</div>
</section>
<?php get_footer(); ?>