jQuery(document).ready(function ($) {
	$(window).resize(function () {
		ajustaProporcao();
	});

	function ajustaProporcao(elemento) {
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

		$('#lista-json-pessoas figure').each(function (index) {
			$figure = $(this);
			$imagem = $figure.find('img');
			$width = $figure.width();
			$height = ($width * 4) / 3;

			$figure.css({
				height: $height,
			});
		});

		$('.lista-de-pessoas figure').each(function (index) {
			$figure = $(this);
			$width = $figure.width();
			$height = ($width * 4) / 3;

			console.log('$width', $width);

			$figure.css({
				height: $height,
			});
		});

		$('.list-thumb-title-link figure').each(function () {
			$figure = $(this);
			$imagem = $figure.find('img');
			$width = $figure.width();
			$height = ($width * 4) / 3;

			$figure.css({
				height: $height,
				overflow: 'hidden',
			});
		});
	}

	ajustaProporcao();

	$('.menu-toggle').click(function () {
		$('.main-navigation ul').toggle();
		$('.main-navigation ul .sub-menu').css('display', 'block !important');
	});

	const $termosFiltro = [];
	$('.filtro li').each(function () {
		$(this).click(function () {
			$data_status = $(this).data('status');
			executaFiltro($data_status);
		});
		$data_status = $(this).data('status');
		$termosFiltro.push($data_status);
	});
	if ($termosFiltro.length > 0) {
		$('#lista-json-pessoas li').hide();
		$('#lista-json-pessoas [data-status=' + $termosFiltro[0] + ']').show();
	}

	function executaFiltro(param) {
		$('.filtro button').removeClass('active');
		$('.filtro [data-status=' + param + ']')
			.find('button')
			.addClass('active');

		if (param == 'todos') {
			$('#lista-json-pessoas li').show();
		} else {
			$('#lista-json-pessoas li').hide();
			$('#lista-json-pessoas .' + param).show();
		}
		console.log('param', param);
	}

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

	// 	$('#lista-de-anos a').click(function (e) {
	// 		e.preventDefault();
	// 		const $ano = this.text;
	//
	// 		$('#lista-de-defesas li').hide();
	// 		$('#lista-de-defesas .' + $ano).show();
	// 	});
});
