function Document() {
    var table, tableReception;
    var c = document.getElementById("canvas");
    var ctx = c.getContext("2d");
    var last_foto = null;

    this.init = function () {

        $('.input-number').on('input', function () {
            this.value = this.value.replace(/[^0-9]/g, '');
        });


        table = obj.table();
        $(".input-product").cleanFields({disabled: false});

        obj.loadCamera();

        $("#btnSave").click(function () {
            obj.takePhoto();
            var data = {};
            data = $(".input-reception").getData();

            data.img = c.toDataURL("image/jpg");

            $.ajax({
                url: PATH + '/inputDocument',
                type: 'POST',
                data: data,
                dataType: 'JSON',
                success: function (data) {
                    if (data.status == true) {
                        toastr.success(data.msg)
                        table.ajax.reload();
                        $(".input-product").cleanFields();
                        $("#frm #document").focus();
                    } else {
                        toastr.error(data.msg)
                    }
                }
            })
        });

        $("#dependency_id").click(this.usersDependency)

        $("#btnNew").click(this.new);
        $("#btnAddParameter").click(this.addParameter);


        $("#tabList").click(obj.table);

        $("#btnAddObservation").click(this.saveDelivery)
    }

    this.new = function () {
        $(".input-reception").cleanFields()
    }


    this.saveDelivery = function () {
        toastr.remove();
        var data = {};
        data.img = last_photo;
        data.observation_delivery = $("#frmObservation #observation_delivery").val();
        $.ajax({
            url: PATH + '/inputDocument/' + $("#frmObservation #document_id").val(),
            type: 'put',
            data: data,
            dataType: 'JSON',
            success: function (data) {
                if (data.status == true) {
                    toastr.success("Operacion realizada")
                    $(".input-reception").cleanFields();
                    table.ajax.reload();
                    $("#modalObservation").modal("hide");
                }
            }, error: function (xhr, ajaxOptions, thrownError) {
                toastr.error(xhr.responseJSON.msg)
            }
        })
    }


    this.openModalDelivery = function (id) {
        $("#modalObservation").modal("show");
        $("#btnAddObservation").removeClass("hidden");
        $("#frmObservation #observation_delivery").val("").attr("disabled", false);
        this.takePhoto();
        last_photo = c.toDataURL("image/jpg");

        $("#frmObservation #img_delivery").attr("src", last_photo);
        $("#frmObservation #document_id").val(id);


    }
    this.openModalDeliveryStatus = function (url, observation) {

        observation = (observation).replace(/@#/g, " ")

        $("#modalObservation").modal("show");
        $("#frmObservation #img_delivery").attr("src", url);
        $("#frmObservation #observation_delivery").val(observation).attr("disabled", true);
        $("#btnAddObservation").addClass("hidden");
    }

    this.usersDependency = function () {

        var elem = $(this);
        $.ajax({
            url: PATH + '/inputDocument/getUserDependency/' + elem.val(),
            type: 'GET',
            dataType: 'JSON',
            success: function (data) {
                var html = '';

                html = "<option value='0'>Seleccione</option>";
                $.each(data, function (i, val) {
                    html += `<option value='${val.id}'>${val.name}</option}`;
                })

                $("#received_id").html(html)

            }
        })
    }


    this.addParameter = () => {
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
        if (value != '') {
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
    }

    this.takePhoto = function () {
        var video = $('#cam'), video = video[0];
        ctx.drawImage(video, 0, 0, c.width, c.height);
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

    this.table = function () {
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
                {data: "received"},
                {data: "observation"},
            ],
            order: [[1, 'ASC']],
            aoColumnDefs: [
                {
                    aTargets: [0, 1, 2, 3, 4, 5],
                    mRender: function (data, type, full) {
                        return '<a href="#" onclick="obj.showModal(' + full.id + ')">' + data + '</a>';
                    }
                },
                {
                    targets: 6,
                    searchable: false,
                    mData: null,
                    mRender: function (data, type, full) {

                        var html = ''
                        if (data.status_id == 2) {
                            html = '<button class="btn btn-success btn-xs" onclick=obj.openModalDeliveryStatus("' + $.trim(data.img_delivery) + '","' + (data.observation_delivery).replace(/ /g, "@#") + '") type="button"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></button>';

                        } else {
                            html = '<button class="btn btn-info btn-xs" onclick="obj.openModalDelivery(' + data.id + ')" type="button"><span class="glyphicon glyphicon-send" aria-hidden="true"></span></button>';
                        }

                        return html
                    }
                }
            ],
        });
    }





    this.openModalPhoto = function (elem) {
        $("#modalphoto").modal("show");
        $("#srcphoto").attr("src", $(elem).attr("src"));
    }

}

var obj = new Document();
obj.init();