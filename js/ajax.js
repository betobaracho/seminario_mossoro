function getXmlHttpObject() {
    try {
        xmlHttp = new XMLHttpRequest();
    } catch (e) {
        try {
            xmlHttp = new ActiveXObject("Msxm12.XMLHTTP");
        } catch (e) {
            xmlHttp = new ActiveXObject("Microsoft.SMLHTTP");
        }
    }
    return xmlHttp;
}
function cadastrarUsuario() {
    xmlHttp = getXmlHttpObject();
    var nome = document.getElementById('nome').value;
    var email = document.getElementById('email').value;
    var login = document.getElementById('login').value;
    var senha = document.getElementById('senha').value;

    if (nome === "" || login === "" || senha === "" || email === "")
    {
        document.getElementById('respostaUsuario').innerHTML = "Preencha todos os campos";
        return;
    }

    var url = "controle/cadastrarUsuario.php?nome=" + nome + "&login=" + login +
            "&senha=" + senha + "&email=" + email;

    xmlHttp.onreadystatechange = function () {
        if (xmlHttp.readyState === 4)
        {
            if (xmlHttp.responseText > 0) {
                document.getElementById('respostaUsuario').innerHTML = "Usuário cadastrado com sucesso (identificador:" + xmlHttp.responseText + ")";
            } else {
                document.getElementById('respostaUsuario').innerHTML = "Não foi possível cadastrar Usuário. (erro:" + xmlHttp.responseText + ")";
            }

        }
    };
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}

function editarUsuario(id) {
    xmlHttp = getXmlHttpObject();
    var nome = document.getElementById('nome').value;
    var email = document.getElementById('email').value;
    var login = document.getElementById('login').value;
    var senha = document.getElementById('senha').value;
    var status = document.getElementById('status').value;
    if (nome === "" || login === "" || senha === "" || email === "")
    {
        document.getElementById('respostaUsuario').innerHTML = "Preencha todos os campos";
        return;
    }

    var url = "controle/editarUsuario.php?nome=" + nome + "&login=" + login +
            "&senha=" + senha + "&email=" + email + "&id=" + id + "&status=" + status;
    xmlHttp.onreadystatechange = function () {
        if (xmlHttp.readyState === 4)
        {
            if (xmlHttp.responseText > 0) {
                document.getElementById('respostaUsuario').innerHTML = "Usu�rio editado com sucesso";
            } else {
                document.getElementById('respostaUsuario').innerHTML = "Usu�rio n�o editado.";
            }

        }
    };
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}

function modificarDados(id) {
    document.getElementById('respostaSenha').innerHTML = "";
    var xmlHttp = getXmlHttpObject();
    var senha = document.getElementById("senha").value;
    var email = document.getElementById("email").value;
    var url = "controle/modificarDados.php?senha=" + senha + "&email=" + email + "&id=" + id;
    if (senha === "" || email === "") {
        document.getElementById('respostaSenha').innerHTML = "Preencha a senha e o email";
        return;
    }
    xmlHttp.onreadystatechange = function () {
        if (xmlHttp.readyState === 4)
        {
            var msg = "";
            var retorno = xmlHttp.responseText;
            if (retorno === '1') {
                msg = "Dados modificados com sucesso";
            } else
                msg = "Nenhum dado foi modificado";
            document.getElementById('respostaSenha').innerHTML = msg;
        }
    };
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}

