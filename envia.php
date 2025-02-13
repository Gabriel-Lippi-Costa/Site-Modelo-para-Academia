<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura e sanitiza os dados do formulário
    $nome = htmlspecialchars($_POST['nome']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $tel = htmlspecialchars($_POST['tel']);
    $msg = htmlspecialchars($_POST['msg']);

    // Validação do telefone (se preenchido)
    if (!empty($tel) && !preg_match("/^\(?\d{2}\)?\s?\d{4,5}-\d{4}$/", $tel)) {
        echo "Por favor, insira um telefone válido.";
        exit;
    }

    // Verifica se os campos obrigatórios estão preenchidos
    if (empty($nome) || empty($msg) || !$email) {
        echo "Por favor, preencha todos os campos obrigatórios.";
        exit;
    }

    // Configurações do e-mail
    $para = "gabriellippidacosta@gmail.com";
    $assunto = "Dúvidas - Elite Fit";

    // Corpo do e-mail
    $corpo = "Nome: $nome\n";
    $corpo .= "Email: $email\n";
    $corpo .= "Telefone: $tel\n";
    $corpo .= "Mensagem: $msg\n";

    // Cabeçalhos do e-mail
    $headers = "From: Elite Fit <no-reply@seudominio.com>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    // Tenta enviar o e-mail
    if (mail($para, $assunto, $corpo, $headers)) {
        $_SESSION['form_enviado'] = true;
        header("Location: sucesso.html");
        exit;
    } else {
        $_SESSION['form_enviado'] = false;
        header("Location: erro.html");
        exit;
    }
} else {
    header("Location: erro.html");
    exit;
}
?>
