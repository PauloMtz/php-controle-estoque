// carrega os dados no modal de detalhes do item
$(document).on('click', '#detalhes', function(e) {
	var descricao = $(this).attr("data-descricao");
	var codigo_erp = $(this).attr("data-codigo");
	var part_number = $(this).attr("data-number");
	var fabricante = $(this).attr("data-fab");
	var maquina = $(this).attr("data-maquina");
	var dimensoes = $(this).attr("data-dimensoes");
	var posicao = $(this).attr("data-posicao");
	var qtde = $(this).attr("data-quantidade");
	var unit = $(this).attr("data-unit");
	$('#descricao').val(descricao);
	$('#codigo_erp').val(codigo_erp);
	$('#part_number').val(part_number);
	$('#fabricante').val(fabricante);
	$('#maquina').val(maquina);
	$('#dimensoes').val(dimensoes);
	$('#posicao_almox').val(posicao);
	$('#quantidade').val(qtde);
	$('#custo_unit').val(unit);
});

// carrega os dados no modal de pesquisa de item
$(document).on('click', '#buscar', function(e) {
	e.preventDefault();

	var pesquisar = $('#pesquisar').val();
	var campo = $('#campo').val();

	$.ajax({
		url: 'lista.php',
		data: {pesquisar:pesquisar, campo:campo},
		success: function(data) {
			$('.modal-body').html(data);
		}
	});
});

// envia os dados para o formulário de recebimento
$(document).on('click', '.selecionar', function(e) {
	e.preventDefault();

	var id = $(this).attr("data-id");
	var descricao = $(this).attr("data-descricao");
	var codigo_erp = $(this).attr("data-codigo");
	var part_number = $(this).attr("data-number");
	var dimensoes = $(this).attr("data-dimensoes");
	$('#rec_id').val(id);
	$('#rec_descricao').val(descricao);
	$('#rec_codigo').val(codigo_erp);
	$('#rec_number').val(part_number);
	$('#rec_dimensoes').val(dimensoes);

	$.ajax({
		type: 'post',
		url: 'receber-material',
		success: function(data) {
			$('#form-receber').html(data);
		}
	});
})

// envia os dados para o formulário de saída
$(document).on('click', '.selecionar', function(e) {
	e.preventDefault();

	var id = $(this).attr("data-id");
	var descricao = $(this).attr("data-descricao");
	var codigo_erp = $(this).attr("data-codigo");
	var part_number = $(this).attr("data-number");
	var dimensoes = $(this).attr("data-dimensoes");
	var unitario = $(this).attr("data-unit");
	$('#sai_id').val(id);
	$('#sai_descricao').val(descricao);
	$('#sai_codigo').val(codigo_erp);
	$('#sai_number').val(part_number);
	$('#sai_dimensoes').val(dimensoes);
	$('#sai_unit').val(unitario);

	$.ajax({
		type: 'post',
		url: 'saida-material',
		success: function(data) {
			$('#form-saida').html(data);
		}
	});
})

// calcula valor unitário no recebimento do item
function calcular() {
	var qtde = $("#rec_qtde").val();
	var total = $("#rec_total").val();

	if (qtde == 0) {
		total = 0;
	}
	var unit = total / qtde;
	// carrega o valor no campo
	$("#rec_unit").val(unit);
}

// calcula total na saída do item
function calcula_saida() {
	var qtde = $("#sai_qtde").val();
	var unit = $("#sai_unit").val();
	var total = qtde * unit;
	// carrega o valor no campo
	$("#sai_total").val(total);
}

// carrega os dados da pesquisa do item na tela de recebimento
/*$(document).on('keyup', '#pesquisar', function() {
	//console.log($(this).val());
	var pesquisar = $(this).val();
	var campo = $('#campo').val();

	// pegar parte da url
	/*var url = window.location.href;
	var url2 = url.split('receber-material.php');
	console.log(url2[0]+'oper/lista-itens.php');*/

	/*$.ajax({
		url: 'oper/lista-itens.php',
		type: 'GET',
		data: {pesquisar:pesquisar, campo:campo},
		dataType: 'json',
		success: function(data) {
			console.log(data);
		}
	});
});*/
