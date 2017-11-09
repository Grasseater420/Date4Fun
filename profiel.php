<html>
<head>



  <?php
  error_reporting(0);


  session_start();


  if ($_SESSION['gebruikers_id'] == NULL)
  {

    header("Location:index.php");
  }
  ?>
  <?php

  include "header.php";
  include "getImage.php";
  include "config.php";

  renderHead('Date4Fun Profiel');
  renderNavbar();

  if (isset($_GET['id']) && !is_null($_GET['id']) && is_numeric($_GET['id']))
  {
    $gebruiker_id = $_GET['id'];
  }
  else{
    die("Er is een fout opgetreden, ongeldige input ontvangen");
  }


  $query = "SELECT * FROM profielen WHERE gebruikers_id=$gebruiker_id";
  $result = mysqli_query($db, $query);
  $profiel = mysqli_fetch_assoc($result);

  $query = "SELECT * FROM gebruikers WHERE gebruikers.gebruiker_id =  $gebruiker_id";
  $result = mysqli_query($db, $query);
  $gebruiker = mysqli_fetch_assoc($result);

  $query = "SELECT favorietemuziek.titel FROM favorietemuziek INNER JOIN profielen ON favorietemuziek.muziek_id=profielen.favorietemuziek WHERE profielen.gebruikers_id = $gebruiker_id";
  $result = mysqli_query($db, $query);
  $muziek= mysqli_fetch_assoc($result);

  $query = "SELECT favorietefilm.titel FROM favorietefilm INNER JOIN profielen ON favorietefilm.film_id=profielen.favorietefilm WHERE profielen.gebruikers_id = $gebruiker_id";
  $result = mysqli_query($db, $query);
  $film = mysqli_fetch_assoc($result);

  if ($_SESSION['gebruikers_id'] == $gebruiker_id)
  {
    $eigenprofiel= true;
  }
  else {
    $eigenprofiel = false;
  }




  ?>
