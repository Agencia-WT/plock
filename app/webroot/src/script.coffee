$ ->
	$('.close').live "click", ->
		$(@).parent().hide 300
		
	$("table#tableClientes").tablesorter({ sortList: [[1,0]] });
	
	$('.delete').live "click", ->
		$('#modal-delete-cliente').modal 'show'
		
	$(".closemodal").live "click", ->
		$('#modal-delete-cliente').modal 'hide'
		
