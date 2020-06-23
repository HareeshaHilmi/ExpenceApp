
<?php
	require_once("../ExpenceApp/php/component.php");
	require_once("../ExpenceApp/php/operation.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<title>Expence Calc</title>

	
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<link rel="stylesheet" href="style.css">

</head>
<body >
	<main>
		<div class="container text-center">
			<h1 class="py-4 bg-dark text-light rounded"><i class="fas fa-swatchbook"></i> Expence Calc</h1>
			<div class="d-flex  justify-content-center">
				<form action="" method="post" class="w-50" enctype="multipart/form-data">
					
					<!-------------- Items ------->
					<div class="pt-2">
					  <?php inputElement("<i class=\"fas fa-list-ol\"></i>","ID","id",""); ?>
					</div>	

					<div class="pt-2">
					 <?php inputElement("<i class=\" fas fa-book\"></i>","Category","expense","" ); ?>
					</div>

					<div class="pt-2">
					 <?php inputElement("<i class=\" fas fa-book\"></i>","Amount","amount","" ); ?>

					 <input type ="file" name="img" id="img">
					</div>	

					<!---------Buttons---------------->
					<div class="d-flex">
						<?php buttonElement("btn-create","btn btn-success", "<i class=\" fas fa-plus\"></i>", "create","dat-toggle='tooltip' data-placement='bottom' title='Create" ); ?>

						<?php buttonElement("btn-read","btn btn-primary", "<i class=\" fas fa-sync\"></i>", "read","dat-toggle='tooltip' data-placement='bottom' title='Read" ); ?>

						<?php buttonElement("btn-update","btn btn-light border", "<i class=\" fas fa-pen-alt\"></i>", "update","dat-toggle='tooltip' data-placement='bottom' title='Update" ); ?>

						<?php buttonElement("btn-delete","btn btn-danger", "<i class=\" fas fa-trash-alt\"></i>", "delete","dat-toggle='tooltip' data-placement='bottom' title='Delete" ); ?>
						<?php deleteBtn(); ?>
					</div>
				</form>
			</div>

			<!---------Table ---------------->

			<div class="d-flex table-data">
				<table class="table table-striped table-dark">
					<thead class="thead-dark">
						<tr>
							<th>ID</th>
							<th>Expence </th>
							<th>Amount</th>
							<th>Edit</th>
						</tr>
					</thead>

					<tbody id="tbody">
						<?php
							if (isset($_POST['read'])) {
								$result = getData();

								if($result){
									while ($row = mysqli_fetch_assoc($result)) {?>
										<tr>
											<td data-id="<?php echo $row['id']; ?>"><?php echo $row['id']; ?></td>
											<td data-id="<?php echo $row['id']; ?>"><?php echo $row['expense']; ?></td>
											<td data-id="<?php echo $row['id']; ?>"><?php echo 'Rs.  '. $row['amount']; ?></td>
											 <td><i class="fas fa-edit btnedit" data-id="<?php echo $row['id'];?>"></i></td>
										</tr>
										<?php				
									}
								}
							}
						?>
					</tbody>

				</table>
			</div>

		</div>
	</main>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

	


<script src="../ExpenceApp/php/main.js"></script>
</body>
</html>