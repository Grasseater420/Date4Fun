

<!DOCTYPE html>
<html lang="en">
<head>
  <?php

  include "header.php";

  renderHead('Date4Fun Events');
  renderNavbar();
  renderJumbotron();

  ?>
</head>
  <body>
    <!-- Omdat elke site de Konami code moet hebben -->
    <script type="text/javascript">
      if ( window.addEventListener ) {
        var state = 0, konami = [38,38,40,40,37,39,37,39,66,65];
        window.addEventListener("keydown", function(e) {
          if ( e.keyCode == konami[state] ) state++;
          else state = 0;
          if ( state == 10 )
          $(document).ready(function(){ $('#henkModal').modal('show'); });
        }, true);
      }
    </script>
    <!-- Bovenstaande script roept henkModal aan dus die bepalen we hier -->
    <div class="modal fade" id="henkModal" role="dialog">
      <div class="modal-dialog modal-lg">
        <!-- Modal content is door Jim gegenereerd -->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Henk is watching you!</h4>
          </div>
          <div class="modal-body text-center">
            <?php include 'echoHenk.php'; ?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Ik begrijpt het..</button>
          </div>
        </div>

      </div>
    </div>
  </body>
</html>
