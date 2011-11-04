(function() {
  $(function() {
    $('.close').live("click", function() {
      return $(this).parent().hide(300);
    });
    $("table#tableClientes").tablesorter({
      sortList: [[0, 0]]
    });
    $('.delete').live("click", function() {
      return $('#modal-delete-cliente').modal('show');
    });
    $(".closemodal").live("click", function() {
      return $('#modal-delete-cliente').modal('hide');
    });
    $('.input-search-cliente-topbar').keypress(function(event) {
      if (event.which === "13") {
        return $(this).parent().submit();
      }
    });
    $('.box-ftps').mouseover(function() {
      return $(this).children().children('.actions-buttons').children().show();
    });
    return $('.box-ftps').mouseout(function() {
      return $(this).children().children('.actions-buttons').children().hide();
    });
  });
}).call(this);
