(function() {
  var Task;
  Task = (function() {
    function Task() {
      this.url = "" + BASE_URL + "tasks/edit";
      this.urlAdd = "" + BASE_URL + "tasks/add";
    }
    Task.prototype.check = function(id) {
      this.id = id;
      return $.ajax({
        type: "post",
        url: this.url,
        data: "id=" + this.id,
        success: function(data) {}
      });
    };
    Task.prototype.addTask = function(id, content) {
      this.id = id;
      this.content = content;
      return $.ajax({
        type: "post",
        url: this.urlAdd,
        data: "id=" + this.id + "&conteudo=" + this.content,
        success: function(data) {
          return $('.tasks-abertas > ol').append(data);
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
      tsk.addTask(id, content);
      return $(this).parent().children('.contenttaskadd').val("");
    });
    $('.contenttaskadd').keypress(function(event) {
      var content, id, tsk;
      if (event.which === 13) {
        id = $(this).parent().children('.hiddentaskid').val();
        content = $(this).val();
        tsk = new Task();
        tsk.addTask(id, content);
        return $(this).val("");
      }
    });
    return $('.checkTask').live('click', function() {
      var id, parent, proximo, tsk;
      tsk = new Task();
      id = $(this).val();
      tsk.check(id);
      parent = $(this).parent();
      proximo = $(this).parent().children('span').html();
      parent.hide(300);
      return $('.tasks-concluidas > ul').append('<li>' + proximo + "</li>");
    });
  });
}).call(this);