</head>
<body>




  <div class="container target">
    <div class="row">
      <div class="col-sm-10">
        <h1 class="">Profiel van <?php echo $gebruiker['gebruikersnaam']; ?></h1>



        <?php


        if ($eigenprofiel)
        {
          if ($_SESSION['membership'] == "Gratis"){
            echo "<h2><span class=\"label label-warning\"><span class=\"glyphicon glyphicon-alert\"></span> U heeft een gratis membership!</span></h2> ";

          }
          else {
            echo "<h2><span class=\"label label-info\">U heeft een ".$_SESSION['membership']." deze verloopt op ".$_SESSION['membership_expires']."</span></h2> ";
          }

        }
        else {
            $email = $gebruiker["email"];
            $gebruikernaam = $gebruiker["voornaam"];
          echo "<a href=\"mailto:$email\"><button type=\"button\" class=\"btn btn-info\">Stuur $gebruikernaam een mail</button></a>";
        }
        ?>
        <br>
      </div>
      <div class="col-sm-2"><a href="#" class="pull-right"><?php showProfielFoto($gebruiker_id, 'profielpagina'); ?></a>

      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-sm-3">
        <!--left col-->
        <ul class="list-group">
          <li class="list-group-item text-muted" contenteditable="false"><h4>Profiel
            <?php
            if($eigenprofiel){
             ?>
            <!--Modal Trigger-->
            <button type="button" class="btn btn-primary btn-xs pull-right" data-toggle="modal" data-target="#geinAanpassen">Aanpassen</button></h4></li>
          <?php }
          else {
            echo "</h4>";
          }
          ?>
          <li class="list-group-item text-right"><span class="pull-left"><strong class="">Last seen</strong></span> Vandaag</li>
          <li class="list-group-item text-right"><span class="pull-left"><strong class="">Echte naam</strong></span> <?php echo $gebruiker['voornaam']; ?></li>
          <li class="list-group-item text-right"><span class="pull-left"><strong class="">Geïnteresseerd in: </strong></span> <?php echo $profiel['geintereseerd']; ?>


            <!-- Modal -->
            <div id="geinAanpassen" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal gedeelte-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title pull-left">Interesse aanpassen</h4>
                  </div>
                  <div class="modal-body pull-left">
                    <form action="profielaanpassen.php" method="post">
                      <table style="border-collapse: separate; border-spacing: 10px;">
                        <tr>
                          <td>Geïnteresseerd in: </td>
                          <td><button type="submit" name="man" class="btn btn-primary btn-btn-xs">Mannen</button></td>
                          <td><button type="submit" name="vrouw" class="btn btn-primary btn-btn-xs">Vrouwen</button></td>
                        </tr>
                      </table>
                    </form>
                  </div>
                  <div class="modal-footer">
                  </div>
                </div>

              </div>
            </div>

          </li>
        </ul>

        <!--left col-->
        <ul class="list-group">
          <li class="list-group-item text-muted" contenteditable="false"><h4>Uiterlijk
            <?php
            if($eigenprofiel){
             ?>
            <!--Modal Trigger-->
            <button type="button" class="btn btn-primary btn-xs pull-right" data-toggle="modal" data-target="#uiterlijkAanpassen">Aanpassen</button></h4></li>
            <?php }
            else{
              echo "</h4>";
            }

            ?>
            <!-- Modal -->
            <div id="uiterlijkAanpassen" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal gedeelte-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title pull-left">Uiterlijk aanpassen</h4>
                  </div>
                  <div class="modal-body pull-left">
                    <form action="profielaanpassen.php" method="post">
                      <p>Etniciteit: </p><input type="text" name="etniAanpassen">
                      <p><br>Lichaamsbouw: </p><input type="text" name="lichaamAanpassen">
                      <br><br>
                      <button type="submit" name="uiterlijksubmit" class="btn btn-primay">Aanpassen</button>
                    </form>
                  </div>
                  <div class="modal-footer">
                  </div>
                </div>
              </div>
            </div>

            <li class="list-group-item text-right"><span class="pull-left"><strong class="">Etniciteit</strong></span> <?php echo $profiel['etniciteit']; ?></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong class="">Lichaamsbouw</strong></span> <?php echo $profiel['lichaam']; ?></li>
          </li>
        </ul>

        <ul class="list-group">
          <li class="list-group-item text-muted" contenteditable="false"><h4>Gewoonten
            <?php
            if($eigenprofiel){
             ?>
            <!--Modal Trigger-->
            <button type="button" class="btn btn-primary btn-xs pull-right" data-toggle="modal" data-target="#gewoonAanpassen">Aanpassen</button></h4></li>
            <?php }
            else{
              echo "</h4>";
            }

            ?>

            <!-- Modal -->
            <div id="gewoonAanpassen" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal gedeelte-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title pull-left">Gewoontes aanpassen</h4>
                  </div>
                  <div class="modal-body pull-left">
                    <form action="profielaanpassen.php" method="post">
                      <p>Roken: </p><input type="text" name="rookAanpassen">
                      <p><br>Drinken: </p><input type="text" name="drinkAanpassen">
                      <br><br>
                      <button type="submit" name="gewoonsubmit" class="btn btn-primay">Aanpassen</button>
                    </form>
                  </div>
                  <div class="modal-footer">
                  </div>
                </div>
              </div>
            </div>

          <li class="list-group-item text-right"><span class="pull-left"><strong class="">Roken</strong></span> <?php echo $profiel['roken']; ?></li>
          <li class="list-group-item text-right"><span class="pull-left"><strong class="">Drinken</strong></span> <?php echo $profiel['drinken']; ?></li>
        </li>
      </ul>

        <ul class="list-group">
          <li class="list-group-item text-muted" contenteditable="false"><h4>Favorieten
            <?php
            if($eigenprofiel){
             ?>
            <!--Modal Trigger-->
            <button type="button" class="btn btn-primary btn-xs pull-right" data-toggle="modal" data-target="#favoAanpassen">Aanpassen</button></h4></li>
            <?php }
            else{
              echo "</h4>";
            }

            ?>

            <!-- Modal -->
            <div id="favoAanpassen" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal gedeelte-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title pull-left">Favorieten aanpassen</h4>
                  </div>
                  <div class="modal-body pull-left">

                    <form action="profielaanpassen.php" method="post">
                      <p>Film: </p>
                      <select name="filmAanpassen">
                        <?php
                        $query = "SELECT favorietefilm.titel FROM favorietefilm";
                        $result = mysqli_query($db, $query);
                        $id = 1;
                        while ($row = mysqli_fetch_assoc($result)){
                          foreach($row as $rows){
                            echo "<option value='".$id."'>".$rows."</option>";
                            $id++;
                          }
                        }
                        ?>
                      </select>
                      <p><br>Muziek: </p>
                      <select name="muziekAanpassen">
                        <?php
                        $query = "SELECT favorietemuziek.titel FROM favorietemuziek";
                        $result = mysqli_query($db, $query);

                        $id = 1;
                        while ($row = mysqli_fetch_assoc($result)){
                          foreach($row as $rows){
                            echo "<option value='".$id."'>".$rows."</option>";
                            $id++;
                          }
                        }
                        ?>
                      </select>
                      <br><br>
                      <button type="submit" name="filmmuzieksubmit" class="btn btn-primay">Aanpassen</button>
                    </form>
                  </div>
                  <div class="modal-footer">
                  </div>
                </div>
              </div>
            </div>
          <li class="list-group-item text-right"><span class="pull-left"><strong class="">Film</strong></span> <?php echo $film['titel']; ?></li>
          <li class="list-group-item text-right"><span class="pull-left"><strong class="">Muziek</strong></span> <?php echo $muziek['titel']; ?></li>

        </li>
        </ul





      </div>
    </div>
    <!--/col-3-->
    <div class="col-sm-9" style="" contenteditable="false">
      <div class="panel panel-default">
        <div class="panel-heading"><h3>Over mij
          <?php
          if($eigenprofiel){
           ?>
          <!--Modal Trigger-->
          <button type="button" class="btn btn-primary btn-xs pull-right" data-toggle="modal" data-target="#mijAanpassen">Aanpassen</button></h4></li>
          <?php }
          else{
            echo "</h4>";
          }

          ?>

          <!-- Modal -->
          <div id="mijAanpassen" class="modal fade" role="dialog">
            <div class="modal-dialog">

              <!-- Modal gedeelte-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title pull-left">Over Mij aanpassen</h4>
                </div>
                <div class="modal-body pull-left">
                  <form action="profielaanpassen.php" method="post">
                    <input style="width:500px; height:200px;" type="text" cols="80" rows="100" name="overmij">
                    <br><br>
                    <button type="submit" name="overmijsubmit" class="btn btn-primay">Aanpassen</button>
                  </form>
                </div>
                <div class="modal-footer">
                </div>
              </div>
            </div>
          </div>


        </h3></div>
        <div class="panel-body"> <blockquote class="blockquote"> <?php echo htmlspecialchars($profiel['overmij']); ?> </blockquote>

        </div>
      </div>
      <div class="panel panel-default target">
        <div class="panel-heading" contenteditable="false"><h3>Evenementen</h3></div>
        <div class="panel-body">
          <div class="row">
            <?php

            function renderEvenementen() {

              include "config.php";
              // include "getImage.php";

              $query = "
                SELECT events.titel, events.omschrijving, events.locatie, events.datum, events.foto, events.event_id
                FROM producten
                LEFT JOIN events
                ON events.event_id=producten.event_id
                INNER JOIN bestellingen
                ON bestellingen.product_id=producten.product_id
                WHERE bestellingen.gebruiker_id='" . $_GET['id'] . "'
                AND producten.event_id IS NOT NULL
              ";
              $result = mysqli_query($db, $query);

              while ($row = mysqli_fetch_assoc($result)) {
                $evenementen[] = array(
                    'id'            => $row['event_id'],
                    'titel'         => $row['titel'],
                    'datum'         => $row['datum'],
                    'foto'          => $row['foto'],
                    'locatie'       => $row['locatie'],
                    'omschrijving'  => $row['omschrijving']
                );
              }

              static $i = 0;
              // var_dump($evenementen[$i]['id']);
              while ($i < count($evenementen)) {
                echo "
                  <div class=\"col-md-4\">
                    <div class=\"thumbnail\">
                      <div class=\"image\" style=\"position:relative; overflow:hidden; padding-bottom:100px;\">
                        " . showEventFoto($evenementen[$i]['id'],'profiel') . "
                      </div>
                      <div class=\"caption\">
                        <h3>
                          " . $evenementen[$i]['titel'] . "
                        </h3>
                        <p>
                          " . $evenementen[$i]['locatie'] . ", " . $evenementen[$i]['datum'] . "
                        </p>
                          " . $evenementen[$i]['omschrijving'] . "
                        </p>
                      </div>
                    </div>
                  </div>
                  ";
                $i++;

              }
              if ($i < 3) {
                while ($i < 3) {
                  echo "
                  <div class=\"col-md-4\">
                    <div class=\"thumbnail\">
                      <div class=\"image\" style=\"position:relative; overflow:hidden; padding-bottom:100px;\">
                        <img style=\"position:absolute; margin-top:-65px\" src=\"./eventpics/placeholder.jpg\" class=\"center-block img-responsive\">
                      </div>
                      <div class=\"caption\">
                        <h3>
                          Geen evenementen
                        </h3>
                        <p>
                          Geen locatie
                        </p>
                        </p>
                          Geen omschrijving
                        </p>
                      </div>
                    </div>
                  </div>
                  ";
                  $i++;
                }
              }
            }

            renderEvenementen();

            ?>


          </div>

        </div>

      </div>

    </div></div>


    <div id="push"></div>
  </div>


  <script src="/plugins/bootstrap-select.min.js"></script>
  <script src="/codemirror/jquery.codemirror.js"></script>
  <script src="/beautifier.js"></script>
  <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-40413119-1', 'bootply.com');
  ga('send', 'pageview');
  </script>
  <script>
  jQuery.fn.shake = function(intShakes, intDistance, intDuration, foreColor) {
    this.each(function() {
      if (foreColor && foreColor!="null") {
        $(this).css("color",foreColor);
      }
      $(this).css("position","relative");
      for (var x=1; x<=intShakes; x++) {
        $(this).animate({left:(intDistance*-1)}, (((intDuration/intShakes)/4)))
        .animate({left:intDistance}, ((intDuration/intShakes)/2))
        .animate({left:0}, (((intDuration/intShakes)/4)));
        $(this).css("color","");
      }
    });
    return this;
  };
  </script>
  <script>
  $(document).ready(function() {

    $('.tw-btn').fadeIn(3000);
    $('.alert').delay(5000).fadeOut(1500);

    $('#btnLogin').click(function(){
      $(this).text("...");
      $.ajax({
        url: "/loginajax",
        type: "post",
        data: $('#formLogin').serialize(),
        success: function (data) {
          //console.log('data:'+data);
          if (data.status==1&&data.user) { //logged in
            $('#menuLogin').hide();
            $('#lblUsername').text(data.user.username);
            $('#menuUser').show();
            /*
            $('#completeLoginModal').modal('show');
            $('#btnYes').click(function() {
            window.location.href="/";
          });
          */
        }
        else {
          $('#btnLogin').text("Login");
          prependAlert("#spacer",data.error);
          $('#btnLogin').shake(4,6,700,'#CC2222');
          $('#username').focus();
        }
      },
      error: function (e) {
        $('#btnLogin').text("Login");
        console.log('error:'+JSON.stringify(e));
      }
    });
  });
  $('#btnRegister').click(function(){
    $(this).text("Wait..");
    $.ajax({
      url: "/signup?format=json",
      type: "post",
      data: $('#formRegister').serialize(),
      success: function (data) {
        console.log('data:'+JSON.stringify(data));
        if (data.status==1) {
          $('#btnRegister').attr("disabled","disabled");
          $('#formRegister').text('Thanks. You can now login using the Login form.');
        }
        else {
          prependAlert("#spacer",data.error);
          $('#btnRegister').shake(4,6,700,'#CC2222');
          $('#btnRegister').text("Sign Up");
          $('#inputEmail').focus();
        }
      },
      error: function (e) {
        $('#btnRegister').text("Sign Up");
        console.log('error:'+e);
      }
    });
  });

  $('.loginFirst').click(function(){
    $('#navLogin').trigger('click');
    return false;
  });

  $('#btnForgotPassword').on('click',function(){
    $.ajax({
      url: "/resetPassword",
      type: "post",
      data: $('#formForgotPassword').serializeObject(),
      success: function (data) {
        if (data.status==1){
          prependAlert("#spacer",data.msg);
          return true;
        }
        else {
          prependAlert("#spacer","Your password could not be reset.");
          return false;
        }
      },
      error: function (e) {
        console.log('error:'+e);
      }
    });
  });

  $('#btnContact').click(function(){

    $.ajax({
      url: "/contact",
      type: "post",
      data: $('#formContact').serializeObject(),
      success: function (data) {
        if (data.status==1){
          prependAlert("#spacer","Thanks. We got your message and will get back to you shortly.");
          $('#contactModal').modal('hide');
          return true;
        }
        else {
          prependAlert("#spacer",data.error);
          return false;
        }
      },
      error: function (e) {
        console.log('error:'+e);
      }
    });
    return false;
  });

  /*
  $('.nav .dropdown-menu input').on('click touchstart',function(e) {
  e.stopPropagation();
});
*/





});
$.fn.serializeObject = function()
{
  var o = {};
  var a = this.serializeArray();
  $.each(a, function() {
    if (o[this.name] !== undefined) {
      if (!o[this.name].push) {
        o[this.name] = [o[this.name]];
      }
      o[this.name].push(this.value || '');
    } else {
      o[this.name] = this.value || '';
    }
  });
  return o;
};
var prependAlert = function(appendSelector,msg){
  $(appendSelector).after('<div class="alert alert-info alert-block affix" id="msgBox" style="z-index:1300;margin:14px!important;">'+msg+'</div>');
  $('.alert').delay(3500).fadeOut(1000);
}
</script>
<!-- Quantcast Tag -->
<script type="text/javascript">
var _qevents = _qevents || [];

