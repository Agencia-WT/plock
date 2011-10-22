(function() {
  $(function() {
    $('.close').live("click", function() {
      return $(this).parent().hide(300);
    });
    return $("table#tableClientes").tablesorter({
      sortList: [[1, 0]]
    });
  });
}).call(this);
