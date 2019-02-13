<?php ob_start(); ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

<!--Google Analytics-->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-108804823-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-108804823-1');
</script>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700|Merriweather:300,400,700" rel="stylesheet">
<title><?php wp_title(); ?></title>	
<?php if (in_array($_SERVER['REMOTE_ADDR'], array('127.0.0.1', '::1'))) : ?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url') ?>/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url') ?>/css/font-awesome.css">
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url') ?>/css/animate.min.css">
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url') ?>/css/swiper.min.css">
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url') ?>/css/jquery.fancybox.min.css">
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url') ?>/css/bootstrap-datepicker.css">
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url') ?>/css/main.css">
<?php else: ?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url') ?>/assets/style.min.css">
<?php endif; ?>

<link rel="shortcut icon" href="<?php bloginfo('template_url') ?>/img/favicon.png">
<link rel="apple-touch-icon" href="<?php bloginfo('template_url') ?>/img/favicon.png">


<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<nav id="language-selector">
	<div class="container">
		<?php
		$arg = array(
			'dropdown' => 0,
			'show_names' => 0,
			'display_names_as' => 'slug',
			'show_flags' => 0,
			'hide_if_empty' => 1,
			'force_home' => 1,
			'echo' => 1,
			'hide_if_no_translation' => 0,
			'hide_current'=> 0,
			'post_id' => null,
			'raw' => 0,
		);
		echo '<ul>';
		pll_the_languages($arg);
		echo '</ul>';
		?>
	</div>
</nav>
<header id="header">
	<div class="container">
		<div class="header-wrapper">
			<div class="row">
				<div class="col-md-2 col-sm-2 col-xs-6">
					<div id="logowrapper">
						<a href="<?php bloginfo('url'); ?>" id="logoheader" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a>
					</div>
				</div>
				<div class="col-md-10 col-sm-10 col-xs-6 no-relative">
					<span id="menumobile"></span>
					<nav class="categories">
						
						<?php //wp_nav_menu(array('menu' => 'topo', )); ?>
						<ul>
							<?php 

							$current = pll_current_language();
							$default = pll_default_language();

							if ($default == $current) {
								$name = 'topo';
							} else {
								$name = 'topo-'.$current;
							}

							$menu = wp_get_nav_menu_items($name);
							foreach ($menu as $cat) : ?>
							<li>
								<a href="<?php echo $cat->url; ?>"><?php echo $cat->title; ?></a>
								<?php if ($cat->object == "category") : ?>

								<?php
									
									//echo $cat->url;
									$split = explode("/",$cat->url);
									$count = count($split);
									$slug = $split[$count-2];
									$category = get_category_by_slug($slug);
									//print_r($category);

								?>

								<div class="submenu">
									<div class="container-fluid">
										<div class="row">
											<?php
											$args = array(
												'cat' => $category->cat_ID,
												'showposts' => 4, 
											);
											$loop = new WP_query($args);
											if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post(); ?>
												<div class="col-md-3">
													<figure class="entry-post">
														<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('submenu', array('title' => get_the_title(), 'alt' => get_the_title())); ?></a>
														<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
													</figure>
												</div>
											<?php endwhile; endif; ?>
											<?php wp_reset_query(); ?>
										</div>
									</div>
								</div>
								<?php endif; ?>
							</li>
							<?php endforeach; ?>
						</ul>
						<div class="clearfix"></div>
					</nav>
				</div>
			</div>
		</div>
	</div>
</header>
<main id="content">
