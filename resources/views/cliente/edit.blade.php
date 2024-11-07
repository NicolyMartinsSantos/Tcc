<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('cliente.update', $cliente->id) }} "method="POST">
        @csrf
        @method('PUT')
        Nome:
            <input type="text" name="nome" value="{{ $cliente->nome }}">
        CPF:
            <input type="text" name="cpf" value="{{ $cliente->cpf }}">
        Telefone:
            <input type="text" name="telefone" value="{{ $cliente->telefone }}">
        Email:
        <input type="email" name="email" value="{{ $cliente->email }}">

        <button type="submit">Atualizar</button>
    </form>
    
</body>
</html>