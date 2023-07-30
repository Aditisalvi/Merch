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
		<h1 class="app-content-headerText">Sub-category</h1>
		
	</div>
	<div></div>
	<br />
<div class="card ">
	<div class="card-header">
		<h3 class="card-title">List of Sub Categories</h3>
		<div class="card-tools">
			<a href="?page=maintenance/manage_sub_category" class="btn  btn-primary">  Create New</a>
		</div>
	</div>
	<div class="card-body">
		<div class="container-fluid">
        <div class="container-fluid">
		<div class="products-area-wrapper tableView">
				<thead>
				<div class="products-header">
						<div class="product-cell"><span>#</span></div>
						<div class="product-cell"><span>Date Created</span></div>
						<div class="product-cell"><span>Category</span></div>
						<div class="product-cell"><span>Sub Category</span></div>
						<div class="product-cell"><span>Description</span></div>
						<div class="product-cell"><span>Status</span></div>
						<div class="product-cell"><span>Action</span></div>
</div>
				</thead>
				<tbody>
					<?php 
					$i = 1;
						$qry = $conn->query("SELECT s.*,c.category from `sub_categories` s inner join `categories` c on c.id = s.parent_id order by unix_timestamp(s.date_created) desc ");
						while($row = $qry->fetch_assoc()):
                            $row['description'] = strip_tags(stripslashes(html_entity_decode($row['description'])));
					?>
						<div class="products-row">
							<div class="product-cell"><span><?php echo $i++; ?></span></div>
							<div class="product-cell"><span><?php echo date("Y-m-d H:i",strtotime($row['date_created'])) ?></span></div>
							<div class="product-cell"><span><?php echo $row['category'] ?></span></div>
							<div class="product-cell"><span><?php echo $row['sub_category'] ?></span></div>
							<div class="product-cell"><span><p class="truncate-1 m-0"><?php echo $row['description'] ?></p></span></div>
							<div class="product-cell"><span>
                                <?php if($row['status'] == 1): ?>
                                    <span class="badge badge-success">Active</span>
                                <?php else: ?>
                                    <span class="badge badge-danger">Inactive</span>
                                <?php endif; ?>
                            </span></div>
							<div class="product-cell"><span>
								 <button type="button" class="btn  btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
				                  		Action
				                    <span class="sr-only">Toggle Dropdown</span>
				                  </button>
				                  <div class="dropdown-menu" role="menu">
				                    <a class="dropdown-item" href="?page=maintenance/manage_sub_category&id=<?php echo $row['id'] ?>"><span class="fa fa-edit text-primary"></span> Edit</a>
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
			_conf("Are you sure to delete this sub category permanently?","delete_category",[$(this).attr('data-id')])
		})
		$('.table').dataTable();
	})
	function delete_category($id){
		start_loader();
		$.ajax({
			url:_base_url_+"classes/Master.php?f=delete_sub_category",
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