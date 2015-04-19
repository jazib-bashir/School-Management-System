<?php
$id="";
$opr="";
if(isset($_GET['opr']))
	$opr=$_GET['opr'];

if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];
	
	
if(isset($_POST['btn_sub'])){
	$loca_name=$_POST['locationtxt'];
	$description=$_POST['descriptxt'];
	$note	=$_POST['notetxt'];
	

$sql_ins=mysql_query("INSERT INTO location_tb 
						VALUES(
							NULL,
							'$loca_name',
							'$description' ,
							'$note'
							)
					");

if($sql_ins==true)
	$msg="1 Row Inserted";
else
	$msg="Insert Error:".mysql_error();
	
}

//------------------uodate data----------
if(isset($_POST['btn_upd'])){
	$loca_name=$_POST['locationtxt'];
	$description=$_POST['descriptxt'];
	$note=$_POST['notetxt'];
	
	$sql_update=mysql_query("UPDATE location_tb SET	
							l_name='$loca_name' ,
							description='$description' ,
							note='$note'
						WHERE loca_id=$id

					");
					
if($sql_update==true)
	header("location:?tag=view_location");
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
	$sql_upd=mysql_query("SELECT * FROM location_tb WHERE loca_id=$id");
	$rs_upd=mysql_fetch_array($sql_upd);
	
?>
    <div id="top_style">
            <div id="top_style_text">
                Loction Update
            </div>
            <!-- end of top_style_text-->
           <div id="top_style_button"> 
                <form method="post">
                    <a href="?tag=view_location"><input type="button" name="btn_view" value="Back" id="button_view" style="width:70px;"  /></a>
                 
                </form>
           </div><!-- end of top_style_button-->
    </div><!-- end of top_style-->
    
    <div id="style_informations">
        <form method="post">
            <div>
            <table border="0" cellpadding="4" cellspacing="0">
                
                
                <tr>
                    <td>Location Name</td>
                    <td>
                        <input type="text" name="locationtxt" id="textbox" value="<?php echo $rs_upd['l_name'];?>" />
                    </td>
                </tr>
                 <tr>
                    <td>Description:</td>
                    <td>
                        <textarea name="descriptxt" cols="23" rows="4"><?php echo $rs_upd['description'];?></textarea>
                    </td>
                </tr>
                
                 <tr>
                    <td>Note</td>
                    <td>
                        <textarea name="notetxt" cols="23" rows="4"><?php echo $rs_upd['note'];?></textarea>
                    </td>
                </tr>
                
                
                <tr>
                    <td colspan="2">
                        <input type="reset" value="Cancel" id="button-in"/>
                        <input type="submit" name="btn_upd" value="Update" id="button-in"  />
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
                Loction Entry
            </div>
            <!-- end of top_style_text-->
           <div id="top_style_button"> 
                <form method="post">
                    <a href="?tag=view_location"><input type="button" name="btn_view" value="View_location" id="button_view" style="width:120px;"  /></a>
                 
                </form>
           </div><!-- end of top_style_button-->
    </div><!-- end of top_style-->
    
    <div id="style_informations">
        <form method="post">
            <div>
            <table border="0" cellpadding="4" cellspacing="0">
                
                
                <tr>
                    <td>Location Name</td>
                    <td>
                        <input type="text" name="locationtxt" id="textbox" />
                    </td>
                </tr>
                 <tr>
                    <td>Description:</td>
                    <td>
                        <textarea name="descriptxt" cols="23" rows="4"></textarea>
                    </td>
                </tr>
                
                 <tr>
                    <td>Note</td>
                    <td>
                        <textarea name="notetxt" cols="23" rows="4"></textarea>
                    </td>
                </tr>
                
                
                <tr>
                    <td colspan="2">
                        <input type="reset" value="Cancel" id="button-in"/>
                        <input type="submit" name="btn_sub" value="Add Now" id="button-in"  />
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