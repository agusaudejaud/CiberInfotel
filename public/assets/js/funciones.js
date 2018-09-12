$('document').ready(function(){

    // DATEPICKER CALENDARIO ESPAÑOL
    $( function() {
        $( ".date" ).datepicker({
            dateFormat: 'dd-mm-yy'//,
            // minDate: -5,
            //maxDate: "+0D"
        });
    });

    // CONFIGURACION ESPAÑOL
    $.datepicker.regional['es'] = {
        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'],
        dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
        dayNamesMin: ['Do', 'Lu', 'Ma', 'Mc', 'Ju', 'Vi', 'Sa']
    }
    $.datepicker.setDefaults($.datepicker.regional['es']);


    var months = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];

    // INDICES PARA SELECTS.

    var dayId = [
                    "id_select"
                ];

    var monthId = [
                    "id_select"
                ];

    var yearId = [
                    "id_select"
                ];


    var poopovers = [
                    ['help-1', 'texto numero 1'],
                    ['Indice', 'Contenido']
                ];
});

// ABRE UN MODAL Y REDIRECCIONA EN UN IFRAME LA URL INDICADA.
function cargar_modal(url){
  $("#modal-data").modal("show");
  $('#iframe').attr('src', url);
  $('#iframe').hide();
  $('#carga').show();
  document.getElementById("iframe").onload = function()
  {
    $('#iframe').show();
    $('#carga').hide();
  };
}

// PERMITE MOSTRAR U OCULTAR ELEMENTOS DE UNA PAGINA.
function show_content_articles(cont_view){
    for (var i = 0; i <= 10; i++) {
        var idcont = "#cont-"+i;
        $(idcont).hide();
        if (cont_view == idcont) {
            $(idcont).show();
            localStorage.setItem("idview", idcont);
        }
    }
}

// MUESTRA U OCULTA ABM MARCAS
function show_content_brand(cont_view){
  for (var i = 0; i <= 10; i++) {
      var idcont = "#cont-m"+i;
      $(idcont).hide();
      if (cont_view == idcont) {
          $(idcont).show();
      }
  }
}

// PERMITE RESTAURAR UNA VISTA, OCULTANDO EL DIV DEL SEGUNDO PARAMETRO Y MOSTRANDO EL DIV DEL PRIMER PARAMETRO.
function restore_view(indice_mostrar, indice_ocultar){
  $("#"+indice_ocultar).hide();
  $("#"+indice_mostrar).show();
}

// CARGAR DIAS MESES Y AÑOS EN LOS SELECTS INDICADOS EN LOS ARREGLOS dayId monthId yearId
function set_calendar(){
    var anos = (new Date).getFullYear();
    var max_days = 31;

    // CARGAR DIAS
    for (var indice = 0; indice < dayId.length; indice++) {

        var dia = "#"+dayId[indice];

        for (var count = 1; count <= max_days; count++) {
            num_dia = count;

            if (count < 10) {
                num_dia = "0"+count;
            }

            $(dia).append($('<option>', {
                value: count,
                text : num_dia
            }));

        }
    }

    // CARGAR MESES
    for (var indice = 0; indice < monthId.length; indice++) {

        var mes = "#"+monthId[indice];

        for (var count = 1; count <= 12; count++) {
            num_mes = count;

            if (count < 10) {
                num_mes = "0"+count;
            }

            $(mes).append($('<option>', {
                value: num_mes,
                text : num_mes+" ("+months[count-1]+")"
            }));
        }
    }

    // CARGAR AÑOS
    for (var indice = 0; indice < yearId.length; indice++) {

        var ano = "#"+yearId[indice];

        for (var count = anos; count >= "1900"; count--) {
            $(ano).append($('<option>', {
                value: count,
                text : count
            }));
        }
    }
}

