
(function ($) {
	"use strict";
	$('.column100').on('mouseover',function(){
		var table1 = $(this).parent().parent().parent();
		var table2 = $(this).parent().parent();
		var verTable = $(table1).data('vertable')+"";
		var column = $(this).data('column') + ""; 

		$(table2).find("."+column).addClass('hov-column-'+ verTable);
		$(table1).find(".row100.head ."+column).addClass('hov-column-head-'+ verTable);
	});

	$('.column100').on('mouseout',function(){
		var table1 = $(this).parent().parent().parent();
		var table2 = $(this).parent().parent();
		var verTable = $(table1).data('vertable')+"";
		var column = $(this).data('column') + ""; 

		$(table2).find("."+column).removeClass('hov-column-'+ verTable);
		$(table1).find(".row100.head ."+column).removeClass('hov-column-head-'+ verTable);
	});
    

})(jQuery);

function Home_Function() {
	var x = document.getElementById("container-home");
	var y = document.getElementById("container-Guards");
	x.style.display = "flex";
	y.style.display = "none";

	document.getElementById("btn_home").style.backgroundColor = "#6C7AE0";
	document.getElementById("btn_guards").style.backgroundColor = "#1d1d1d";
}

function guard_Function() {
	var x = document.getElementById("container-home");
	var y = document.getElementById("container-Guards");
	x.style.display = "none";
	y.style.display = "flex";

	document.getElementById("btn_home").style.backgroundColor = "#1d1d1d";
	document.getElementById("btn_guards").style.backgroundColor = "#6C7AE0";

}