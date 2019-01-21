$('.carousel').carousel()

$('.select-user').chosen({
	disable_search_threshold: 10,
	width: '100%',
	no_results_text: "Oops, no hay resultados!"
});
$('.select-create').chosen({
	disable_search_threshold: 10,
	width: '50%',
	no_results_text: "Oops, no hay resultados!"
});
$('.select-viabilidad').chosen({
	placeholder_text_multiple:"Asigna las viabilidades",
	no_results_text: "Oops, no hay resultados!",
	width: "95%"
});


function formReset()
{
document.getElementById("myForm").reset();
}
$(document).ready(function(){
	$('#alert').hide();
	$('.btn_eliminar').click(function(e){
		e.preventDefault();
		if(! confirm("¿Estas seguro de eliminar la imagen?")){
			return false;
		}

		var img = $(this).parents('span');
		var form = $(this).parents('form');
		var url = form.attr('action');

		$('#alert').show();

		$.post(url,form.serialize(),function(result){

			img.fadeOut();
			$('#alert').html(result,message);

		}).fail(function(){
			$('#alert').html('Algo salio mal');
		});
	});
});



