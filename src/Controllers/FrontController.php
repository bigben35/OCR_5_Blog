<?php

namespace Blog\Controllers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// use PHPMailer\PHPMailer\SMTP;

require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/Exception.php';
// require 'vendor/phpmailer/phpmailer/src/SMTP.php';

class FrontController 
{
    // display page home 
    function home()
    {
        require "src/Views/Front/home.php";
    }


    // contact form 
    function contactPost($nom, $prenom, $email, $objet, $message)
    {
        $contactManager = new \Blog\Models\ContactModel();
        extract($_POST); //vérifie chaque clé afin de contrôler si elle a un nom de variable valide. Elle vérifie également les collisions avec des variables existantes dans la table des symboles. Utile pour $email et $confirmEmail.
        $validation = true;
        $erreur = [];
        

        if(empty($nom) || empty($prenom) || empty($email) || empty($confirmEmail) || empty($objet) || empty($message)){
            $validation = false;
            $erreur[] = "Tous les champs sont requis !";
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $validation = false;
            $erreur[] = "L'adresse email n'est pas valide !";
        }
        if($email != $confirmEmail){
            $validation = false;
            $erreur[] = "Vos e-mails ne sont pas identiques !";
        }
        if (filter_var($email, FILTER_VALIDATE_EMAIL) && $email === $confirmEmail) {
            $validation;
            
            
            
            // send email to mailbox 
           //Create an instance; passing `true` enables exceptions
// $mail = new PHPMailer(true);

// try{

//     //Server settings
//     $mail->SMTPDebug = 2;//SMTP::DEBUG_SERVER;                      //Enable verbose debug output
//     $mail->isSMTP();                                            //Send using SMTP
//     $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
//     $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
//     $mail->Username   = $_ENV['MAIL_USERNAME']; 
//     $mail->Password   = '';//$_ENV['MAIL_PASSWORD'];                               //SMTP password
//     // var_dump($mail->Username);die;                    //SMTP username
//     $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
//     $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

//     //Recipients
//     $mail->isHTML(true);                                  //Set email format to HTML
//     $mail->setFrom($_POST['email'], $_POST['nom']);
//     $mail->addAddress("josselincrenn@gmail.com");               //Name is optional
//     // $mail->FromName = filter_input(INPUT_POST, 'nom');     //Add a recipient
//     // $mail->smtpConnect(
//     //     array(
//     //         "ssl" => array(
//     //             "verify_peer" => false,
//     //             "verify_peer_name" => false,
//     //             "allow_self_signed" => true
//     //         )
//     //     )
//     // );
//     // $mail->addReplyTo('josselincrenn@gmail.com', 'jojo');
//     // $mail->addCC('cc@example.com');
//     // $mail->addBCC('bcc@example.com');


//     //Content
//     $mail->Subject = "le sujet";
//     $mail->Body    = "le message";
//     $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
   
//     $mail->send();
//     // var_dump($mail);die;
    
        
//         echo 'Message has been sent';
    
//     } catch (Exception){
        
//         echo "Message pas pu être envoyé. Mailer Error: {$mail->ErrorInfo}";
//     }

    


$mail = new PHPMailer(true);

try {
	$mail->SMTPDebug = 2;									
	$mail->isSMTP();											
	$mail->Host	 = 'smtp.gmail.com';					
	$mail->SMTPAuth = true;							
	$mail->Username = 'josselincrenn@gmail.com';				
	$mail->Password = 'Bigben::35600';						
	$mail->SMTPSecure = 'tls';							
	$mail->Port	 = 587;

	$mail->setFrom('josselincrenn@gmail.com', 'josselin');		
	$mail->addAddress('josselincrenn@gmail.com');
	// $mail->addAddress('recipient2@example.com', 'Name');
	
	$mail->isHTML(true);								
	$mail->Subject = 'Test Email';
	$mail->Body = 'HTML message body in <b>bold</b> ';
	$mail->AltBody = 'Body in plain text for non-HTML mail clients';
	$mail->send();
	echo "Mail has been sent successfully!";
} catch (Exception $e) {
	echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

        
        
// $dest = "josselincrenn@gmail.com";
// $sujet = "Email de test";
// $corp = "Salut ceci est un email de test envoyer par un script PHP";
// $headers = "From: VotreGmailId@gmail.com";
// $mail = mail($dest, $sujet, $corp, $headers);
// var_dump($mail);die;
// if($mail){
//     echo "mail envoyé à .$dest";
// } else{
//     echo "mail non envoyé";
// }

    
    
$sendMessage = $contactManager->requestWithContactForm($nom, $prenom, $email, $objet, $message);
    
    $valide = "Votre message a bien été envoyé !";
    
    unset($_POST['nom']);
    unset($_POST['prenom']);
    unset($_POST['email']);                 // vide/détruit ce qui est en mémoire
    require 'src/Views/Front/home.php';
    return $valide;
    
} else{
    require 'src/Views/Front/home.php';
    return $erreur;
}

}


    // display page create an account 
    function pageCreateUser()
    {
        require 'src/Views/Front/createUserPage.php';
    }

    // create an user 
    function createUser($pseudo, $email, $password)
    {
        extract($_POST);
        $userManager = new \Blog\Models\UserManager();
        $validation = true;
        $erreur = [];

        if (empty($pseudo) || empty($email) || empty($emailconf) || empty($password) || empty($passwordconf)) {
            $validation = false;
            $erreur[] = "Tous les champs sont requis !";
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $validation = false;
            $erreur[] = "L'adresse email n'est pas valide !";
         }

        if($emailconf != $email){
            $validation = false;
            $erreur[] = "L'email de confirmation n'est pas correcte !";
        }
    
        if($passwordconf != $password){
            $validation = false;
            $erreur[] = "Le mot de passe de confirmation n'est pas correcte !";
        }

         
        if ($validation && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $createUser = $userManager->createUser($pseudo, $email, $password);

        require 'src/Views/Front/connectPage.php';
        }
        else{
           require 'src/Views/Front/createUserPage.php';
           return $erreur;
        }
    }


    // display page connectUser
    function pageConnectUser()
    {
        require 'src/Views/Front/connectPage.php';
    }


    // login to dashboard after password comparison 
    function connectUser($email, $password)
    // retrieve password 
    {
        $userManager = new \Blog\Models\UserManager();
        $connectUser = $userManager->retrievePassword($email);
        $result = $connectUser->fetch();
        $erreur = "Les identifiants sont erronés !";

        // Les sessions permettent de conserver des variables sur toutes les pages de votre site même lorsque la page PHP a fini d'être générée.  
        if(!empty($result)) {   
            $isPasswordOk = password_verify($password, $result['password']);
            if($isPasswordOk){
                $_SESSION['email'] = $result['email']; // transformation des variables recupérées en session
                $_SESSION['password'] = $result['password'];
                $_SESSION['id'] = $result['id'];
                $_SESSION['pseudo'] = $result['pseudo'];
                $_SESSION['role'] = $result['role'];
                if($result['role'] == 0){
                header("Location: index.php?action=dashboardUser");
                }
                else{
                    header('Location: dashboard');
            }
        } else {
            $erreur;
            require "src/Views/Front/connectPage.php";
        }
        
    }else {
        $erreur = "L' email est inconnu";
        require "src/Views/Front/connectPage.php";
    }
    }

    // display dashboard user page 
    function dashboardUser($id)
    {
        require 'src/Views/Front/dashboardUser.php';
    }

    // display page update pseudo user 
    function pageUpdatePseudo($id)
    {
        require 'src/Views/Front/pageUpdatePseudo.php';
    }

    // update for new pseudo 
    function createNewPseudo($newPseudo, $id)
    {
        extract($_POST); //permet d'utiliser variables déclarées ailleurs
        $validation = true;
        $erreur = []; "Tous les champs sont requis !";
        $validation = "Votre pseudo a bien été modifié !";
        // $oldPseudo = $_SESSION['pseudo'];

        if( empty($newPseudo) || empty($pseudoConfirm)){
            $validation = false;
            $erreur = "Tous les champs sont requis !";
        }

        if ($newPseudo != $pseudoConfirm){
            $validation = false;
            $erreur[] = 'Les pseudos ne sont pas identiques';
        }

        if($newPseudo && $newPseudo === $pseudoConfirm){
            $userManager = new \Blog\Models\UserManager();
            $getNewPseudo = $userManager->newPseudoUser($newPseudo, $id);
            // var_dump($getNewPseudo);die;
            // true/false dans$getNewPseudo
            //refaire un if/else pour que l'user sache si ça s'est bien passé ou pas 
            $_SESSION['pseudo'] = $newPseudo;
            require 'src/Views/Front/dashboardUser.php';
            return $validation;
            // si faux affiche une exception ca ne s'est pas bien passé
        } else{
            require 'src/Views/Front/pageUpdatePseudo.php';
            return $erreur;
        }
    }


    // display page update pseudo user 
    function pageUpdateEmail($id)
    {
        require 'src/Views/Front/pageUpdateEmail.php';
    }


    // update for new email 
    function createNewEmail($newEmail, $id)
    {
        extract($_POST); //permet d'utiliser variables déclarées ailleurs
        $validation = true;
        $erreur = []; "Tous les champs sont requis !";
        $validation = "Votre email a bien été modifié !";
        // $oldPseudo = $_SESSION['pseudo'];

        if( empty($newEmail) || empty($emailConfirm)){
            $validation = false;
            $erreur = "Tous les champs sont requis !";
        }

        if ($newEmail != $emailConfirm){
            $validation = false;
            $erreur[] = 'Les emails ne sont pas identiques';
        }

        if($newEmail && $newEmail === $emailConfirm){
            $userManager = new \Blog\Models\UserManager();
            $getNewEmail = $userManager->newEmailUser($newEmail, $id);
            // var_dump($getNewEmail);die;
            // true/false dans$getNewEmail
            //refaire un if/else pour que l'user sache si ça s'est bien passé ou pas 
            $_SESSION['email'] = $newEmail;
            require 'src/Views/Front/dashboardUser.php';
            return $validation;
            // si faux affiche une exception ca ne s'est pas bien passé
        } else{
            require 'src/Views/Front/pageUpdateEmail.php';
            return $erreur;
        }
    }

    // go to page update password 
    function pageUpdatePassword($id)
    {
        require 'src/Views/Front/pageUpdatePassword.php';
    }

    // update for new paswword 
    function createNewPassword($oldPassword, $newPassword, $id)
    {
        extract($_POST); //permet d'utiliser variables déclarées ailleurs
        $validation = true;
        $erreur = []; "Tous les champs sont requis !";
        $validation = "Votre Mot de passe a bien été modifié !";
        // $oldPseudo = $_SESSION['pseudo'];

        if(empty($oldPassword) || empty($newPassword) || empty($passwordConfirm)){
            $validation = false;
            $erreur = "Tous les champs sont requis !";
        }

        if($newPassword){
            $userManager = new \Blog\Models\UserManager();
            $getPassword = $userManager->updatePasswordUser($id);

            $verifPassword = $getPassword->fetch();
            $isPasswordOk = password_verify($oldPassword, $verifPassword['password']);

            if(!$isPasswordOk){
                $validation = false;
                $erreur[] = "le mot de passe actuel est erroné";
            }

            if ($newPassword != $passwordConfirm){
                $validation = false;
                $erreur[] = 'Les mots de passe ne sont pas identiques';
            }
            
            if($isPasswordOk && $newPassword === $passwordConfirm){
                $updateNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                $getNewPassword = $userManager->newPasswordUser($updateNewPassword, $id);
                // var_dump($getNewPassword);die;
                $_SESSION['password'] = $updateNewPassword;
                require 'src/Views/Front/dashboardUser.php';
                return $validation;
                
            } else{
                require 'src/Views/Front/pageUpdatePassword.php';
                return $erreur;
            }
        }
    }

    // log out user 
    function disconnectUser()
    {
        unset($_SESSION['id']); //détruit la session
        session_destroy();
        header('Location: index.php?action=connexion');

    }
}