function cadastrarDoador() {
    document.getElementById('respostaDoador').innerHTML = "Aguarde!";
    var xmlHttp = getXmlHttpObject();
    var nome = document.getElementById("nome").value;
    var cpf = document.getElementById("cpf").value;
    var rg = document.getElementById("rg").value;
    var contrato = document.getElementById("contrato").value;
    var rua = document.getElementById("rua").value;
    var bairro = document.getElementById("bairro").value;
    var cep = document.getElementById("cep").value;
    var cidade = document.getElementById("cidade").value;
    var valor = document.getElementById("valor").value;
    var telefone = document.getElementById("telefone").value;
    var nascimento = document.getElementById("nascimento").value;
    var email = document.getElementById("email").value;
    var paroquia = document.getElementById("paroquia").value;
    var dataAdesao = document.getElementById("dataAdesao").value;
    var obs = document.getElementById("obs").value;
    if (nome === "" || contrato === "" || valor === "" || paroquia === "") {
        alert("Preencha os campos:nome,contrato e valor da doação,paróquia");
        document.getElementById('respostaDoador').innerHTML = "Preencha os campos:nome,contrato e valor da doação";
        return;
    }
    var url = "controle/cadastrarDoador.php?nome=" + nome + "&cpf=" + cpf
            + "&rg=" + rg + "&contrato=" + contrato + "&rua=" + rua +
            "&bairro=" + bairro + "&cep=" + cep + "&cidade=" + cidade +
            "&valor=" + valor + "&telefone=" + telefone + "&nascimento=" + nascimento
            + "&email=" + email + "&paroquia=" + paroquia + "&dataAdesao=" + dataAdesao + "" + "&obs=" + obs;
    xmlHttp.onreadystatechange = function () {
        if (xmlHttp.readyState === 4)
        {
            var msg = "";
            var retorno = xmlHttp.responseText;
            
            if (retorno > 0) {
                document.getElementById("nome").value = "";
                document.getElementById("cpf").value = "";
                document.getElementById("rg").value = "";
                document.getElementById("contrato").value = "";
                document.getElementById("rua").value = "";
                document.getElementById("bairro").value = "";
                document.getElementById("cep").value = "";
                document.getElementById("cidade").value = "";
                document.getElementById("valor").value = "";
                document.getElementById("telefone").value = "";
                document.getElementById("nascimento").value = "";
                document.getElementById("email").value = "";
                document.getElementById("obs").value = "";

                msg = "Doador cadastrado com sucesso. Id: " + retorno;
            } else
                msg = retorno;
            document.getElementById('respostaDoador').innerHTML = msg;
        }
    };
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}

function editarDoador(id) {
    document.getElementById('respostaDoador').innerHTML = "Aguarde!";
    var xmlHttp = getXmlHttpObject();
    var nome = document.getElementById("nome").value;
    var cpf = document.getElementById("cpf").value;
    var rg = document.getElementById("rg").value;
    var contrato = document.getElementById("contrato").value;
    var rua = document.getElementById("rua").value;
    var bairro = document.getElementById("bairro").value;
    var cep = document.getElementById("cep").value;
    var cidade = document.getElementById("cidade").value;
    var valor = document.getElementById("valor").value;
    var telefone = document.getElementById("telefone").value;
    var nascimento = document.getElementById("nascimento").value;
    var status = document.getElementById("status").value;
    var email = document.getElementById("email").value;
    var dataAdesao = document.getElementById("dataAdesao").value;
    if (nome === "" || contrato === "" || valor === "") {
        alert("Preencha todos os campos");
        return;
    }
    var url = "controle/editarDoador.php?nome=" + nome + "&cpf=" + cpf
            + "&rg=" + rg + "&contrato=" + contrato + "&rua=" + rua +
            "&bairro=" + bairro + "&cep=" + cep + "&cidade=" + cidade +
            "&valor=" + valor + "&telefone=" + telefone + "&nascimento=" + nascimento
            + "&email=" + email + "&status=" + status + "&dataAdesao=" + dataAdesao + "&id=" + id;
    xmlHttp.onreadystatechange = function () {
        if (xmlHttp.readyState === 4)
        {
            var msg = "";
            var retorno = xmlHttp.responseText;

            if (retorno > 0) {
                msg = "Doador editado com sucesso";
            } else
                msg = "Nada foi editado";
            document.getElementById('respostaDoador').innerHTML = msg;
        }
    };
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}

function cadastrarParoquia() {
    var xmlHttp = getXmlHttpObject();
    var paroquia = document.getElementById("paroquia").value;
    var cidade = document.getElementById("cidade").value;
    var telefone = document.getElementById("telefone").value;
    var responsavel = document.getElementById("responsavel").value;
    var zonal = document.getElementById("zonal").value;
    var url = "controle/cadastrarParoquia.php?paroquia=" + paroquia +
            "&cidade=" + cidade + "&telefone=" + telefone +
            "&responsavel=" + responsavel+"&zonal="+zonal;
    if (paroquia === "" || cidade === "" || telefone === "" || responsavel === "" || zonal === "") {
        document.getElementById('respostaParoquia').innerHTML = "Preencha todos os dados";
        return;
    }
    xmlHttp.onreadystatechange = function () {
        if (xmlHttp.readyState === 4)
        {
            var msg = "";
            var retorno = xmlHttp.responseText;
            if (retorno > 0) {
                msg = "Par&oacute;quia cadastrada com sucesso. Id: " + retorno;
            } else
                msg = xmlHttp.responseText;
            document.getElementById('respostaParoquia').innerHTML = msg;
        }
    };
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}

