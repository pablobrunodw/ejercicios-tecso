
<?php
  if(isset($_GET["success"]))
    $info= $_GET["success"];
  else
    $info="";
  if(!empty($info))
  {
?>
  
  <!-- <div class="box-body" id="mensaje_info" style="position: fixed; right: 0px; z-index: 1">
    <div class="alert alert-dismissable bg-green">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-info"></i> Información</h4>
            </div>
  </div> -->
  <div class="alert alert-success alert-dismissible col-xs-10 col-xs-offset-1" role="alert"  id="mensaje_info">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4><i class="thumbs up icon"></i> <strong>Perfecto!</strong></h4>
    <?php echo $info; ?>
  </div>
    
  <script type="text/javascript">
    var myVarInfo=setInterval(function () {myTimerInfo()}, 5000);
    function myTimerInfo() {      
        document.getElementById("mensaje_info").style.display = "none";
    }
  </script>
  
<?php
  }
?>