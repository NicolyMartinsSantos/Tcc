<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="cadastrarCliente" method="post">
    @csrf

        <p>{{session('mensagem')}}</p>
        Nome: <input type="text" name="nome">
        CPF: <input type="text" name="cpf">
        Telefone: <input type="text" name="telefone">
        Email: <input type="text" name="email">
        <input type="submit" value="Cadastrar">
    </form>
    <a href="{{ route('listarCliente') }}">Listar Clientes</a>

</body>
</html>