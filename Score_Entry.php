<?php
$id="";
$opr="";
if(isset($_GET['opr']))
	$opr=$_GET['opr'];

if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];
	
						
if(isset($_POST['btn_sub'])){
	$stu_name=$_POST['sudenttxt'];
	$fa_name=$_POST['factxt'];
	$sub_name=$_POST['subjecttxt'];
	$miderm=$_POST['midermtxt'];
	$final=$_POST['finaltxt'];
	$note=$_POST['notetxt'];	
	

$sql_ins=mysql_query("INSERT INTO stu_score_tbl 
						VALUES(
							NULL,
							'$stu_name',
							'$fa_name' ,
							'$sub_name',
							'$miderm',
							'$final',
							'$note'
							)
					");
if($sql_ins==true) {
    echo "<div>"
        . "<div class='alert alert-success col-md-6 col-md-offset-3'>"
        . "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;"
        . "</button>"
        . "<strong>Sucess!</strong> New Score inserted"
        . "</div>"
        . "</div>";
}
else
	$msg="Insert Error:".mysql_error();
	
}

//------------------uodate data----------
if(isset($_POST['btn_upd'])){
	$stu_id=$_POST['sudenttxt'];
	$faculties_id =$_POST['factxt'];
	$sub_id=$_POST['subjecttxt'];
	$miderm=$_POST['midermtxt'];
	$final=$_POST['finaltxt'];
	$note=$_POST['notetxt'];
	
	$sql_update=mysql_query("UPDATE stu_score_tbl SET
							stu_id='$stu_id' ,
							faculties_id='$faculties_id' ,
							sub_id='$sub_id' ,
							miderm='$miderm' ,	
							final='$final' ,
							note='$note' 
						WHERE ss_id=$id

					");
					
if($sql_update==true) {
    echo "<div>"
        . "<div class='alert alert-success col-md-6 col-md-offset-3'>"
        . "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;"
        . "</button>"
        . "<strong>Sucess!</strong> Score Updated"
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

<?php
if($opr=="upd")
{
	$sql_upd=mysql_query("SELECT * FROM stu_score_tbl WHERE ss_id=$id");
	$rs_upd=mysql_fetch_array($sql_upd);
?>
<div class="col-md-10 col-md-offset-1 form-style">
    <div class="col-md-12 entry-head margin-20b">
        <h4 class="left">Score Update</h4>
        <a class="btn btn-primary right" href="?tag=view_scores">Back</a>
    </div>
    <div class="col-md-10 col-md-offset-1">
        <form role="form" data-toggle="validator" method="post" class="form-horizontal">
            <div class="row">
                <div class="form-group">
                    <label id="sudenttxt" class="control-label col-sm-3">Student's Name:</label>
                    <div class="col-sm-8">
                        <select name="sudenttxt" class="form-control">
                            <?php
                            $student_name=mysql_query("SELECT * FROM stu_tbl");
                            while($row=mysql_fetch_array($student_name)){
                                if($row['stu_id']==$rs_upd['stu_id'])
                                    $iselect="selected";
                                else
                                    $iselect="";
                                ?>
                                <option value="<?php echo $row['f_name']; echo" "; echo $row['l_name'];?>" <?php echo $iselect ;?> > <?php echo $row['f_name']; echo" "; echo $row['l_name'];?> </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label id="factxt" class="control-label col-sm-3">Facultie's Name:</label>
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
                                <option value="<?php echo $row['faculties_name'];?>" <?php echo $iselect ;?> > <?php echo $row['faculties_name'];?> </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label id="subjecttxt" class="control-label col-sm-3">Subject Name:</label>
                    <div class="col-sm-8">
                        <select name="subjecttxt" class="form-control">
                            <?php
                            $subject=mysql_query("SELECT * FROM sub_tbl");
                            while($row=mysql_fetch_array($subject)){
                                if($row['sub_id']==$rs_upd['sub_id'])
                                    $iselect="selected";
                                else
                                    $iselect="";
                                ?>
                                <option value="<?php echo $row['sub_name'];?>" <?php echo $iselect ;?> > <?php echo $row['sub_name'];?> </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="midermtxt" class="control-label col-sm-3">Midterm:</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control only-number" id="midermtxt" name="midermtxt" value=    <?php echo $rs_upd['miderm'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="finaltxt" class="control-label col-sm-3">Final:</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control only-number" id="finaltxt" name="finaltxt" value="<?php echo $rs_upd['final'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="notetxt" class="control-label col-sm-3">Remarks:</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" name="notetxt" cols="8" rows="6"><?php echo $rs_upd['note'];?></textarea>
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
        <h4 class="left">Score Entry</h4>
        <a class="btn btn-primary right" href="?tag=view_scores">Score View</a>
    </div>
    <div class="col-md-10 col-md-offset-1">
        <form role="form" data-toggle="validator" method="post" class="form-horizontal">
            <div class="row">
                <div class="form-group">
                    <label id="sudenttxt" class="control-label col-sm-3">Student's Name:</label>
                    <div class="col-sm-8">
                        <select name="sudenttxt" class="form-control">
                            <?php
                            $student_name=mysql_query("SELECT * FROM stu_tbl");
                            while($row=mysql_fetch_array($student_name)){
                                ?>
                                <option value="<?php echo $row['f_name']; echo" "; echo $row['l_name'];?>"> <?php echo $row['f_name']; echo" "; echo $row['l_name'];?> </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label id="factxt" class="control-label col-sm-3">Facultie's Name:</label>
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
                    <label id="subjecttxt" class="control-label col-sm-3">Subject Name:</label>
                    <div class="col-sm-8">
                        <select name="subjecttxt" class="form-control">
                            <?php
                            $subject=mysql_query("SELECT * FROM sub_tbl");
                            while($row=mysql_fetch_array($subject)){
                                ?>
                                <option value="<?php echo $row['sub_name'];?>"> <?php echo $row['sub_name'];?> </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="midermtxt" class="control-label col-sm-3">Midterm:</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control only-number" id="midermtxt" name="midermtxt"  placeholder="Midterm Marks..." required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="finaltxt" class="control-label col-sm-3">Final:</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control only-number" id="finaltxt" name="finaltxt"  placeholder="Finak Marks" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="notetxt" class="control-label col-sm-3">Remarks:</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" name="notetxt" cols="8" rows="6" required></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" name="btn_sub" value="Register" class="btn btn-success col-md-offset-4 col-sm-offset-4 col-xs-offset-2"/>
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