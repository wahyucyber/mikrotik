@extends('_layouts.main')

@section('content')
<div class="row">
    <div class="col-md-5">
        <div class="x_panel">
            <div class="x_title"><i class="fa fa-user"></i> Admin</div>
            <div class="x_content">
                <form action="" class="admin--account form-horizontal">
                    <div class="form-group row">
                        <label for="" class="control-label col-md-3">Nama <span class="required">*</span></label>
                        <div class="col-md-9">
                            <input type="text" name="" id="" class="form-control nama " autofocus maxlength="50" placeholder="Nama">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="control-label col-md-3">Username <span class="required">*</span></label>
                        <div class="col-md-9">
                            <input type="text" name="" id="" class="form-control username " maxlength="100" placeholder="Username">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="control-label col-md-3">Password <span class="required">*</span></label>
                        <div class="col-md-9">
                            <input type="password" name="" id="" class="form-control password " maxlength="50" placeholder="Password">
                        </div>
                    </div>
                    <div class="col-md-3"></div>
                    <div class="col-md-9">
                        <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-save"></i> Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-7">
        <div class="x_panel">
            <div class="x_title">
                <i class="fa fa-tasks"></i> Router List
            </div>
            <div class="x_body">
                <div class="row">
                    <div class="col-md-12 mt-1">
                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus"></i> Tambah</button>
                    </div>
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped jambo_table bulk_action router-list">
                                <thead>
                                    <tr>
                                        <th>Session Name</th>
                                        <th>Host (IP Mikrotik)</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="x_footer">
                <div class="row">
                    <div class="col-md-6">
                        <div class="pagination">
                            <div class="first--page"><i class="fa fa-angle-double-left"></i></div>
                            <div class="previous--page"><i class="fa fa-angle-left"></i></div>
                            <div style="border-right: 1px solid #ddd; border-left: 1px solid #ddd;">
                                Hal <span class="page">1</span> Dari <span class="total-rows">1</span>
                            </div>
                            <div class="next--page"><i class="fa fa-angle-right"></i></div>
                            <div class="last--page"><i class="fa fa-angle-double-right"></i></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="" placeholder="Cari Session Name" id="" class="form-control search">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="tambah">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Tambah Router List
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" class="tambah">
                    <div class="row">
                        <div class="col-md-12 errors">
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="" class="control-label">Session Name <span class="required">*</span></label>
                                <input type="text" name="" id="" class="form-control session-name">
                                <span class="help-block">Contoh: My Mikrotik</span>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="" class="control-label">Host Mikrotik <span class="required">*</span></label>
                                <input type="text" name="" id="" class="form-control host-mikrotik">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" class="control-label">Port API Mikrotik <span class="required">*</span></label>
                                <input type="text" name="" id="" class="form-control port-api-mikrotik" value="8728">
                                <span class="help-block">Default: 8728</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="control-label">Username <span class="required">*</span></label>
                                <input type="text" name="" id="" class="form-control username">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="control-label">Password <span class="required">*</span></label>
                                <input type="password" name="" id="" class="form-control password">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-success btn-block"><i class="fa fa-save"></i> Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Edit Router List
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" class="edit">
                    <input type="hidden" name="" class="id">
                    <div class="row">
                        <div class="col-md-12 errors"></div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="" class="control-label">Session Name <span class="required">*</span></label>
                                <input type="text" name="" id="" class="form-control session-name">
                                <span class="help-block">Contoh: My Mikrotik</span>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="" class="control-label">Host Mikrotik <span class="required">*</span></label>
                                <input type="text" name="" id="" class="form-control host-mikrotik">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" class="control-label">Port API Mikrotik <span class="required">*</span></label>
                                <input type="text" name="" id="" class="form-control port-api-mikrotik" value="8728">
                                <span class="help-block">Default: 8728</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="control-label">Username <span class="required">*</span></label>
                                <input type="text" name="" id="" class="form-control username">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="control-label">Password <span class="required">*</span></label>
                                <input type="password" name="" id="" class="form-control password">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-success btn-block"><i class="fa fa-save"></i> Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script type="text/javascript">
        class Dashboard extends App {
            constructor() {
                super();
                this.get();
            }

            get() {
                $("table.router-list tbody").html(`
                    <tr>
                        <td colspan="3" align="center">
                            <img src="{{ base_url("assets/build/images/loading.gif") }}" style="height: 20%;"> Memuat Database.
                        </td>
                    </tr>
                `);
                this.http({
                    method: 'GET',
                    url: "router",
                    data: {
                        page: $("div.pagination span.page").html(),
                        search: $("input.search").val()
                    }
                }, e => {
                    let data = ``;
                    let no = 1;
                    $.each(e.data, function (index, value) { 
                        let is_default = `<span class="badge badge-success"><i class="fa fa-check-circle"></i> Aktif</span>`;
                        if(value.is_default == 0) {
                            is_default = `<span class="badge badge-danger"><i class="fa fa-times-circle"></i> Tidak Aktif</span>`;
                        }

                        let set_default = ` | <a href="javascript:;" class="action--data text-success action--set_default" data-id="${value.id}"><i class="fa fa-check-circle-o"></i> Atur Sebagai Default</a>`;

                        if(value.is_default == 1) {
                            set_default = ``;
                        }

                         data += `
                            <tr>
                                <td>
                                    <b>${value.session_name}</b>
                                    <br>
                                    <a href="" class="action--data text-primary action--edit" data-id="${value.id}" data-session_name="${value.session_name}" data-host="${value.host}" data-port="${value.port}" data-username="${value.username}" data-password="${value.password}" data-toggle="modal" data-target="#edit"><i class="fa fa-edit"></i> Edit</a> | <a href="javascript:;" class="action--data text-danger dropdown-toggle" data-toggle="dropdown"
                      aria-haspopup="false" aria-expanded="false"><i class="fa fa-trash-o"></i> Hapus</a><div class="dropdown-menu"><a class="dropdown-item action--delete" href="javascript:;" data-id="${value.id}">Hapus</a></div>${set_default}
                                </td>
                                <td>${value.host}</td>
                                <td>
                                    ${is_default}
                                </td>
                            </tr>
                         `;
                    });

                    if(e.data.length == 0) {
                        data = `
                        <tr>
                            <td colspan="3" align="center">
                                Data tidak ada.
                            </td>
                        </tr>
                        `;
                    }

                    $("table.router-list tbody").html(data);

                    $("div.pagination span.page").html(e.pagination.page);
                    $("div.pagination span.total-rows").html(e.pagination.total_row);
                })
            }

            post() {
                let session = $("form.tambah input.session-name").val();
                let host = $("form.tambah input.host-mikrotik").val();
                let port = $("form.tambah input.port-api-mikrotik").val();
                let username = $("form.tambah input.username").val();
                let password = $("form.tambah input.password").val();

                if(session == "") {
                    this.notif({
                        element: "form.tambah div.errors",
                        type: "danger",
                        text: "Session Name belum diisi."
                    });
                }else if(host == "") {
                    this.notif({
                        element: "form.tambah div.errors",
                        type: "danger",
                        text: "Host Mikrotik belum diisi."
                    });
                }else if(port == "") {
                    this.notif({
                        element: "form.tambah div.errors",
                        type: "danger",
                        text: "Port API Mikrotik belum diisi."
                    });
                }else if(username == "") {
                    this.notif({
                        element: "form.tambah div.errors",
                        type: "danger",
                        text: "Username belum diisi."
                    });
                }else if(password == "") {
                    this.notif({
                        element: "form.tambah div.errors",
                        type: "danger",
                        text: "Password belum diisi."
                    });
                }else {
                    this.http({
                        method: "POST",
                        url: "router",
                        data: {
                            session: session,
                            host: host,
                            port: port,
                            username: username,
                            password: password
                        }
                    }, e => {

                        if(e.status == false) {
                            this.notif({
                                element: "form.tambah div.errors",
                                type: "danger",
                                text: e.error
                            });
                        }else{
                            $("form.tambah input.session-name").val(``);
                            $("form.tambah input.host-mikrotik").val(``);
                            $("form.tambah input.port-api-mikrotik").val(`8728`);
                            $("form.tambah input.username").val(``);
                            $("form.tambah input.password").val(``);

                            $("form.tambah div.errors").html(``);
                            $("div#tambah").modal('hide');

                            dashboard.get();
                        }
                    })
                }
            }

            put() {
                let id = $("form.edit input.id").val();
                let session = $("form.edit input.session-name").val();
                let host = $("form.edit input.host-mikrotik").val();
                let port = $("form.edit input.port-api-mikrotik").val();
                let username = $("form.edit input.username").val();
                let password = $("form.edit input.password").val();

                if(session == "") {
                    this.notif({
                        element: "form.edit div.errors",
                        type: "danger",
                        text: "Session Name belum diisi."
                    });
                }else if(host == "") {
                    this.notif({
                        element: "form.edit div.errors",
                        type: "danger",
                        text: "Host Mikrotik belum diisi."
                    });
                }else if(port == "") {
                    this.notif({
                        element: "form.edit div.errors",
                        type: "danger",
                        text: "Port API Mikrotik belum diisi."
                    });
                }else if(username == "") {
                    this.notif({
                        element: "form.edit div.errors",
                        type: "danger",
                        text: "Username belum diisi."
                    });
                }else if(password == "") {
                    this.notif({
                        element: "form.edit div.errors",
                        type: "danger",
                        text: "Password belum diisi."
                    });
                }else {
                    this.http({
                        method: "PUT",
                        url: "router",
                        data: {
                            id: id,
                            session: session,
                            host: host,
                            port: port,
                            username: username,
                            password: password
                        }
                    }, e => {

                        if(e.status == false) {
                            this.notif({
                                element: "form.edit div.errors",
                                type: "danger",
                                text: e.error
                            });
                        }else{
                            $("form.edit input.id").val(``);
                            $("form.edit input.session-name").val(``);
                            $("form.edit input.host-mikrotik").val(``);
                            $("form.edit input.port-api-mikrotik").val(``);
                            $("form.edit input.username").val(``);
                            $("form.edit input.password").val(``);

                            $("form.edit div.errors").html(``);
                            $("div#edit").modal('hide');

                            dashboard.get();
                        }
                    })
                }
            }

            delete(params = []) {
                this.http({
                    method: "DELETE",
                    url: "router",
                    data: params
                }, e => {
                    dashboard.get();
                })
            }

            set_default(params = []) {
                this.http({
                    method: "PUT",
                    url: "router/default",
                    data: params
                }, e => {
                    dashboard.get();
                })
            }
        }

        var dashboard = new Dashboard;

        $(document).on("submit", "form.tambah", function() {
            dashboard.post();

            return false;
        })

        $(document).on("click", "div.pagination div.first--page", function() {
            $("div.pagination span.page").html(1);
            dashboard.get();
        })

        $(document).on("click", "div.pagination div.last--page", function() {
            let total = $("div.pagination span.total-rows").html();
            $("div.pagination span.page").html(total);

            dashboard.get();
        })

        $(document).on("click", "div.pagination div.next--page", function() {
            let page = parseInt($("div.pagination span.page").html()) + 1;
            $("div.pagination span.page").html(page);

            dashboard.get();
        })

        $(document).on("click", "div.pagination div.previous--page", function() {
            let page = parseInt($("div.pagination span.page").html()) - 1;
            $("div.pagination span.page").html(page);

            dashboard.get();
        })

        $(document).on("click", "a.action--edit", function() {
            let id = $(this).data('id');
            let session_name = $(this).data('session_name');
            let host = $(this).data('host');
            let port = $(this).data('port');
            let username = $(this).data('username');
            let password = $(this).data('password');

            $("form.edit input.id").val(id);
            $("form.edit input.session-name").val(session_name);
            $("form.edit input.host-mikrotik").val(host);
            $("form.edit input.port-api-mikrotik").val(port);
            $("form.edit input.username").val(username);
            $("form.edit input.password").val(password);
        })

        $(document).on("submit", "form.edit", function() {
            dashboard.put();

            return false;
        })

        $(document).on("click", "a.action--delete", function() {
            let id = $(this).data('id');

            dashboard.delete({
                id: id
            });
        })

        $(document).on("click", "a.action--set_default", function() {
            let id = $(this).data('id');

            dashboard.set_default({
                id: id
            });
        })

        $(document).on("keyup", "input.search", function() {
            dashboard.get();
        })
    </script>
@endsection