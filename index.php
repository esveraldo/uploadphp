<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Upload de arquivo</title>
	<style>
		label, input {
			display: block;
			margin-bottom: 10px;
		}
	</style>
</head>
<body>
	<form action="" method="post" enctype="multipart/form-data">
		<label for="arquivo"></label>
		<input type="file" name="arquivo" id="arquivo">
		<button type="submit">Enviar</button>
	</form>
	<?php 
		require_once 'Files.php';
		$file = new Files();
		if(isset($_FILES['arquivo'])){
			$file->setFile($_FILES['arquivo']);
			if($file->moveFile()){
				echo $file->moveFile();
			}else{
				echo 'Arquivo enviado com sucesso';
			}
		}
	 ?>
</body>
</html>