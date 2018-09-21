$('.carousel').carousel({
  interval: 4000
})

$('.select-user').chosen({
	disable_search_threshold: 10,
	width: '100%',
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
