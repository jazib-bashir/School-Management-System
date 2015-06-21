<?php

	$msg="";
	$opr="";
	$id="";
	if(isset($_GET['opr']))
	$opr=$_GET['opr'];
	
if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];
	
//--------------add data-----------------
if(isset($_POST['btn_sub'])){
	$f_name=$_POST['fnametxt'];
	$l_name=$_POST['lnametxt'];
	$gender=$_POST['genderrdo'];
	$dob=$_POST['dob'];
	$addr=$_POST['addrtxt'];
	$degree=$_POST['degree'];
	$salary=$_POST['slarytxt'];
	$married=$_POST['marriedrdo'];
	$phone=$_POST['phonetxt'];
	$mail=$_POST['emailtxt'];
	
$sql_ins=mysql_query("INSERT INTO teacher_tbl VALUES( NULL,'$f_name','$l_name' ,'$gender','$dob','$addr','$degree','$salary' ,'$married','$phone','$mail')");
if($sql_ins==true) {
    $msg = ucfirst($f_name) ;
    echo "<div>"
        . "<div class='alert alert-success col-md-6 col-md-offset-3'>"
        . "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;"
        . "</button>"
        . "<strong>Sucess!</strong> Teacher $msg record inserted"
        . "</div>"
        . "</div>";
}
else
	$msg="Insert Error:".mysql_error();
	
}
//------------------uodate data----------
if(isset($_POST['btn_upd'])){
	$f_name=$_POST['fnametxt'];
	$l_name=$_POST['lnametxt'];
	$gender=$_POST['gender'];
	$dob=$_POST['dob'];
	$addr=$_POST['addrtxt'];
	$degree=$_POST['degree'];
    $salary = $_POST['slarytxt'];
	$married=$_POST['marriedrdo'];
	$phone=$_POST['phonetxt'];
	$mail=$_POST['emailtxt'];

	$sql_update=mysql_query("UPDATE teacher_tbl SET
							f_name='$f_name' ,
							l_name='$l_name' ,
							gender='$gender' ,
							dob='$dob' ,
							address='$addr' ,
							degree='$degree' ,
							salary='$salary' ,
							married='$married' ,
							phone='$phone' ,
							email='$mail'
						WHERE teacher_id=$id
	
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
	$sql_upd=mysql_query("SELECT * FROM teacher_tbl WHERE teacher_id=$id");
	$rs_upd=mysql_fetch_array($sql_upd);
	list($y,$m,$d)=explode('-',$rs_upd['dob']);
?>
<div class="col-md-10 col-md-offset-1 form-style">
    <div class="col-md-12 entry-head margin-20b">
        <h4 class="left">Teacher Update</h4>
        <a class="btn btn-primary right" href="?tag=view_teachers">Back</a>
    </div>
    <div class="col-md-10 col-md-offset-1 form-style">
            <form role="form" data-toggle="validator" method="post" class="form-horizontal">
                <div class="row">
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
                    <label for="marriedrdo" class="control-label col-sm-3">Married:</label>
                    <div class="radio col-sm-2">
                        <label><input type="radio" name="marriedrdo" value="male" <?php if($rs_upd['gender']=="male") echo "checked";?>>Yes</label>
                    </div>
                    <div class="radio col-sm-4">
                        <label><input type="radio" name="marriedrdo" value="female" <?php if($rs_upd['gender']=="female") echo "checked";?>>No</label>
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
                        <label for="slarytxt" class="control-label col-sm-3">Salary:</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control only-number" id="slarytxt" name="slarytxt" value="<?php echo $rs_upd['salary'];?>">
                        </div>
                    </div>
                    <div class="form-group">
                    <label for="degree" class="control-label col-sm-3">Degree:</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="degree">
                            <option <?php if($rs_upd['degree']=="Bachelor") echo "selected";?>>Bachelor</option>
                            <option <?php if($rs_upd['degree']=="Master") echo "selected";?>>Master</option>
                            <option <?php if($rs_upd['degree']=="P.H.D") echo "selected";?>>P.H.D</option>
                        </select>
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
<div class="col-md-10 col-md-offset-1 form-style">
    <div class="col-md-12 entry-head margin-20b">
        <h4 class="left">Teacher Entry</h4>
        <a class="btn btn-primary right" href="?tag=view_teachers">Teacher View</a>
    </div>
    <div class="col-md-10 col-md-offset-1">
        <form role="form" data-toggle="validator" method="post" class="form-horizontal">
            <div class="row">
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
                    <label for="genderrdo" class="control-label col-sm-3">Gender:</label>
                    <div class="radio col-sm-2">
                        <label><input type="radio" name="genderrdo" value="male" required>Male</label>
                    </div>
                    <div class="radio col-sm-4">
                        <label><input type="radio" name="genderrdo" value="female" required>Female</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="marriedrdo" class="control-label col-sm-3">Married:</label>
                    <div class="radio col-sm-2">
                        <label><input type="radio" name="marriedrdo" value="male" required>Yes</label>
                    </div>
                    <div class="radio col-sm-4">
                        <label><input type="radio" name="marriedrdo" value="female" required>No</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="phonetxt" class="control-label col-sm-3">Phone:</label>
                    <div class="col-sm-8">
                        <input type="number"data-minlength="11" data-error="Enter Valid 11 Digit Phone Number" class="form-control only-number" id="phonetxt" name="phonetxt"  placeholder="Contact No..." required>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="slarytxt" class="control-label col-sm-3">Salary:</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control only-number" id="slarytxt" name="slarytxt"  placeholder="Teacher Salary..." required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="degree" class="control-label col-sm-3">Degree:</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="degree">
                            <option>Bachelor</option>
                            <option>Master</option>
                            <option>P.H.D</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="emailtxt" class="control-label col-sm-3">Email:</label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control" id="emailtxt" name="emailtxt"  placeholder="Email Address..." required>
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
<!--<div id="top_style">-->
<!--        <div id="top_style_text">-->
<!--        Teachers Entry-->
<!--        </div>-->
<!--        <!-- end of top_style_text-->
<!--       <div id="top_style_button">-->
<!--       		<form method="post">-->
<!--            	<a href="?tag=view_teachers"><input type="button" name="btn_view" title="View Teachers" value="View Teachers" id="button_view" style="width:120px;"  /></a>-->
<!---->
<!--       		</form>-->
<!--       </div><!-- end of top_style_button-->
<!--</div><!-- end of top_style-->
<!---->
<!--<!-- for form Upadte-->
<!---->
<!--<div id="style_informations">-->
<!--	<form method="post">-->
<!--    	<div>-->
<!--    	<table border="0" cellpadding="5" cellspacing="0">-->
<!--            	<tr>-->
<!--                	<td>First Name</td>-->
<!--                    <td>-->
<!--                    	<input type="text" name="fnametxt" id="textbox" />-->
<!--                    </td>-->
<!--            	</tr>-->
<!---->
<!--                <tr>-->
<!--                	<td>Last Name</td>-->
<!--                    <td>-->
<!--                    	<input type="text" name="lnametxt" id="textbox" />-->
<!--                    </td>-->
<!--            	</tr>-->
<!---->
<!--                <tr>-->
<!--                	<td>Gender</td>-->
<!--                    <td>-->
<!--                    	<input type="radio" name="genderrdo" value="Male" checked="checked"/>Male-->
<!--                        <input type="radio" name="genderrdo" value="Female" />Female-->
<!--                    </td>-->
<!--                </tr>-->
<!---->
<!--                <td>Date Of Birth</td>-->
<!--                <td>-->
<!--                	<select name="yy" style="height:25px;">-->
<!--                    	<option>Year</option>-->
<!--                        --><?php
//							for($i=1985;$i<=2015;$i++){
//							echo"<option value='$i'>$i</option>";
//							}
//						?>
<!--                	</select>-->
<!--                    --->
<!--                    <select name="mm" style="height:25px;">-->
<!--                    	<option>Month</option>-->
<!--						--><?php
//                            $mm=array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","NOv","Dec");
//                            $i=0;
//                            foreach($mm as $mon){
//                                $i++;
//                                echo"<option value='$i'> $mon</option>";
//                            }
//                        ?>
<!--                    </select>-->
<!--                    --->
<!--                    <select name="dd" style="height:25px;">-->
<!--                    	<option>Date</option>-->
<!--						--><?php
//                        for($i=1;$i<=31;$i++){
//                        ?>
<!--                        <option value="--><?php //echo $i; ?><!--">-->
<!--                        --><?php
//                        if($i<10)
//                            echo"0".$i;
//                        else
//                            echo"$i";
//						?>
<!--						</option>-->
<!--						--><?php
//						}?>
<!--					</select>-->
<!--                </td>-->
<!--            </tr>-->
<!---->
<!--                 <tr>-->
<!--                	<td>Place Of Birth</td>-->
<!--                    <td>-->
<!--                    	<input type="text"  name="pobtxt" id="textbox"/>-->
<!--                    </td>-->
<!--                </tr>-->
<!---->
<!--                <tr>-->
<!--            	<td>Address</td>-->
<!--            	<td>-->
<!--                	<textarea name="addrtxt" cols="23" rows="3"></textarea>-->
<!--    			</td>-->
<!--        	</tr>-->
<!---->
<!--            <tr>-->
<!--            	<td colspan="2">-->
<!--                	<input type="reset" value="Cancel" id="button-in"/>-->
<!--                	<input type="submit" name="btn_sub" value="Register" id="button-in"  />-->
<!--                </td>-->
<!--            </tr>-->
<!--            </table  >-->
<!---->
<!--   </div>-->
<!---->
<!--	<div>-->
<!--    	<table border="0" cellpadding="5" cellspacing="0">-->
<!--                    <tr>-->
<!--                    	<td>Degree</td>-->
<!--                    <td>-->
<!--                        <select name="degree" id="textbox">-->
<!--                            <option>------------  Select  ------------</option>-->
<!--                            --><?php
//                                $mm=array("Bachelor","Master","P.HD");
//                                $i=0;
//                                foreach($mm as $mon){
//                                    $i++;
//										echo"<option value='$mon'> $mon</option>";
//                                    //echo"<option value='$i'> $mon</option>";
//                                }
//                            ?>
<!--                        </select>-->
<!--                    </td>-->
<!--                </tr>-->
<!---->
<!--            	<tr>-->
<!--                	<td>Salary</td>-->
<!--                    <td>-->
<!--                    	<input type="text" name="slarytxt" id="textbox" />-->
<!--                    </td>-->
<!--                </tr>-->
<!---->
<!--            	<tr>-->
<!--                	<td>Married</td>-->
<!--                    <td>-->
<!--                    	<input type="radio" name="marriedrdo" value="Yes"  checked="checked"/>Yes-->
<!--                        <input type="radio" name="marriedrdo" value="No" />No-->
<!--                    </td>-->
<!--                </tr>-->
<!---->
<!--               <tr>-->
<!--               		<td>Phone</td>-->
<!--                    <td>-->
<!--                    	<input type="text"  name="phonetxt" id="textbox"/>-->
<!--                    </td>-->
<!--               </tr>-->
<!---->
<!--               <tr>-->
<!--               		<td>E-mail</td>-->
<!--                    <td>-->
<!--                    	<input type="text" name="emailtxt" id="textbox" />-->
<!--                    </td>-->
<!--               </tr>-->
<!---->
<!--               <tr>-->
<!--               		<td>Note</td>-->
<!--                    <td>-->
<!--                    	<textarea name="notetxt" cols="23" rows="3"></textarea>-->
<!--                    </td>-->
<!--               </tr>-->
<!---->
<!--          	</table>-->
<!---->
<!--  </div>-->
<!--    </form>-->
<!---->
<!--</div><!-- end of style_informatios -->
<?php
}
?>
</body>
</html>