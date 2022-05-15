@extends('layouts/admin')
@section('title','Create User')

@extends('content')

<body onLoad="load()">
    <div class="box box-solid">
        <div class="box-body">
            <div class="box ">
                <div class="box-body">
                    <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#addform">
                        <i class="fa fa-plus"></i> New Jurusan</button>

                    <span class="pull-right">
                    </span>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover" id="data-table" width="100%" style="font-size: 12px;">
                    <thead>
                    <tr class="bg-success">
                        <th>Kode Jurusan</th>
                        <th>Nama Jurusan</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addform" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Create Data</h4>
            </div>
            {!! Form::open(['id'=>'ADD']) !!}
                    <div class="modal-body">
                        <div class="row">
                        <div class="col-md-8">
                                <div class="form-group">
                                    {{ Form::label('kode_jurusan', 'Kode Jurusan:') }}
                                    {{ Form::text('kode_jurusan', null, ['class'=> 'form-control','id'=>'Kode1','required'=>'required','autocomplete'=>'off', 'onkeypress'=>"return pulsar(event,this)"]) }}
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    {{ Form::label('nama_jurusan', 'Nama Jurusan:') }}
                                    {{ Form::text('nama_jurusan', null, ['class'=> 'form-control','id'=>'Nama1','required'=>'required','autocomplete'=>'off', 'onkeypress'=>"return pulsar(event,this)"]) }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="row">
                            {{ Form::submit('Create data', ['class' => 'btn btn-success crud-submit']) }}
                            {{ Form::button('Close', ['class' => 'btn btn-danger','data-dismiss'=>'modal']) }}&nbsp;
                        </div>
                    </div>
                {!! Form::close() !!}
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    <div class="modal fade" id="editform" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Edit Data</h4>
            </div>
            {!! Form::open(['id'=>'EDIT']) !!}
            <div class="modal-body">
                <div class="row">



                    <div class="col-md-4">
                        <div class="form-group">
                            {{ Form::label('kode_jurusan', 'Kode Jurusan:') }}
                            {{ Form::text('kode_jurusan', null, ['class'=> 'form-control','id'=>'Kode','required'=>'required','autocomplete'=>'off','readonly', 'onkeypress'=>"return pulsar(event,this)"]) }}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {{ Form::label('nama_jurusan', 'Nama Jurusan:') }}
                            {{ Form::text('nama_jurusan', null, ['class'=> 'form-control','id'=>'Nama','required'=>'required','autocomplete'=>'off', 'onkeypress'=>"return pulsar(event,this)"]) }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="row">
                    {{ Form::submit('Update data', ['class' => 'btn btn-success']) }}
                    {{ Form::button('Close', ['class' => 'btn btn-danger','data-dismiss'=>'modal']) }}&nbsp;
                </div>
            </div>
            {!! Form::close() !!}
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->

        <style type="text/css">
            #back2Top {
                width: 400px;
                line-height: 27px;
                overflow: hidden;
                z-index: 999;
                display: none;
                cursor: pointer;
                position: fixed;
                bottom: 0;
                text-align: left;
                font-size: 15px;
                color: #000000;
                text-decoration: none;
            }
            #back2Top:hover {
                color: #fff;
            }

            /* Button used to open the contact form - fixed at the bottom of the page */
            .hapus-button {
                background-color: #F63F3F;
                bottom: 186px;
            }

            .edit-button {
                background-color: #FDA900;
                bottom: 216px;
            }

            #mySidenav button {
              position: fixed;
              right: -30px;
              transition: 0.3s;
              padding: 4px 8px;
              width: 70px;
              text-decoration: none;
              font-size: 12px;
              color: white;
              border-radius: 5px 0 0 5px ;
              opacity: 0.8;
              cursor: pointer;
              text-align: left;
            }

            #mySidenav button:hover {
              right: 0;
            }

            #about {
              top: 70px;
              background-color: #4CAF50;
            }

            #blog {
              top: 130px;
              background-color: #2196F3;
            }

            #projects {
              top: 190px;
              background-color: #f44336;
            }

            #contact {
              top: 250px;
              background-color: #555
            }
        </style>

        <div id="mySidenav" class="sidenav">
            <button type="button" class="btn btn-warning btn-xs edit-button" id="editjurusan" data-toggle="modal" data-target="">UBAH <i class="fa fa-edit"></i></button>

            <button type="button" class="btn btn-danger btn-xs hapus-button" id="hapusjurusan" data-toggle="modal" data-target="">HAPUS <i class="fa fa-times-circle"></i></button>
        </div>
</body>
@stop

@push('css')

