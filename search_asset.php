<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Inventory</title>
  <meta name="description" content="The HTML5 Herald">
  <meta name="author" content="SitePoint">

  <link rel="stylesheet" href="css/styles.css">

</head>

<body>

<?php




$dbhost = '127.0.0.1';
$dbuser = 'root';
$dbpass = '';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}

$data = $_POST['data'];

if($_POST["criteria"]=="1")
{
	$sql = "SELECT * FROM assets where employee = '$data' ";
}

else if ($_POST["criteria"]=="2") 
{
	$sql = "SELECT * FROM assets where department = '$data' ";
}
else if ($_POST["criteria"]=="3") 
{
	$sql = "SELECT * FROM assets where vendor = '$data' ";
}
else if ($_POST["criteria"]=="4") 
{
	$sql = "SELECT * FROM assets where model = '$data' ";
}
else if ($_POST["criteria"]=="5") 
{
	$sql = "SELECT * FROM assets where asset_tag = '$data' ";
}
else if ($_POST["criteria"]=="6") 
{
	$sql = "SELECT * FROM assets where asset_category = '$data' ";
}
else if ($_POST["criteria"]=="7") 
{
	$sql = "SELECT * FROM assets where status = '$data' ";
}
else if ($_POST["criteria"]=="8") 
{
	$sql = "SELECT * FROM assets where date_recorded = '$data' ";
}
else echo "Wrong criteria selected";



//$sql = "SELECT * FROM assets where ";

mysql_select_db('inventory');
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}


?>

<div class="caption">Inventory</div>	
<div id="table">
	<div class="header-row row">
    <span class="cell primary">Employee</span>
    <span class="cell">Department</span>
     <span class="cell">Vendor</span>
    <span class="cell">Model</span>
    <span class="cell">Service Tag</span>
    <span class="cell">Asset Tag</span>
    <span class="cell">Asset Category</span>
    <span class="cell">Asset Status</span>
    <span class="cell">Date Recorded</span>
    <span class="cell">Notes</span>

  </div>
 

  	<?php
	while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
{?>
	<div class="row">
    <span class="cell" data-label="Employee"><?php echo "{$row['employee']} <br>"; ?></span>
    <span class="cell" data-label="Department"><?php echo "{$row['department']} <br>"; ?></span>
    <span class="cell" data-label="Vendor"><?php echo "{$row['vendor']} <br>"; ?></span>
    <span class="cell" data-label="Model"><?php echo "{$row['model']} <br>"; ?></span>
    <span class="cell" data-label="Service Tag"><?php echo "{$row['service_tag']} <br>"; ?></span>
    <span class="cell" data-label="Asset Tag"><?php echo "{$row['asset_tag']} <br>"; ?></span>
    <span class="cell" data-label="Asset Category"><?php echo "{$row['asset_category']} <br>"; ?></span>
    <span class="cell" data-label="Asset Status"><?php echo "{$row['status']} <br>"; ?></span>
    <span class="cell" data-label="Data Recorded"><?php echo "{$row['date_recorded']} <br>"; ?></span>
    <span class="cell" data-label="Notes"><?php echo "{$row['notes']} <br>"; ?></span>


  </div>

</body>
</html>
  <?php
	}

mysql_close($conn);

	?>