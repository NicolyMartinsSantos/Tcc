<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Clientes</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        button {
            background-color: red;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }
        button:hover {
            background-color: darkred;
        }
        /* Estilo do input de busca */
        #filterInput {
            margin: 10px 0;
            padding: 5px;
            width: 200px;
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>

    <h1>Listagem de Clientes</h1>

    <!-- Input de filtro -->
    <input type="text" id="filterInput" onkeyup="filterTable()" placeholder="Digite o nome para filtrar">

    <table id="clientesTable">
        <tr>
            <th>Nome</th>
            <th>CPF</th>
            <th>Telefone</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>
        @foreach($clientes as $cliente)
            <tr>
                <td>{{ $cliente->nome }}</td>
                <td>{{ $cliente->cpf }}</td>
                <td>{{ $cliente->telefone }}</td>
                <td>{{ $cliente->email }}</td>
                <td>
                    <form action="{{ route('cliente.destroy', $cliente->id) }}" method="POST" onsubmit="return confirm('TEM CERTEZA?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Deletar</button>
                    </form>
                </td>
                <td>
                    <a href="{{ route('cliente.edit', $cliente->id) }}">Editar</a>
                </td>
            </tr>
        @endforeach
    </table>

    <script>
        function filterTable() {

            var filter = document.getElementById('filterInput').value.toUpperCase();

            var table = document.getElementById('clientesTable');
            var tr = table.getElementsByTagName('tr');
            
            for (var i = 1; i < tr.length; i++) {
                var td = tr[i].getElementsByTagName('td')[0];
                if (td) {
                    var txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = '';
                    } else {
                        tr[i].style.display = 'none';
                    }
                }
            }
        }
    </script>

</body>
</html>
