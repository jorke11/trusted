function Access() {
    this.init = function () {
        $("#btn-search").click(this.search)
        $("#finit").datetimepicker({format: 'Y-m-d'});
        $("#fend").datetimepicker({format: 'Y-m-d'});
    }

    this.search = function () {
        var data = {};
        data.finit = $("#finit").val()
        data.fend = $("#fend").val()
        return $('#tbl').DataTable({
            processing: true,
            serverSide: true,
            destroy: true,
            ajax: {
                url: "/api/listReportAccess",
                data: data
            },
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
                {data: "img", render: function (data, type, row) {
                        return '<span class="glyphicon glyphicon-eye-open" aria-hidden="true" onclick=obj.openModalPhoto(this) src=' + row.img + ' style="cursor:pointer"></span>';
                    }
                },
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
                    targets: [15],
                    searchable: false,
                    mData: null,
                    mRender: function (data, type, full) {
                        return '<button class="btn btn-danger btn-xs" onclick="obj.delete(' + data.id + ')"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>';
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

var obj = new Access();
obj.init();