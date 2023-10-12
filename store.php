<?php
require_once('./connexion.php');
$table = '';

if(isset($_POST['add'])){

        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $email = htmlspecialchars($_POST['email']);
        $telephone = htmlspecialchars($_POST['telephone']);
        $niveau = htmlspecialchars($_POST['niveau']);

        $fichier = $_FILES['fichier']['name'];
        $tmp = $_FILES['fichier']['tmp_name'];
        $upload ='./CVs/'.$fichier;
        move_uploaded_file($tmp, "$upload");

        $verify = getCandidat($email);
        $row = $verify->rowCount();
    
        if ($row) 

                $_SESSION['error'] = 'Incorrect';

        else
        
            $stmt = addCandidat($nom, $prenom, $email, $telephone, $niveau, $upload);
            
            ($stmt) ? $_SESSION['success'] = 'Added successfully' : $_SESSION['error'] = 'Error the added';

        header('location: ./');     
}