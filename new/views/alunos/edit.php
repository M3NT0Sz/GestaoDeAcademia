<!DOCTYPE html>
<html>
<head>
    <title>Edit Aluno</title>
</head>
<body>
    <h1>Edit Aluno</h1>
    <form action="index.php?controller=alunos&action=edit&id=<?php echo $aluno['id']; ?>" method="POST">
        <label>Nome:</label>
        <input type="text" name="nome" value="<?php echo $aluno['nome']; ?>" required><br>
        <label>CPF:</label>
        <input type="text" name="cpf" value="<?php echo $aluno['cpf']; ?>" required><br>
        <label>Email:</label>
        <input type="email" name="email" value="<?php echo $aluno['email']; ?>" required><br>
        <label>Telefone:</label>
        <input type="text" name="telefone" value="<?php echo $aluno['telefone']; ?>" required><br>
        <label>Endereco:</label>
        <input type="text" name="endereco" value="<?php echo $aluno['endereco']; ?>" required><br>
        <label>Data Nascimento:</label>
        <input type="date" name="dataNascimento" value="<?php echo $aluno['dataNascimento']; ?>" required><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>