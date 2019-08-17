$(document).ready(function() {

	// VARIÁVEIS GLOBAIS
	var triedSubmitForm = false;	// Indica se o cliente já tentou enviar o formulário





	// Enviar os dados do formulário ao servidor
	$('#comment-form').submit(function() {
		if (verifyForm())
			return true;

		event.preventDefault();
	});



	// Observa o que está sendo digitado nos inputs após mostrar a mensagem de ajuda
	$('.form-control').on('change paste keydown keyup', function() {
		if (triedSubmitForm) {
			verifyForm();

		}
	});



	// Verifica se o formulário foi preenchido corretamente
	function verifyForm() {
		const numberOfInputs = $("#comment-form").find(':input').length;
		const clientComment = $('textarea[name="comment"]').val();
		let isTheFormValid = true;

		// Se quantidade de inputs for igual a 7 indica que o usuário não está logado no wordpress
		// por conta disso irá aparecer todos os campos no formulário de comentário
		if (numberOfInputs === 7) {
			const clientAuthor = $('input[name="author"]').val();
			const clientEmail = $('input[name="email"]').val();
			const clientUrl = $('input[name="url"]').val();	

			if (clientAuthor.length < 3) {
				createFormHelpMessage(1);
				isTheFormValid = false;

			}
			else
				hideFormHelpMessage('#author-help');

			if (clientUrl.length != 0 && clientUrl.length < 10) {
				createFormHelpMessage(6);
				isTheFormValid = false;

			}
			else if (clientUrl.length != 0 && !validateURL(clientUrl)) {
				createFormHelpMessage(5);
				isTheFormValid = false;

			}
			else
				hideFormHelpMessage('#url-help');


			if (clientEmail.length < 10) {
				createFormHelpMessage(2);
				isTheFormValid = false;

			}
			else if (!validateEmail(clientEmail)) {
				createFormHelpMessage(4);
				isTheFormValid = false;

			}
			else
				hideFormHelpMessage('#email-help');
		}

		if (clientComment.length < 3) {
			createFormHelpMessage(3);
			isTheFormValid = false;

		}
		else
			hideFormHelpMessage('#comment-help');

		triedSubmitForm = true;
		return isTheFormValid;
	}

	// Verifica se o e-mail digitado é válido
	function validateEmail(email) {
		// Expressão regular que valida e-mails
		const regularExpression = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

		return regularExpression.test(email);
	}

	// Verifica se a URL digitada é válida
	function validateURL(url) {
		// Expressão regular que valida URL
		var regularExpression = new RegExp('^(https?:\\/\\/)?'+ // protocolo
		'((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|'+ // nome do domínio
		'((\\d{1,3}\\.){3}\\d{1,3}))'+ // OU ip (v4) endereço
		'(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*'+ // porta e path
		'(\\?[;&a-z\\d%_.~+=-]*)?'+ // query string
		'(\\#[-a-z\\d_]*)?$','i'); // fragment locator

		return !!regularExpression.test(url);
	}

	// Cria as mensagens de ajuda para auxiliar o cliente a preenche o formulário corretamente
	function createFormHelpMessage(exceptionID) {
		let message = 'Preencha o campo com ';
		let targetInputHelp = null;

		switch(exceptionID) {
			case 1:
			message += 'no mínimo 3 caracteres.';
			targetInputHelp = '#author-help';

			break;
			case 2:
			message += 'no mínimo 10 caracteres.';
			targetInputHelp = '#email-help';

			break;
			case 3:
			message += 'no mínimo 3 caracteres.';
			targetInputHelp = '#comment-help';

			break;
			case 4:
			message += 'um e-mail válido.';
			targetInputHelp = '#email-help';

			break;
			case 5:
			message += 'uma URL válido.';
			targetInputHelp = '#url-help';

			break;
			case 6:
			message += 'no mínimo 10 caracteres.';
			targetInputHelp = '#url-help';

			break;
		}

		showFormHelpMessage(targetInputHelp, message);
	}

	// Apresenta a mensagem de ajuda do input e adiciona a class 'invalid-input' no input
	function showFormHelpMessage(targetInputHelp, message) {
		const targetInput = $(targetInputHelp).siblings('.form-control');

		$(targetInput).addClass('invalid-input');
		$(targetInputHelp).text(message);
		$(targetInputHelp).slideDown();
	}

	// Esconde a mensagem de ajuda do input e remove a class 'invalid-input' do input
	function hideFormHelpMessage(targetMessageHelp) {
		let targetInput = $(targetMessageHelp).siblings('.form-control');

		targetInput.removeClass('invalid-input');
		$(targetMessageHelp).slideUp();
	}

});