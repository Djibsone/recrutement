<?php
	require_once('./connexion.php');
    global $i;
    $candidats = getAllCandidats();

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title> Liste des candidats </title> 
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="css/monStyle.css">
		
	</head>
		
	<body>
		<br><br><br>
		<div class="container">
			<?php include './msg_error_success.php' ?>
		</div>
		
		<div align="center" style="margin-top: 400px;" id="_btn">
            <a href="create.php" class="btn btn-primary">
                <span class="fa fa-plus"></span> NOUVEAU CANDIDAT 
            </a>
            <a href="" class="btn btn-primary liste">
                <span class="fa fa-eye"></span> LISTE DES CANDIDATS 
            </a>
		</div>
		
        <div class="container" id="listCand" style="display: none;">
        <h1 class="text-center"> Liste des candidats </h1>
				
            <table class="table table-striped">
				<thead>
					<tr>
						<th>N°</th><th>Nom</th><th>Prénom</th><th>Email</th> <th>Téléphone</th> 
						<th>Niveau d'étude</th> <th>Fichier</th> <th>Téléchargements</th>
							<th> Actions </th>

						
					</tr>
				</thead>
				
				<tbody>
			
					<?php foreach($candidats as $candidat){?>
						<tr>
							<td><?php echo $i += 1 ?> </td>
							<td><?= $candidat['nom'] ?> </td>
							<td><?= $candidat['prenom'] ?> </td>
							<td><?= $candidat['email'] ?> </td>
							<td><?= $candidat['telephone'] ?> </td>
							<td><?= $candidat['niveau_etude'] ?> </td>
							<td><a style="text-decoration: none;" href="<?= $candidat['fichier'] ?>"><i class="fa fa-eye"></i> CV</a> </td>
							<td><a style="text-decoration: none;" href="<?= $candidat['fichier'] ?>" class="btn btn-" download><i class="fa fa-download"></i></a> </td>
                            <td>
                                <a href="edit.php?id=<?= $candidat['id'] ?>"
                                class="btn btn-success btn-edit-delete"> 
                                    <span class="fa fa-edit"></span>
                                </a>
                                &nbsp&nbsp
                                <a onclick='return confirm("Etes-vous sûr de vouloir supprimer ?")'
                                        href="delete.php?id=<?= $candidat['id'] ?>"
                                        class="btn btn-danger btn-edit-delete">
                                    <span class="fa fa-trash"></span>
                                </a>
                            
                            </td>
							
						</tr>
					<?php } ?>
				</tbody>
			</table>

        </div>

		<script src="./js/jquery.js"></script>
		<script src="./js/script.js"></script>
	</body>
</html>