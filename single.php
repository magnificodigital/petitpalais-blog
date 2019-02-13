<?php get_header(); ?>
<section id="page" class="single">
	<div class="container">
		<?php get_template_part('inc/breadcrumbs'); ?>		
		<div class="content-wrapper">

			<!--Thumbnail-->
			<div class="single-thumbnail">
				<?php the_post_thumbnail('600x600', array('title' => get_the_title(), 'alt' => get_the_title())); ?>
			</div>

			<!--Author-->
			<div class="author">
				<div class="row">
					<div class="col-xs-3">
						 <?php echo get_avatar(get_the_author_meta('ID'), 70); ?> 
					</div>
					<div class="col-xs-5">
						<p><b><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' )); ?>"><?php echo get_the_author_meta('nicename'); ?></a></b></p>
						<p><?php the_time('d/m/Y'); ?></p>
						<?php $tempo = get_field('tempo_leitura',get_the_ID());?>
						<?php if (isset($tempo) && !empty($tempo)) : ?>
						<p><?php pll_e('Leitura'); ?>: <?php echo $tempo; ?>min</p>
						<?php endif; ?>
					</div>
					<div class="col-xs-4">
						<p>
						<?php $categories = get_the_category(get_the_ID());
						foreach ($categories as $cat) {
							$url = get_category_link($cat->cat_ID); ?>
							<a href="<?php echo $url; ?>"><?php echo $cat->cat_name; ?>,</a>
						<?php } ?>
						</p>
					</div>
				</div>
			</div>
			<?php get_template_part('inc/share'); ?>
			<h1><?php the_title(); ?></h1>
			<article class="content">
				<?php the_content(); ?>
			</article>
		</div>
		<div id="tags">
			<?php the_tags('<strong>Tags:</strong> ',', ','.'); ?> 
		</div>
		<div id="related-posts">
			<h3 class="title-single"><?php pll_e('Posts Relacionados'); ?></h3>
			<div class="row">
				<?php $posts = my_related_posts(3);
				foreach ($posts as $post) { ?>
					<div class="col-md-4 col-sm-4 col-xs-12">
						<figure class="entry-post">
							<div class="row">
								<div class="col-xs-4">
									<a href="<?php echo $post['link']; ?>">

										<?php echo $post['thumbnail']; ?>

										<?php //the_post_thumbnail('thumbnail', array('title' => get_the_title(), 'alt' => get_the_title())); ?>
									</a>
								</div>
								<div class="col-xs-8">
									<h4><a href="<?php echo $post['link']; ?>"><?php echo $post['titulo']; ?></a></h4>
									<div class="excerpt first-letter">
										<?php echo $post['excerpt']; ?>
									</div>
									<a class="read-more" href="<?php echo $post['link']; ?>"><?php pll_e('Leia Sobre'); ?></a>
								</div>
							</div>
						</figure>
					</div>
				<?php }	?>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>