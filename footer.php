</main>
<footer id="footer">
	<div class="row1">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="categories-footer">
						<p class="title"><?php pll_e('Categorias'); ?></p>
						<ul>
							<?php 

							$current = pll_current_language();
							$default = pll_default_language();

							if ($default == $current) {
								$name = 'footer';
							} else {
								$name = 'footer-'.$current;
							}

							$menu = wp_get_nav_menu_items('footer');
							foreach ($menu as $cat) : ?>
							<?php if ($cat->object == "category") : ?>
							<li><a href="<?php echo $cat->url ?>"><?php echo $cat->title; ?></a></li>
							<?php endif; endforeach;?>
						</ul>
						<?php //wp_nav_menu(array('menu' => 'footer')); ?>
					</div>
				</div>
				<div class="col-md-4">
					<div class="links-socials">
						<p class="title"><?php pll_e('Siga-nos'); ?></p>

						<?php
                        $face = get_option('facebook_icon');
                        $insta = get_option('instagram_icon');
                        $whats = get_option('whatsapp_icon');
                        $linkedin = get_option('linkedin_icon');
                        $google = get_option('google_icon');
                        $pinterest = get_option('pinterest_icon');
						
						 if (isset($face) && !empty($face)) : ?>
						<a href="<?php echo $face; ?>" class="link facebook" target="_blank" title="Facebook">Facebook</a>
						<?php endif; ?>
						<?php if (isset($insta) && !empty($insta)) : ?>
						<a href="<?php echo $insta; ?>" class="link instagram" target="_blank" title="Instagram">Instagram</a>
						<?php endif; ?>
						<?php if (isset($whats) && !empty($whats)) : ?>
						<a href="https://api.whatsapp.com/send?phone=<?php echo $whats; ?>" class="link whatsapp" target="_blank" title="WhatsApp">WhatsApp</a>
						<?php endif; ?>
						<?php if (isset($linkedin) && !empty($linkedin)) : ?>
						<a href="<?php echo $linkedin; ?>" class="link linkedin" target="_blank" title="LinkedIn">LinkedIn</a>
						<?php endif; ?>
						<?php if (isset($google) && !empty($google)) : ?>
						<a href="<?php echo $google; ?>" class="link google" target="_blank" title="Google +">Google +</a>
						<?php endif; ?>
						<?php if (isset($pinterest) && !empty($pinterest)) : ?>
						<a href="<?php echo $pinterest; ?>" class="link pinterest" target="_blank" title="Pinterest">Pinterest</a>
						<?php endif; ?>
					</div>
				</div>
				<div class="col-md-4">
					<div class="news-footer">
						<div class="row">
							<div class="col-md-6">
								<div class="align-center">
									<div class="icon-mail"></div>
									<p class="title"><?php pll_e('Receba novidades por e-mail'); ?></p>
								</div>
							</div>
							<div class="col-md-6">
								<form name="newsletterfooter" id="newsletterfooter" class="form">
									<input type="text" name="name" placeholder="<?php pll_e('Nome'); ?>:" required>
									<input type="text" name="email" placeholder="E-mail:" required>
									<input type="hidden" name="assunto" value="Newsletter">
									<button type="submit"><?php pll_e('Enviar'); ?></button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row2">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<ul class="links-footer">
						<li><a href="<?php bloginfo('url') ?>/politica-de-privacidade/"><?php pll_e('Política de Privacidade'); ?></a></li>
						<li><a href="<?php bloginfo('url') ?>/contacto/"><?php pll_e('Contato'); ?></a></li>
					</ul>
				</div>
				<div class="col-md-4">
					<p class=""><?php pll_e('Entrega a nível nacional através da DHL ou Fedex'); ?></p>
				</div>
				<div class="col-md-4">
					<p><?php pll_e('Aceitamos'); ?></p>
					<img src="<?php bloginfo('template_url') ?>/img/cards.png" alt="Cartões">
				</div>
			</div>
		</div>
	</div>
</footer>
<?php if (in_array($_SERVER['REMOTE_ADDR'], array('127.0.0.1', '::1'))) : ?>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.scrollTo.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.mask.js"></script>
<?php endif; ?>
<?php wp_footer(); ?>
</body>
</html>
<?php $html = ob_get_clean();
echo preg_replace('/\s+/', ' ', $html); ?>
