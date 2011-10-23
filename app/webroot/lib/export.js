(function() {
  var Export;
  Export = (function() {
    function Export() {
      this.url = "/plock/clientes/rest";
    }
    Export.prototype["export"] = function(format) {
      this.format = format;
      return $.ajax({
        type: "post",
        url: this.url,
        data: "format=" + this.format,
        success: function(data) {
          return $("#resultREST").html(data);
        }
      });
    };
    return Export;
  })();
  $(function() {
    return $('.exportBtn').click(function() {
      var exp, param;
      param = $(this).attr("alt");
      exp = new Export();
      return exp["export"](param);
    });
  });
}).call(this);
