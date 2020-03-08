// JavaScript Document

function validaForm(){
		//validar nome
		d = document.cadastro;
		if (d.nome.value == "" || d.nome.value == "Digite seu nome completo aqui"){
			alert("O campo Nome deve ser preenchido!");
			d.nome.focus();
			return false;
		}
		
		//validar email
		if (d.email.value == "" || d.email.value == "E-mail"){
			alert("O campo E-mail deve ser preenchido!");
			d.email.focus();
			return false;
		}
		//validar email(verificao de endereco eletronico)
		parte1 = d.email.value.indexOf("@");
		parte2 = d.email.value.indexOf(".");
		parte3 = d.email.value.length;
		if (!(parte1 >= 3 && parte2 >= 6 && parte3 >= 9)) {
			alert("O campo " + d.email.name + " deve ser conter um endereco eletronico!");
			d.email.focus();
			return false;
		}
		//validar assunto
		if (d.assunto.value == "" || d.assunto.value == "Assunto"){
			alert("O campo Assunto deve ser preenchido!");
			d.assunto.focus();
			return false;
		}
		//validar mensagem
		if (d.mensagem.value == "" || d.mensagem.value == "Digite aqui sua mensagem"){
			alert("O campo Mensagem deve ser preenchido!");
			d.mensagem.focus();
			return false;
		}
		return true;
	}
	
	
