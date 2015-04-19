<?php
$id="";
$opr="";
if(isset($_GET['opr']))
	$opr=$_GET['opr'];

if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];

if(isset($_POST['btn_sub'])){
	$lid=$_POST['sudenttxt'];
	$title=$_POST['locationtxt'];
	$content=$_POST['descriptxt'];
	$status=$_POST['genderrdo'];
	$note=$_POST['notetxt'];
	
	$sql_add=mysql_query("INSERT INTO article_tbl 
							VALUES(
								NULL,
								$lid,
								'$title',
								'$content',
								'$status' ,
								'$note'
							)
						");
	if($sql_add==true)
		$msg="1 Record inserted...";
	else
		$smg="Insert Fail...".mysql_error();
}

//------------------uodate data----------
if(isset($_POST['btn_upd'])){
	$loca_id=$_POST['sudenttxt'];
	$title=$_POST['locationtxt'];
	$content=$_POST['descriptxt'];
	$status=$_POST['genderrdo'];
	$note=$_POST['notetxt'];
	
	$sql_update=mysql_query("UPDATE  article_tbl SET	
							loca_id='$loca_id' ,
							title='$title' ,
							content='$content' ,
							status='$status' ,
							note='$note'
							
					");
					
if($sql_update==true)
	header("location:?tag=view_artical");
else
	$msg="Update Fail!...";
	
	
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
	$sql_upd=mysql_query("SELECT * FROM article_tbl WHERE a_id=$id");
	$rs_upd=mysql_fetch_array($sql_upd);
?>

    <div id="top_style">
            <div id="top_style_text">
                Artical Update
            </div>
            <!-- end of top_style_text-->
           <div id="top_style_button"> 
                <form method="post">
                    <a href="?tag=view_artical"><input type="button" name="btn_view" value="Back" id="button_view" style="width:70px;"  /></a>
                 
                </form>
           </div><!-- end of top_style_button-->
    </div><!-- end of top_style-->
    
    <div id="style_informations">
        <form method="post">
            <div>
            <table border="0" cellpadding="4" cellspacing="0">
                <tr>
                    <td>Choose Location</td>
                    <td>	
                        <select name="sudenttxt" id="textbox">
                                <?php
                                   $location=mysql_query("SELECT * FROM location_tb");
                                       while($row=mysql_fetch_array($location)){
										    if($row['loca_id']==$rs_upd['loca_id'])
								   		$iselect="selected";
									else
										$iselect="";
								?>
                                 	<option value="<?php echo $row['loca_id']?>" <?php echo $iselect?> ><?php echo $row['l_name'];?></option>
                                <?php
								}
                                ?>
                    
                    </select>
                    </td>
                </tr>
                
                <tr>
                    <td>Title </td>
                    <td>
                        <input type="text" name="locationtxt" id="textbox" value="<?php echo $rs_upd['title'];?>"/>
                    </td>
                </tr>
                 <tr>
                    <td>Content</td>
                    <td>
                        <textarea name="descriptxt" cols="82" rows="7"><?php echo $rs_upd['content'];?></textarea>
                    </td>
                </tr>
                
                <tr>
                        <td>Status</td>
                        <td>
                            <input type="radio" name="genderrdo" value="Public"  <?php if($rs_upd['status']=="Public") echo "checked";?>/>Public
                           <input type="radio" name="genderrdo" value="Private" <?php if($rs_upd['status']=="Private") echo "checked";?>  />Private
                        </td>
                    </tr>
                    
                 <tr>
                    <td>Note</td>
                    <td>
                        <textarea name="notetxt" cols="23" rows="3"><?php echo $rs_upd['note'];?></textarea>
                    </td>
                </tr>
                
                
                <tr>
                    <td colspan="2">
                        <input type="submit" name="btn_upd" value="Update" id="button-in" style="float:left" />
                        <input type="reset" value="Cancel" id="button-in"/ style="float:left">
                        
                    </td>
                </tr>
                </table>
    
       </div>
    
        </form>
    
    </div><!-- end of style_informatios -->
<?php	
}
else
{
?>
    <div id="top_style">
            <div id="top_style_text">
                Artical Entry
            </div>
            <!-- end of top_style_text-->
           <div id="top_style_button"> 
                <form method="post">
                    <a href="?tag=view_artical"><input type="button" name="btn_view" value="View_Faculties" id="button_view" style="width:120px;"  /></a>
                 
                </form>
           </div><!-- end of top_style_button-->
    </div><!-- end of top_style-->
    
    <div id="style_informations">
        <form method="post">
            <div>
            <table border="0" cellpadding="4" cellspacing="0">
                <tr>
                    <td>Choose Location</td>
                    <td>	
                        <select name="sudenttxt" id="textbox">
                            <option>---- Students's Name -----</option>
                                <?php
                                   $location=mysql_query("SELECT * FROM location_tb");
                                       while($row=mysql_fetch_array($location)){
								?>
                                 	<option value="<?php echo $row['loca_id']?>"><?php echo $row['l_name'];?></option>
                                <?php
								}
                                ?>
                    
                    </select>
                    </td>
                </tr>
                
                <tr>
                    <td>Title </td>
                    <td>
                        <input type="text" name="locationtxt" id="textbox" />
                    </td>
                </tr>
                 <tr>
                    <td>Content</td>
                    <td>
                        <textarea name="descriptxt" cols="82" rows="7"></textarea>
                    </td>
                </tr>
                
                <tr>
                        <td>Status</td>
                        <td>
                            <input type="radio" name="genderrdo" value="Public" checked="checked"/>Public
                            <input type="radio" name="genderrdo" value="Private" />Private
                        </td>
                    </tr>
                    
                 <tr>
                    <td>Note</td>
                    <td>
                        <textarea name="notetxt" cols="23" rows="3"></textarea>
                    </td>
                </tr>
                
                
                <tr>
                    <td colspan="2">
                        <input type="submit" name="btn_sub" value="Add Now" id="button-in" style="float:left" />
                        <input type="reset" value="Cancel" id="button-in"/ style="float:left">
                        
                    </td>
                </tr>
                </table>
    
       </div>
    
        </form>
    
    </div><!-- end of style_informatios -->
     
<?php

}

?>
</body>
</html>