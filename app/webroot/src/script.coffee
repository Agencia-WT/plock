$ ->
	
	$('.close').live "click", ->
		$(@).parent().hide 300
		
	$("table#tableClientes").tablesorter({ sortList: [[0,0]] });
	
	$('.delete').live "click", ->
		$('#modal-delete-cliente').modal 'show'
		
	$(".closemodal").live "click", ->
		$('#modal-delete-cliente').modal 'hide'
		
	$('.input-search-cliente-topbar').keypress (event) ->
		if event.which is "13" then $(@).parent().submit()
		
	$('.box-ftps').mouseover ->
		$(@).children().children('.actions-buttons').children().show()
		
	$('.box-ftps').mouseout ->
		$(@).children().children('.actions-buttons').children().hide()
		
