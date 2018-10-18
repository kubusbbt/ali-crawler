<?php 

if( $_POST && !empty($_POST['url']) ){

	$content = file_get_contents($_POST['url']);
	preg_match_all('/qrdata="[0-9].*?[|]([0-9]{11})/', $content, $images);
	$result = $images[1];

}



?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Ali crawler</title>
  </head>
  <body>

	<div class="container mt-5">
		<div class="row justify-content-center">
			<div class="col-5">

				

				<?php if (@$result): ?>
					<textarea class="form-control mb-3" cols="30" rows="10"><?php echo implode(',', $result); ?></textarea>
				<?php endif ?>


				<form method="post" action="">
				  
				  <div class="form-group">
				    <label for="exampleInputEmail1">Link</label>
				    <input type="text" name="url" class="form-control">
				  </div>
				  <button type="submit" class="btn btn-primary">Szukaj</button>
			
				</form>

			</div>
		</div>
	</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>