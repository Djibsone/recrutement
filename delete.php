<?php
require_once('./connexion.php');

if(isset($_GET['id'])){

    if (empty($_GET['id']))
    
        $_SESSION['error'] = 'Select user to delete first';
        
    else

        $id = htmlspecialchars($_GET['id']);
        $stmt = delCandidat($id);
        ($stmt) ? $_SESSION['success'] = 'Deleted successfully' :  $_SESSION['error'] = 'Error the deleted';
    
    header('location: ./');
}