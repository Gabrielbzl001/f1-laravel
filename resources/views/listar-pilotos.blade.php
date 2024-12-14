<!-- resources/views/listar-pilotos.blade.php -->

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Pilotos</title>
    <!-- Adicionar um pouco de estilo para a tabela -->
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Lista de Pilotos</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Equipe</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pilotos as $piloto)
                <tr>
                    <td>{{ $piloto->id }}</td>
                    <td>{{ $piloto->nome }}</td>
                    <td>{{ $piloto->equipe->nome }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
