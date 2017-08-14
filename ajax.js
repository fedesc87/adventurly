<script type="text/javascript">
function executeEleccion(sender) {
  var $sender = $(sender);
  var historiaId = <?php echo $id ?>;
  var parentId = $sender.data("eleccion-id");
  var consecuencia = $sender.data("consecuencia");
  // debugger;

  $.ajax({
    url: "partial_elecciones.php",
    type: "get",
    dataType: "html",
    data: { historiaId: historiaId, parentId: parentId },
    success: function (result) {
      // console.log(result);
      $("p.consecuencia").html(consecuencia);
      $("ul.actions").html(result);



    }
  });
}
</script> <!-- AGUEGUE ESTO!!!! -->