(function() {
  var elem = document.createElement('script');
  elem.src = (document.location.protocol == "https:" ? "https://secure" : "http://edge") + ".quantserve.com/quant.js";
  elem.async = true;
  elem.type = "text/javascript";
  var scpt = document.getElementsByTagName('script')[0];
  scpt.parentNode.insertBefore(elem, scpt);
})();

_qevents.push({
  qacct:"p-0cXb7ATGU9nz5"
});
</script>
<noscript>
  &amp;amp;amp;amp;amp;amp;amp;amp;amp;lt;div style="display:none;"&amp;amp;amp;amp;amp;amp;amp;amp;amp;gt;
  &amp;amp;amp;amp;amp;amp;amp;amp;amp;lt;img src="//pixel.quantserve.com/pixel/p-0cXb7ATGU9nz5.gif" border="0" height="1" width="1" alt="Quantcast"/&amp;amp;amp;amp;amp;amp;amp;amp;amp;gt;
  &amp;amp;amp;amp;amp;amp;amp;amp;amp;lt;/div&amp;amp;amp;amp;amp;amp;amp;amp;amp;gt;
</noscript>
<!-- End Quantcast tag -->
<div id="completeLoginModal" class="modal hide">
  <div class="modal-header">
    <a href="#" data-dismiss="modal" aria-hidden="true" class="close">�</a>
    <h3>Do you want to proceed?</h3>
  </div>
  <div class="modal-body">
    <p>This page must be refreshed to complete your login.</p>
    <p>You will lose any unsaved work once the page is refreshed.</p>
    <br><br>
    <p>Click "No" to cancel the login process.</p>
    <p>Click "Yes" to continue...</p>
  </div>
  <div class="modal-footer">
    <a href="#" id="btnYes" class="btn danger">Yes, complete login</a>
    <a href="#" data-dismiss="modal" aria-hidden="true" class="btn secondary">No</a>
  </div>
