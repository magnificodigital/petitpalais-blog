jQuery(function(){
	jQuery('span#menumobile').click(function(){
		jQuery('#header .categories ul').toggleClass('ativa');
	});
	jQuery('#content').click(function(){
		jQuery('#header .categories ul').removeClass('ativa');
	});
});

jQuery(function(){
	var header = jQuery('#header');
	var offset = header.offset().top;
	jQuery(window).scroll(function(){
		if (jQuery(this).scrollTop() > offset) { 
			header.addClass('fixed');
		} else {
			header.removeClass('fixed');
		}
	});
});

jQuery(function(){
    var elements = $('#totop');
    elements.click(function(e){
        $.scrollTo(this.hash || 0, 500);
        e.preventDefault();
    });
});

jQuery('.wp-caption').removeAttr('style');

//Fale Conosco
jQuery(document).ready(function(){
	//Primeira seção
	jQuery(".form").submit(function(e){
		var btn = jQuery(this).find('button[type="submit"]');
		var valbtn = btn.html();
		btn.html('<i class="fa fa-spin fa-spinner" aria-hidden="true"></i>');
		var dados = {
			'action': 'fale_conosco',
			'dados' : $(this).serialize()
		};
		$.post(ajax_object.ajax_url, dados, function(resposta) {	
			alert(resposta.mensagem);
		}, 'json');
		btn.html(valbtn);
		e.preventDefault();
		return false;
	});

});