function editarParoquia(id) {
    var xmlHttp = getXmlHttpObject();
    var paroquia = document.getElementById("paroquia").value;
    var cidade = document.getElementById("cidade").value;
    var telefone = document.getElementById("telefone").value;
    var responsavel = document.getElementById("responsavel").value;
    var zonal = document.getElementById("zonal").value;

    if (paroquia === "" || cidade === "" || telefone === "" || responsavel === "" || zonal ==="") {
        document.getElementById('respostaParoquia').innerHTML = "Preencha todos os dados";
        return;
    }
    var url = "controle/updateParoquia.php?paroquia=" + paroquia + "&cidade=" + cidade
            + "&telefone=" + telefone + "&responsavel=" + responsavel
            +"&zonal="+zonal+"&id=" + id;
    
    xmlHttp.onreadystatechange = function () {
        if (xmlHttp.readyState === 4)
        {
            var msg = "";
            var retorno = xmlHttp.responseText;
            if (retorno > 0) {
                msg = "Par&oacute;quia editada com sucesso. Id: " + retorno;
            } else
                msg = xmlHttp.responseText;
            document.getElementById('respostaParoquia').innerHTML = msg;
        }
    };
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}

function buscarPorPadrao() {
    var xmlHttp = getXmlHttpObject();
    var padrao = document.getElementById("padrao").value;
    if (padrao === "") {
        return;
    }
    var url = "controle/buscarDoador.php?padrao=" + padrao;
    xmlHttp.onreadystatechange = function () {
        if (xmlHttp.readyState === 4)
        {
            var msg = "";
            var retorno = xmlHttp.responseText;
            if (retorno !== "") {
                document.getElementById("respostaDoador").innerHTML = retorno;
            } else
                document.getElementById('respostaDoador').innerHTML = "Sem resultado";
        }
    };
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}

function relatorioDoadores() {
    document.getElementById("relatorio").innerHTML = "Aguarde!!!!!!!!";
    var xmlHttp = getXmlHttpObject();
    var status = document.getElementById("status").value;

    var paroquia = document.getElementById("paroquia").value;

    var adesao = document.getElementById("adesao").value;

    var url = "controle/relatorioDoador.php?status=" + status +
            "&paroquia=" + paroquia + "&adesao=" + adesao;

    xmlHttp.onreadystatechange = function () {
        if (xmlHttp.readyState === 4)
        {
            var retorno = xmlHttp.responseText;
            if (retorno !== "") {
                document.getElementById("relatorio").innerHTML = retorno;
            }
        }
    };
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}

function relatorioDoadoresParoquia() {
    document.getElementById("relatorio").innerHTML = "Aguarde!!!!!!!!";
    var xmlHttp = getXmlHttpObject();
    var status = document.getElementById("status").value;

    var adesao = document.getElementById("adesao").value;
    var agruparParoquia = document.getElementById("agruparParoquia").value;
    var url = "controle/relatorioDoadorParoquia.php?status=" + status +
            "&adesao=" + adesao + "&agruparParoquia=" + agruparParoquia;
    xmlHttp.onreadystatechange = function () {
        if (xmlHttp.readyState === 4)
        {
            var retorno = xmlHttp.responseText;
            if (retorno !== "") {
                document.getElementById("relatorio").innerHTML = retorno;
            }
        }
    };
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}

function relatorioDoadoresZonal() {
    document.getElementById("relatorio").innerHTML = "Aguarde!!!!!!!!";
    var xmlHttp = getXmlHttpObject();
    var status = document.getElementById("status").value;

    var adesao = document.getElementById("adesao").value;
    var zonal = document.getElementById("zonal").value;
    var url = "controle/relatorioDoadorZonal.php?status=" + status +
            "&adesao=" + adesao + "&zonal=" + zonal;
   
    xmlHttp.onreadystatechange = function () {
        if (xmlHttp.readyState === 4)
        {
            var retorno = xmlHttp.responseText;
            // alert(retorno);
            if (retorno !== "") {
                document.getElementById("relatorio").innerHTML = retorno;
            }
        }
    };
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}

