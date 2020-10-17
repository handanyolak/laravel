@extends('master')

@section('title')
    Hurda
@endsection

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800 text-center text-primary">TEPEBAŞI BELEDİYESİ HURDA ZİMMETİ</h1>
        <div class="card shadow mb-4">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <a title="Ekle" class="btn btn-block btn-circle btn-success text-white create-click">
                <i class="fas fa-plus-circle">&nbsp;</i>Veri Eklemek İçin Buraya Tıklayınız
            </a>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>İşlemler</th>
                            <th>Sıra</th>
                            <th>Eşya</th>
                            <th>Seri&nbsp;No</th>
                            <th>Adet</th>
                            <th>Ekstra</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>İşlemler</th>
                            <th>Sıra</th>
                            <th>Eşya</th>
                            <th>Seri&nbsp;No</th>
                            <th>Adet</th>
                            <th>Ekstra</th>
                        </tr>
                        </tfoot>

                        <tbody>

                        @foreach($hurda_tablos as $hurda_tablo)
                            <tr>
                                <td>
                                    <a hurda-id="{{ $hurda_tablo->id }}" title="Düzenle" class="btn btn-sm btn-circle btn-warning mx-auto text-white edit-click">
                                        <i class="fa fa-pen align-middle"></i>
                                    </a>
                                    <a hurda-id="{{ $hurda_tablo->id }}" title="Sil" class="btn btn-sm btn-circle btn-danger mx-auto text-white delete-click">
                                        <i class="fa fa-times align-middle"></i>&nbsp;
                                    </a>
                                </td>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$hurda_tablo->esya}}</td>
                                <td>{{$hurda_tablo->seri_no}}</td>
                                <td>{{$hurda_tablo->adet}}</td>
                                <td>{{$hurda_tablo->ekstra}}</td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div id="createModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Veri Ekle</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('hurda.create') }}">
                        @csrf
                        <div class="form-group">
                            <label>Eşya</label>
                            <input type="text" class="form-control" name="esya">
                        </div>
                        <div class="form-group">
                            <label>Seri No</label>
                            <input type="text" class="form-control" name="seri_no">
                        </div>
                        <div class="form-group">
                            <label>Adet</label>
                            <input type="text" class="form-control" name="adet">
                        </div>
                        <div class="form-group">
                            <label>Ekstra</label>
                            <input type="text" class="form-control" name="ekstra">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">İptal</button>
                    <button type="submit" class="btn btn-success">Kaydet</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div id="editModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Veriyi Düzenle</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('hurda.update') }}">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" name="id" id="hurda_id">
                            <label>Eşya</label>
                            <input id="esya" type="text" class="form-control" name="esya">
                        </div>
                        <div class="form-group">
                            <label>Seri No</label>
                            <input id="seri_no" type="text" class="form-control" name="seri_no">
                        </div>
                        <div class="form-group">
                            <label>Adet</label>
                            <input id="adet" type="text" class="form-control" name="adet">
                        </div>
                        <div class="form-group">
                            <label>Ekstra</label>
                            <input id="ekstra" type="text" class="form-control" name="ekstra">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Kapat</button>
                    <button type="submit" class="btn btn-success">Kaydet</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div id="deleteModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Veri Silme</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('hurda.delete') }}">
                        @csrf
                        <input id="hurda_delete_id" type="hidden" name="id">
                        <div class="alert alert-danger">Veriyi Silmek İstediğinize Emin Misiniz?</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Vazgeç</button>
                    <button type="submit" class="btn btn-success">Sil</button>
                </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script>
        $(function () {
            $(document).on('click', '.edit-click', function () {
                id = $(this)[0].getAttribute('hurda-id');
                $.ajax({
                    type: 'GET',
                    url: '{{ route('hurda.getdata') }}',
                    data: {id: id},
                    success: function (data) {
                        $('#hurda_id').val(data.id);
                        $('#esya').val(data.esya);
                        $('#seri_no').val(data.seri_no);
                        $('#adet').val(data.adet);
                        $('#ekstra').val(data.ekstra);
                        $('#editModal').modal();
                    }
                });
            });

            $(document).on('click', '.delete-click', function () {
                id = $(this)[0].getAttribute('hurda-id');
                $.ajax({
                    success: function () {
                        $('#hurda_delete_id').val(id);
                        $('#deleteModal').modal();
                    }
                });
            });

            $('.create-click').click(function () {
                $.ajax({
                    success : function (){
                        $('#createModal').modal('show');
                    }
                });
            })
        })
    </script>
@endsection

