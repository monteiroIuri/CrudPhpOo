<?php
session_start();

//Quando gerar erro e não redirecionar, acrescentar a função limpar buffer
ob_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>UPDATE</title>
    </head>
    <body>
        <h1>Editar Mensagem de Contato</h1>
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
        //receber os dados do formulario
        $formData = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        //Verificar se o usuario clicou no botão e a posição SendEditMsg possui valor
        if(!empty($formData['SendEditMsg'])){
            $editMsgContact= new Contact();
            $editMsgContact->formData = $formData;
            $value = $editMsgContact->edit();
            if($value){
                $_SESSION['msg'] = "<p style='color: green;'>Mensagem de contato editada com sucesso!</p>";
                header("Location: index.php");
            }else{
                $_SESSION['msg'] = "<p style='color: red;'>Erro, mensagem de contato não editada com sucesso!</p>";
                header("Location: index.php");
            }
        }
        //enviar o id para o atributo da classe Contact
        $viewMsgContact->id = $id;
        //instanciar o método visualizar
        $result_view_contact= $viewMsgContact->view();
        //imprimir o registro do BD
        extract($result_view_contact);
        ?>
        
        <!-- INICIO DO FORMULARIO PARA EDITAR A MSG DE CONTATO -->
        <form name="EditUser" action="" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <label>Nome: </label>
            <input type="text" name="name" value="<?php echo $name; ?>" placeholder="Nome completo" required><br><br>
            <label>Email: </label>
            <input type="email" name="email" value="<?php echo $email; ?>" placeholder="Seu melhor email" required><br><br>
            <label>Titulo da Mensagem: </label>
            <input type="text" name="msg_title" value="<?php echo $msg_title; ?>" placeholder="Titulo da Mensagem" required><br><br>
            <label>Conteúdo da Mensagem: </label>
            <textarea name="msg_content" placeholder="Conteúdo da Mensagem" rows="4" cols="50"
            required><?php echo $msg_content; ?></textarea><br><br>
            <input type="submit" value="Salvar" name="SendEditMsg">
        </form>
        <!-- FIM DO FORMULARIO -->
        
        <?php
        }else{
            $_SESSION['msg'] = "<p style='color: red;'>Mensagem de contato não encontrada</p>";
            header("Location: index.php");
        }
        ?>
    </body>
</html>
