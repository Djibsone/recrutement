<?php 
	require_once('./connexion.php');
	$id = $_GET['id'];
	$stmt = getCandidatInfo($id);
	$candidat = $stmt->fetch();
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

<div class="container" style="margin-top: 20px;">

    <div class="panel panel-success">
        <div class="panel-heading" align="center">Modifier candidat</div>
        <div class="panel-body">
            <form method="post" action="update.php" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $candidat['id'] ?>">
                <div class="row my-row">
                    <label for="nom" class="control-label col-sm-2">NOM</label>
                    <div class="col-sm-4">
                        <input required type="text" name="nom" value="<?= $candidat['nom'] ?>" id="nom" class="form-control">
                    </div>

                    <label class="control-label col-sm-2">PRENOM</label>
                    <div class="col-sm-4">
                        <input required type="text" name="prenom" value="<?= $candidat['prenom'] ?>" id="prenom" class="form-control">
                    </div>

                </div>

                <div class="row my-row">
                    <label for="email" class="control-label col-sm-2">EMAIL</label>
                    <div class="col-sm-4">
                        <input required type="email" name="email" value="<?= $candidat['email'] ?>" id="email" class="form-control">
                    </div>

                    <label for="telephone" class="control-label col-sm-2">TELEPHONE</label>
                    <div class="col-sm-4">
                        <input required type="text" name="telephone" value="<?= $candidat['telephone'] ?>" id="telephone" class="form-control">
                    </div>

                </div>

                <div class="row my-row">
                    <label for="niveau" class="control-label col-sm-2">NIVEAU D'ETUDE</label>
                    <div class="col-sm-4">
                        <input required type="text" name="niveau" value="<?= $candidat['niveau_etude'] ?>" id="niveau" class="form-control">
                    </div>

                    <label for="fichier" class="control-label col-sm-2">FICHIER</label>
                    <div class="col-sm-4">
                        <input type="file" name="fichier" id="fichier" class="form-control" accept=".PDF, .pdf, .doc, .docx">
                    </div>

                </div>
                
                <button type='submit' name="update" class="btn btn-success btn-block">Modifier le candidat <span class="fa fa-save"></span></button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
