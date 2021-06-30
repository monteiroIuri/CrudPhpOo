<?php
session_start();

//Quando gerar erro e não redirecionar, acrescentar a função limpar buffer
ob_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>READ</title>
    </head>
    <body>
        <h1>Visualizar Mensagem de Contato</h1>
        <a href="index.php">Listar</a><br><br>
        
        <?php
        //receber o id da url
        $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
        
        //verificar se o id possui valor
        
        if(!empty($id)){
        
        // incluir os arquivos
        require './Conn.php';
        require './Contact.php';
        
        //instanciar a classe e criar objeto
        $viewMsgContact= new Contact();
        
        //enviar o id para o atributo da classe Contact
        $viewMsgContact->id = $id;
        
        //instanciar o método visualizar
        $result_view_contact= $viewMsgContact->view();
        
        //imprimir o registro do BD
        extract($result_view_contact);
        echo "ID: " . $id . "<br>";
        echo "Nome: " . $name . "<br>";
        echo "E-mail: " . $email . "<br>";
        echo "Título: " . $msg_title . "<br>";
        echo "Conteúdo: " . $msg_content . "<br>";
        
        }else{
            $_SESSION['msg'] = "<p style='color: red;'>Erro, mensagem de contato não encontrada!</p>";
            header("Location: index.php");
        }
        ?>
    </body>
</html>
