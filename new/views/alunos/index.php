<!DOCTYPE html>
<html>
<head>
    <title>Alunos</title>
</head>
<body>
    <h1>Alunos</h1>
    <a href="index.php?controller=alunos&action=create">Novo Aluno</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Endereco</th>
            <th>Data Nascimento</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($alunos as $aluno): ?>
        <tr>
            <td><?php echo $aluno['id']; ?></td>
            <td><?php echo $aluno['nome']; ?></td>
            <td><?php echo $aluno['cpf']; ?></td>
            <td><?php echo $aluno['email']; ?></td>
            <td><?php echo $aluno['telefone']; ?></td>
            <td><?php echo $aluno['endereco']; ?></td>
            <td><?php echo $aluno['dataNascimento']; ?></td>
            <td>
                <a href="index.php?controller=alunos&action=edit&id=<?php echo $aluno['id']; ?>">Edit</a>
                <a href="index.php?controller=alunos&action=delete&id=<?php echo $aluno['id']; ?>">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>