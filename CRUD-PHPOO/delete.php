<!-- DELETE -->

<?php
session_start();

//Quando gerar erro e não redirecionar, acrescentar a função limpar buffer
ob_start();

//receber o id da url
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

//verificar se o id possui valor
if (!empty($id)) {
    // incluir os arquivos
    require './Conn.php';
    require './Contact.php';

    //instanciar a classe e criar objeto
    $deleteMsgContact = new Contact();

    //enviar o id para o atributo da classe Contact
    $deleteMsgContact->id = $id;

    //instanciar o método visualizar
    $value = $deleteMsgContact->delete();

    if ($value) {
        $_SESSION['msg'] = "<p style='color: green;'>Mensagem de contato apagada com sucesso!</p>";
        header("Location: index.php");
        
    } else {
        $_SESSION['msg'] = "<p style='color: red;'>Erro, mensagem de contato não apagada com sucesso!</p>";
        header("Location: index.php");
        
    }
} else {
    $_SESSION['msg'] = "<p style='color: red;'>Erro, mensagem de contato não encontrada!</p>";
        header("Location: index.php");
}