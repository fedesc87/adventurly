<script type="text/javascript">
function executeEleccion(sender) {
  var $this = $(this);
  var historiaId = <?php echo $id ?>;
  var parentId = $this.data("eleccion-id");
  var consecuencia = $this.data("consecuencia-id");

  $.ajax({
    url: "partial_elecciones.php",
    type: "get",
    dataType: "html",
    data: { historiaId: historiaId, parentId: parentId },
    success: function (result) {
      $("").html(consecuencia);
      $("ul.actions").html(result);


    }
  });
}
</script> <!-- AGUEGUE ESTO!!!! -->