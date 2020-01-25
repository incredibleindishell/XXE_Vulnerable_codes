

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


<?php

if(isset($_POST['upload']))
{

$xmlfile    = $_FILES['file']['tmp_name'];
libxml_disable_entity_loader (false);

$books      = simplexml_load_file($xmlfile, 'SimpleXMLElement', LIBXML_NOENT) or die("Error: Cannot create XML object");
$booksList  = '<h2 align="center">Books List from XML Document</h2>';
$booksList .= '<table border="1" align="center" cellpadding="5">
               <tr>
                  <th>#</th>
                  <th>Title</th>
                  <th>Author</th>
                  <th>Category</th>
                  <th>Price</th>
                  <th>Publish Date</th>
                  <th>Description</th>
               </tr>';

    $serial = 1;

    foreach ($books as $bookinfo):

        $title  =  $bookinfo->title;
        $author =  $bookinfo->author;
        $genre  =  $bookinfo->genre;
        $price  =  $bookinfo->price;
		$pdate  =  $bookinfo->publish_date;
        $desc   =  $bookinfo->description;
    
        $booksList .= "<tr>
                        <td>".$serial."</td>
                        <td>".$title."</td>
                        <td>".$author."</td>
                        <td>".$genre."</td>
                        <td>".$price."</td>
                        <td>".$pdate."</td>
                        <td>".$desc."</td>
                    </tr>";

        $serial++;

    endforeach;

    $booksList .= '</table>';

    echo $booksList;

	}
?>
