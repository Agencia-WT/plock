class Import
	constructor: ->
		@url = "/plock/clientes/import"
		
	import: (@format) ->
		# TODO switch com outros formatos
		@showForm()
	
	showForm: ->
		conteudo = "<div>
		<form method='post' enctype='multipart/form-data' action='"+@url+"'>
		Arquivo: <input type='file' name='data[Clientes][xml]'/>
		<input type='submit' value='enviar'/>
		</form>
		</div>"	
		area = $('#resultREST').html conteudo
		
		
$ ->
	$('.importBtn').click ->
		param = $(@).attr "alt"
		
		imp = new Import()
		
		imp.import(param)	