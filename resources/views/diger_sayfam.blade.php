@extends('master')

@section('title')
    Diger
@endsection

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800 text-center text-primary">TEPEBAŞI BELEDİYESİ DİĞER ZİMMETİ</h1>
        <div class="card shadow mb-4">
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
                            <th>No</th>
                            <th>Marka</th>
                            <th>Zimmet</th>
                            <th>Açıklama</th>
                            <th>Verilme&nbsp;Tarihi</th>
                            <th>Firma</th>
                            <th>Alınma&nbsp;Tarihi</th>
                            <th>Durum</th>
                            <th>Ekstra</th>
                            <th>Ekstra 2</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>İşlemler</th>
                            <th>Sıra</th>
                            <th>No</th>
                            <th>Marka</th>
                            <th>Zimmet</th>
                            <th>Açıklama</th>
                            <th>Verilme&nbsp;Tarihi</th>
                            <th>Firma</th>
                            <th>Alınma&nbsp;Tarihi</th>
                            <th>Durum</th>
                            <th>Ekstra</th>
                            <th>Ekstra 2</th>
                        </tr>
                        </tfoot>
                        <tbody>

                            @foreach($diger_tablos as $diger_tablo)
                                <tr>
                                    <td>
                                        <a diger-id="{{ $diger_tablo->id }}" title="Düzenle" class="btn btn-sm btn-circle btn-warning mx-auto text-white edit-click">
                                            <i class="fa fa-pen align-middle"></i>
                                        </a>
                                        <a diger-id="{{ $diger_tablo->id }}" title="Sil" class="btn btn-sm btn-circle btn-danger mx-auto text-white delete-click">
                                            <i class="fa fa-times align-middle"></i>&nbsp;
                                        </a>
                                    </td>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$diger_tablo->no}}</td>
                                    <td>{{$diger_tablo->marka}}</td>
                                    <td>{{$diger_tablo->zimmet}}</td>
                                    <td>{{$diger_tablo->aciklama}}</td>
                                    <td>{{$diger_tablo->verilme_tarihi}}</td>
                                    <td>{{$diger_tablo->firma}}</td>
                                    <td>{{$diger_tablo->alinma_tarihi}}</td>
                                    <td>{{$diger_tablo->durum}}</td>
                                    <td>{{$diger_tablo->ekstra}}</td>
                                    <td>{{$diger_tablo->ekstra_2}}</td>
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
                    <form method="post" action="{{ route('diger.create') }}">
                        @csrf
                        <div class="form-group">
                            <label>No</label>
                            <input type="text" class="form-control" name="no">
                        </div>
                        <div class="form-group">
                            <label>Marka</label>
                            <input type="text" class="form-control" name="marka">
                        </div>
                        <div class="form-group">
                            <label>Zimmet</label>
                            <input type="text" class="form-control" name="zimmet">
                        </div>
                        <div class="form-group">
                            <label>Açıklama</label>
                            <input type="text" class="form-control" name="aciklama">
                        </div>
                        <div class="form-group">
                            <label>Verilme Tarihi</label>
                            <input type="text" class="form-control" name="verilme_tarihi">
                        </div>
                        <div class="form-group">
                            <label>Firma</label>
                            <input type="text" class="form-control" name="firma">
                        </div>
                        <div class="form-group">
                            <label>Aiınma Tarihi</label>
                            <input type="text" class="form-control" name="alinma_tarihi">
                        </div>
                        <div class="form-group">
                            <label>Durum</label>
                            <input type="text" class="form-control" name="durum">
                        </div>
                        <div class="form-group">
                            <label>Ekstra</label>
                            <input type="text" class="form-control" name="ekstra">
                        </div>
                        <div class="form-group">
                            <label>Ekstra 2</label>
                            <input type="text" class="form-control" name="ekstra_2">
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
                    <h4 class="modal-title">Veriyi Düzenles</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('diger.update') }}">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" name="id" id="diger_id">
                            <label>No</label>
                            <input id="no" type="text" class="form-control" name="no">
                        </div>
                        <div class="form-group">
                            <label>Marka</label>
                            <input id="marka" type="text" class="form-control" name="marka">
                        </div>
                        <div class="form-group">
                            <label>Zimmet</label>
                            <input id="zimmet" type="text" class="form-control" name="zimmet">
                        </div>
                        <div class="form-group">
                            <label>Açıklama</label>
                            <input id="aciklama" type="text" class="form-control" name="aciklama">
                        </div>
                        <div class="form-group">
                            <label>Verilme Tarihi</label>
                            <input id="verilme_tarihi" type="text" class="form-control" name="verilme_tarihi">
                        </div>
                        <div class="form-group">
                            <label>Firma</label>
                            <input id="firma" type="text" class="form-control" name="firma">
                        </div>
                        <div class="form-group">
                            <label>Aiınma Tarihi</label>
                            <input id="alinma_tarihi" type="text" class="form-control" name="alinma_tarihi">
                        </div>
                        <div class="form-group">
                            <label>Durum</label>
                            <input id="durum" type="text" class="form-control" name="durum">
                        </div>
                        <div class="form-group">
                            <label>Ekstra</label>
                            <input id="ekstra" type="text" class="form-control" name="ekstra">
                        </div>
                        <div class="form-group">
                            <label>Ekstra 2</label>
                            <input id="ekstra_2" type="text" class="form-control" name="ekstra_2">
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
                    <form method="post" action="{{ route('diger.delete') }}">
                        @csrf
                        <input id="diger_delete_id" type="hidden" name="id">
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
                id = $(this)[0].getAttribute('diger-id');
                $.ajax({
                    type: 'GET',
                    url: '{{ route('diger.getdata') }}',
                    data: {id: id},
                    success: function (data) {
                        $('#diger_id').val(data.id);
                        $('#no').val(data.no);
                        $('#marka').val(data.marka);
                        $('#zimmet').val(data.zimmet);
                        $('#aciklama').val(data.aciklama);
                        $('#verilme_tarihi').val(data.verilme_tarihi);
                        $('#firma').val(data.firma	);
                        $('#alinma_tarihi').val(data.alinma_tarihi);
                        $('#durum').val(data.durum);
                        $('#ekstra').val(data.ekstra);
                        $('#ekstra_2').val(data.ekstra_2);
                        $('#editModal').modal();
                    }
                });
            });

            $(document).on('click', '.delete-click', function () {
                id = $(this)[0].getAttribute('diger-id');
                $.ajax({
                    success: function () {
                        $('#diger_delete_id').val(id);
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

