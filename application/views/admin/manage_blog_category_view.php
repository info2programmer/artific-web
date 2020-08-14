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
<small>Manage Blog Categorys</small>
</h1>
</div>
<!-- END PAGE TITLE -->

</div>
</div>
<!-- END PAGE HEAD-->
<!-- BEGIN PAGE CONTENT BODY -->
<div class="page-content">
<div class="container">
<!-- BEGIN PAGE BREADCRUMBS -->
<ul class="page-breadcrumb breadcrumb">
<li>
<a href="<?php echo base_url() ?>admin/welcome">Dashboard</a>
<i class="fa fa-circle"></i>
</li>
<li>
<span>Manage Blog Categorys</span>
</li>
</ul>
<!-- END PAGE BREADCRUMBS -->
<!-- BEGIN PAGE CONTENT INNER -->
<div class="page-content-inner">
<div class="row">
<div class="col-md-12">

<!-- BEGIN EXTRAS PORTLET-->
<div class="row">
<div class="col-md-12">
<!-- BEGIN SAMPLE TABLE PORTLET-->
<?php if($this->session->flashdata('success_log')): ?>
<div class="alert alert-success">
<button class="close" data-close="alert"></button>
<span> <?php echo $this->session->flashdata('success_log'); ?></span>
</div>
<?php elseif($this->session->flashdata('warning_log')): ?>
<div class="alert alert-warning">
<button class="close" data-close="alert"></button>
<span> <?php echo $this->session->flashdata('warning_log'); ?></span>
</div>
<?php elseif($this->session->flashdata('error_log')): ?>
<div class="alert alert-danger">
<button class="close" data-close="alert"></button>
<span> <?php echo $this->session->flashdata('error_log'); ?></span>
</div>
<?php endif; ?>


	<a href="<?php echo base_url() ?>blog/manage_blog_category" class="btn btn-success">Not in List?</a>

<div class="portlet">
<div class="portlet-title">
<div class="caption">
<i class="fa fa-bell-o"></i>Blog Category </div>
<div class="tools">
<a href="javascript:;" class="collapse"> </a>
<a href="#portlet-config" data-toggle="modal" class="config"> </a>
<a href="javascript:;" class="reload"> </a>
<a href="javascript:;" class="remove"> </a>
</div>
</div>
<div class="portlet-body">
<div class="table-scrollable">
<table class="table table-striped table-bordered table-advance table-hover">
<thead>
<tr>
<th class="hidden-xs"> Category Name </th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php foreach($category_date as $item): ?>
<tr>
<td><?php echo $item->blog_category ?></td>
<td>
	<a onclick="return confirm('Are you sure?');" href="<?php echo base_url() ?>blog/delete_blog_caegory/<?php echo $item->id ?>" class="btn btn-outline btn-circle dark btn-sm black">
		<i class="fa fa-trash-o"></i> Delete </a>
	<?php if($item->status): ?>
	<a onclick="return confirm('Are you sure?');" href="<?php echo base_url() ?>blog/status_change_blogcategory/<?php echo $item->id ?>/0/" class="btn btn-outline btn-circle dark btn-sm red">
		<i class="fa fa-times"></i> Deactive Now </a>
	<?php else: ?>
	<a onclick="return confirm('Are you sure?');" href="<?php echo base_url() ?>blog/status_change_blogcategory/<?php echo $item->id ?>/1/" class="btn btn-outline btn-circle dark btn-sm green">
		<i class="fa fa-check"></i> Active Now </a>
	<?php endif; ?>
</td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
</div>
</div>
</div>
<!-- END SAMPLE TABLE PORTLET-->
</div>
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