class Export
	constructor: ->
		@url = "#{BASE_URL}clientes/rest"
		
	export: (@format) ->
										
		switch @format
			when "JSON" then @requestAjax @format
			when "XML" then @showForm()	
			
	requestAjax: (@format) ->
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