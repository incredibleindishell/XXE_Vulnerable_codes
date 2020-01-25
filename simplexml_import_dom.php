<form enctype="multipart/form-data"  method="post">
<input type="hidden" name="MAX_FILE_SIZE" value="2000000" />


<table align="center" width="300" border="0" bgcolor="#F3F3F3">
<tr>
    <td>Upload xml file below:</td>
    </tr>
    <tr>
        <td> <input type="file" name="file" /></td>
        </tr>
        <tr>
            <td><input type="submit" name="upload" value="upload" /></td>
            </tr>
</table>
</form>


<hr>

<?php 
if(isset($_POST['upload']))
{
	$xmlfile    = file_get_contents($_FILES['file']['tmp_name']);
	
	libxml_disable_entity_loader (false);
  
	$dom = new DOMDocument();
    $dom->loadXML($xmlfile, LIBXML_NOENT | LIBXML_DTDLOAD);
    $creds = simplexml_import_dom($dom);
    $user = $creds->user;
    $pass = $creds->pass;
    echo "You have logged in as user $user";

}



?>
