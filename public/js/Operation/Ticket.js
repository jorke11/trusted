function Ticket() {
    var table;
    this.init = function () {
        table = this.table();
        $("#btnNew").click(this.new);
        $("#btnSave").click(this.save);

        $("#btnComment").click(this.openFormComment);
        $("#btnCommentSave").click(this.addComment);
        $("#btnAssociate").click(this.associateUser);
        $("#btnPause").click(this.pauseTicket);
        $("#btnPause").click(this.CloseTicket);
    }

    this.closeTicket = function () {
//        $("#btnAssociate").attr("disabled", true);
        var param = {};
        var token = $("input[name=_token]").val();

        $.ajax({
            url: 'ticket/close/' + $("#frm #id").val(),
            method: 'put',
            headers: {'X-CSRF-TOKEN': token},
            dataType: 'JSON',
            success: function (data) {
                if (data.success == true) {
                    $("#btnAssociate").attr("disabled", false);
                    $("#modalAssociate").modal("hide");
                    table.ajax.reload();
                    toastr.warning("Ticket finalizado Parcial");
                }
            }
        })
    }
    
    this.pauseTicket = function () {
//        $("#btnAssociate").attr("disabled", true);
        var param = {};
        var token = $("input[name=_token]").val();

        $.ajax({
            url: 'ticket/pause/' + $("#frm #id").val(),
            method: 'put',
            headers: {'X-CSRF-TOKEN': token},
            dataType: 'JSON',
            success: function (data) {
                if (data.success == true) {
                    $("#btnAssociate").attr("disabled", false);
                    $("#modalAssociate").modal("hide");
                    table.ajax.reload();
                    toastr.warning("Ticket finalizado Parcial");
                }
            }
        })
    }

    this.associateUser = function () {
        $("#btnAssociate").attr("disabled", true);
        var param = {};
        param.user_id = $("#frmAssociate #user_id").val();
        var token = $("input[name=_token]").val();

        $.ajax({
            url: 'ticket/associate/' + $("#frmAssociate #ticket_id").val(),
            method: 'put',
            data: param,
            headers: {'X-CSRF-TOKEN': token},
            dataType: 'JSON',
            success: function (data) {
                if (data.success == true) {
                    $("#btnAssociate").attr("disabled", false);
                    $("#modalAssociate").modal("hide");
                    table.ajax.reload();
                    toastr.success("Usuario asignado");
                }
            }
        })
    }

    this.openFormComment = function () {
        $("#frmComment #ticket_id").val($("#frm #id").val());
        $(".input-detail").cleanFields();
        $("#modalComment").modal("show");
    }

    this.addComment = function () {
        var data = {};
        data.comment = $("#frmComment #comment").val();
        data.ticket_id = $("#frm #id").val();

        console.log(data)

        $.ajax({
            url: '/ticket/addComment',
            method: 'POST',
            data: data,
            dataType: 'JSON',
            success: function (data) {
                if (data.success == true) {
                    toastr.success("Comentario ok")
                    $("#modalComment").modal("hide");
                    obj.reloadComments(data.detail);
                }
            }
        })
    }

    this.new = function () {
        $(".input-ticket").cleanFields();
        $("#tblComment tbody").empty();
    }

    this.save = function () {
        toastr.remove();
        var frm = $("#frm");
        var data = frm.serialize();
        var url = "", method = "";
        var id = $("#frm #id").val();
        var msg = '';

        var validate = $(".input-ticket").validate();

        if (validate.length == 0) {
            if (id == '') {
                method = 'POST';
                url = "ticket";
                msg = "Created Record";
            } else {
                method = 'PUT';
                url = "ticket/" + id;
                msg = "Edited Record";
            }

            $.ajax({
                url: url,
                method: method,
                data: data,
                dataType: 'JSON',
                success: function (data) {
                    if (data.success == true) {
                        $("#modalNew").modal("hide");
                        $(".input-ticket").setFields({data: data});
                        table.ajax.reload();
                        toastr.success(msg);
                    }
                }
            })
        } else {
            toastr.error("Fields Required!");
        }
    }

    this.showModal = function (id) {
        var frm = $("#frmEdit");
        var data = frm.serialize();
        var url = "/ticket/" + id + "/edit";
        $.ajax({
            url: url,
            method: "GET",
            data: data,
            dataType: 'JSON',
            success: function (data) {
                $('#myTabs a[href="#management"]').tab('show');

                if (data.header.status_id == 2) {
                    $("#btnPause").removeClass("hidden");
                } else {
                    $("#btnPause").addClass("hidden");
                }

                if (data.header.status_id == 3) {
                    $("#btnStop").removeClass("hidden");
                } else {
                    $("#btnStop").addClass("hidden");
                }

                $(".input-ticket").setFields({data: data.header});
                obj.reloadComments(data.detail);
            }
        })
    }

    this.reloadComments = function (data) {
        var html = "";

        $("#tblComment tbody").empty();

        $.each(data, function (i, val) {
            html += "<tr><td>" + val.id + "</td><td>" + val.comment + "</td><td>" + val.created_at + "</td><td>";
            html += '<span class="glyphicon glyphicon-comment" aria-hidden="true" onclick=obj.openFormComment() style="cursor:pointer"></span></td></tr>';
        })

        $("#tblComment tbody").html(html);
    }

    this.delete = function (id) {
        toastr.remove();
        if (confirm("Deseas eliminar")) {
            var token = $("input[name=_token]").val();
            var url = "/ticket/" + id;
            $.ajax({
                url: url,
                headers: {'X-CSRF-TOKEN': token},
                method: "DELETE",
                dataType: 'JSON',
                success: function (data) {
                    if (data.success == true) {
                        table.ajax.reload();
                        toastr.warning("Ok");
                    }
                }, error: function (err) {
                    toastr.error("No se puede borrra Este registro");
                }
            })
        }
    }

    this.table = function () {
        return $('#tbl').DataTable({
            processing: true,
            serverSide: true,
            ajax: "/api/listTicket",
            columns: [
                {data: "id"},
                {data: "subject"},
                {data: "created_at"},
                {data: "priority"},
                {data: "dependency"},
                {data: "responsible"},
                {data: "status"},
                {data: "id"},
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
                    targets: [7],
                    searchable: false,
                    mData: null,
                    mRender: function (data, type, full) {
                        var html = '<button class="btn btn-info btn-xs" onclick="obj.assign(' + full.id + ',' + full.dependency_id + ')"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></button>';
                        if ($("#role_id").val() == 3) {
                            html += '&nbsp;&nbsp;<button class="btn btn-danger btn-xs" onclick="obj.delete(' + full.id + ',' + full.dependency_id + ')"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>';
                        }


                        return html;
                    }
                }
            ],
        });
    }

    this.assign = function (id, dependency_id) {
        var html = '';
        var url = "/ticket/" + dependency_id + "/getUsers";

        $("#frmAssociate #ticket_id").val(id);

        $.ajax({
            url: url,
            method: "GET",
            dataType: 'JSON',
            success: function (data) {
                $("#user_id").empty();
                $.each(data, function (i, val) {
                    html += '<option value="' + val.id + '">' + val.name + ' ' + val.email + '</option>';
                })
                $("#user_id").html(html);
            }
        })


        $("#modalAssociate").modal("show");
        $("#frmAssociate #order_id").val(id);
    }



}

var obj = new Ticket();
obj.init();