function relatorioDoacoes() {
    var xmlHttp = getXmlHttpObject();
    document.getElementById("botaoEnviar").value = "Aguarde! sendo gerado!";
    var mes = document.getElementById("mes").value;
    var ano = document.getElementById("ano").value;
    var paroquia = document.getElementById("paroquia").value;
    var zonal = document.getElementById("zonal").value;
    var agrupar = document.getElementById("agrupar").value;
    var agrupar_data = document.getElementById("agrupar_data").value;
    var agrupar_zonal = document.getElementById("agrupar_zonal").value;
    var url = "controle/relatorioDoacoes.php?mes=" + mes + "&ano=" + ano +
            "&paroquia=" + paroquia + "&agrupar=" + agrupar + 
            "&agrupar_data=" + agrupar_data+"&zonal="+zonal+"&agrupar_zonal="+agrupar_zonal;
    
    xmlHttp.onreadystatechange = function () {
        if (xmlHttp.readyState === 4)
        {
            var retorno = xmlHttp.responseText;
            document.getElementById("botaoEnviar").value = "Finalizado! Gerar novo";
            if (retorno !== "") {
                document.getElementById("relatorio").innerHTML = retorno;
            }
        }
    };
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}

function checarContrato() {
    var contrato = document.getElementById("contrato").value;
    var xmlHttp = getXmlHttpObject();
    var url = "controle/buscarContrato.php?contrato=" + contrato;
    xmlHttp.onreadystatechange = function () {
        if (xmlHttp.readyState === 4)
        {
            var retorno = xmlHttp.responseText;
            if (retorno > 0) {
                document.getElementById("alerta").innerHTML = "Redireciando!";
                location.href = "editarDoador.php?id=" + retorno;
            } else {
                document.getElementById("alerta").innerHTML = "";
            }
        }
    };
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}

function cadastrarBairro() {
    document.getElementById("respostaBairro").innerHTML = "";
    var xmlHttp = getXmlHttpObject();
    var bairro = document.getElementById("bairro").value;
    var url = "controle/cadastrarBairro.php?bairro=" + bairro;
    xmlHttp.onreadystatechange = function () {
        if (xmlHttp.readyState === 4)
        {
            var retorno = xmlHttp.responseText;
            if (retorno > 0) {
                document.getElementById("respostaBairro").innerHTML = "Bairro cadastrado com sucesso!";
            } else {
                document.getElementById("respostaBairro").innerHTML = "Não foi possível cadastrar bairro";
            }
        }
    };
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}

function removerDoador(id) {
    var xmlHttp = getXmlHttpObject();
    if (id === "") {
        alert("Doador não selecionado!!");
        return;
    }
    if (!confirm("Apagar doador!!")) {
        return;
    }
    var url = "controle/apagarDoador.php?id=" + id;
    xmlHttp.onreadystatechange = function () {
        if (xmlHttp.readyState === 4)
        {
            var retorno = xmlHttp.responseText;
            if (retorno > 0) {
                alert("Registro de doador removido com sucesso!!!!");
                location.href = "doadores.php";
            } else {
                alert("Não foi possível remover registro!!!");
            }
        }
    };
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}

function gerarPDF(status, cidade, paroquia) {
    var url = "controle/gerarPDF.php?status=" + status + "&cidade=" + cidade + "&paroquia=" + paroquia;
    location.href = url;
}

function completarDoador(padrao) {
    var xmlHttp = getXmlHttpObject();
    if (padrao === "") {
        return;
    }

    var url = "controle/buscarDoadorContrato.php?contrato=" + padrao;
    xmlHttp.onreadystatechange = function () {
        if (xmlHttp.readyState === 4)
        {
            var retorno = xmlHttp.responseText;
            document.getElementById("doador").innerHTML = retorno;

        }
    };
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}

function fichaCancelamento() {

    var doador = document.getElementById("doador").value;
    var motivo = document.getElementById("motivoCancelamento").value;
    var data = document.getElementById("dataCancelamento").value;
    var url = "imprimirFichaCancelamento.php?id=" + doador + "&motivo=" + motivo +
            "&data=" + data;

    location.href = url;
}

function completarBairro(padrao) {
    var xmlHttp = getXmlHttpObject();
    if (padrao === "") {
        alert("Bairro desconhecido");
        return;
    }
    // alert(padrao);    
    var url = "controle/buscarBairro.php?bairro=" + padrao;
    xmlHttp.onreadystatechange = function () {
        if (xmlHttp.readyState === 4)
        {
            var retorno = xmlHttp.responseText;
            alert(retorno);
            /*            if (retorno > 0) {
             alert("Registro de doador removido com sucesso!!!!");
             location.href="doadores.php";
             } else {
             alert("Não foi possível remover registro!!!");
             }*/
        }
    };
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}