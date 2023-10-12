<?php
require_once('./connexion.php');

if(isset($_POST['update'])){

        $id = htmlspecialchars($_POST['id']);
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $email = htmlspecialchars($_POST['email']);
        $telephone = htmlspecialchars($_POST['telephone']);
        $niveau = htmlspecialchars($_POST['niveau']);

        $fichier = $_FILES['fichier']['name'];
        $tmp = $_FILES['fichier']['tmp_name'];
        $upload ='./CVs/'.$fichier;
        move_uploaded_file($tmp, "$upload");

        $verify = getCandidatInfo($id);
        $row = $verify->rowCount();
    
        if ($row == 0) 

                $_SESSION['error'] = 'Incorrect';

        else
        
            $stmt = updateCandidat($nom, $prenom, $email, $telephone, $niveau, $upload, $id);
            
            ($stmt) ? $_SESSION['success'] = 'Updated successfully' : $_SESSION['error'] = 'Error the updated';

        header('location: ./');     
}