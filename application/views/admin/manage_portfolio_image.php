<div class="page-wrapper-row full-height">
<div class="page-wrapper-middle">
<!-- BEGIN CONTAINER -->
<div class="page-container">
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
<!-- BEGIN CONTENT BODY -->
<!-- BEGIN PAGE HEAD-->
<div class="page-head">
<div class="container">
<!-- BEGIN PAGE TITLE -->
<div class="page-title">
<h1>Dashboard 
<small>Create Portfolio Image</small>
</h1>
</div>
<!-- END PAGE TITLE -->
</div>
</div>
<!-- END PAGE HEAD-->
<?php 
// Old Data For Edit



?>

<!-- BEGIN PAGE CONTENT BODY -->
<div class="page-content">
<div class="container">
<!-- BEGIN PAGE BREADCRUMBS -->		<ul class="page-breadcrumb breadcrumb">
<li>

<a href="<?php echo base_url() ?>admin/welcome">Dashboard</a>
<i class="fa fa-circle"></i>
</li>
<li>
<a href="<?php echo base_url() ?>portfolio/">Manage Portfolio </a>
<i class="fa fa-circle"></i>
</li>
<li>
<span>Manage Portfolio Image</span>
</li>
</ul>
<!-- END PAGE BREADCRUMBS -->
<!-- BEGIN PAGE CONTENT INNER -->
<div class="page-content-inner">
<div class="row">
<div class="col-md-12">
<?php if($this->session->flashdata('success_log')): ?>
<div class="alert alert-success">
<button class="close" data-close="alert"></button>
<span> <?php echo $this->session->flashdata('success_log'); ?></span>
</div>
<?php elseif($this->session->flashdata('error_log')): ?>
<div class="alert alert-danger">
<button class="close" data-close="alert"></button>
<span> <?php echo $this->session->flashdata('error_log'); ?></span>
</div>
<?php endif; ?>
<!-- BEGIN EXTRAS PORTLET-->
<div class="portlet box green">
<div class="portlet-title">
<div class="caption">
<i class="fa fa-gift"></i>Insert Portfolio Image </div>
<div class="tools">
<a href="javascript:;" class="collapse"> </a>
<a href="#portlet-config" data-toggle="modal" class="config"> </a>
<a href="javascript:;" class="reload"> </a>
<a href="javascript:;" class="remove"> </a>
</div>
</div>
<div class="portlet-body form">
<!-- BEGIN FORM-->
<?php echo form_open_multipart(current_url()) ?>
<div class="form-body">
<div class="form-group last">
<label class="control-label col-md-2">Portfolio Image Name</label>
<div class="col-md-10">
	<input type="text" name="txtImageName" id="txtImageName" value="" class="form-control" required placeholder="Enter Portfolio Image Name Here">
</div>
</div>
</div>


<div class="form-body">
<div class="form-group last">
<label class="control-label col-md-2">Select Slider</label>
<div class="col-md-10">
	<input type="file" name="fileSliderImage" id="fileSliderImage" value="" class="form-control" required >
</div>
</div>
</div>



<?php if(isset($edit_data)): ?>
<div class="form-actions">
<div class="row">
<div class="col-md-offset-3 col-md-9">
	<button type="submit" name="btnSubmit" value="submit" class="btn green">
		<i class="fa fa-check"></i> Edit</button>
</div>
</div>
</div>
<?php else: ?>
<div class="form-actions">
<div class="row">
<div class="col-md-offset-3 col-md-9">
	<button type="submit" name="btnSubmit" value="submit" class="btn green">
		<i class="fa fa-check"></i> Create</button>
</div>
</div>
</div>
<?php endif ?>

<?php echo form_close() ?>
<!-- END FORM-->
</div>
</div>
<!-- END EXTRAS PORTLET-->

<!-- BEGIN EXTRAS PORTLET-->
<div class="portlet box green">
<div class="portlet-title">
<div class="caption">
<i class="fa fa-gift"></i>Image List </div>
<div class="tools">
<a href="javascript:;" class="collapse"> </a>
<a href="#portlet-config" data-toggle="modal" class="config"> </a>
<a href="javascript:;" class="reload"> </a>
<a href="javascript:;" class="remove"> </a>
</div>
</div>
<div class="portlet-body">
<!-- BEGIN FORM-->
<div class="table-scrollable">
<table class="table table-striped table-bordered table-advance table-hover">
<thead>
<tr>
<th class="hidden-xs"> Image </th>
<th class="hidden-xs"> Description </th>
<th class="hidden-xs"> Action</th>
</tr>
</thead>
<tbody>
<?php foreach($image_list as $item): ?>
<tr>
<td><img src="<?php echo base_url() ?>assets/uploads/portfolio/<?php echo $item['image_url'] ?>" style="width:200px;"></td>
<td><?php echo $item['image_des'] ?></td>
<td>
	<a onclick="return confirm('Are you sure?');" href="<?php echo base_url() ?>portfolio/portfolio_image_delete/<?php echo $item['image_url'] ?>/<?php echo $item['id'] ?>/<?php echo $portfolio_id ?>" class="btn btn-outline btn-circle dark btn-sm black">
		<i class="fa fa-trash-o"></i> Delete </a>
</td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
</div>
<!-- END FORM-->
</div>
</div>
<!-- END EXTRAS PORTLET-->


</div>
</div>
</div>

</div>
<!-- END PAGE CONTENT INNER -->
</div>
</div>
<!-- END PAGE CONTENT BODY -->
<!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->

				</div>
				<!-- END CONTAINER -->
			</div>
		</div>
		<script src="<?php echo base_url() ?>assets/global/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>