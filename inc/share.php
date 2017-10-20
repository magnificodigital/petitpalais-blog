<div class="share-icons">

	<span><?php pll_e('Compartilhar'); ?>:</span>

	<!--Facebook-->
	<a href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>&t=<?php the_title(); ?>" target="_blank" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>

	<!--Twitter-->
	<a href="http://twitter.com/share?text=<?php the_title(); ?>&url=<?php the_permalink(); ?>&counturl=URL&via=USUARIO" target="_blank" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>

	<!--Google -->
	<a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" target="_blank" class="google">
	<i class="fa fa-google" aria-hidden="true"></i>
	</a>

	<!--Pinterest-->
	<a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php the_post_thumbnail_url(); ?>&description=<?php the_title(); ?>" target="_blank" class="pinterest">
	<i class="fa fa-pinterest" aria-hidden="true"></i>
	</a>

	<!--WhatsApp-->
	<a href="whatsapp://send?text=<?php the_title(); ?> - <?php the_permalink(); ?>" target="_blank" class="whatsapp">
	<i class="fa fa-whatsapp" aria-hidden="true"></i>
	</a>

	<!--Linkedin-->
	<a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>&summary=&source=<?php bloginfo('name'); ?>" target="_blank" class="linkedin">
	<i class="fa fa-linkedin" aria-hidden="true"></i>
	</a>

</div>