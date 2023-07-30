<?php if($_settings->chk_flashdata('success')): ?>
<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>
<?php if($_settings->chk_flashdata('error')): ?>
<script>
	alert_toast("<?php echo $_settings->flashdata('error') ?>",'error')
</script>
<?php endif;?>
<?php
include('../Common/admin-sidenav-header.php');
?>
<div class="app-content" style="padding-bottom: 24px">
	<div class="app-content-header">
		<h1 class="app-content-headerText">Orders</h1>
		
	</div>
	<div></div>
	<br />
<div class="card">
	<div class="card-header">
		<h3 class="card-title">List of Orders</h3>
	</div>
	<div class="card-body">
		<div class="container-fluid">
        <div class="container-fluid">
		<div class="products-area-wrapper tableView">
				<!-- <colgroup>
					<col width="5%">
					<col width="15%">
					<col width="25%">
					<col width="20%">
					<col width="10%">
					<col width="10%">
					<col width="15%">
				</colgroup> -->
				<thead>
				<div class="products-header">
						<div class="product-cell"><span>#</span></div>
						<div class="product-cell"><span>Date Order</span></div>
						<div class="product-cell"><span>Client</span></div>
						<div class="product-cell"><span>Total Amount</span></div>
						<div class="product-cell"><span>Paid</span></div>
						<div class="product-cell"><span>Status</span></div>
						<div class="product-cell"><span>Action</span></div>
</div>
				</thead>
				<tbody>
					<?php 
					$i = 1;
						$qry = $conn->query("SELECT o.*,concat(c.firstname,' ',c.lastname) as client from `orders` o inner join clients c on c.id = o.client_id order by unix_timestamp(o.date_created) desc ");
						while($row = $qry->fetch_assoc()):
					?>
						<div class="products-row">
							<div class="product-cell"><span><?php echo $i++; ?></span></div>
							<div class="product-cell"><span><?php echo date("Y-m-d H:i",strtotime($row['date_created'])) ?></span></div>
							<div class="product-cell"><span><?php echo $row['client'] ?></span></div>
							<div class="product-cell"><span><?php echo number_format($row['amount']) ?></span></div>
							<div class="product-cell"><span>
                                <?php if($row['paid'] == 0): ?>
                                    <span class="badge badge-danger">No</span>
                                <?php else: ?>
                                    <span class="badge badge-success">Yes</span>
                                <?php endif; ?>
                            </span></div>
							<div class="product-cell"><span>
                                <?php if($row['status'] == 0): ?>
                                    <span class="badge badge-danger">Pending</span>
                                <?php elseif($row['status'] == 1): ?>
                                    <span class="badge badge-primary">Packed</span>
								<?php elseif($row['status'] == 2): ?>
                                    <span class="badge badge-warning">Out for Delivery</span>
								<?php elseif($row['status'] == 3): ?>
                                    <span class="badge badge-success">Delivered</span>
								<?php elseif($row['status'] == 5): ?>
                                    <span class="badge badge-success">Picked Up</span>
                                <?php else: ?>
                                    <span class="badge badge-danger">Cancelled</span>
                                <?php endif; ?>
                            </span></div>
							<div class="product-cell"><span>
								 <button type="button" class="btn  btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
				                  		Action
				                    <span class="sr-only">Toggle Dropdown</span>
				                  </button>
				                  <div class="dropdown-menu" role="menu">
				                    <a class="dropdown-item" href="?page=orders/view_order&id=<?php echo $row['id'] ?>">View Order</a>
									<?php if($row['paid'] == 0 && $row['status'] != 4): ?>
				                    <a class="dropdown-item pay_order" href="javascript:void(0)"  data-id="<?php echo $row['id'] ?>">Mark as Paid</a>
									<?php endif; ?>
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
			_conf("Are you sure to delete this order permanently?","delete_order",[$(this).attr('data-id')])
		})
		$('.pay_order').click(function(){
			_conf("Are you sure to mark this order as paid?","pay_order",[$(this).attr('data-id')])
		})
		$('.table').dataTable();
	})
	function pay_order($id){
		start_loader();
		$.ajax({
			url:_base_url_+"classes/Master.php?f=pay_order",
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
	function delete_order($id){
		start_loader();
		$.ajax({
			url:_base_url_+"classes/Master.php?f=delete_order",
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