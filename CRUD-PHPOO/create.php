<?php
session_start();

//Quando gerar erro e não redirecionar, acrescentar a função limpar buffer
ob_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>CREATE</title>
    </head>
    <body>
        <h1>Cadastrar Mensagem de Contato</h1>
        <a href="index.php">Listar</a><br><br>
        <?php
        require './Conn.php';
        require './Contact.php';
        
        //receber os dados do formulario
        $formData = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        
        if(!empty($formData['SendCreatMsg'])){
            $creatMsgContacts = new Contact();
            $creatMsgContacts->formData = $formData;
            $value = $creatMsgContacts->create();
        
            if($value){
                $_SESSION['msg'] = "<p style='color: green;'>Mensagem cadastrada com sucesso!</p>";
                header("Location: index.php");
            }else{
                $_SESSION['msg'] = "<p style='color: red;'>Erro, mensagem não cadastrada com sucesso!</p>";
                header("Location: index.php");
            }
            
        }
        ?>
        
        <form name="CreatUser" action="" method="POST">
            <label>Nome: </label>
            <input type="text" name="name" placeholder="Nome completo" required><br><br>
            <label>Email: </label>
            <input type="email" name="email" placeholder="Seu melhor email" required><br><br>
            <label>Titulo da Mensagem: </label>
            <input type="text" name="msg_title" placeholder="Titulo da Mensagem" required><br><br>
            <label>Conteúdo da Mensagem: </label>
            <textarea name="msg_content" placeholder="Conteúdo da Mensagem" rows="4" cols="50"
            required></textarea><br><br>
            <input type="submit" value="Cadastrar" name="SendCreatMsg">
        </form>
        
    </body>
</html>
