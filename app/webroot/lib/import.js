(function() {
  var Import;
  Import = (function() {
    function Import() {
      this.url = "/plock/clientes/import";
    }
    Import.prototype["import"] = function(format) {
      this.format = format;
      return this.showForm();
    };
    Import.prototype.showForm = function() {
      var area, conteudo;
      conteudo = "<div>		<form method='post' enctype='multipart/form-data' action='" + this.url + "'>		Arquivo: <input type='file' name='data[Clientes][xml]'/>		<input type='submit' value='enviar'/>		</form>		</div>";
      return area = $('#resultREST').html(conteudo);
    };
    return Import;
  })();
  $(function() {
    return $('.importBtn').click(function() {
      var imp, param;
      param = $(this).attr("alt");
      imp = new Import();
      return imp["import"](param);
    });
  });
}).call(this);
