<?php
    $id="";
    $opr="";
    if(isset($_GET['opr']))
    	$opr=$_GET['opr'];

    if(isset($_GET['rs_id']))
    	$id=$_GET['rs_id'];
    //--------------add data-----------------
    if(isset($_POST['btn_sub'])){
        $roll_no = $_POST['roll_no'];
    	$f_name  = $_POST['fnametxt'];
    	$l_name  = $_POST['lnametxt'];
    	$gender  = $_POST['gender'];
        $phone   = $_POST['phonetxt'];
        $addr    = $_POST['addrtxt'];
        $dob     = $_POST['dob'];
        $mail    = $_POST['emailtxt'];

        $sql_ins=mysql_query("INSERT INTO stu_tbl VALUES('$roll_no', NULL,'$f_name','$l_name','$gender','$dob','$addr','$phone','$mail')");
        if($sql_ins==true) {
            $msg = ucfirst($f_name) ;
            echo "<div>"
                . "<div class='alert alert-success col-md-6 col-md-offset-3'>"
                . "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;"
                . "</button>"
                . "<strong>Sucess!</strong> Student $msg record inserted"
                . "</div>"
                . "</div>";
        }
        else
            $msg="Insert Error:".mysql_error();

        }
//------------------uodate data----------
if(isset($_POST['btn_upd'])){
    $roll_no = $_POST['roll_no'];
	$f_name=$_POST['fnametxt'];
	$l_name=$_POST['lnametxt'];
	$gender=$_POST['gender'];
	$dob=$_POST['dob'];
	$addr=$_POST['addrtxt'];
	$phone=$_POST['phonetxt'];
	$mail=$_POST['emailtxt'];
	
	$sql_update=mysql_query("UPDATE stu_tbl SET
                                roll_no = '$roll_no', 
								f_name='$f_name',
								l_name='$l_name' ,
								gender='$gender',
								dob='$dob',
								address='$addr',
								phone='$phone',
								email='$mail'
							WHERE
								stu_id=$id
							");
	if($sql_update==true) {
        $msg = ucfirst($f_name) ;
        echo "<div>"
            . "<div class='alert alert-success col-md-6 col-md-offset-3'>"
            . "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;"
            . "</button>"
            . "<strong>Sucess!</strong> Student $msg record Updated"
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
	$sql_upd=mysql_query("SELECT * FROM stu_tbl WHERE stu_id=$id");
	$rs_upd=mysql_fetch_array($sql_upd);
	list($y,$m,$d)=explode('-',$rs_upd['dob']);
?>

<!-- for form Upadte-->

<div class="col-md-10 col-md-offset-1 form-style">
    <div class="col-md-12 entry-head margin-20b">
        <h4 class="left">Students Update</h4>
        <a class="btn btn-primary right" href="?tag=view_students">Back</a>
    </div>
    <div class="col-md-10 col-md-offset-1 form-style">
            <form role="form" data-toggle="validator" method="post" class="form-horizontal">
                <div class="row">
                    <div class="form-group">
                        <label for="roll_no" class="control-label col-sm-3">Roll No:</label>
                        <div class="col-sm-8">
                            <input  type="text" class="form-control only-number" id="roll_no" name="roll_no" value="<?php echo $rs_upd['roll_no'];?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fnametxt" class="control-label col-sm-3">First Name:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="fnametxt" name="fnametxt" value="<?php echo $rs_upd['f_name'];?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lnametxt" class="control-label col-sm-3">Last Name:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="lnametxt" name="lnametxt" value="<?php echo $rs_upd['l_name'];?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="gender" class="control-label col-sm-3">Gender:</label>
                        <div class="radio col-sm-2">
                            <label><input type="radio" name="gender" value="male" <?php if($rs_upd['gender']=="male") echo "checked";?>>Male</label>
                        </div>
                        <div class="radio col-sm-4">
                            <label><input type="radio" name="gender" value="female" <?php if($rs_upd['gender']=="female") echo "checked";?>>Female</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phonetxt" class="control-label col-sm-3">Phone:</label>
                        <div class="col-sm-8">
                            <input type="number"data-minlength="11" class="form-control only-number" data-error="Enter Valid 11 Digit Phone Number  " id="phonetxt" name="phonetxt" value="<?php echo $rs_upd['phone'];?>">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="emailtxt" class="control-label col-sm-3">Email:</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" id="emailtxt" name="emailtxt" value="<?php echo $rs_upd['email'];?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="dob" class="control-label col-sm-3">Date of Birth :</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control datepicker" name="dob" value="<?php echo $rs_upd['dob'];?>" data-date-format="yyyy-mm-dd"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="addrtxt" class="control-label col-sm-3">Address:</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" name="addrtxt" cols="8" rows="6" required><?php echo $rs_upd['address'];?></textarea>
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
</div>

<?php
}
else
{
?>
<!-- for form Register-->
<div class="col-md-10 col-md-offset-1 form-style">
    <div class="col-md-12 entry-head margin-20b">
        <h4 class="left">Student Entry</h4>
        <a class="btn btn-primary right" href="?tag=view_students">Students View</a>
    </div>
    <div class="col-md-10 col-md-offset-1">
        <form role="form" data-toggle="validator" method="post" class="form-horizontal">
            <div class="row">
                <div class="form-group">
                    <label for="roll_no" class="control-label col-sm-3">Roll No:</label>
                    <div class="col-sm-8">
                        <input  type="text" class="form-control only-number" id="roll_no" name="roll_no"  placeholder="Student Roll No  ..." required>
                    </div>
                </div>
                <div class="form-group">
                      <label for="fnametxt" class="control-label col-sm-3">First Name:</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="fnametxt" name="fnametxt"  placeholder="First Name..." required>
                      </div>
                </div>
                <div class="form-group">
                      <label for="lnametxt" class="control-label col-sm-3">Last Name:</label>
                      <div class="col-sm-8">
                          <input type="text" class="form-control" id="lnametxt" name="lnametxt"  placeholder="Last Name..." required>
                      </div>
                </div>
                <div class="form-group">
                      <label for="gender" class="control-label col-sm-3">Gender:</label>
                      <div class="radio col-sm-2">
                        <label><input type="radio" name="gender" value="male" required>Male</label>
                      </div>
                      <div class="radio col-sm-4">
                         <label><input type="radio" name="gender" value="female" required>Female</label>
                      </div>
                </div>
                <div class="form-group">
                    <label for="phonetxt" class="control-label col-sm-3">Phone:</label>
                    <div class="col-sm-8">
                        <input type="number" data-minlength="11" class="form-control only-number" data-error="Enter Valid 11 Digit Phone Number" id="phonetxt" name="phonetxt"  placeholder="Phone..." required>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="emailtxt" class="control-label col-sm-3">Email:</label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control" id="emailtxt" name="emailtxt"  placeholder="e.g: jazibbashir@gmail.com" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="dob" class="control-label col-sm-3">Date of Birth :</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control datepicker" name="dob" data-date-format="yyyy-mm-dd" required/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="addrtxt" class="control-label col-sm-3">Address:</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" name="addrtxt" cols="8" rows="6" required></textarea>
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