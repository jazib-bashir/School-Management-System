<!--for delete Record -->
<?php
	$msg="";
	$opr="";
	if(isset($_GET['opr']))
	$opr=$_GET['opr'];
	
if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];
	
	if($opr=="del")
{
	$del_sql=mysql_query("DELETE FROM teacher_tbl WHERE teacher_id=$id");
	if($del_sql) {
        {
            echo "<div>"
                . "<div class='alert alert-success col-md-6 col-md-offset-3'>"
                . "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;"
                . "</button>"
                . "<strong>Sucess!</strong> Record Deleted"
                . "</div>"
                . "</div>";
        }
    }
	else
		$msg="Could not Delete :".mysql_error();	
			
}
	echo $msg;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style_view.css" />
<title>Untitled Document</title>
</head>

<body>
<div class="col-md-12  view-form-style">
    <div class="col-md-12 entry-head margin-20b">
        <h4 class="left">Teachers View</h4>
        <a class="btn btn-primary right" href="?tag=teachers_entry">Add New Teacher</a>
    </div>
    <form role="form" data-toggle="validator" method="post" class="form-horizontal">
        <div class="form-group">
            <div class="col-md-9 col-md-offset-1 col-xs-9 col-sm-10">
                <input type="text" class="form-control" name="searchtxt" Placeholder="Enter name for search" autocomplete="off"/></div>
            <input type="submit" name="btnsearch" value="Search" class="btn btn-info"/>
        </div>
    </form>
<!--<form method="post">-->
<!--<table width="755">-->
<!--	<tr>-->
<!--    	<td width="190px" style="font-size:18px; color:#006; text-indent:30px;">View Teachers</td>-->
<!--        <td><a href="?tag=teachers_entry"><input type="button" title="Add new Teachers" name="butAdd" value="Add New" id="button-search" /></a></td>-->
<!--        <td><input type="text" name="searchtxt" title="Enter name for search " class="search" autocomplete="off"/></td>-->
<!--        <td style="float:right"><input type="submit" name="btnsearch" value="Search" id="button-search" title="Search Teacher" /></td>-->
<!--    </tr>-->
<!--</table>-->
<!--</form>-->
<div class="table-responsive">
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Teacher Name</th>
            <th>Address</th>
            <th>Degree</th>
            <th>Phone</th>
            <th>E-mail</th>
            <th colspan="2">Operation</th>
        </tr>
         <?php
		 $key="";
	if(isset($_POST['searchtxt']))
		$key=$_POST['searchtxt'];
	
	if($key !="")
		$sql_sel=mysql_query("SElECT * FROM teacher_tbl WHERE f_name  like '%$key%' or l_name like '%$key%'");
	else
        $sql_sel=mysql_query("SELECT * FROM teacher_tbl");
		
    $i=0;
    while($row=mysql_fetch_array($sql_sel)){
    $i++;
    $color=($i%2==0)?"lightblue":"white";
    ?>
      <tr bgcolor="<?php echo $color?>">
            <td><?php echo $i;?></td>
            <td><?php echo $row['f_name']."    ".$row['l_name'];?></td>
            <td><?php echo $row['address'];?></td>
            <td><?php echo $row['degree'];?></td>
            <td><?php echo $row['phone'];?></td>
            <td><?php echo $row['email'];?></td>
            <td><a href="?tag=teachers_entry&opr=upd&rs_id=<?php echo $row['teacher_id'];?>" title="Upate"><img src="picture/update.png" /></a></td>
            <td><a href="?tag=view_teachers&opr=del&rs_id=<?php echo $row['teacher_id'];?>" title="Delete"><img src="picture/delete.png" /></a></td>
        </tr>
    <?php	
    }
    ?>
    </table>
</div><!-- end of content-input -->
</body>
</html>