</div>
<div id="forgotPasswordModal" class="modal hide">
  <div class="modal-header">
    <a href="#" data-dismiss="modal" aria-hidden="true" class="close">�</a>
    <h3>Password Lookup</h3>
  </div>
  <div class="modal-body">
    <form class="form form-horizontal" id="formForgotPassword">
      <div class="control-group">
        <label class="control-label" for="inputEmail">Email</label>
        <div class="controls">
          <input name="_csrf" id="token" value="CkMEALL0JBMf5KSrOvu9izzMXCXtFQ/Hs6QUY=" type="hidden">
          <input name="email" id="inputEmail" placeholder="you@youremail.com" required="" type="email">
          <span class="help-block"><small>Enter the email address you used to sign-up.</small></span>
        </div>
      </div>
    </form>
  </div>
  <div class="modal-footer pull-center">
    <a href="#" data-dismiss="modal" aria-hidden="true" class="btn">Cancel</a>
    <a href="#" data-dismiss="modal" id="btnForgotPassword" class="btn btn-success">Reset Password</a>
  </div>

</div>
<div id="upgradeModal" class="modal hide">
  <div class="modal-header">
    <a href="#" data-dismiss="modal" aria-hidden="true" class="close">�</a>
    <h4>Would you like to upgrade?</h4>
  </div>
  <div class="modal-body">
    <p class="text-center"><strong></strong></p>
    <h1 class="text-center">$4<small>/mo</small></h1>
    <p class="text-center"><small>Unlimited plys. Unlimited downloads. No Ads.</small></p>
    <p class="text-center"><img src="/assets/i_visa.png" alt="visa" width="50"> <img src="/assets/i_mc.png" alt="mastercard" width="50"> <img src="/assets/i_amex.png" alt="amex" width="50"> <img src="/assets/i_discover.png" alt="discover" width="50"> <img src="/assets/i_paypal.png" alt="paypal" width="50"></p>
  </div>
  <div class="modal-footer pull-center">
    <a href="/upgrade" class="btn btn-block btn-huge btn-success"><strong>Upgrade Now</strong></a>
    <a href="#" data-dismiss="modal" class="btn btn-block btn-huge">No Thanks, Maybe Later</a>
  </div>
