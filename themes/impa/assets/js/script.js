jQuery(document).ready(function ($) {
	$(window).resize(function () {
		ajustaProporcao();
	});

	function ajustaProporcao() {
		$('.ultimas-noticias figure').each(function () {
			$figure = $(this);
			$imagem = $figure.find('img');
			$width = $figure.width();
			$height = ($width * 9) / 16;

			$figure.css({
				height: $height,
				overflow: 'hidden',
			});
		});

		$('#noticias figure').each(function () {
			$figure = $(this);
			$imagem = $figure.find('img');
			$width = $figure.width();
			$height = ($width * 9) / 16;

			$figure.css({
				height: $height,
				overflow: 'hidden',
			});
		});
	}

	ajustaProporcao();

	$('.menu-toggle').click(function () {
		$('.main-navigation ul').toggle();
	});

	$('.filtro-anos')
		.find('button')
		.click(function () {
			$cat = $(this).attr('class');
			// $cat = $cat.split('-')[1];
			console.log('$cat = ' + $cat);

			$('.filtro-anos').find('button').prop('disabled', false);
			$(this).prop('disabled', true);

			$('.filtro-anos').find('button').removeClass('selecionado');
			$(this).toggleClass('selecionado');

			if ($(this).hasClass('todos')) {
				$('.eventos-cientificos').find('li').show();
				console.log('$cat', $cat);
			} else {
				$('.eventos-cientificos').find('li').hide();
				$('.eventos-cientificos')
					.find('.' + $cat)
					.fadeIn('fast');
				console.log('$cat = ' + $cat);
			}

			// filtraEventos($cat);
		});

	function filtraEventos($cat) {
		if ($cat == 'todos') {
			$('.eventos-cientificos').find('li').show();
			console.log('$cat = ' + $cat);
		} else {
			$('.eventos-cientificos').find('li').hide();
			$('.eventos-cientificos')
				.find('.' + $cat)
				.fadeIn('fast');
			console.log('$cat = ' + $cat);
		}
	}

	$('#lista-de-anos a').click(function (e) {
		e.preventDefault();
		const $ano = this.text;

		$('#lista-de-defesas li').hide();
		$('#lista-de-defesas .' + $ano).show();
	});
});
