<?php 
   @session_start();
   ?> <!-- Footer -->
<div id="mws-footer">
   Copyright Your Website 2012. All Rights Reserved.
</div>
</div>
<!-- Main Container End -->
</div>
<!-- JavaScript Plugins -->
<script src="js/libs/jquery-1.8.3.min.js"></script>
<script src="js/libs/jquery.mousewheel.min.js"></script>
<script src="js/libs/jquery.placeholder.min.js"></script>
<script src="custom-plugins/fileinput.js"></script>
<!-- <script src="custom-plugins/fileinput.js"></script>-->
<!-- jQuery-UI Dependent Scripts -->
<script src="jui/js/jquery-ui-1.9.2.min.js"></script>
<script src="jui/jquery-ui.custom.min.js"></script>
<script src="jui/js/jquery.ui.touch-punch.js"></script>
<!-- Plugin Scripts -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/colorpicker/colorpicker-min.js"></script>
<script src="plugins/validate/jquery.validate-min.js"></script>
<script src="custom-plugins/wizard/wizard.min.js"></script>
<!--<script src="js/jquery.confirm.min.js"></script>-->
<script src="js/jquery-confirm.min.js"></script>
<!-- Core Script -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="js/core/mws.js"></script>
<!-- Themer Script (Remove if not needed) -->
<script src="js/core/themer.js"></script>
<!-- Demo Scripts (remove if not needed) -->
<script src="js/demo/demo.table.js"></script>
<script src="js/demo/demo.widget.js"></script>
<script src="js/demo/demo.files.js"></script>
<script type="text/javascript">
   $(document).ready(function()
   {
       <?php if (!empty($_SESSION['success_message'])){
      echo 'alert("'.$_SESSION['success_message'].'")';
      unset($_SESSION['success_message']);
      } ?>
   
        <?php if (!empty($_SESSION['error_message'])){
      echo 'alert("'.$_SESSION['error_message'].'")';
      unset($_SESSION['error_message']);
      } ?>    
   })
</script>
</body>
</html>