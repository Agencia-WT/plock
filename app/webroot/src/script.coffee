$ ->
	$('.close').live "click", ->
		$(@).parent().hide 300
		
	$("table#tableClientes").tablesorter({ sortList: [[1,0]] });