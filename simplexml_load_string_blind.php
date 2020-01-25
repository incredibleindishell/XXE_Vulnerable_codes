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
/**
 * @link http://stackoverflow.com/a/29864193/367456
 */
if(isset($_POST['upload']))
{

$buffer = file_get_contents($_FILES['file']['tmp_name']);
libxml_disable_entity_loader(false);
$xml = simplexml_load_string($buffer, 'SimpleXMLElement', LIBXML_NOENT);




}