</div>
<div id="contactModal" class="modal hide">
  <div class="modal-header">
    <a href="#" data-dismiss="modal" aria-hidden="true" class="close">�</a>
    <h3>Contact Us</h3>
    <p>suggestions, questions or feedback</p>
  </div>
  <div class="modal-body">
    <form class="form form-horizontal" id="formContact">
      <input name="_csrf" id="token" value="CkMEALL0JBMf5KSrOvu9izzMXCXtFQ/Hs6QUY=" type="hidden">
      <div class="control-group">
        <label class="control-label" for="inputSender">Name</label>
        <div class="controls">
          <input name="sender" id="inputSender" class="input-large" placeholder="Your name" type="text">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="inputMessage">Message</label>
        <div class="controls">
          <textarea name="notes" rows="5" id="inputMessage" class="input-large" placeholder="Type your message here"></textarea>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="inputEmail">Email</label>
        <div class="controls">
          <input name="email" id="inputEmail" class="input-large" placeholder="you@youremail.com (for reply)" required="" type="text">
        </div>
      </div>
    </form>
  </div>
  <div class="modal-footer pull-center">
    <a href="#" data-dismiss="modal" aria-hidden="true" class="btn">Cancel</a>
    <a href="#" data-dismiss="modal" aria-hidden="true" id="btnContact" role="button" class="btn btn-success">Send</a>
  </div>
</div>




<script src="/plugins/bootstrap-pager.js"></script>
</div>

</body>

</html>
