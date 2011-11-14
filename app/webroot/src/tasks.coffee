class Task
	constructor: ->
		@url = "#{BASE_URL}tasks/edit"
		@urlAdd = "#{BASE_URL}tasks/add"
		
	check: (@id) ->
		$.ajax
			type: "post",
			url: @url,
			data: "id="+@id
			success: (data) ->
					
	addTask: (@id, @content) ->
		$.ajax
			type: "post",
			url: @urlAdd,
			data: "id="+@id+"&conteudo="+@content
			success: (data) ->		

				$('.tasks-abertas > ol').append data
		
		
$ ->
	$('.addTaskBtn').click ->
		id = $(@).parent().children('.hiddentaskid').val()
		content = $(@).parent().children('.contenttaskadd').val()
		
		tsk = new Task()
		tsk.addTask(id,content)
		
		$(@).parent().children('.contenttaskadd').val("")
		
	$('.contenttaskadd').keypress (event) ->
		if event.which is 13 
			id = $(@).parent().children('.hiddentaskid').val()
			content = $(@).val()
			
			tsk = new Task()
			tsk.addTask(id,content)
			
			$(@).val("")
			
		
	$('.checkTask').live 'click',->
		
		tsk = new Task()
		id = $(@).val()
		tsk.check id
		
		parent = $(@).parent()
		
		proximo = $(@).parent().children('span').html()
		parent.hide 300
		
		$('.tasks-concluidas > ul').append('<li>'+proximo+"</li>");
		