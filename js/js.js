$(document).ready(function(){
	$("#li1").click(function show_chart(){
		$("#li1").css('background','#ffffff');
		$("#li2").css('background','');
		$("#li3").css('background','');
		$(".chart_content").fadeIn(1000);
		$(".detail_content").fadeOut(1000);
		$(".analyze_content").fadeOut(1000);
	});
	$("#li2").click(function show_detail(){
		$("#li2").css('background','#ffffff');
		$("#li1").css('background','');
		$("#li3").css('background','');
		$(".chart_content").fadeOut(1000);
		$(".analyze_content").fadeOut(1000);
		if (window.XMLHttpRequest)
		{
			xmlhttp = new XMLHttpRequest();// code for IE7+, Firefox, Chrome, Opera, Safari
		}
		else
		{
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");// code for IE6, IE5
		}
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById("detail").innerHTML = this.responseText;
			}
		};
		xmlhttp.open("GET","ajax.php?q=1",true);
		xmlhttp.send();
		$(".detail_content").fadeIn(1000);
	});
	$("#li3").click(function show_analyze(){
		$("#li3").css('background','#ffffff');
		$("#li1").css('background','');
		$("#li2").css('background','');
		$(".chart_content").fadeOut(1000);
		$(".detail_content").fadeOut(1000);
		if (window.XMLHttpRequest)
		{
			xmlhttp = new XMLHttpRequest();// code for IE7+, Firefox, Chrome, Opera, Safari
		}
		else
		{
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");// code for IE6, IE5
		}
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById("analyze").innerHTML = this.responseText;
			}
		};
		xmlhttp.open("GET","ajax.php?q=2",true);
		xmlhttp.send();
		$(".analyze_content").fadeIn(1000);
	});
});