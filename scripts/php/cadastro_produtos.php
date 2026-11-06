<?php # função pegar os dados do formulário e cadastrar os dados no banco de dados produtos    
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "biblioteca";

    // Create connection
    try{
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

        $pdo-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $pdo -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }
    catch(PDOException $e){
        throw new PDOException($e->getMessage(), (int)$e->getCode());
    };

    $array = [
        "publicacao" => [
            "titulo",
            "data_publicacao",
            "descricao",
        ],
        "tipo_publicacao" => [
            "nome",
            "descricao"
        ],
        "divulgacao" => [
            "data",
            "endereco"
        ],
        "convidados" => ["nome"]
    ];



    $nome = $_POST["nome"];
    $tipo_publicacao = $_POST["tipo_publicacao"];

    echo $nome . " " . $tipo_publicacao . " ";

?>