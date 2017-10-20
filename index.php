<?php get_header(); ?>
<section id="home-posts">
	<div class="container">
		<div class="gray-row-wrapper">
			<div class="row">
				<div class="col-md-7 col-sm-6 col-xs-12">
					<?php 
                        $args = array(
                        'showposts' => 1, 
                        'orderby' => 'date',
						'order' => 'DESC'
					); 
                    ?>
                    <?php $loop = new WP_query($args); ?>
                    <?php if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post(); ?>
					<div class="thumb">
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							<?php the_post_thumbnail('630x465', array('title' => get_the_title(), 'alt' => get_the_title())); ?>
						</a>
					</div>
					<?php endwhile; endif; ?>
					<?php wp_reset_query(); ?>
				</div>
				<div class="col-md-5 col-sm-6 col-xs-12">
					<?php 
                        $args = array(
                        'showposts' => 1, 
                        'orderby' => 'date',
						'order' => 'DESC',
					); 
                    ?>
                    <?php $loop = new WP_query($args); ?>
                    <?php if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post(); ?>
					<figure class="entry-post">
						<h1 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
						<p class="vintage"><?php pll_e('Data'); ?>: <?php the_time('d/m/Y'); ?></p>
						<div class="excerpt first-letter">
							<?php the_excerpt(); ?>
						</div>
						<a class="read-more" href="<?php the_permalink(); ?>"><?php pll_e('Leia Sobre'); ?></a>
					</figure>
					<?php endwhile; endif; ?>
					<?php wp_reset_query(); ?>
					<section class="two-posts">
						<div class="row">
							<?php 
                       		$args = array(
		                        'showposts' => 2, 
		                        'orderby' => 'date',
								'order' => 'DESC',
								'offset' => 1,
							); 
		                    ?>
		                    <?php $loop = new WP_query($args); ?>
		                    <?php if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post(); ?>
							<div class="col-md-6 col-sm-6 col-xs-6">
								<figure class="entry-post">
									<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('280x200', array('title' => get_the_title(), 'alt' => get_the_title())); ?></a>
									<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
									<div class="excerpt">
										<?php the_excerpt(); ?>
									</div>
									<p class="date"><?php pll_e('Data'); ?>: <?php the_time('d/m/Y'); ?></p>
									<a class="read-more" href="<?php the_permalink(); ?>"><?php pll_e('Leia Sobre'); ?></a>
								</figure>
							</div>
							<?php endwhile; endif; ?>
							<?php wp_reset_query(); ?>

						</div>
					</section>
				</div>
			</div>
		</div>
		<div class="more-views">
			<div class="row">
				<div class="col-md-7 col-sm-12 col-xs-12">
					<h2 class="title"><?php pll_e('Mais Lidas'); ?></h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-7 col-sm-12">
					<div class="gray-row-wrapper">
						<div class="row">
							<?php 
                       		$args = array(
		                        'showposts' => 2, 
		                        'orderby' => 'date',
								'order' => 'DESC',
								'offset' => 3,
							); 
		                    ?>
		                    <?php $loop = new WP_query($args); ?>
		                    <?php if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post(); ?>
							<div class="col-md-6 col-sm-6 col-xs-6">
								<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('320x375',array('title' => get_the_title(),'alt'=>get_the_title())); ?> </a>
								<figure class="entry-post">
									<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
									<div class="excerpt">
										<?php the_excerpt(); ?>
									</div>
									<p class="date"><?php pll_e('Data'); ?>: <?php the_time('d/m/Y'); ?></p>
									<a class="read-more" href="<?php the_permalink(); ?>"><?php pll_e('Leia Sobre'); ?></a>
								</figure>
							</div>
							<?php endwhile; endif; ?>
							<?php wp_reset_query(); ?>
						</div>
					</div>
				</div>
				<div class="col-md-5 col-sm-12">
					<br />
					<?php 
               		$args = array(
                        'showposts' => 1, 
                        'orderby' => 'date',
						'order' => 'DESC',
						'offset' => 5,
					); 
                    ?>
                    <?php $loop = new WP_query($args); ?>
                    <?php if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post(); ?>
					<div class="thumb">
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('490x375',array('title' => get_the_title(),'alt'=>get_the_title())); ?></a>
					</div>
					<figure class="entry-post">
						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<div class="excerpt">
							<?php the_excerpt(); ?>
						</div>
						<p class="date"><?php pll_e('Data'); ?>: <?php the_time('d/m/Y'); ?></p>
						<a class="read-more" href="<?php the_permalink(); ?>"><?php pll_e('Leia Sobre'); ?></a>
					</figure>
					<?php endwhile; endif; ?>
					<?php wp_reset_query(); ?>
				</div>
			</div>
		</div>
		<div class="bannerhome">
			<?php 
                $args = array(
                'showposts' => 1, 
                'orderby' => 'date',
				'order' => 'DESC',
				'post_type' => 'banner'
			); 
            
            $loop = new WP_query($args);
            if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post(); ?>
            <?php 
            
            global $post;
            if ($post->post_name == "home") :

            	$link = get_field('link', get_the_ID());
            		
        		if (isset($link) && !empty($link)) : ?>
					<a href="<?php echo $link; ?>" target="_blank">
				<?php endif ; ?>

				<?php $image = get_field('banner_desktop',get_the_ID());
				if (wp_is_mobile()) {
					$image = get_field('banner_mobile',get_the_ID());
				} ?>

				<img src="<?php echo $image; ?>" alt="Banner" />

				<?php if (isset($link) && !empty($link)) : ?>
					</a>
				<?php endif;
				
			endif;?>
			<?php endwhile; endif; ?>
			<?php wp_reset_query(); ?>
		</div>
		<div class="gray-row-wrapper">
			<div class="row">
				<?php 
                    $args = array(
                    'showposts' => 1, 
                    'orderby' => 'date',
					'order' => 'DESC',
					'offset' => 6,
				); 
                ?>
                <?php $loop = new WP_query($args); ?>
                <?php if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post(); ?>
				<div class="col-md-6 col-sm-6 col-xs-12">
					<div class="thumb">
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							<?php the_post_thumbnail('630x465', array('title' => get_the_title(), 'alt' => get_the_title())); ?>
						</a>
					</div>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-12">
					<figure class="entry-post">
						<h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<p class="vintage"><?php pll_e('Data'); ?>: <?php the_time('d/m/Y'); ?></p>
						<div class="excerpt first-letter">
							<?php the_excerpt(); ?>
						</div>
						<a class="read-more" href="<?php the_permalink(); ?>"><?php pll_e('Leia Sobre'); ?></a>
					</figure>
				</div>
				<?php endwhile; endif; ?>
				<?php wp_reset_query(); ?>
			</div>
		</div>
		<div class="last-posts">
			<div class="row">
				<div class="col-md-5">
					<div class="more-views">
						<?php 
		                    $args = array(
		                    'showposts' => 1, 
		                    'orderby' => 'date',
							'order' => 'DESC',
							'offset' => 7,
						); 
		                ?>
		                <?php $loop = new WP_query($args); ?>
		                <?php if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post(); ?>
						<div class="thumb">
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail('490x375', array('title' => get_the_title(), 'alt' => get_the_title())); ?>
							</a>
						</div>
						<figure class="entry-post">
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<div class="excerpt">
								<?php the_excerpt(); ?>
							</div>
							<p class="date"><?php pll_e('Data'); ?>: <?php the_time('d/m/Y'); ?></p>
							<a class="read-more" href="<?php the_permalink(); ?>"><?php pll_e('Leia Sobre'); ?></a>
						</figure>
						<?php endwhile; endif; ?>
						<?php wp_reset_query(); ?>
					</div>
				</div>
				<div class="col-md-7">
					<div class="row">
						<?php 
		                	$args = array(
		                    'showposts' => 2, 
		                    'orderby' => 'date',
							'order' => 'DESC',
							'offset' => 8,
						); 
		                ?>
		                <?php $loop = new WP_query($args); ?>
		                <?php if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post(); ?>
						<div class="col-md-6 col-sm-6 col-xs-6">
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail('320x375', array('title' => get_the_title(), 'alt' => get_the_title())); ?>
							</a>
							<figure class="entry-post">
								<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<div class="excerpt">
									<?php the_excerpt(); ?>
								</div>
								<p class="date"><?php pll_e('Data'); ?>: <?php the_time('d/m/Y'); ?></p>
								<a class="read-more" href="<?php the_permalink(); ?>"><?php pll_e('Ler sobre'); ?></a>
							</figure>
						</div>
						<?php endwhile; endif; ?>
						<?php wp_reset_query(); ?>
					</div>
				</div>
			</div>
		</div>
		<?php get_template_part('inc/totop'); ?>
	</div>
</section>
<?php get_footer(); ?>