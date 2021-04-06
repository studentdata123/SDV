<?php
// Function for retrieve all data with where condition & limit value - Written By Abk on 19-06-2018
function retrieveAllData($mysqli,$tbl_name, $return_fields, $where_conditon, $order, $limit_value, $result_type)
{
	 $sql_data = "SELECT $return_fields FROM $tbl_name ";
	if($where_conditon != "")
	{
	 $sql_data = $sql_data." WHERE ".$where_conditon;
	}
	if($order != "")
	{
	 $sql_data = $sql_data." $order";
	}
	if($limit_value != "")
	{
	$sql_data = $sql_data." LIMIT ".$limit_value;
	}
	if($result_type == "result")
	{
	 $query_data = mysqli_fetch_assoc(mysqli_query($mysqli,$sql_data));
	}
	else
	{
	$query_data = mysqli_query($mysqli,$sql_data);
	}
	return $query_data;
}

// Function for Insert Data - Written By Abk on 19-06-2018
function dbRowInsert($mysqli,$table_name, $form_data)
{
	$fields = array_keys($form_data);
	 $sql = "INSERT INTO ".$table_name."
	(`".implode('`,`', $fields)."`)
	VALUES('".implode("','", $form_data)."')";
	return mysqli_query($mysqli,$sql);
}

// Function for Delete Image - Written By Abk on 19-06-2018
function deleteImage($tbl_name, $return_fields, $where_conditon)
{
	$sql_update = "UPDATE $tbl_name SET $return_fields ='' WHERE $where_conditon" ;
	return mysql_query($sql_update);
}

// Function for Active Row - Written By Abk on 19-06-2018
function active($mysqli,$tbl_name, $return_fields, $where_conditon)
{
	$sql_active = "UPDATE $tbl_name SET $return_fields = '1' WHERE $where_conditon";
	return mysqli_query($mysqli,$sql_active);
}


// Function for Inactive Row - Written By Abk on 19-06-2018
function inactive($mysqli,$tbl_name, $return_fields, $where_conditon)
{
	$sql_inactive = "UPDATE $tbl_name SET $return_fields = '0' WHERE $where_conditon";
	return mysqli_query($mysqli,$sql_inactive);
}

// Function for Delete Row - Written By Abk on 19-06-2018
function deleteRow($mysqli,$tbl_name, $where_conditon)
{
	$sql_delete = "DELETE FROM $tbl_name WHERE $where_conditon";
	return mysqli_query($mysqli,$sql_delete);
}

// Function for Update Data - Written By Abk on 19-06-2018
function updateData($mysqli,$table_name, $form_data, $where_clause='')
{
	$whereSQL = '';
	if(!empty($where_clause))
	{
	if(substr(strtoupper(trim($where_clause)), 0, 5) != 'WHERE')
	{
	$whereSQL = " WHERE ".$where_clause;
	} else
	{
	$whereSQL = " ".trim($where_clause);
	}
	}
	 $sql = "UPDATE ".$table_name." SET ";
	$sets = array();
	foreach($form_data as $column => $value)
	{
	$sets[] = "`".$column."` = '".$value."'";
	}
	$sql .= implode(', ', $sets);
	 $sql .= $whereSQL; 
	 
	 //echo $sql;exit;
	return mysqli_query($mysqli,$sql);
}

// Function for Delete Selected Row - Written By Abk on 19-06-2018
function deleteSelected($table_name, $list)
{
	for($i=0;$i<count($list);$i++)
	{
		$del_id = $list[$i];
		$del_list = "DELETE FROM $table_name WHERE id = '$del_id'";
		mysql_query($del_list);
	}
}

// Function for Insert Image - Written By Abk on 19-06-2018
function InsertImage($photo_name, $save_path, $file_name)
{
	$img_extension = explode(".",$photo_name);
	//Validating file extension
	if(($img_extension[1] != 'gif') && ($img_extension[1]  != 'jpg') && ($img_extension[1]  != 'png'))
	{
		header("location:".$file_name."?err_msg=1");
		exit();
	}
	else
	{	
		copy($_FILES[image][tmp_name],$save_path.$photo_name);
		$newname = $save_path.$photo_name;
	}
}
function rand_string()
{
    $string = '';
	$chars = '0123456789' ;
	$len = 6;
    for ($i = 0; $i < $len; $i++)
    {
        $pos = rand(0, strlen($chars)-1);
        $string .= $chars{$pos};
    }
    return $string;
}
$serial_number = rand_string();

function format_telephone($phone_number)
{
    $cleaned = preg_replace('/[^[:digit:]]/', '', $phone_number);
    preg_match('/(\d{3})(\d{3})(\d{4})/', $cleaned, $matches);
    return "{$matches[1]} {$matches[2]} {$matches[3]}";
}


/*function settings($set_id) {
$sql_setting = "SELECT `values` FROM `ak_setting` WHERE id = '$set_id'";
$query_setting = mysql_query($sql_setting) or die(mysql_error());
$res_setting = mysql_fetch_assoc($query_setting);
return $res_setting['values'];
}

$site_name = settings(1);
$email = settings(2);
$contact_no = settings(3);
$copyright = "Copyright &copy; " .date("Y"). " <span>" .settings(9). "</span> | All Rights Reserved.";
$facebook_id = settings(4);
$twet = settings(5);
$linkedin = settings(7);
$googleplus = settings(6);
$address = settings(8);
$telephone = settings(10);
$fax = settings(11);*/
?>