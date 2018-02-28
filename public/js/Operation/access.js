function access() {
    var table;
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
                }
            })
        });


        $("#btnSave").click(this.save);

//        $("#document").blur(this.checkPerson)

        $("#tabList").click(obj.table);
    }



    this.checkPerson = function () {
        var value = this.value;
        $.ajax({
            url: PATH + '/accessPerson/validatePerson/' + value,
            type: 'get',
            dataType: 'JSON',
            success: function (data) {
                if (data.status == true) {
                    console.log("asd");
                }
            }
        })
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
                {data: "status_id", render: function (data, type, row) {
                        return (row.status_id == 1) ? 'Ingreso' : "Salio";
                    }
                },
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
                    targets: [14],
                    searchable: false,
                    mData: null,
                    mRender: function (data, type, full) {
                        return '<button class="btn btn-danger btn-xs" onclick="obj.delete(' + data.id + ')"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>';
                    }
                }
            ],
        });
    }

}

var obj = new access();
obj.init();