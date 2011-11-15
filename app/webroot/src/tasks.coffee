class Task
	constructor: ->
		@url = "#{BASE_URL}tasks/edit"
		@urlAdd = "#{BASE_URL}tasks/add"
		@urlDelete = "#{BASE_URL}tasks/delete"
				
	crud: (@id,@content,@param) ->
		switch @param
			when "add" then url = @urlAdd
			when "delete" then url = @urlDelete
			when "check" then url = @url
		
		$.ajax
			type: "post",
			url: url,
			data: "id="+@id+"&conteudo="+@content
			success: (data) ->		
				
				$('.tasks-abertas > ol').append data if data
		
$ ->
	
	$('.addTaskBtn').click ->
		id = $(@).parent().children('.hiddentaskid').val()
		content = $(@).parent().children('.contenttaskadd').val()
		
		tsk = new Task()
		tsk.crud id,content,"add"
		
		$(@).parent().children('.contenttaskadd').val("")
		
	
	$('.contenttaskadd').keypress (event) ->
		if event.which is 13 
			id = $(@).parent().children('.hiddentaskid').val()
			content = $(@).val()
			
			tsk = new Task()
			tsk.crud id,content,"add"
			
			$(@).val("")
				
	$('.checkTask').live 'click',->
		
		tsk = new Task()
		id = $(@).val()
		tsk.crud id,null,"check"
		
		parent = $(@).parent()
		
		proximo = $(@).parent().children('span').html()
		parent.hide 300
		$('.tasks-concluidas > ul').append('<li><img src="'+BASE_URL+'/img/trash.png" alt="'+id+'" class="removeTask">'+proximo+"</li>");
		
		
	$('.removeTask').live 'click', ->
		tsk = new Task()
		
		id = $(@).attr 'alt'
		tsk.crud id,null,"delete"
		
		$(@).parent().slideUp '300'
		