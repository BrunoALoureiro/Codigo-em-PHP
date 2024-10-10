<?php
include 'Funcionario.php';

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Cria o objeto Funcionario e define os atributos
    $funcionario = new Funcionario();
    $funcionario->setNomeCompleto($_POST["nomeCompleto"]);
    $funcionario->setDataNascimento($_POST["dataNascimento"]);
    $funcionario->setFuncao($_POST["funcao"]);
    $funcionario->setTelefone($_POST["telefone"]);
    $funcionario->setCorDeFundo($_POST["corDeFundo"]);
    $funcionario->setEmail($_POST["email"]);
    $funcionario->setSalarioLiquido($_POST["salarioLiquido"]);
    $funcionario->setSalarioBruto($_POST["salarioBruto"]);

    // API para informação sobre a data de nascimento
    $data = explode("-", $_POST["dataNascimento"]);
    $year = $data[0];
    $url = "http://numbersapi.com/" . $year . "/year";
    $apiResponse = file_get_contents($url);
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Funcionário</title>
    <!-- Importando Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script>
        function applyTheme(theme) {
            // Aplica o tema claro ou escuro baseado na escolha
            if (theme === 'dark') {
                document.body.classList.add('dark');
            } else {
                document.body.classList.remove('dark');
            }

            // Armazena a preferência no cookie
            document.cookie = "corDeFundo=" + theme + "; path=/; max-age=" + 60 * 60 * 24 * 30;
        }

        function handleThemeSelection() {
            const selectedTheme = document.getElementById('corDeFundo').value;
            // Aplica o tema baseado na seleção
            applyTheme(selectedTheme === 'black' ? 'dark' : '');
        }

        // Define o tema ao carregar a página
        window.onload = function() {
            const cookies = document.cookie.split('; ');
            const themeCookie = cookies.find(row => row.startsWith('corDeFundo='));
            if (themeCookie) {
                const theme = themeCookie.split('=')[1];
                applyTheme(theme);
                // Ajusta o valor do seletor conforme o tema armazenado
                document.getElementById('corDeFundo').value = theme === 'dark' ? 'black' : 'lightgray';
            }
        };
    </script>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Cadastro de Funcionário</h2>
                <form method="POST" action="">
                    <!-- Campos do formulário -->
                    <div class="form-group">
                        <label for="corDeFundo">Cor de Fundo (clara ou escura)</label>
                        <select class="form-control" id="corDeFundo" name="corDeFundo" onchange="handleThemeSelection()">
                            <option value="lightgray">Clara</option>
                            <option value="black">Escura</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nomeCompleto">Nome Completo</label>
                        <input type="text" class="form-control" id="nomeCompleto" name="nomeCompleto" required>
                    </div>
                    <div class="form-group">
                        <label for="dataNascimento">Data de Nascimento</label>
                        <input type="date" class="form-control" id="dataNascimento" name="dataNascimento" required>
                    </div>
                    <div class="form-group">
                        <label for="funcao">Função</label>
                        <input type="text" class="form-control" id="funcao" name="funcao" required>
                    </div>
                    <div class="form-group">
                        <label for="telefone">Telefone</label>
                        <input type="text" class="form-control" id="telefone" name="telefone" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="salarioLiquido">Salário Líquido</label>
                        <input type="number" class="form-control" id="salarioLiquido" name="salarioLiquido" required>
                    </div>
                    <div class="form-group">
                        <label for="salarioBruto">Salário Bruto</label>
                        <input type="number" class="form-control" id="salarioBruto" name="salarioBruto" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </form>
            </div>

            <div class="col-md-6">
                <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
                    <h3>Dados do Funcionário</h3>
                    <div class="resultados <?php echo $tema; ?>">
                        <p><strong>Nome:</strong> <?php echo $funcionario->getNomeCompleto(); ?></p>
                        <p><strong>Data de Nascimento:</strong> <?php echo $funcionario->getDataNascimento(); ?></p>
                        <p><strong>Função:</strong> <?php echo $funcionario->getFuncao(); ?></p>
                        <p><strong>Telefone:</strong> <?php echo $funcionario->getTelefone(); ?></p>
                        <p><strong>Email:</strong> <?php echo $funcionario->getEmail(); ?></p>
                        <p><strong>Salário Bruto:</strong> <?php echo $funcionario->getSalarioBruto(); ?></p>
                        <p><strong>Salário Líquido:</strong> <?php echo $funcionario->getSalarioLiquido(); ?></p>
                        <p><strong>Desconto:</strong> <?php echo $funcionario->calculaDesconto(); ?></p>
                        <p><strong>Fato histórico no seu ano de nascimento:</strong> <?php echo $apiResponse; ?></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

</body>

</html>