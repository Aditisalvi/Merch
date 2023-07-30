<?php
include('../Common/admin-sidenav-header.php');
?>
<div class="app-content" style="padding-bottom: 24px">
	<div class="app-content-header">
		<h1 class="app-content-headerText">Orders</h1>
		
	</div>
	<div></div>
	<br />
<?php if(isset($_GET['view'])): 
require_once('../../config.php');
endif;?>
<?php if($_settings->chk_flashdata('success')): ?>
<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>
<?php 
if(!isset($_GET['id'])){
    $_settings->set_flashdata('error','No order ID Provided.');
    redirect('admin/?page=orders');
}
$order = $conn->query("SELECT o.*,concat(c.firstname,' ',c.lastname) as client FROM `orders` o inner join clients c on c.id = o.client_id where o.id = '{$_GET['id']}' ");
if($order->num_rows > 0){
    foreach($order->fetch_assoc() as $k => $v){
        $$k = $v;
    }
}else{
    $_settings->set_flashdata('error','Order ID provided is Unknown');
    redirect('admin/?page=orders');
}
?>
<div class="card">
    <div class="card-body">
        <div class="conitaner-fluid">
            <p><b>Client Name: <?php echo $client ?></b></p>
            <?php if($order_type == 1): ?>
            <p><b>Delivery Address: <?php echo $delivery_address ?></b></p>
            <?php endif; ?>
            <div class="products-area-wrapper tableView">
                <!-- <colgroup>
                    <col width="15%">
                    <col width="35%">
                    <col width="25%">
                    <col width="25%">
                </colgroup> -->
                <thead>
                <div class="products-header">
                        <div class="product-cell"><span>QTY</span></div>
                        <div class="product-cell"><span>Product</span></div>
                        <div class="product-cell"><span>Price</span></div>
                        <div class="product-cell"><span>Total</span></div>
                    </div>
                </thead>
                <tbody>
                    <?php 
                        $olist = $conn->query("SELECT o.*,p.title,p.author FROM order_list o inner join products p on o.product_id = p.id where o.order_id = '{$id}' ");
                        while($row = $olist->fetch_assoc()):
                        foreach($row as $k => $v){
                            $row[$k] = trim(stripslashes($v));
                        }
                    ?>
                    <div class="products-row">
                        <div class="product-cell"><span><?php echo $row['quantity'] ?></span></div>
                        <div class="product-cell"><span>
                            <p class="m-0"><?php echo $row['title']?></p>
                            <p class="m-0"><small>Author: <?php echo $row['author']?></small></p>
                           
                        </span></div>
                        <div class="product-cell"><span><?php echo number_format($row['price']) ?></span></div>
                        <div class="product-cell"><span><?php echo number_format($row['price'] * $row['quantity']) ?></span></div>
                    </div>
                    <?php endwhile; ?>
                </tbody>
                <tfoot>
                    <div class="products-row">
                    <div class="product-cell"><span>Total</span></div>
                    <div class="product-cell"><span><?php echo number_format($amount) ?></span></div>
                    </div>
                </tfoot>
                </div>
        </div>
        <div class="row">
            <div class="col-6">
                <p>Payment Method: <?php echo $payment_method ?></p>
                <p>Payment Status: <?php echo $paid == 0 ? '<span class="badge badge-danger">Unpaid</span>' : '<span class="badge badge-success">Paid</span>' ?></p>
                <p>Order Type: <?php echo $order_type == 1 ? '<span class="badge badge-danger">For Delivery</span>' : '<span class="badge badge-danger">Pick-up</span>' ?></p>
            </div>
            <div class="col-6 row row-cols-2">
                <div class="col-3">Order Status:</div>
                <div class="col-9">
                <?php 
                    switch($status){
                        case '0':
                            echo '<span class="badge badge-danger">Pending</span>';
	                    break;
                        case '1':
                            echo '<span class="badge badge-primary">Packed</span>';
	                    break;
                        case '2':
                            echo '<span class="badge badge-warning">Out for Delivery</span>';
	                    break;
                        case '3':
                            echo '<span class="badge badge-success">Delivered</span>';
	                    break;
                        case '5':
                            echo '<span class="badge badge-success">Picked Up</span>';
	                    break;
                        default:
                            echo '<span class="badge badge-danger">Cancelled</span>';
	                    break;
                    }
                ?>
                </div>
                <?php if(!isset($_GET['view'])): ?>
                <div class="col-3"></div>
                <div class="col">
                    <button type="button" id="update_status" class="btn btn-sm  btn-primary">Update Status</button>
                </div>
                <?php endif; ?>
                
            </div>
        </div>
    </div>
</div>
<?php if(isset($_GET['view'])): ?>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
<style>
    #uni_modal>.modal-dialog>.modal-content>.modal-footer{
        display:none;
    }
    #uni_modal .modal-body{
        padding:0;
    }
</style>
<?php endif; ?>
<script>
    $(function(){
        $('#update_status').click(function(){
            uni_modal("Update Status", "./orders/update_status.php?oid=<?php echo $id ?>&status=<?php echo $status ?>")
        })
    })
</script>