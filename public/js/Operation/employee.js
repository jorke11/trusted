function Document() {
    var tableE;

    this.init = function () {
        tableE = obj.table();
        $("#dependency_id").click(this.usersDependency)
        $("#btnSave").click(this.save);
        $("#btnAddParameter").click(this.addParameter);

        $("#tabList").click(objE.table);
        $("#btnAddObservation").click(this.saveDelivery)
    }

    this.save = function () {
        var formData = new FormData($("#frm")[0]);
        $.ajax({
            url: 'employee/upload',
            type: 'POST',
            data: formData,
            processData: false,
            cache: false,
            contentType: false,
            dataType: 'JSON',
            beforeSend: function () {
                $(".cargando").removeClass("hidden");
            },
            success: function (data) {
                tableE.ajax.reload();
            }, error: function (xhr, ajaxOptions, thrownError) {
                //clearInterval(intervalo);
                console.log(thrownError)
                alert("Problemas con el archivo, informar a sistemas");
            }
        });
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

    this.table = function () {
        return $('#tbl').DataTable({
            processing: true,
            serverSide: true,
            destroy: true,
            ajax: "/api/listEmployee",
            columns: [
                {data: "id"},
                {data: "document"},
                {data: "name"},
                {data: "last_name"},
                {data: "position"},
                {data: "status_id"},
            ],
            order: [[1, 'ASC']],
            aoColumnDefs: [
                {
                    aTargets: [0, 1, 2, 3, 4, 5],
                    mRender: function (data, type, full) {
                        return '<a href="#" onclick="objE.showModal(' + full.id + ')">' + data + '</a>';
                    }
                },
                {
                    targets: 6,
                    searchable: false,
                    mData: null,
                    mRender: function (data, type, full) {

                        var html = ''
                        if (data.status_id == 2) {
                            html = '<button class="btn btn-success btn-xs" onclick=objE.openModalDeliveryStatus("' + $.trim(data.img_delivery) + '","' + (data.observation_delivery).replace(/ /g, "@#") + '") type="button"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></button>';

                        } else {
                            html = '<button class="btn btn-info btn-xs" onclick="objE.openModalDelivery(' + data.id + ')" type="button"><span class="glyphicon glyphicon-send" aria-hidden="true"></span></button>';
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

var objE = new Document();
objE.init();