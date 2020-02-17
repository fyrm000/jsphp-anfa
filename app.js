$(() => {

    console.log("OK JS");


    let countTeam = '';
    let flag = false;
    let dataFormV = {};
    let editar = false;
    let id = '';


    $(document).on("click", "#buttonAddTeam", () => {
        $("#addTeam").modal("show");
    });

    $('#valueSearch').blur(function (e) {
        $('#resultado').html(`<h3>${countTeam} equipos registrados<h3>`);
    });

    $(document).on('click', '#buttonAddLiga', () => {
        console.log('Liga');
        $('#addLiga').modal('show');
    })





    //Detalle de Equipos

    $(document).ready(() => {
        $(document).on('click', '#detailTeam', function () {
            $('#detailTeamModal').modal('show');
            let idDe = $(this).closest('tr').children('td.idTeam').text();
            let nombre = $(this).closest('tr').children('td.nombreTeam').text();
            let ciudad = $(this).closest('tr').children('td.ciudadTeam').text();
            let comuna = $(this).closest('tr').children('td.comunaTeam').text();
            let posicion = $(this).closest('tr').children('td.posicionTeam').text();
            let puntos = $(this).closest('tr').children('td.puntosTeam').text();
            let gfavor = $(this).closest('tr').children('td.gfavorTeam').text();
            let gcontra = $(this).closest('tr').children('td.gcontraTeam').text();
            let dgoles = $(this).closest('tr').children('td.dgolesTeam').text();
            let nliga = $(this).closest('tr').children('td.nligaTeam').text();

            $('#titleDetail').html(`Información del equipo: ${nombre}`);

            let template = `
            <div class="row">
            <div class="col-sm-6">
            <ul class="list-group">
            <h4>Detalles del Equipo:</h4>
            <li class="list-group-item d-flex justify-content-between align-items-center">Nombre del equipo: <span class="badge badge-primary badge-pill">${nombre}</span></li>
            <li class="list-group-item d-flex justify-content-between align-items-center">Comuna:<span class="badge badge-primary badge-pill">${comuna}</span></li>
            <li class="list-group-item d-flex justify-content-between align-items-center">Localidad:<span class="badge badge-primary badge-pill">${ciudad}</span></li>
            <li class="list-group-item d-flex justify-content-between align-items-center">Posición:<span class="badge badge-success badge-pill">${posicion}</span></li>
            <li class="list-group-item d-flex justify-content-between align-items-center">Puntos:<span class="badge badge-primary badge-pill">${puntos}</span></li>
            <li class="list-group-item d-flex justify-content-between align-items-center">Goles a favor:<span class="badge badge-secondary badge-pill">${gfavor}</span></li>
            <li class="list-group-item d-flex justify-content-between align-items-center">Goles en contra:<span class="badge badge-danger badge-pill">${gcontra}</span></li>
            <li class="list-group-item d-flex justify-content-between align-items-center">Diferencia de goles:<span class="badge badge-primary badge-pill">${dgoles}</span></li>
            <li class="list-group-item d-flex justify-content-between align-items-center">Nombre de la Liga:<span class="badge badge-info badge-pill">${nliga}</span></li>
            </ul></div>
            <div class="col-sm-6 imgTeam">
            <form class="form-group" id="formUpload" method="post" enctype="multipart/form-data">
                <input type="hidden" id="idDetail" name="id" value="${idDe}">
               <div class="custom-file">
               <input class="custom-file-input" type="file" id="customFile" name="file" placceholder="Subir logo del Equipo">
               <label class="custom-file-label" for="customFile" >Elegir Logo</label>
               <button type="submit" class="btn btn-secondary btn-block btn-sm" id="btnUpload">Cargar Logo</button>
               </div>
            </form>
            </div>
            </div>
        `;

            $('#bodyDetail').html(template);

            uploadImg();
        })
    })




    // Validar Entradas

    const validate = () => {
        let nombre = $('#nombre').val();
        if (editar) {
            dataFormV = {
                'nombre': $('#enombre').val(),
                'comuna': $('#ecomuna').val(),
                'ciudad': $('#eciudad').val(),
                'puntos': $('#epuntos').val(),
                'posicion': $('#eposicion').val()
            };
        } else {
            dataFormV = {
                'nombre': $('#nombre').val(),
                'comuna': $('#comuna').val(),
                'ciudad': $('#ciudad').val(),
                'puntos': $('#puntos').val(),
                'posicion': $('#posicion').val()
            };
        }

        if (dataFormV.nombre === '') {
            alert("Ingrese el nombre del equipo")
            return;
        } else if (dataFormV.comuna === '') {
            alert("Ingrese la comuna del equipo")
            return;
        } else if (dataFormV.ciudad === '') {
            alert("Ingrese la ciudad del equipo")
            return;
        } else if (dataFormV.puntos === '') {
            alert("Ingrese la cantidad de puntos del equipo")
            return;
        } else if (dataFormV.posicion === '') {
            alert("Ingrese la posicion del equipo")
            return;
        }
        flag = true;
    }


    //Agregar Equipo

    $(document).ready(() => {
        $('#addTeam').submit(e => {
            e.preventDefault();
            editar = false;
            validate();
            if (flag) {
                let dataForm = {
                    'nombre': $('#nombre').val(),
                    'comuna': $('#comuna').val(),
                    'ciudad': $('#ciudad').val(),
                    'posicion': $('#posicion').val(),
                    'puntos': $('#puntos').val()
                };


                $.post('/inc/addTeam.php', dataForm, res => {
                    // console.log(res);
                    getTeam();

                })


                $("#addTeam").modal("hide");
                // getTeam();
            } else {
                return;
            }

        });
    });

    //Mostrar Equipos

    const getTeam = () => {
        $.ajax({
            method: "GET",
            url: "/inc/getTeam.php",
            success: res => {
                let template = ``;
                let teams = $.parseJSON(res);
                countTeam = teams.length;
                teams.forEach(team => {
                    template += `
                    <tr id="trTeam">
                    <td class="idTeam"><span class="badge badge-secondary badge-pill">${team.id}</span></td>
                    <td class="nombreTeam">${team.nombre}</td>
                    <td class="comunaTeam">${team.comuna}</td>
                    <td class="ciudadTeam">${team.ciudad}</td>
                    <td class="posicionTeam"><span class="badge badge-success badge-pill">${team.posicion}</span></td>
                    <td class="puntosTeam"><span class="badge badge-primary badge-pill">${team.puntos}</span></td>
                    <td>
                    <button class="btn btn-outline-info btn-sm detail-team" id="detailTeam" style='width:70px;'>Detalles</button>
                    <button class="btn btn-outline-secondary btn-sm editTeam" style='width:70px;'>Editar</button>
                    <button type="submit" class="btn btn-outline-danger btn-sm deleteTeam" style='width:35px;'>X</button></td>
                    <td class="gfavorTeam" style="display:none;">${team.gfavor}</td>
                    <td class="gcontraTeam" style="display:none;">${team.gcontra}</td>
                    <td class="dgolesTeam" style="display:none;">${team.dgoles}</td>
                    <td class="nligaTeam" style="display:none;">${team.nliga}</td>
                    </tr>
                `;
                });
                $('#resultado').html(`<h3>${countTeam} equipos registrados<h3>`);
                $("#table-teams").html(template);
            }
        });
        // let fila = $('#tableTeam').find('tbody > tr')
        // console.log(fila);
    };


    //Editar Equipo


    $(document).on('click', '.editTeam', function () {
        $('#editTeam').modal('show');
        editar = true;
        id = $(this).closest('tr').children('td.idTeam').text();
        let nombre = $(this).closest('tr').children('td.nombreTeam').text();
        let ciudad = $(this).closest('tr').children('td.ciudadTeam').text();
        let comuna = $(this).closest('tr').children('td.comunaTeam').text();
        let posicion = $(this).closest('tr').children('td.posicionTeam').text();
        let puntos = $(this).closest('tr').children('td.puntosTeam').text();
        $('#enombre').val(nombre);
        $('#eciudad').val(ciudad);
        $('#ecomuna').val(comuna);
        $('#eposicion').val(posicion);
        $('#epuntos').val(puntos);

        // console.log("LLego");
        $("#titleModal").html(`Editar el equipo: ${nombre}`)
    })

    $('#editTeam').submit(function (e) {
        e.preventDefault();

        validate();

        if (flag) {
            let dataForm = {
                id: id,
                nombre: $('#enombre').val(),
                ciudad: $('#eciudad').val(),
                comuna: $('#ecomuna').val(),
                posicion: $('#eposicion').val(),
                puntos: $('#epuntos').val()
            }

            $.post('/inc/editTeam.php', dataForm, function (res) {
                // console.log(res);
                getTeam();
            })

            $("#editTeam").modal("hide");
        } else {
            return;
        }


    })

    //Eliminar Equipo

    $(document).on('click', '.deleteTeam', function () {
        if (confirm('Desea eliminar el equipo...')) {
            let id = $(this).closest('tr').children('td.idTeam').text();
            $.post('/inc/deleteTeam.php', { id: id }, (res) => {
                getTeam();
            });

        }

    });


    //Buscar Equipo

    $('#valueSearch').keyup(function (e) {
        let value = $('#valueSearch').val();
        // console.log(value);
        $.post('/inc/searchTeam.php', { nombre: value }, function (res) {

            let template = ``;
            // console.log(res);
            let teams = $.parseJSON(res);

            if (!teams.length < 1) {
                $('#resultado').html(`<h3>${teams.length} equipos encontrados<h3>`);
                teams.forEach(team => {
                    template += `
                    <tr id="trTeam">
                    <td class="idTeam"><span class="badge badge-secondary badge-pill">${team.id}</span></td>
                    <td class="nombreTeam">${team.nombre}</td>
                    <td class="comunaTeam">${team.comuna}</td>
                    <td class="ciudadTeam">${team.ciudad}</td>
                    <td class="posicionTeam"><span class="badge badge-success badge-pill">${team.posicion}</span></td>
                    <td class="puntosTeam"><span class="badge badge-primary badge-pill">${team.puntos}</span></td>
                    <td>
                    <button class="btn btn-outline-info btn-sm detail-team" id="detailTeam" style='width:70px;' >Detalles</button>
                    <button class="btn btn-outline-secondary btn-sm editTeam" style='width:70px;'>Editar</button>
                    <button type="submit" class="btn btn-outline-danger btn-sm deleteTeam" style='width:35px;'>X</button></td>
                    <td class="gfavorTeam" style="display:none;">${team.gfavor}</td>
                    <td class="gcontraTeam" style="display:none;">${team.gcontra}</td>
                    <td class="dgolesTeam" style="display:none;">${team.dgoles}</td>
                    <td class="nligaTeam" style="display:none;">${team.nLiga}</td>
                    </tr>
                `;
                });

            } else {
                $('#resultado').html(`
                <div class="alert alert-warning">
                <h3>Sin Resultados<h3>
                </div>
                `);
            }

            $("#table-teams").html(template);
        });
    });

    //Subir imagen

    const uploadImg = () => {
        $(".custom-file-input").on("change", function () {
            let fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            console.log("UploadImg");
        })

        $('#formUpload').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                url: '/inc/uploadLogo.php',
                type: 'POST',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (res) {
                    console.log(res);
                }
            })
        });
    }

    //---------------------------------------LIGA----------------------------------

    const getLiga = () => {
        $.get('/inc/getLeage.php', function (res) {
            let json = JSON.parse(res);
            let template = ``;
            console.log(json);

            json.forEach(liga => {
                template += `
                <tr>
                <td><span class="badge badge-secondary badge-pill">${liga.idLiga}</span></td>
                <td>${liga.nombreLiga}</td>
                <td>${liga.comunaLiga}</td>
                </tr>
                `;
            })

            $('#table-liga').html(template);
        })
    }

    const home = () => {
        $('#contenido').load('./view/home.php');

    }

    $('#loadHome').on('click', function () {
        $('#contenido').load('./view/home.php');
        getTeam();
    })

    //Cargar Ligas

    $('#loadLiga').on('click', function (e) {
        $('#contenido').load('./view/liga.php');
        getLiga();
    })




    //Funcion mostrar equipos
    home();
    getTeam();

})
