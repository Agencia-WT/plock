class Export
	constructor: ->
		@url = "/plock/clientes/rest"
		
	export: (@format) ->
	
		$.ajax
			type: "post",
			url: @url,
			data: "format="+@format
			success: (data) ->
				$("#resultREST").html data
					
				

$ ->
	$('.exportBtn').click ->
		param = $(@).attr "alt"
		
		exp = new Export()
		
		exp.export(param)