<?php
	$msg="";
	$opr="";
	if(isset($_GET['opr']))
	$opr=$_GET['opr'];
	
if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];
	
	if($opr=="del")
{
	$del_sql=mysql_query("DELETE FROM stu_score_tbl WHERE ss_id=$id");
	if($del_sql) {
        echo "<div>"
            . "<div class='alert alert-success col-md-6 col-md-offset-3'>"
            . "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;"
            . "</button>"
            . "<strong>Sucess!</strong> Record Deleted"
            . "</div>"
            . "</div>";
    }
	else
		$msg="Could not Delete :".mysql_error();	
			
}
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
        <h4 class="left">Score View</h4>
        <a class="btn btn-primary right" href="?tag=score_entry">Add New Score</a>
    </div>
    <form role="form" data-toggle="validator" method="post" class="form-horizontal">
        <div class="form-group">
            <div class="col-md-9 col-md-offset-1     col-xs-9 col-sm-10">
                <input type="text" class="form-control" name="searchtxt" Placeholder="Enter name for search" autocomplete="off"/></div>
            <input type="submit" name="btnsearch" value="Search" class="btn btn-info"/>
        </div>
    </form>


<div class="table-responsive">
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Students Name </th>
            <th>Faculties Name</th>
            <th>Subjecst Name</th>
            <th>Mider</th>
            <th>Final</th>
            <th>Note</th>
            <th colspan="2">Operation</th>
        </tr>
        
        <?php
		
		$key="";
	if(isset($_POST['searchtxt']))
		$key=$_POST['searchtxt'];
	
	if($key !="")
		$sql_sel=mysql_query("SElECT * FROM stu_score_tbl WHERE stu_id  like '%$key%' ");
	else
        $sql_sel=mysql_query("SELECT * FROM stu_score_tbl");
		
    $i=0;
    while($row=mysql_fetch_array($sql_sel)){
    $i++;
    $color=($i%2==0)?"lightblue":"white";
    ?>
      <tr bgcolor="<?php echo $color?>">
            <td><?php echo $i;?></td>
            <td><?php echo $row['stu_id'];?></td>
            <td><?php echo $row['faculties_id'];?></td>
            <td><?php echo $row['sub_id'];?></td>
            <td><?php echo $row['miderm'];?></td>
            <td><?php echo $row['final'];?></td>
            <td><?php echo $row['note'];?></td>
            <td align="center"><a href="?tag=score_entry&opr=upd&rs_id=<?php echo $row['ss_id'];?>"><img src="picture/update.png" /></a></td>
            <td align="center"><a href="?tag=view_scores&opr=del&rs_id=<?php echo $row['ss_id'];?>"><img src="picture/delete.png" /></a></td>
        </tr>
        
    <?php
		
    }
    ?>
    </table>
</div>
</body>
</html>