<!DOCTYPE html>
<html>
<head>
    <title>Create Aluno</title>
</head>
<body>
    <h1>Create Aluno</h1>
    <form action="index.php?controller=alunos&action=create" method="POST">
        <label>Nome:</label>
        <input type="text" name="nome" required><br>
        <label>CPF:</label>
        <input type="text" name="cpf" required><br>
        <label>Email:</label>
        <input type="email" name="email" required><br>
        <label>Telefone:</label>
        <input type="text" name="telefone" required><br>
        <label>Endereco:</label>
        <input type="text" name="endereco" required><br>
        <label>Data Nascimento:</label>
        <input type="date" name="dataNascimento" required><br>
        <input type="submit" value="Create">
    </form>
</body>
</html>