

<?php

if(isset($_GET['viewDonations'])){

$edit_id = $_GET['viewDonations'];

$get_pro = "select * from donars where donarId='$edit_id'";

$run_pro = mysqli_query($Con,$get_pro);


$row_pro = mysqli_fetch_array($run_pro);

$name = $row_pro['donarName'];
$contact = $row_pro['contactNo'];
$address = $row_pro['Address'];
$username = $row_pro['donationType'];
$id = $row_pro['donarId'];

if($username  == 'Cash' ||$username == 'Both' ){
$getcash = "select * from donationcashdetails where donarid='$edit_id'";

$runcash = mysqli_query($Con,$getcash);


$rowcash = mysqli_fetch_array($runcash);
$cashAmount = $rowcash['cashAmount'];
}else{
    $cashAmount= '0';
}
}
?>



<!DOCTYPE html>

    <html>
        <head>
            <title>view donation</title>           

        </head>

        <body>

            <div class="row"><!--row starts-->

                <div class="col-lg-12"><!--col-lg-12 starts-->

                    <ol class="breadcrumb"><!--breadcrumb starts-->

                        <li class="active">
                            <i class="fa fa-dashboard"></i>donation/view donation
                        </li>

                    </ol><!--breadcrumb Ends-->

                </div><!--col-lg-12 Ends-->

            </div><!--row Ends-->

            <div class="row"><!--2 row starts-->

                <div class="col-lg-6"><!--col-lg-12 starts-->

                    <div class="panel panel-default"><!--panel panel-default starts-->

                        <div class="panel-heading"><!--panel-heading starts-->

                            <h3 class="panel-title">

                                <i class="fa fa-money fa-fw"></i>Donar Details

                            </h3>

                        </div><!--panel-heading Ends-->

                        <div class="panel-body"><!--panel-body starts-->

                            <form id="insert_form" class="form-horizontal" method="POST" ><!-- form-horizantal starts-->

                                <div class="form-group"><!--form-group starts-->

                                    <label class="col-md-3 control-label">Name</label>

                                    <div class="col-md-9"><!--col-md-6 starts-->

                                        <input type="text" name="contactNo" id="name" class="form-control" value="<?php echo $name ?>" disabled="disabled" required>

                                    </div><!--col-md-6 Ends-->

                                </div><!--form-group Ends-->


                                <div class="form-group"><!--form-group starts-->

                                    <label class="col-md-3 control-label">Contact No</label>

                                    <div class="col-md-9"><!--col-md-6 starts-->

                                          <input type="text" name="contactNo" id="contactNo" class="form-control" value="<?php echo $contact ?>" disabled="disabled" required>

                                    </div><!--col-md-6 Ends-->

                                </div><!--form-group Ends-->


                                


                                <div class="form-group"><!--form-group starts-->

                                    <label class="col-md-3 control-label">Address</label>

                                    <div class="col-md-9"><!--col-md-6 starts-->

                                           <input type="text" name="address" id="address" class="form-control" value="<?php echo $address ?>" disabled="disabled" required >

                                    </div><!--col-md-6 Ends-->

                                </div><!--form-group Ends-->


                                 <div class="form-group"><!--form-group starts-->

                                    <label class="col-md-3 control-label">Donation Type</label>

                                    <div class="col-md-9"><!--col-md-6 starts-->

                                           <input type="text" name="username" id="username" class="form-control" value="<?php echo $username ?>" disabled="disabled" required >

                                    </div><!--col-md-6 Ends-->

                                </div><!--form-group Ends-->                               

                            </form><!-- form-horizantal Ends-->

                        </div><!--panel-body Ends-->

                    </div><!--panel panel-default Ends-->

                </div><!--col-lg-6 Ends-->
                
                <div class="col-lg-6">
                   <div class="col-xs-12"><!-- col-xs-3 Starts -->
<div class="col-lg-12 col-md-12"><!-- col-lg-3 col-md-6 Starts -->

<div class="panel panel-primary"><!-- panel panel-primary Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<div class="row"><!-- panel-heading row Starts -->

<div class="col-xs-3"><!-- col-xs-3 Starts -->

<i class="fa fa-money fa-5x"> </i>

</div><!-- col-xs-3 Ends -->

<div class="col-xs-9 text-right"><!-- col-xs-9 text-right Starts -->
    <br>
<div class="huge"> Rs. <?php echo $cashAmount ?>.00  </div>

<div>Total Donations</div>

</div><!-- col-xs-9 text-right Ends -->

</div><!-- panel-heading row Ends -->

</div><!-- panel-heading Ends -->


</div><!-- panel panel-primary Ends -->

</div><!-- col-lg-3 col-md-6 Ends -->


                </div>
                </div>
            </div><!--2 row Ends-->
            <h3>Donated Items
            </h3>         
            <div class="row">
                <div class="panel-body" ><!-- panel-body Starts -->

<div class="table-responsive" ><!-- table-responsive Starts -->

<table class="table table-bordered table-hover table-striped" ><!-- table table-bordered table-hover table-striped Starts -->

<thead>

<tr>
 <th>No</th>   
 <th>Item Name</th>   
<th>Quantity</th>

</tr>

</thead>

<tbody>

<?php

$i = 0;

$getitem = "select * from donationitemdetails where donarid='$edit_id'";

$runitem = mysqli_query($Con,$getitem);

while($row_item=mysqli_fetch_array($runitem)){

$name = $row_item['itemDetails'];
$qty = $row_item['qty'];

$i++;

?>

<tr>

<td><?php echo $i; ?></td>
<td><?php echo $name; ?></td>
<td><?php echo $qty; ?></td>




</tr>

<?php } ?>


</tbody>


</table><!-- table table-bordered table-hover table-striped Ends -->

</div><!-- table-responsive Ends -->

</div><!-- panel-body Ends -->

            </div>
            
             <?php
    if (isset($_POST['editStaff'])) {

     $name = $_POST['Sname'];
     $contact = $_POST['contactNo'];
     $address  =$_POST['address'];
     $username =$_POST['username'];
     $password = $_POST['password'];

        $insert_staff = "update  staff set Name='$name',ContactNo='$contact',Address='$address',username='$username',password='$password' where staffId = '$edit_id'";
               

        $run_staff = mysqli_query($Con, $insert_staff);

        if ($run_staff) {
            echo "<script> alert('User updated successfully ')</script>";
            echo "<script> window.open('index.php?viewStaff ','_self')</script>";
        }
    }
    ?>
        
      