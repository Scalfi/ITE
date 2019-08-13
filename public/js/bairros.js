$(document).ready(function () {
	$("#selectBairros").change(function(event) {
		liberarButton($("#selectBairros option:selected").val())
	});
});
