function mascara_cpf(v) {
    v = v.replace(/\D/g, "")                    //Remove tudo o que nÃ£o Ã© dÃ­gito
    v = v.replace(/(\d{3})(\d)/, "$1.$2")       //Coloca um ponto entre o terceiro e o quarto dÃ­gitos
    v = v.replace(/(\d{3})(\d)/, "$1.$2")       //Coloca um ponto entre o terceiro e o quarto dÃ­gitos
    //de novo (para o segundo bloco de números)
    v = v.replace(/(\d{3})(\d{1,2})$/, "$1-$2") //Coloca um hÃ­fen entre o terceiro e o quarto dÃ­gitos    
    return v
}

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

function valida_cnpj(cnpj)
{
    var numeros, digitos, soma, i, resultado, pos, tamanho, digitos_iguais;
    digitos_iguais = 1;
    cnpj = remove(cnpj, ".");
    cnpj = remove(cnpj, ".");
    cnpj = remove(cnpj, "-");
    cnpj = remove(cnpj, "/");
    if (cnpj.length != 14) {
        alert('CNPJ invalido');
        return false;
    }
    for (i = 0; i < cnpj.length - 1; i++)
        if (cnpj.charAt(i) != cnpj.charAt(i + 1))
        {
            digitos_iguais = 0;
            break;
        }
    if (!digitos_iguais)
    {
        tamanho = cnpj.length - 2
        numeros = cnpj.substring(0, tamanho);
        digitos = cnpj.substring(tamanho);
        soma = 0;
        pos = tamanho - 7;
        for (i = tamanho; i >= 1; i--)
        {
            soma += numeros.charAt(tamanho - i) * pos--;
            if (pos < 2)
                pos = 9;
        }
        resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
        if (resultado != digitos.charAt(0)) {
            alert('CNPJ invalido');
            return false;
        }
        tamanho = tamanho + 1;
        numeros = cnpj.substring(0, tamanho);
        soma = 0;
        pos = tamanho - 7;
        for (i = tamanho; i >= 1; i--)
        {
            soma += numeros.charAt(tamanho - i) * pos--;
            if (pos < 2)
                pos = 9;
        }
        resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
        if (resultado != digitos.charAt(1)) {
            alert('CNPJ invalido');
            return false;
        }
        return true;
    }
    else {
        alert('CNPJ invalido');
        return false;
    }
}

function validar_cpf_cnpj(cpf_cnpj) {
    if (cpf_cnpj.length > 14) {
        return valida_cnpj(cpf_cnpj);
    }
    else {
        return validarCPF(cpf_cnpj);
    }
}
function validarCPF(cpf) {
    var filtro = /^\d{3}.\d{3}.\d{3}-\d{2}$/i;
    if (!filtro.test(cpf)) {
        window.alert("CPF invalido. Tente novamente.");
        return false;
    }
    cpf = remove(cpf, ".");
    cpf = remove(cpf, ".");
    cpf = remove(cpf, "-");
    if (cpf.length != 11 || cpf == "00000000000" || cpf == "11111111111" ||
            cpf == "22222222222" || cpf == "33333333333" || cpf == "44444444444" ||
            cpf == "55555555555" || cpf == "66666666666" || cpf == "77777777777" ||
            cpf == "88888888888" || cpf == "99999999999") {
        window.alert("CPF invalido. Tente novamente.");
        return false;
    }
    soma = 0;
    for (i = 0; i < 9; i++)
        soma += parseInt(cpf.charAt(i)) * (10 - i);
    resto = 11 - (soma % 11);
    if (resto == 10 || resto == 11)
        resto = 0;
    if (resto != parseInt(cpf.charAt(9))) {
        window.alert("CPF invalido. Tente novamente.");
        return false;
    }
    soma = 0;
    for (i = 0; i < 10; i ++)
        soma += parseInt(cpf.charAt(i)) * (11 - i);
    resto = 11 - (soma % 11);
    if (resto == 10 || resto == 11)
        resto = 0;
    if (resto != parseInt(cpf.charAt(10))) {
        window.alert("CPF invalido. Tente novamente.");
        return false;
    }
    return true;
}


function remove(str, sub) {
    str = str.replace(sub, "");
    return str;
}

function formatarDinheiro(num) {
    x = 0;
    if (num < 0) {
        num = Math.abs(num);
        x = 1;
    }
    if (isNaN(num))
        num = '0';
    cents = Math.floor((num * 100 + 0.5) % 100);
    num = Math.floor((num * 100 + 0.5) / 100).toString();
    if (cents < 10)
        cents = '0' + cents;
    for (var i = 0; i < Math.floor((num.length - (1 + i)) / 3); i++)
        num = num.substring(0, num.length - (4 * i + 3)) + '.'
                + num.substring(num.length - (4 * i + 3));
    ret = num + ',' + cents;
    if (x == 1)
        ret = ' – ' + ret;
    return ret;
}
function pesquisacep(valor) {

    //Nova vari<E1>vel "cep" somente com d<ED>gitos.
    var cep = valor.replace(/\D/g, '');
    //Verifica se campo cep possui valor informado.
    if (cep != "") {
        //Express<E3>o regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;
        
        //Valida o formato do CEP.
        if (validacep.test(cep)) {
            //Preenche os campos com "..." enquanto consulta webservice.
            document.getElementById('rua').value = "...";
            document.getElementById('bairro').value = "...";
            document.getElementById('cidade').value = "...";
            //document.getElementById('estado').value = "...";
            //document.getElementById('ibge').value = "...";
            //Cria um elemento javascript.
            var script = document.createElement('script');
            //Sincroniza com o callback.
            script.src = '//viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';
            //Insere script no documento e carrega o conte<FA>do.
            document.body.appendChild(script);
        } //end if.
        else {
            //cep <E9> inv<E1>lido.
            limpa_formul < E1 > rio_cep();
            alert("Formato de CEP inv<E1>lido.");
        }
    } //end if.
    else {
        //cep sem valor, limpa formul<E1>rio.
        limpa_formul < E1 > rio_cep();
    }
}
function meu_callback(conteudo) {
    if (!("erro" in conteudo)) {
        //Atualiza os campos com os valores.

        var tipo = conteudo.logradouro.split(" ");
        var log = "";
        for (var i = 1; i < tipo.length; i++) {
            log += tipo[i];
            if (i < tipo.length - 1) {
                log += " ";
            }
        }
        
        document.getElementById('rua').value = log;
        //completarBairro(conteudo.bairro);
        document.getElementById('bairro').value = (conteudo.bairro);
        document.getElementById('cidade').value = (conteudo.localidade);
        document.getElementById('estado').value = (conteudo.uf);
        
    } //end if.
    else {
        //CEP n<E3>o Encontrado.
       // limpa_formul < E1 > rio_cep();
        alert("CEP n<E3>o encontrado.");
    }
}

function mascaraData( campo, e )
{
	var kC = (document.all) ? event.keyCode : e.keyCode;
	var data = campo.value;
	
	if( kC!=8 && kC!=46 )
	{
		if( data.length==2 )
		{
			campo.value = data += '/';
		}
		else if( data.length==5 )
		{
			campo.value = data += '/';
		}
		else
			campo.value = data;
	}
}