@endpush
@push('js')

    <script type="text/javascript">
        $(window).scroll(function() {
            var height = $(window).scrollTop();
            if (height > 1) {
                $('#back2Top').show();
            } else {
                $('#back2Top').show();
            }
        });

        function load(){
            startTime();
            $('.hapus-button').hide();
            $('.edit-button').hide();
            $('.back2Top').show();
        }

        $(function() {
            $('#data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('jurusan.data') !!}',
            columns: [
                { data: 'kode_jurusan', name: 'kode_jurusan' },
                { data: 'nama_jurusan', name: 'nama_jurusan' },
            ]
            });
        });

        $(document).ready(function() {
            $("#back2Top").click(function(event) {
                event.preventDefault();
                $("html, body").animate({ scrollTop: 0 }, "slow");
                return false;
            });

            var table = $('#data-table').DataTable();

            $('#data-table tbody').on( 'click', 'tr', function () {
                if ( $(this).hasClass('selected bg-gray') ) {
                    $(this).removeClass('selected bg-gray');
                    $('.hapus-button').hide();
                    $('.edit-button').hide();
                }
                else {
                    table.$('tr.selected').removeClass('selected bg-gray');
                    $(this).addClass('selected bg-gray');
                    var select = $('.selected').closest('tr');
                    $('.hapus-button').show();
                    $('.edit-button').show();

                }
            });

            $('#editjurusan').click( function () {
                var select = $('.selected').closest('tr');
                var data = $('#data-table').DataTable().row(select).data();
                var id = data['kode_jurusan'];
                var row = table.row( select );
                $.ajax({
                    url: '{!! route('jurusan.edit_jurusan') !!}',
                    type: 'POST',
                    data : {
                        'kode_jurusan': id
                    },
                    success: function(results) {
                        console.log(results);
                        $('#Kode').val(results.kode_jurusan);
                        $('#Nama').val(results.nama_jurusan);
                        $('#editform').modal('show');
                        }

                });
            });

            $('#hapusjurusan').click( function () {
                var select = $('.selected').closest('tr');
                var data = $('#data-table').DataTable().row(select).data();
                var kode_jurusan = data['kode_jurusan'];
                var row = table.row( select );
                swal({
                    title: "Hapus?",
                    text: "Pastikan dahulu item yang akan di hapus",
                    type: "warning",
                    showCancelButton: !0,
                    confirmButtonText: "Ya, Hapus!",
                    cancelButtonText: "Batal!",
                    reverseButtons: !0
                }).then(function (e) {
                    if (e.value === true) {
                        $.ajax({
                            url: '{!! route('jurusan.hapus_jurusan') !!}',
                            type: 'POST',
                            data : {
                                'kode_jurusan': kode_jurusan
                            },

                            success: function (results) {
                                if (results.success === true) {
                                    swal("Berhasil!", results.message, "success");
                                } else {
                                    swal("Gagal!", results.message, "error");
                                }
                                refreshTable();
                            }
                        });
                    }
                });
            });

        });

        function pulsar(e,obj) {
              tecla = (document.all) ? e.keyCode : e.which;
              //alert(tecla);
              if (tecla!="8" && tecla!="0"){
                obj.value += String.fromCharCode(tecla).toUpperCase();
                return false;
              }else{
                return true;
              }
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        function refreshTable() {
             $('#data-table').DataTable().ajax.reload(null,false);;
        }

        $('.modal-dialog').draggable({
            handle: ".modal-header"
        });

        $('.modal-dialog').resizable({

        });

        // $('#ADD').submit(function (e) {
        //     e.preventDefault();
        //     var registerForm = $("#ADD");
        //     var formData = registerForm.serialize();

        //         $.ajax({
        //             url:'{!! route('jurusan.store') !!}',
        //             type:'POST',
        //             data:formData,
        //             success:function(data) {
        //                 console.log(data);
        //                 $('#Kode1').val('').trigger('change');
        //                 $('#Nama1').val('').trigger('change');
        //                 $('#addform').modal('hide');
        //                 refreshTable();
        //                 if (data.success === true) {
        //                     swal("Berhasil!", data.message, "success");
        //                 } else {
        //                     swal("Gagal!", data.message, "error");
        //                 }
        //             },
        //         });
        // });

        // $('#EDIT').submit(function (e) {
        //     e.preventDefault();
        //     var registerForm = $("#EDIT");
        //     var formData = registerForm.serialize();

        //     // Check if empty of not
        //         $.ajax({
        //             url:'{!! route('jurusan.ajaxupdate') !!}',
        //             type:'POST',
        //             data:formData,
        //             success:function(data) {
        //                 console.log(data);
        //                 $('#editform').modal('hide');
        //                 refreshTable();
        //                 if (data.success === true) {
        //                     swal("Berhasil!", data.message, "success");
        //                 } else {
        //                     swal("Gagal!", data.message, "error");
        //                 }
        //             },
        //         });
        // });
    </script>
@endpush
@endsection
