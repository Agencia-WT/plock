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
    return $('.input-search-cliente-topbar').keypress(function(event) {
      if (event.which === "13") {
        return $(this).parent().submit();
      }
    });
  });
}).call(this);
