$(document).ready(function(){
	$('.table_teclado tr td').click(function(){
		$("#monto").val("");
		$("#total").val("");
		$(".total").text("");
	        

		var number = $(this).text();
		
		if (number == '')
		{
			$('#campo').val($('#campo').val().substr(0, $('#campo').val().length - 1));
			$('#numeros').text($('#numeros').text().substr(0, $('#numeros').text().length - 1));
		}
		else
		{
			$('#campo').val($('#campo').val() + number);
			$('#numeros').text($('#campo').val());

		}

	});
});