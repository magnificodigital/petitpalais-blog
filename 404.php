<?php get_header(); ?>
<section id="page">
	<div class="container">
		<?php get_template_part('inc/breadcrumbs'); ?>
		<h1 class="title-single"><?php pll_e('Página não encontrada'); ?></h1>
		<div class="content-404">
			<h2 class="vintage"><?php pll_e('Sua busca não foi encontrada'); ?></h2>
			<p><?php pll_e('A página que você está buscando não foi encontrada, você pode fazer uma nova busca ou'); ?> <a href="<?php bloginfo('url'); ?>"><?php pll_e('voltar para home'); ?></a></p>
			<form name="searchform" method="get" action="<?php bloginfo('url') ?>" >
				<input type="text" name="s" id="s" placeholder="<?php pll_e('O que você está procurando?'); ?>">
				<input type="submit" value="<?php pll_e('Buscar'); ?>" class="vintage vintage-2" />
			</form>
		</div>
	</div>
</section>
<?php get_footer(); ?>