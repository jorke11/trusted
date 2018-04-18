function access() {
    var table, tableReception;
    var c = document.getElementById("canvas");
    var ctx = c.getContext("2d");

    this.init = function () {

        $('.input-number').on('input', function () {
            this.value = this.value.replace(/[^0-9]/g, '');
        });


        table = obj.table();
        $(".input-product").cleanFields({disabled: false});

        obj.loadCamera();

        $("#btnNew").click(function () {
            obj.takePhoto();
            var data = {};
            data = $(".input-product").getData();
            data.img = c.toDataURL("image/jpg");

            $.ajax({
                url: PATH + '/accessPerson',
                type: 'POST',
                data: data,
                dataType: 'JSON',
                success: function (data) {
                    toastr.success("Registro ingresado")
                    table.ajax.reload();
                    $(".input-product").cleanFields();
                    $("#frm #document").focus();
                }
            })
        });

        $("#btnSave").click(this.save);
        $("#btnAddParameter").click(this.addParameter);

        $("#document").blur(this.checkPerson)

        $("#tabList").click(obj.table);

        $("#tabReception").click(this.tabDocument)
        $("#tabAuth").click(this.tabAuth)

        $("#btnSaveReception").click(this.saveReception);
        $("#btnNewReception").click(this.newReception)

        $("#btnSaveAuth").click(this.saveAuth);
        $("#btnNewAuth").click(this.newAuth)
    }

    this.newAuth = function () {
        $(".input-auth").cleanFields()
    }


    this.tabAuth = function () {
        tableReception = obj.tableAuth();
    }

    this.tabDocument = function () {
        tableReception = obj.tableReception()
        obj.takePhotoReception();
    }

    this.saveAuth = function () {

        var data = {};
        data = $(".input-auth").getData();

        $.ajax({
            url: PATH + '/accessPerson/authorization',
            type: 'POST',
            data: data,
            dataType: 'JSON',
            success: function (data) {
                toastr.success("Registro ingresado")
                tableReception.ajax.reload();
                $(".input-reception").cleanFields();
            }
        })
    }

    this.saveReception = function () {

        var data = {};
        data = $(".input-reception").getData();

        $.ajax({
            url: PATH + '/accessPerson/reception',
            type: 'POST',
            data: data,
            dataType: 'JSON',
            success: function (data) {
                toastr.success("Registro ingresado")
                tableReception.ajax.reload();
                $(".input-reception").cleanFields();
            }
        })
    }

    this.newReception = function () {
        $(".input-reception").cleanFields()
    }

    this.addParameter = function () {
        var data = {};
        data.group = $("#frmAddParameter #group_parameter").val();
        data.description = $("#frmAddParameter #description").val();
        var element_id = $("#frmAddParameter #element_id").val()

        $.ajax({
            url: PATH + '/accessPerson/addParameter',
            type: 'POST',
            data: data,
            dataType: 'JSON',
            success: function (data) {
                toastr.success("Paramatro ingresado")
//                $(".input-product").cleanFields();
                $("#frm #document").focus();
                $("#modalParameter").modal("hide");
                var html = '';
                $("#" + element_id).empty();
                html = "<option value='0'>Seleccione</option>";
                $.each(data.detail, function (i, val) {
                    html += "<option value='" + val.code + "'>" + val.description + "</option>";
                })

                $("#" + element_id).html(html)

            }
        })
    }

    this.showModalParameter = function (group_parameter, element_id) {
        $(".input-parameter").cleanFields();
        $("#frmAddParameter #group_parameter").val(group_parameter);
        $("#frmAddParameter #element_id").val(element_id);
        $("#modalParameter").modal("show");
    }


    this.checkPerson = function () {
        var value = this.value;
        $.ajax({
            url: PATH + '/accessPerson/validatePerson/' + value,
            type: 'get',
            dataType: 'JSON',
            success: function (data) {
                if (data.status == true) {
                    $(".input-product").setFields({data: data.row})
                }
            }
        })
    }

    this.takePhotoReception = function () {
        var video = $('#camReception'), video = video[0];
        ctx.drawImage(video, 0, 0, c.width, c.height);
    }

    this.takePhoto = function () {
        var video = $('#cam'), video = video[0];
        ctx.drawImage(video, 0, 0, c.width, c.height);
    }

    this.save = function () {
        toastr.remove();
        var data = {};
        $.ajax({
            url: PATH + '/accessPerson/' + $("#frm #document").val(),
            type: 'put',
            dataType: 'JSON',
            success: function (data) {
                if (data.status == true) {
                    toastr.success("Operacion realizada")
                    $(".input-product").cleanFields();
                    $("#frm #document").focus()
                    table.ajax.reload();
                }
            }, error: function (xhr, ajaxOptions, thrownError) {
                toastr.error(xhr.responseJSON.msg)
            }
        })
    }


    this.loadCamera = function () {
        var videoex;
        var video = document.getElementById('cam');
        // getUserMedia es el método que permite acceder al hardware multimedia del pc, este metodo está contenido dentro del objeto navig            ator 
        navigator.getUserMedia = (navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.msGetUserMedia || navigator.mozGetUserMedia);

        if (navigator.getUserMedia) {
            //como deseamos tener activado tanto audio, video, los ponemos en   true,
            //el segundo parámetro será una función a la cual le pondremos videocam como parámetro, el cual recibe el video a visu             alizar
//                navigator.getUserMedia({audio: true, video: true}, function (videocam) {
            navigator.getUserMedia({video: true}, function (videocam) {
                video.src = window.URL.createObjectURL(videocam);
                video.play();
                videoex = videocam;
            }, function (e) {
                console.log(e);
            });
        } else {
            alert('tu nav egador no es  c o m patible');
        }
        return videoex;
    }

    this.tableAuth = function () {
        return $('#tblAuth').DataTable({
            processing: true,
            serverSide: true,
            destroy: true,
            ajax: "/api/listAuth",
            columns: [
                {data: "id"},
                {data: "document"},
                {data: "reason"},
                {data: "status"},
            ],
            order: [[1, 'ASC']],
            aoColumnDefs: [
                {
                    aTargets: [0, 1, 2, 3],
                    mRender: function (data, type, full) {
                        return '<a href="#" onclick="obj.showModal(' + full.id + ')">' + data + '</a>';
                    }
                },
                {
                    targets: 4,
                    searchable: false,
                    mData: null,
                    mRender: function (data, type, full) {
                        return '<button class="btn btn-danger btn-xs" onclick="obj.delete(' + data.id + ')"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>';
                    }
                }
            ],
        });
    }

    this.tableReception = function () {
        return $('#tblReception').DataTable({
            processing: true,
            serverSide: true,
            destroy: true,
            ajax: "/api/listReception",
            columns: [
                {data: "id"},
                {data: "reception_element"},
                {data: "sender"},
                {data: "dependency"},
                {data: "received_id"},
                {data: "observation"},
            ],
            order: [[1, 'ASC']],
            aoColumnDefs: [
                {
                    aTargets: [0, 1, 2, 3],
                    mRender: function (data, type, full) {
                        return '<a href="#" onclick="obj.showModal(' + full.id + ')">' + data + '</a>';
                    }
                },
                {
                    targets: 6,
                    searchable: false,
                    mData: null,
                    mRender: function (data, type, full) {
                        return '<button class="btn btn-danger btn-xs" onclick="obj.delete(' + data.id + ')"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>';
                    }
                }
            ],
        });
    }

    this.table = function () {
        return $('#tbl').DataTable({
            processing: true,
            serverSide: true,
            destroy: true,
            ajax: "/api/listAccess",
            columns: [
                {data: "id"},
                {data: "first_name"},
                {data: "second_name"},
                {data: "last_name"},
                {data: "second_surname"},
                {data: "document"},
                {data: "eps"},
                {data: "arl"},
                {data: "created_at"},
                {data: "updated_at"},
                {data: "type_blood"},
                {data: "dependency"},
                {data: "authorization_person"},
                {data: "img", searchable: false, render: function (data, type, row) {
                        return '<span class="glyphicon glyphicon-eye-open" aria-hidden="true" onclick=obj.openModalPhoto(this) src=' + row.img + ' style="cursor:pointer;color:black"></span>';
                    }
                },
                {data: "status_id", render: function (data, type, row) {
                        return "<span style='color:black'>" + ((row.status_id == 1) ? 'Ingreso' : "Salio") + "</span>";

                    }
                },
            ],
            order: [[1, 'ASC']],
            aoColumnDefs: [
                {
                    aTargets: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14],
                    mRender: function (data, type, full) {
                        return '<a href="#" onclick="obj.showModal(' + full.id + ')">' + data + '</a>';
                    }
                },
                {
                    targets: [15],
                    searchable: false,
                    mData: null,
                    mRender: function (data, type, full) {
                        var html = ""
                        if (data.status_id == 1) {
                            html = '<button class="btn btn-danger btn-xs" onclick="obj.delete(' + data.document + ')"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>';
                        }

                        return  html;
                    }
                }
            ],
        });
    }

    this.delete = function (document) {
        toastr.remove();
        var data = {};
        $.ajax({
            url: PATH + '/accessPerson/' + document,
            type: 'put',
            dataType: 'JSON',
            success: function (data) {
                if (data.status == true) {
                    toastr.success("Operacion realizada")
                    $(".input-product").cleanFields();
                    $("#frm #document").focus()
                    table.ajax.reload();
                }
            }, error: function (xhr, ajaxOptions, thrownError) {
                toastr.error(xhr.responseJSON.msg)
            }
        })
    }

    this.openModalPhoto = function (elem) {
        $("#modalphoto").modal("show");
        $("#srcphoto").attr("src", $(elem).attr("src"));
    }

}

var obj = new access();
obj.init();