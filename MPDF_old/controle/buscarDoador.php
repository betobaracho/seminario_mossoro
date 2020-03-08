<?php
include '../verificaSessao.php';
header('Content-Type: text/html; charset=ISO-8859-1');
$padrao = $_GET["padrao"];

try {
    $arrayDoadores = DAOFactory::getDoadorDAO()->queryByCpf($padrao);
    if (empty($arrayDoadores)) {
        $arrayDoadores = DAOFactory::getDoadorDAO()->queryByContrato($padrao);
        if (empty($arrayDoadores)) {
            $sql = "SELECT * FROM  `doador` WHERE  `nome` LIKE '$padrao%' order by nome";                  
            //echo $sql."<br>";
            $conexao = new Connection();
            $result = $conexao->executeQuery($sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $doador = new Doador();
                $doador->rua = $row["rua"];
                $doador->bairro = $row["bairro"];
                $doador->cep = $row["cep"];
                $doador->cidade = $row["cidade"];
                $doador->cpf = $row["cpf"];
                $doador->iddoador = $row["iddoador"];
                $doador->nome = $row["nome"];
                $doador->rg = $row["rg"];
                $doador->contrato = $row["contrato"];
                $doador->valorDoacao = $row["valor_doacao"];
                array_push($arrayDoadores, $doador);
            }
        }
    }
    ?>
    <table cellpadding="0" cellspacing="0" border="0" id="table" class="tinytable" style="background-color:#eee">                        
        <tbody>
            <tr><th colspan="11" align="center">Lista de Doadores <a href="novoDoador.php">Cadastrar</a>  &nbsp;
                Buscar por nome,cpf ou n�mero do contrato <input type="text" id="padrao" onBlur="buscarPorPadrao();"></th></tr>
            <tr>
                <td>Nome </td>                            
                <td>CPF </td>                                
                <td>RG</td>  
                <td>Contrato </td>                            
                <td>Rua </td>
                <td>Bairro </td>                                
                <td>Cep</td>
                <td>Cidade </td>
                <td>Valor </td>                                                                
                <td>&nbsp; </td>                                
            </tr>                                

            <?php
            foreach ($arrayDoadores as $doador) {
                ?>
                <tr>
                    <td><?= $doador->nome ?> </td>                            
                    <td>&nbsp;<?= $doador->cpf ?> </td>
                    <td>&nbsp;<?= $doador->rg ?> </td>                                
                    <td><?= $doador->contrato ?> </td>
                    <td><?= $doador->rua ?> </td>                            
                    <td><?= Utils::getNomeBairro($doador->bairro) ?> </td>
                    <td><?= $doador->cep ?> </td>                                
                    <td><?= DAOFactory::getCidadeDAO()->load($doador->cidade)->cidade ?> </td>
                    <td><?= Utils::formatarValor($doador->valorDoacao) ?> </td>
                    <td><a href="editarDoador.php?id=<?= $doador->iddoador ?>">Editar</a> </td>
                </tr>
                <?php
            }
            ?>

        </tbody>
    </table>
    <?php
} catch (Exception $e) {
    echo $e->getMessage();
}

?>
