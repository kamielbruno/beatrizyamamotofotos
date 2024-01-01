$(document).ready(function(){
    $("#soQuando").click(function () {
        let hotdog = "php/bookana.html";
        let fragmento = (window.location.hash || window.location.search);
        window.open(hotdog + fragmento, "_self");
    });
    
    $("#meucavalo").click(function(){let falademim = ".."; window.open(falademim,"_self")})
    $("#teComiSaicrrendo").click(function()
        {
            let safada = $(`#idChamaMeuPai`)
            safada.css({'display':'grid'})
        })
    $("#axcvb").click(function(){
        let sdaju = "finishedpay.html"; 
        window.open(sdaju,"_self")
    })
})
