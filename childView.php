


<div class="row"><!--  1 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<ol class="breadcrumb" ><!-- breadcrumb Starts -->
 
<li class="active" >

<i class="fa fa-dashboard"></i> Child / View Child

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!--  1 row Ends -->

<div class="row" ><!-- 2 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<div class="panel panel-default" ><!-- panel panel-default Starts -->

<div class="panel-heading" ><!-- panel-heading Starts -->

<h3 class="panel-title" ><!-- panel-title Starts -->

<i class="fa fa-money fa-fw" ></i> View Child

</h3><!-- panel-title Ends -->


</div><!-- panel-heading Ends -->

<div class="panel-body" ><!-- panel-body Starts -->

<div class="table-responsive" ><!-- table-responsive Starts -->

<table class="table table-bordered table-hover table-striped" ><!-- table table-bordered table-hover table-striped Starts -->

<thead>

<tr>
 <th>NO</th>  
<th>Name with Initials</th> 
<th>Child Full Name</th>
<th>Gender</th>
<th>Birth Date</th>
<th>Age</th>
<th>Picture</th>
<th>Edit</th>
<th>Delete</th>
</tr>

</thead>

<tbody>

<?php

$i = 0;

$get_pro = "select * from childdetails";

$run_pro = mysqli_query($Con,$get_pro);

while($row_pro=mysqli_fetch_array($run_pro)){

$name_with_init = $row_pro['name_with_init'];
$name = $row_pro['name'];
$bdate = $row_pro['birthdate'];
$images = $row_pro['image_url'];
$gender = $row_pro['gender'];
$id = $row_pro['id'];
$i++;

 $age = date("Y")- substr($bdate,0,4);

?>

<tr>

<td><?php echo $i; ?></td>
<td><?php echo $name_with_init; ?></td>
<td><?php echo $name; ?></td>
<td><?php echo $gender; ?></td>
<td><?php echo $bdate; ?></td>
<td><?php echo $age; ?></td>
<td width=120px; >
<img class="center_image" width=100px height=100px src="uploads/<?=$images?>">
</td>


<td>

<a href="index.php?editChild=<?php echo $id; ?>">

<i class="fa fa-pencil"> </i> Edit

</a>

</td>
<td>

<a href="index.php?deleteChild=<?php echo $id; ?>">

<i class="fa fa-trash-o"> </i> Delete

</a>

</td>



</tr>

<?php } ?>


</tbody>


</table><!-- table table-bordered table-hover table-striped Ends -->

</div><!-- table-responsive Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends -->


