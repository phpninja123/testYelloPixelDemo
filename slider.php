  <?php
$title = 'Slider Management';
$page  = 'slider';
require_once('header.php');
require_once('sidebar.php');
?>

 <!-- Main Container Start -->
        <div id="mws-container" class="clearfix">
        <!-- Inner Container Start -->
            <div class="container">     
                
                <!-- data table-->
                <div class="mws-panel grid_8">
                     
                    <div class="mws-panel-header">
                        <span><i class="icon-pictures"></i> Slider</span>
                        <button type="button" id='mws-form-dialog-mdl-btn' recid='newRec' class="btn btn-success" style="float: right;margin-top: -28px;">
                            <i class="icon-plus-sign"></i> Add New
                        </button>
                    </div>
                    <div class="mws-panel-body no-padding table-responsive">
                        <table class="mws-datatable mws-table" id="dataTableData1">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Action</th> 
                                </tr>
                            </thead>
                            <tbody id = 'sliderDataTable' targetResource='4'>

                            </tbody>
                        </table>
                       
                    </div>
                </div>

               
                <!-- modal start-->
                <div class="mws-panel grid_4" style = "display: none;">
                        <div class="mws-panel-content">                           
                            <div id="mws-form-dialog">
                                <form id="mws-validate" class="mws-form" operation="" action="upload.php" enctype="multipart/form-data" method="post">
                                    <input type="hidden" name='table' id="table" value='4'> 
                                    <input type="hidden" name='id' id="id" value=''> 
                                    <div id="mws-validate-error" class="mws-form-message error" style="display:none;"></div>
                                    <div class="mws-form-inline">

                                         <div class="mws-form-row">
                                            <label class="mws-form-label">Choose File</label>
                                            <div class="mws-form-item">
                                                <input type="file" name="fileToUpload" id="fileToUpload" class="required">
                                                <label for="picture" class="error" generated="true" style="display:none"></label>
                                            </div>
                                            <div class="mws-form-item">
                                                <img id="fileImg" src="" height="100" width="100" alt="">
                                            </div>
                                        </div>

                                    </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                </div>
            <!-- modal end-->
            </div>

            <!-- Inner Container End -->
<?php
// require_once('portfolio_slider.php');
require_once('footer.php');
?>
<script src="js/portfolio_slider.js"></script>