// OBTIENE Y CARGA TODAS LAS PROVINCIAS DE ARGENTINA.
function set_province(){
    $.ajax({
        data:  {'listar_todo': true },
        type:  'post',
        url:   'funciones_php/get_provincias.php',
        success: function (response) {

                var res = $.parseJSON(response);
                var provincias = document.getElementById(provId);

                for (var i = 1; i < (res.length); i++) {
                    var newopt = document.createElement("option");
                    newopt.value = res[i]['id'];
                    newopt.text = res[i]['provincia'];
                    provincias.add(newopt);
                }

                provincias[7].selected = true;  // TILDAR COMO SELECT Entre Ríos POR DEFECTO

        }, error: function(err){
            //alert(err);
        }
    });
}

// OBTIENE Y CARGA TODAS LAS LOCALIDADES CORRESPONDIENTES A UNA PROVINCIA.
function set_cities(provId){
    try{

        if (id_provincia == "") throw "Ocurrio un Problema mientras se cargaban las localidades. recargue la pagina por favor.";

        $.ajax({
            data:  {'id_provincia': id_provincia },
            type:  'post',
            url:   'funciones_php/get_localidades.php',
            success: function (response) {
                    var res = $.parseJSON(response);
                    var localidades = document.getElementById('localidades');

                    while (localidades.options.length > 0) {
                        localidades.remove(0);
                    }

                    for (var i = 1; i < (res.length); i++) {
                        var newopt = document.createElement("option");
                        newopt.value = res[i]['id'];
                        newopt.text = res[i]['localidad'];
                        localidades.add(newopt);
                    }

                    if (id_provincia == '9') {
                        localidades[123].selected = true;  // TILDAR COMO SELECT Gualeguaychú POR DEFECTO CUANDO LA PROV SEA ENTRE RIOS
                    }

            }, error: function(err){
                //alert(err);
            }
        });

    }catch(err){
        alert(err);
    }
}

// AUTOINCREMENTAR ALTURA TEXTAREA
function auto_grow(element) {
    element.style.height = "8px";
    element.style.height = (element.scrollHeight)+"px";
}

// PERMITE SOLO NUMEROS.
function solo_numero(e){
    tecla = (document.all) ? e.keyCode : e.which;
    if ( tecla==0 || tecla==8 ) return true;
    patron = /^[0-9]+$/;
    te = String.fromCharCode(tecla);
    return patron.test(te);
}


// CONVIERTE EL TEXTO EN MAYUSCULAS
function uppercase(value) {
    value.toUpperCase();
    $(".uppercase").css("text-transform","uppercase");
}

// OBTENER TODOS LSO DATOS DE UN FORM EN UN ARRAY SERIALIZADO.
function dataForm(idForm) {
    var datos = $(idForm).serializeArray(),
           res = {};

    $.each(datos, function(i, v) {
        res[v.name] = v.value;
    });

    return res;
}

// CIFRAR CLAVE.
function get_hash(){
    var pass_nocifra = $("#pass_l").val();
    var pass_cifrado = sha256(pass_nocifra);
    $("#pass_cifrado").val(pass_cifrado);
    $("#form-login").submit();
}

// LIMPIAR UN FORMULARIO ESPECIFICO
function reset_form(idFormulario){

    $(idFormulario)[0].reset();
}

// CARGAR MARCAS.
function get_marcas(tipo_listado, id_marca = "", id_select){
    $.ajax({
        data:  { 'tipo_listado': tipo_listado, "id_marca": id_marca },
        type:  'post',
        url:   'funciones_php/get_marcas.php',
        success: function (response) {
                var res = $.parseJSON(response);
                for (var indice = 0; indice < id_select.length; indice++) {
                    $.each(res, function (i, item) {
                        $('#'+id_select[indice]).append($('<option>', {
                            value: item.id,
                            text : item.nombre
                        }));
                    });
                }
        }, error: function(err){
            //alert(err);
        }
    });
}

// CARGAR PROVEEDORES.
function get_provedores(tipo_listado, id_proveedor = "", id_select){
    $.ajax({
        data:  { 'tipo_listado': tipo_listado, "id_proveedor": id_proveedor },
        type:  'post',
        url:   'funciones_php/get_proveedores.php',
        success: function (response) {
                var res = $.parseJSON(response);
                for (var indice = 0; indice < id_select.length; indice++) {
                    $.each(res, function (i, item) {
                        $('#'+id_select[indice]).append($('<option>', {
                            value: item.id,
                            text : item.nombre
                        }));
                    });
                }
        }, error: function(err){
            //alert(err);
        }
    });
}

