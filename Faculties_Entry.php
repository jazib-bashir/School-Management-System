<?php
$id="";
$opr="";
if(isset($_GET['opr']))
	$opr=$_GET['opr'];

if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];
	
if(isset($_POST['btn_sub'])){
	$facuties_name=$_POST['fnametxt'];
	$note=$_POST['notetxt'];	
	

$sql_ins=mysql_query("INSERT INTO facuties_tbl 
						VALUES(
							NULL,
							'$facuties_name',
							'$note'
							)
					");
if($sql_ins==true) {
    {
        echo "<div>"
            . "<div class='alert alert-success col-md-6 col-md-offset-3'>"
            . "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;"
            . "</button>"
            . "<strong>Sucess!</strong> New Faculty inserted"
            . "</div>"
            . "</div>";
    }
}
else
	$msg="Insert Error:".mysql_error();
	
}

//------------------uodate data----------
if(isset($_POST['btn_upd'])){
	$fac_name=$_POST['fnametxt'];
	$note=$_POST['notetxt'];	
	
	$sql_update=mysql_query("UPDATE facuties_tbl SET 
								faculties_name='$fac_name',
								note='$note'
							WHERE
								faculties_id=$id
							");
	if($sql_update==true) {
        echo "<div>"
            . "<div class='alert alert-success col-md-6 col-md-offset-3'>"
            . "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;"
            . "</button>"
            . "<strong>Sucess!</strong> Faculty Updated"
            . "</div>"
            . "</div>";
    }
	else {
        echo "<div>"
            . "<div class='alert alert-danger col-md-6 col-md-offset-3'>"
            . "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;"
            . "</button>"
            . "<strong>Warning!</strong> Update Failed"
            . "</div>"
            . "</div>";
    }
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>::. Build Bright University .::</title>
<link rel="stylesheet" type="text/css" href="css/style_entry.css" />
</head>

<body>

<?php

if($opr=="upd")
{
	$sql_upd=mysql_query("SELECT * FROM facuties_tbl WHERE faculties_id=$id");
	$rs_upd=mysql_fetch_array($sql_upd);
	
?>
<div class="col-md-10 col-md-offset-1 form-style">
    <div class="col-md-12 entry-head margin-20b">
        <h4 class="left">Faculties Update</h4>
        <a class="btn btn-primary right" href="?tag=view_faculties">Back</a>
    </div>
    <div class="col-md-10 col-md-offset-1">
        <form role="form" data-toggle="validator" method="post" class="form-horizontal">
            <div class="row">
                <div class="form-group">
                    <label for="fnametxt" class="control-label col-sm-3">Faculties's Name:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="fnametxt" name="fnametxt" value="<?php echo $rs_upd['faculties_name'];?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="notetxt" class="control-label col-sm-3">Description:</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" name="notetxt" cols="8" rows="6"><?php  echo $rs_upd['note'];?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" name="btn_upd" value="Update" class="btn btn-success col-md-offset-4 col-sm-offset-4 col-xs-offset-2"/>
                    <input type="reset" value="Cancel" class="btn btn-primary col-md-offset-3 col-sm-offset-3 col-xs-offset-3"/>
                </div>
            </div>
        </form>
    </div>
</div>


<?php	
}
else
{
?>
<div class="col-md-10 col-md-offset-1 form-style">
    <div class="col-md-12 entry-head margin-20b">
        <h4 class="left">Faculties Entry</h4>
        <a class="btn btn-primary right" href="?tag=view_faculties">Faculties View</a>
    </div>
    <div class="col-md-10 col-md-offset-1">
        <form role="form" data-toggle="validator" method="post" class="form-horizontal">
            <div class="row">
                <div class="form-group">
                    <label for="fnametxt" class="control-label col-sm-3">Faculties's Name:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="fnametxt" name="fnametxt"  placeholder="Faculty Name..." required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="notetxt" class="control-label col-sm-3">Description:</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" name="notetxt" cols="8" rows="6" required></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" name="btn_sub" value="Add Faculty" class="btn btn-success col-md-offset-4 col-sm-offset-4 col-xs-offset-2"/>
                    <input type="reset" value="Cancel" class="btn btn-primary col-md-offset-3 col-sm-offset-3 col-xs-offset-3"/>
                </div>
            </div>
        </form>
    </div>
</div>
<?php
}
?>
</body>
</html>