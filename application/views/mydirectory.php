
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url();?>assets/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url();?>assets/bootstrap/css/bootstrap.min.css">
</head>
<body>
   <div style="padding: 20px">
   		<div class="row" style="padding: 30px">
		<div class="float-right" id="add_new_about">
		<a href="javascript:void(0);" id="home_page">Home</a>
		<a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#addData_form"><span class="fa fa-plus"></span> Add New</a><button id="deleted_files" class="btn btn-danger">Deleted History</button><button id="uploaded_files" class="btn btn-success">Uploaded History</button>

		</div>
		</div>  
	    <div style="padding: 10px" class="output" id="directory_list">
			<!-- list files here-->
	    </div>
   </div>
<!--moda-->
<form id="submit" method="post" enctype="multipart/form-data">
  <div class="modal fade" id="addData_form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Add New File</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      </div>
      <div class="modal-body">
      
        <div class="form-group row">
          <label class="col-md-2 col-form-label">Select File : </label>
          <div class="col-md-10">
            <input type="file" id="upload_file"  name="file" required>
          </div>
        </div>  
         
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </div>
    </div>
  </div>
</form>
<script type="text/javascript" src="<?php echo site_url();?>assets/js/jquery.min.js"></script> 

<script type="text/javascript" src="<?php echo site_url();?>assets/js/jquery.dataTables.min.js"></script> 
<script src="<?php echo base_url();?>assets/js/sweetalert.js"></script>
<script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="<?php echo site_url();?>assets/js/custom.js"></script> 
</body>
</html>