// CARGAR UNIDADES
function get_unidades(tipo_listado, id_unidad = "", id_select){
    $.ajax({
        data:  { 'tipo_listado': tipo_listado, "id_unidad": id_unidad },
        type:  'post',
        url:   'funciones_php/get_unidades.php',
        success: function (response) {
                var res = $.parseJSON(response);
                for (var indice = 0; indice < id_select.length; indice++) {
                    $.each(res, function (i, item) {
                        $('#'+id_select[indice]).append($('<option>', {
                            value: item.id,
                            text : item.nombre
                        }));
                    });
                }
        }, error: function(err){
            //alert(err);
        }
    });
}

// CARGAR CATEGORIAS
function get_categorias(tipo_listado, id_categoria = "", id_select){
    $.ajax({
        data:  { 'tipo_listado': tipo_listado, "id_categoria": id_categoria },
        type:  'post',
        url:   'funciones_php/get_categorias.php',
        success: function (response) {
                var res = $.parseJSON(response);
                for (var indice = 0; indice < id_select.length; indice++) {
                    $.each(res, function (i, item) {
                        $('#'+id_select[indice]).append($('<option>', {
                            value: item.id,
                            text : item.nombre
                        }));
                    });
                }
        }, error: function(err){
            //alert(err);
        }
    });
}

// CARGAR SUBCATEGORIAS
function get_subcategorias(categoria = "", id_select){

    var select = document.getElementById(id_select);

    while (select.options.length > 0) { select.remove(0); }
    if (categoria != "") {
        $.ajax({
            data:  { "categoria": categoria },
            type:  'post',
            url:   'funciones_php/get_subcategorias.php',
            success: function (response) {
                    var res = $.parseJSON(response);

                    if (res.length > 0 ) {
                        $.each(res, function (i, item) {
                            $('#'+id_select).append($('<option>', {
                                value: item.id,
                                text : item.nombre
                            }));
                        });
                    }else{
                        $('#'+id_select).append($('<option>', {
                            value: "",
                            text : "SELECCIONAR"
                        }));
                    }
            }, error: function(err){
                //alert(err);
            }
        });
    }else{
        $('#'+id_select).append($('<option>', {
            value: "",
            text : "SELECCIONAR"
        }));
    }

}

// EFECTUA EL ALTA DE UN ARTICULO
function alta_articulo(){
    var datos = dataForm("#form-alta-articulo");
    try{

        if (datos['nombre'] == "") throw "El nombre del Articulo no puede estar vacio.";
        if (datos['marca'] == "") throw "La Marca del Articulo no puede estar vacio.";
        if (datos['unidad_principal'] == "") throw "Debe indicar una Unidad Principal para el  Articulo.";
        if (datos['categoria'] == "") throw "Debe indicar una Categoria para el Articulo.";
        if (datos['subcategoria'] == "") throw "Debe indicar una Subcategoria para el Articulo.";

        if (confirm("Proceder con el alta del nuevo articulo?")) {
            $.ajax({
                data:  datos,
                type:  'post',
                url:   'funciones_php/put_articulo.php',
                success: function (response) {
                        var res = $.parseJSON(response);
                        if (res.success) {
                            alert(res.mensaje);
                            reset_form("#form-alta-articulo");
                        }else{
                            alert(res.mensaje);
                        }
                }, error: function(err){
                    //alert(err);
                }
            });
        }

    }catch(error){
        alert(error);
    }
}

