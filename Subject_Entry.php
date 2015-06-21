<?php
$id="";
$opr="";
if(isset($_GET['opr']))
	$opr=$_GET['opr'];

if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];
	
if(isset($_POST['btn_sub'])){
	$fa_name=$_POST['factxt'];
	$teach_name=$_POST['techtxt'];
	$semester=$_POST['semestertxt'];
	$sub_name=$_POST['subtxt'];
	$note=$_POST['notetxt'];	
	
	

$sql_ins=mysql_query("INSERT INTO sub_tbl 
	VALUES(
		NULL,
		'$fa_name',
		'$teach_name' ,
		'$semester',
		'$sub_name' ,
		'$note'
		)
");
	
if($sql_ins==true)
    {
        echo "<div>"
            . "<div class='alert alert-success col-md-6 col-md-offset-3'>"
            . "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;"
            . "</button>"
            . "<strong>Sucess!</strong> New Subject inserted"
            . "</div>"
            . "</div>";
    }

else
	$msg="Insert Error:".mysql_error();
	
}

//------------------uodate data----------
if(isset($_POST['btn_upd'])){
	$fac_id=$_POST['factxt'];
	$tea_id=$_POST['techtxt'];
	$semester=$_POST['semestertxt'];
	$sub_name=$_POST['subtxt'];
	$note=$_POST['notetxt'];
	
	
	$sql_update=mysql_query("UPDATE sub_tbl SET
		faculties_id='$fac_id' ,
		teacher_id='$tea_id' ,
		semester='$semester' ,
		sub_name='$sub_name' ,
		note='$note' 
	WHERE sub_id=$id

");
					
if($sql_update==true) {
    echo "<div>"
        . "<div class='alert alert-success col-md-6 col-md-offset-3'>"
        . "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;"
        . "</button>"
        . "<strong>Sucess!</strong> Subject Updated"
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
	$sql_upd=mysql_query("SELECT * FROM sub_tbl WHERE sub_id=$id");
	$rs_upd=mysql_fetch_array($sql_upd);
	
?>
<div class="col-md-10 col-md-offset-1 form-style">
    <div class="col-md-12 entry-head margin-20b">
        <h4 class="left">Subject Update</h4>
        <a class="btn btn-primary right" href="?tag=view_subjects">Back</a>
    </div>
    <div class="col-md-10 col-md-offset-1">
        <form role="form" data-toggle="validator" method="post" class="form-horizontal">
            <div class="row">
                <div class="form-group">
                    <label class="control-label col-sm-3">facultie's Name:</label>
                    <div class="col-sm-8">
                        <select name="factxt" class="form-control">
                            <?php
                            $fac_name=mysql_query("SELECT * FROM facuties_tbl");
                            while($row=mysql_fetch_array($fac_name)){
                                if($row['faculties_id']==$rs_upd['faculties_id'])
                                    $iselect="selected";
                                else
                                    $iselect="";
                                ?>
                                <option value="<?php echo $row['faculties_name'];?>" <?php echo $iselect;?> > <?php echo $row['faculties_name'];?> </option>
                            <?php
                            }

                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Teacher's Name:</label>
                    <div class="col-sm-8">
                        <select name="techtxt" class="form-control">
                            <?php
                            $te_name=mysql_query("SELECT * FROM teacher_tbl");
                            while($row=mysql_fetch_array($te_name)){
                                if($row['teacher_id']==$rs_upd['teacher_id'])
                                    $iselect="selected";
                                else
                                    $iselect="";
                                ?>
                                <option value="<?php echo $row['f_name'] ; echo " "; echo $row['l_name'];?>" <?php echo $iselect?> > <?php echo $row['f_name'] ; echo " "; echo $row['l_name'];?> </option>

                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="smesterText" class="control-label col-sm-3">Class:</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control only-number" id="smesterText" name="semestertxt" value="<?php echo $rs_upd['semester'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="subjectInput" class="control-label col-sm-3">Subjects's name:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="subjectInput" name="subtxt" value="<?php echo $rs_upd['sub_name'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputNote" class="control-label col-sm-3">Description:</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" id="inputNote" name="notetxt" cols="8" rows="6"><?php echo $rs_upd['note'];?></textarea>
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
        <h4 class="left">Subjects Entry</h4>
        <a class="btn btn-primary right" href="?tag=view_subjects">View Subjects</a>
    </div>
    <div class="col-md-10 col-md-offset-1">
        <form role="form" data-toggle="validator" method="post" class="form-horizontal">
            <div class="row">
                <div class="form-group">
                    <label class="control-label col-sm-3">facultie's Name:</label>
                    <div class="col-sm-8">
                        <select name="factxt" class="form-control">
                            <?php
                            $fac_name=mysql_query("SELECT * FROM facuties_tbl");
                            while($row=mysql_fetch_array($fac_name)){
                                ?>
                                <option value="<?php echo $row['faculties_name'];?>"> <?php echo $row['faculties_name'];?> </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Teacher's Name:</label>
                    <div class="col-sm-8">
                        <select name="techtxt" class="form-control">
                            <?php
                            $te_name=mysql_query("SELECT * FROM teacher_tbl");
                            while($row=mysql_fetch_array($te_name)){
                                ?>
                                <option value="<?php echo $row['f_name'] ; echo " "; echo $row['l_name'];?>"> <?php echo $row['f_name'] ; echo " "; echo $row['l_name'];?> </option>

                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="smesterText" class="control-label col-sm-3">Class:</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control only-number" id="smesterText" name="semestertxt"  placeholder="Enter Class e.g(1-10)" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="subjectInput" class="control-label col-sm-3">Subjects's name:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="subjectInput" name="subtxt"  placeholder="Subject Name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputNote" class="control-label col-sm-3">Description:</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" id="inputNote" name="notetxt" cols="8" rows="6" required></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" name="btn_sub" value="Add Subject" class="btn btn-success col-md-offset-4 col-sm-offset-4 col-xs-offset-2"/>
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