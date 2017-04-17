$(function () {
	$(".frame-section").attr("src", $("#report_select option:selected").val());

	$("#report_select").change(function () {
		$(".frame-section").attr("src", $("#report_select option:selected").val());
	});

	$(function () {
		var height = window.innerHeight;
		$('iframe').css('height', height);
	});

	//And if the outer div has no set specific height set..
	$(window).resize(function () {
		var height = window.innerHeight;
		$('iframe').css('height', height);
	});
});
