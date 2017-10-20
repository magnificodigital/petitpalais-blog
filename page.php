<?php get_header(); ?>
<section id="page">
	<div class="container">
		<?php get_template_part('inc/breadcrumbs'); ?>
		<h1 class="title-single"><?php the_title(); ?></h1>
		<?php if (is_page('contato') || is_page('contact') || is_page('contacto')) : ?>
			<div class="content-contato">
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-12">
						<img src="<?php bloginfo('template_url'); ?>/img/contato.png" alt="Petit Palais" />
					</div>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<h2 class="vintage"><?php pll_e('Entre em contato conosco') ?>:</h2>
						<p><?php pll_e('Use o formulário abaixo ou fale conosco por telefone, e-mail ou pelas redes sociais. Vamos adorar conversar com você!'); ?>:</p>
						<form id="faleconosco" name="faleconosco" class="form">
							<input type="text" name="nome" placeholder="<?php pll_e('Nome'); ?>:" required>
							<input type="email" name="email" placeholder="E-mail:" required>
							<input type="text" name="telefone" placeholder="<?php pll_e('Telefone'); ?>:">
							<input type="hidden" name="assunto" value="Fale Conosco">
							<textarea name="mensagem" placeholder="<?php pll_e('Mensagem'); ?>:"></textarea>
							<div class="buttons">
								<!--<button type="button"><?php pll_e('Exibir telefone'); ?></button>-->
								<button type="submit"><?php pll_e('Enviar'); ?></button>
							</div>
						</form>
					</div>
				</div>
			</div>
		<?php elseif ('politica-de-privacidade'): ?>
			<div id="privacy">
				<?php the_content(); ?>
				<div class="ass">
					<img src="<?php bloginfo('template_url') ?>/img/ass.png" alt="Assinatura" />
				</div>
				<div class="selo">
					<img src="<?php bloginfo('template_url') ?>/img/selo.png" alt="Selo" />
				</div>
				<div class="clearfix"></div>
			</div>
		<?php else : ?>
			<div class="content">
				<?php the_content(); ?>
			</div>
		<?php endif; ?>
	</div>
</section>
<?php //endwhile; endif; ?>
<?php get_footer();?>