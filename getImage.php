<?php

  function showProfielFoto($id, $type) {

    include "config.php";

    $id     = mysqli_real_escape_string($db, $id);
    $query  = "
      SELECT foto
      FROM profielen
      WHERE gebruikers_id = '" . $id . "'";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);

    if ($row["foto"]) {

      if($type == "matchen") {

        return '<img title="profiel foto" class="img-thumbnail" style="height:200px;" src="data:image/jpeg;base64,'.base64_encode( $row['foto'] ).'"/>';

      }
      else {
        echo '<img title="profiel foto" class="img-circle img-responsive" src="data:image/jpeg;base64,'.base64_encode( $row['foto'] ).'"/>';
      }
    }
  }

  function showEventFoto($id, $type) {

    include "config.php";

    $id     = mysqli_real_escape_string($db, $id);
    $query  = "
      SELECT foto
      FROM events
      WHERE event_id = '" . $id . "'";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);

    if ($row["foto"]) {

      if($type == "events") {

        return "<img style=\"height:200px;\" src=\"data:image/jpeg;base64," . base64_encode($row['foto']) . "\" class=\"img-responsive\">";

      }
      elseif($type == "profiel") {
        return "<img style=\"position:absolute; margin-top:-65px\" src=\"data:image/jpeg;base64," . base64_encode($row['foto']) . "\" class=\"img img-responsive full-width\">";
      }
    }
  }

?>
