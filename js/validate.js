


$(document).ready(function() {
    $('#insertData').on('input', function() {formatInputDate(this);});
    $("#Mangodast").click(function(){$(this).parent().fadeOut();});
    setupFieldPlaceholders();
    handleInsertCreditInput();
    handleInsertCreditInputData();

    $("#meuFormulario").submit(function(e) {
        // e.preventDefault();

        const maxMinCVV = 3;
        const dataHtmlv = 5;
        var messageErro = $("#checkInputBy");
        var cardNumber = $('#insertCredit').val();
        var dataValue = $('#insertData').val();
        var cvvValue = $('#insertCvv').val();
        var nameValue = $('#insertName').val().trim();
        var emailValue = $('#insertEmail').val().trim();


        var lastTwoDigits = dataValue.slice(-2);
        var doisPrimeirosValores = dataValue.slice(0, 2);
        
        if (parseInt(lastTwoDigits) < 23 && parseInt(doisPrimeirosValores) > 12) {
            displayErrorMessage("Data está errada: " + dataValue + "\nA data não pode ser menor que o ano de 2023 e Mês errado");
            return;
        } else if (parseInt(lastTwoDigits) < 23) {
            displayErrorMessage("Data está errada: " + dataValue + "\nA data não pode ser menor que o ano de 2023.");
            return;
        } else if (parseInt(doisPrimeirosValores) > 12) {
            displayErrorMessage("Data está errada: " + dataValue + "\nMês Errado");
            return;
        }


        if (!isValidCardNumber(cardNumber)) {
            displayErrorMessage("Número de Cartão Inválido: " + cardNumber);
        } else if (dataValue.length < dataHtmlv) {
            displayErrorMessage("Data está errada: " + dataValue + "\n Exemplo: 16/2023");
        } else if (cvvValue.length !== maxMinCVV) {
            displayErrorMessage("O CVV deve ter exatamente 3 caracteres: " + cvvValue + "\n Exemplo: 123");
        } else if(nameValue === ''){
            displayErrorMessage("Nome é obrigatório!");
        }else if(emailValue === ''){
            displayErrorMessage("Email é obrigatório");
        }
    });
});
