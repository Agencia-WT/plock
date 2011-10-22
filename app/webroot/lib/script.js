(function() {
  $(function() {
    $('.close').live("click", function() {
      return $(this).parent().hide(300);
    });
    $("table#tableClientes").tablesorter({
      sortList: [[1, 0]]
    });
    $('.delete').live("click", function() {
      return $('#modal-delete-cliente').modal('show');
    });
    return $(".closemodal").live("click", function() {
      return $('#modal-delete-cliente').modal('hide');
    });
  });
}).call(this);
