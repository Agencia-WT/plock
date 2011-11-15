(function() {
  var Task;
  Task = (function() {
    function Task() {
      this.url = "" + BASE_URL + "tasks/edit";
      this.urlAdd = "" + BASE_URL + "tasks/add";
      this.urlDelete = "" + BASE_URL + "tasks/delete";
    }
    Task.prototype.crud = function(id, content, param) {
      var url;
      this.id = id;
      this.content = content;
      this.param = param;
      switch (this.param) {
        case "add":
          url = this.urlAdd;
          break;
        case "delete":
          url = this.urlDelete;
          break;
        case "check":
          url = this.url;
      }
      return $.ajax({
        type: "post",
        url: url,
        data: "id=" + this.id + "&conteudo=" + this.content,
        success: function(data) {
          if (data) {
            return $('.tasks-abertas > ol').append(data);
          }
        }
      });
    };
    return Task;
  })();
  $(function() {
    $('.addTaskBtn').click(function() {
      var content, id, tsk;
      id = $(this).parent().children('.hiddentaskid').val();
      content = $(this).parent().children('.contenttaskadd').val();
      tsk = new Task();
      tsk.crud(id, content, "add");
      return $(this).parent().children('.contenttaskadd').val("");
    });
    $('.contenttaskadd').keypress(function(event) {
      var content, id, tsk;
      if (event.which === 13) {
        id = $(this).parent().children('.hiddentaskid').val();
        content = $(this).val();
        tsk = new Task();
        tsk.crud(id, content, "add");
        return $(this).val("");
      }
    });
    $('.checkTask').live('click', function() {
      var id, parent, proximo, tsk;
      tsk = new Task();
      id = $(this).val();
      tsk.crud(id, null, "check");
      parent = $(this).parent();
      proximo = $(this).parent().children('span').html();
      parent.hide(300);
      return $('.tasks-concluidas > ul').append('<li><img src="' + BASE_URL + '/img/trash.png" alt="' + id + '" class="removeTask">' + proximo + "</li>");
    });
    return $('.removeTask').live('click', function() {
      var id, tsk;
      tsk = new Task();
      id = $(this).attr('alt');
      tsk.crud(id, null, "delete");
      return $(this).parent().slideUp('300');
    });
  });
}).call(this);
