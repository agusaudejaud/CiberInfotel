// INICIALIZA DATATABLES ARTICULOS

$('document').ready(function(){
    $('#tab-articulos').DataTable();
});


// PERMITIR SOLO NUMEROS Y COMA, VALIDA MONEDA
function moneda(e){
    tecla = (document.all) ? e.keyCode : e.which;
    if ( tecla==0 || tecla==8 ) return true;
    //patron = /^[0-9]+([,][0-9]+)?$/;
    var patron= /^[0-9]+([.])?([0-9]+)?$/;
    te = String.fromCharCode(tecla);
    return patron.test(te);
}