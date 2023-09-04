<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$books = array("jwt.pdf","php.pdf","laravel.pdf","js.pdf");
if(isset($_POST['file'])){
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($_POST['file']).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($_POST['file']));
    readfile($_POST['file']);
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Local File Download</title>
</head>
<body>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Book</th>
      <th scope="col">Size</th>
      <th scope="col">Date</th>
      <th scope="col">Link</th>
    </tr>
  </thead>
  <tbody>
    <?php
      for($i = 0;$i<count($books)-1;$i++){
        $file = "pdf/" . $books[$i];
          ?>

      <tr>
        <form action="" method="post">
        <th scope="row"><?php echo $i ?></th>
        <td><?php echo $books[$i] ?></td>
        <td><?php echo filesize($file); ?></td>
        <td><?php echo date("Y-m-d") ?></td>
        <td><input type="submit" value="Download"></td>
        <input name="file" type="hidden" value="<?php echo $file ?>">
      </form>
      </tr>
<?php
      }

    ?>

  </tbody>
</table>


</body>
</html>
