<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>PHP - CRUD - CURSO CELKE</title>
    </head>
    <body>
        <h1>Listar Mensagem de Contato</h1>
        <a href="create.php">Cadastrar</a><br><br>
        <?php
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        require './Conn.php';
        require './Contact.php';
        
        $listMsgContact = new Contact();
        $result_list_contacts = $listMsgContact->list();
        foreach ($result_list_contacts as $row_list_contact){
            extract($row_list_contact);
            echo "ID: " . $id . "<br>";
            echo "Nome: " . $name . "<br>";
            echo "E-mail: " . $email . "<br>";
            echo "Título: " . $msg_title . "<br>";
            echo "Conteúdo: " . $msg_content . "<br>";
            echo "<a href='view.php?id=$id'>Visualizar</a> ";
            echo "<a href='edit.php?id=$id'>Editar</a> ";
            echo "<a href='delete.php?id=$id'>Apagar</a>";
            echo "<hr>";
                       
        }
        
        ?>
    </body>
</html>
