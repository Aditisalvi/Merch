<?php if($_settings->chk_flashdata('success')): ?>
<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>
<?php
include('../Common/admin-sidenav-header.php');
?>

<div class="app-content" style="padding-bottom: 24px">
	<div class="app-content-header">
		<h1 class="app-content-headerText">Books</h1>

	</div>
	<div></div>
	<br />
<div class="card">
	<div class="card-header">
		<h3 class="card-title">List of Books</h3>
		<div class="card-tools">
			<a href="?page=product/manage_product" class="btn btn-primary">Create New</a>
		</div>
	</div>
	<div class="card-body">
		<div class="container-fluid">
        <div class="container-fluid">
			<!-- <table class="t"> -->
			<div class="products-area-wrapper tableView">
				<!-- <colgroup>
					<col width="5%">
					<col width="15%">
					<col width="25%">
					<col width="30%">
					<col width="10%">
					<col width="15%">
				</colgroup> -->
				<thead>
				<div class="products-header">
						<div class="product-cell"><span>#</span></div>
						<div class="product-cell"><span>Date Created</span></div>
						<div class="product-cell"><span>Title</span></div>
						<div class="product-cell"><span>Author</span></div>
						<div class="product-cell"><span>Status</span></div>
						<div class="product-cell"><span>Action</span></div>
</div>
				</thead>
				<tbody>
					<?php 
					$i = 1;
						$qry = $conn->query("SELECT * from `products` order by unix_timestamp(date_created) desc ");
						while($row = $qry->fetch_assoc()):
							foreach($row as $k=> $v){
								$row[$k] = trim(stripslashes($v));
							}
                            $row['description'] = strip_tags(stripslashes(html_entity_decode($row['description'])));
					?>
						<div class="products-row">
							<div class="product-cell"><span><?php echo $i++; ?></span></div>
							<div class="product-cell"><span><?php echo date("Y-m-d H:i",strtotime($row['date_created'])) ?></span></div>
							<div class="product-cell"><span><?php echo $row['title'] ?></span></div>
							<div class="product-cell"><span><p class="m-0"><?php echo $row['author'] ?></p></span></div>
							<div class="product-cell"><span>
                                <?php if($row['status'] == 1): ?>
                                    <span class="badge badge-success">Active</span>
                                <?php else: ?>
                                    <span class="badge badge-danger">Inactive</span>
                                <?php endif; ?>
                            </span></div>
							<div class="product-cell"><span>
								 <button type="button" class="btn btn-flat btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
				                  		Action
				                    <span class="sr-only">Toggle Dropdown</span>
				                  </button>
				                  <div class="dropdown-menu" role="menu">
				                    <a class="dropdown-item" href="?page=product/manage_product&id=<?php echo $row['id'] ?>"><span class="fa fa-edit text-primary"></span> Edit</a>
				                    <div class="dropdown-divider"></div>
				                    <a class="dropdown-item delete_data" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><span class="fa fa-trash text-danger"></span> Delete</a>
				                  </div>
							</span></div>
							</div>
					<?php endwhile; ?>
				</tbody>
				</div>
		</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		$('.delete_data').click(function(){
			_conf("Are you sure to delete this product permanently?","delete_product",[$(this).attr('data-id')])
		})
		$('.table').dataTable();
	})
	function delete_product($id){
		start_loader();
		$.ajax({
			url:_base_url_+"classes/Master.php?f=delete_product",
			method:"POST",
			data:{id: $id},
			dataType:"json",
			error:err=>{
				console.log(err)
				alert_toast("An error occured.",'error');
				end_loader();
			},
			success:function(resp){
				if(typeof resp== 'object' && resp.status == 'success'){
					location.reload();
				}else{
					alert_toast("An error occured.",'error');
					end_loader();
				}
			}
		})
	}
</script>