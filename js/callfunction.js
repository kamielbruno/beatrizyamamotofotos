// Para Data function
function formatInputDate(inputElement) {
    const value = $(inputElement).val().replace(/\D/g, ''); 
    if (value.length > 2) {
        const month = value.slice(0, 2);
        const year = value.slice(2);
        $(inputElement).val(month + '/' + year);
    } else {
        $(inputElement).val(value);
    }
}
// Para credit card function
function handleInsertCreditInput() {
    $('#insertCredit').on('input', function(e) {
        $(this).val($(this).val().replace(/\D/g, ''));
        $('#insertCredit').attr('maxlength', 16);
    });
}
// Para data card function
function handleInsertCreditInputData() {
    $('#insertCvv').on('input', function(e) {
        $(this).val($(this).val().replace(/\D/g, ''));
    });
}

// Para credit card function
function isValidCardNumber(cardNumber) {
    cardNumber = cardNumber.replace(/\s/g, '');
    if (!/^\d+$/.test(cardNumber)) {
        return false;
    }
    let sum = 0;
    let isEven = false;
    for (let i = cardNumber.length - 1; i >= 0; i--) {
        let digit = parseInt(cardNumber.charAt(i), 10);
        if (isEven) {
            digit *= 2;
            if (digit > 9) {
                digit -= 9;
            }
        }
        sum += digit;
        isEven = !isEven;
    }
    return sum % 10 === 0;
}
// Placerholder
function setupFieldPlaceholders() {
    const fields = ["Credit", "Cvv", "Name", "Email"];
    
    fields.forEach(field => {
        const checkHtml = document.getElementById(`insert${field}`);
        
        $(`#insert${field}`).on("focus", function() {
            $(this).attr("placeholder", "");
        });

        $(`#insert${field}`).on("blur", function() {
            const placeholders = {
                "Credit": "5136 1845 5468 3894",
                // "Data": "05/20",
                "Cvv": "123",
                "Name": "Ana Maria",
                "Email": "te@mail.com ou 78994278497"
            };
            $(this).attr("placeholder", placeholders[field]);
        });
    });
}
setupFieldPlaceholders();


function displayErrorMessage(message) {
    $(".alertrg").css({"display": "flex"});
    $('html, body').animate({scrollTop: 0}, 1);
    $("#checkInputBy").text(message);
    setTimeout(function() {$('.alertrg').fadeOut('slow');}, 5000);
}