// EFECTUA LA BAJA DE UN ARTICULO.
function baja_articulo(){
    var datos = dataForm("#form-baja-articulo");
    if (datos['articulo_elimina'] != "") {
        $.ajax({
            data:  datos,
            type:  'post',
            url:   'funciones_php/search_articulo.php',
            success: function (response) {
                    var res = $.parseJSON(response);
                    if (res.success) {
                        if (confirm("Proceder con la baja del articulo "+res.articulo+" ?")) {
                            var cod_articulo = "RB21-"+res.id_articulo+"-1156";
                            $.ajax({
                                data:  { 'action': "rem_articulo", "id_articulo": cod_articulo },
                                type:  'post',
                                url:   'funciones_php/rem_articulo.php',
                                success: function (response) {
                                    var res = $.parseJSON(response);
                                    if (res.success) {
                                        alert(res.mensaje);
                                        window.location.reload();
                                    }
                                }
                            });
                        }
                    }else{
                        alert("El articulo "+res.articulo+" Tiene un stock actualmente activo, por favor eliminelo para poder eliminar el insumo.");
                    }
            }, error: function(err){
                alert(err);
            }
        });

    }else{
        alert("Debe indicar un articulo para eliminar.");
    }
}

// CARGA LOS DATOS DEL ARTICULO SELECCIONADO PARA SU POSTERIOR EDICION.
function cargar_datos_articulo(){
    var datos = dataForm("#form-get-articulo-modifica");
    if (datos['articulo_modifica'] != "") {
        $.ajax({
            data:  datos,
            type:  'post',
            url:   'funciones_php/get_articulo.php',
            success: function (response) {
                    var res = $.parseJSON(response);
                    if (res.success) {
                        $("#box-search-article").hide();
                        $("#box-data-article").show();

                        $("#id_articulo_modifica").val(res.datos[0]['id']);
                        $("#articulo-en-edicion").html("<b>[ EDITAR "+res.datos[0]['nombre']+" ]</b>");
                        $("#nombre_modifica").val(res.datos[0]['nombre']);
                        $("#codigo_modifica").val(res.datos[0]['codigo']);
                        $("#marca_modifica").val(res.datos[0]['marca']);
                        $("#proveedor_modifica").val(res.datos[0]['proveedor']);
                        $("#unidad_minima_modifica").val(res.datos[0]['unidad_minima']);
                        $("#stock_minimo_modifica").val(res.datos[0]['stock_minimo']);
                        $("#descripcion_modifica").val(res.datos[0]['descripcion']);
                        $("#categoria_modifica").val(res.datos[0]['categoria']);

                        get_subcategorias(res.datos[0]['categoria'], "subcategoria_modifica");

                        setTimeout(function(){
                            $("#subcategoria_modifica").val(res.datos[0]['subcategoria']);
                        }, 200);

                    }else{
                        alert(res.mensaje);
                        $("#articulo_modifica").focus();
                        $("#articulo_modifica").val("");
                        $("#alert-error").show();
                    }
            }, error: function(err){
                //alert(err);
            }
        });
    }else{
        alert("Debe indicar un articulo para poder cargar y modificar. ");
        $("#articulo_modifica").focus();
        $("#articulo_modifica").val("");
    }
}

// GUARDA LOS CAMBIOS EFECTUADOS EN EL ARTICULO.
function modificar_articulo(){
    var datos = dataForm("#form-modifica-articulo");
    try{
        if (datos['id_articulo_modifica'] == "")
            throw "Se produjo un error mientras se procesaba la solicitud, por favor recargue la pagina e intente nuevamente.";
        if (datos['nombre_modifica'] == "")
            throw "El nombre no puede estar vacio, por favor ingrese uno. ";
        if (datos['marca_modifica'] == "")
            throw "La marca no puede estar vacia, por favor ingrese una.";
        if (datos['unidad_minima_modifica'] == "")
            throw "Debe indicar la unidad minima para el articulo.";
        if (datos['categoria_modifica'] == "")
            throw "La categoria no puede estar vacia, por favor seleccione una.";
        if (datos['subcategoria_modifica'] == "")
            throw "La subcategoria no puede estar vacia, por favor seleccione una.";

        if (confirm("Proceder con los cambios en el articulo?.")) {
            $.ajax({
                data:  datos,
                type:  'post',
                url:   'funciones_php/update_articulo.php',
                success: function (response) {
                    var res = $.parseJSON(response);
                    if (res.success) {
                      alert(res.mensaje);
                      window.location.reload();
                    }else{
                      alert(res.mensaje);
                    }
                }, error: function(err){
                    //alert(err);
                }
            });
        }

    }catch(error){
        alert(error);
    }
}

// OBTIENE Y CARGA TODOS LOS ARTICULOS CARGADOS
function get_articulos(tipo_listado, id_articulo = "", id_select){
    $.ajax({
        data:  { 'tipo_listado': tipo_listado, "id_articulo": id_articulo },
        type:  'post',
        url:   'funciones_php/get_articulos.php',
        success: function (response) {
               $('#'+id_select).html(response);
        }, error: function(err){
            //alert(err);
        }
    });
}

// PROCESAR EL ALTA DE UNA MARCA
function alta_marca(){
  var datos = dataForm("#form-alta-marca");
  try{
      if (datos['nombre'] == "") throw "El nombre de la Marca no puede estar vacio.";
      if (datos['proveedor'] == "") throw "El nombre del Proveedor no puede estar vacio.";

      if (confirm("Proceder con el alta de la Marca?")) {
          $.ajax({
              data:  datos,
              type:  'post',
              url:   'funciones_php/put_marca.php',
              success: function (response) {
                      var res = $.parseJSON(response);
                      if (res.success) {
                          alert(res.mensaje);
                          reset_form("#form-alta-marca");
                      }else{
                          alert(res.mensaje);
                      }
              }, error: function(err){
                  //alert(err);
              }
          });
      }

    }catch(err){
      alert(err);
    }
}

// CARGA LOS DATOS DE UNA MARCA SELECCIONADO PARA SU POSTERIOR EDICION.
function cargar_datos_marca(){
    var datos = dataForm("#form-get-marca-modifica");
    if (datos['marca_modifica'] != "") {
        $.ajax({
            data:  datos,
            type:  'post',
            url:   'funciones_php/get_marca.php',
            success: function (response) {
                    var res = $.parseJSON(response);
                    if (res.success) {
                        $("#box-search-marca").hide();
                        $("#box-data-marca").show();

                        $("#marca-en-edicion").html("<b>[ EDITAR "+res.datos[0]['nombre']+" ]</b>");
                        $("#id_marca").val(res.datos[0]['id']);
                        $("#marca_modificar").val(res.datos[0]['nombre']);
                        $("#proveedor_modifica").val(res.datos[0]['proveedor']);

                    }else{
                        alert(res.mensaje);
                        $("#marca_modificar").focus();
                        $("#marca_modificar").val("");
                        $("#alert-error").show();
                    }
            }, error: function(err){
                //alert(err);
            }
        });
    }else{
        alert("Debe indicar una marca para poder cargar y modificar. ");
        $("#marca_modifica").focus();
        $("#marca_modifica").val("");
    }
}

// GUARDA LOS CAMBIOS EFECTUADOS EN LA MARCA.
function modificar_marca(){
    var datos = dataForm("#form-modifica-marca");

    try{
        if (datos['id_marca'] == "")
            throw "Se produjo un error mientras se procesaba la solicitud, por favor recargue la pagina e intente nuevamente.";
        if (datos['nombre'] == "")
            throw "El nombre no puede estar vacio, por favor ingrese uno. ";
        if (datos['proveedor'] == "")
            throw "El Proveedor no puede estar vacia, por favor ingrese uno.";

        if (confirm("Proceder con los cambios en el articulo?.")) {
            $.ajax({
                data:  datos,
                type:  'post',
                url:   'funciones_php/update_marca.php',
                success: function (response) {
                    var res = $.parseJSON(response);
                    if (res.success) {
                      alert(res.mensaje);
                      window.location.reload();
                    }else{
                      alert(res.mensaje);
                    }
                }, error: function(err){
                    //alert(err);
                }
            });
        }
    }catch(error){
        alert(error);
    }

}
