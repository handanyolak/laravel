@extends('master')

@section('title')
    Kasa
@endsection

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800 text-center text-primary">TEPEBAŞI BELEDİYESİ KASA ZİMMETİ</h1>
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
                            <th>Pc&nbsp;No</th>
                            <th>İşlemci</th>
                            <th>Özellik</th>
                            <th>Zimmet</th>
                            <th>Müdürlük</th>
                            <th>Verilme&nbsp;Tarihi</th>
                            <th>Firma</th>
                            <th>Alınma&nbsp;Tarihi</th>
                            <th>Durum</th>
                            <th>Marka</th>
                            <th>Ekstra</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>İşlemler</th>
                            <th>Sıra</th>
                            <th>Pc&nbsp;No</th>
                            <th>İşlemci</th>
                            <th>Özellik</th>
                            <th>Zimmet</th>
                            <th>Müdürlük</th>
                            <th>Verilme&nbsp;Tarihi</th>
                            <th>Firma</th>
                            <th>Alınma&nbsp;Tarihi</th>
                            <th>Durum</th>
                            <th>Marka</th>
                            <th>Ekstra</th>
                        </tr>
                        </tfoot>
                        <tbody>

                        @foreach($kasa_tablos as $kasa_tablo)
                            <tr>
                                <td>
                                    <a kasa-id="{{ $kasa_tablo->id }}" title="Düzenle" class="btn btn-sm btn-circle btn-warning mx-auto text-white edit-click">
                                        <i class="fa fa-pen align-middle"></i>
                                    </a>
                                    <a kasa-id="{{ $kasa_tablo->id }}" title="Sil" class="btn btn-sm btn-circle btn-danger mx-auto text-white delete-click">
                                        <i class="fa fa-times align-middle"></i>&nbsp;
                                    </a>
                                </td>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$kasa_tablo->pc_no}}</td>
                                <td>{{$kasa_tablo->islemci}}</td>
                                <td>{{$kasa_tablo->ozellik}}</td>
                                <td>{{$kasa_tablo->zimmet}}</td>
                                <td>{{$kasa_tablo->mudurluk}}</td>
                                <td>{{$kasa_tablo->verilme_tarihi}}</td>
                                <td>{{$kasa_tablo->firma}}</td>
                                <td>{{$kasa_tablo->alinma_tarihi}}</td>
                                <td>{{$kasa_tablo->durum}}</td>
                                <td>{{$kasa_tablo->marka}}</td>
                                <td>{{$kasa_tablo->ekstra}}</td>
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
                    <form method="post" action="{{ route('kasa.create') }}">
                        @csrf
                        <div class="form-group">
                            <label>Pc No</label>
                            <input type="text" class="form-control" name="pc_no">
                        </div>
                        <div class="form-group">
                            <label>İşlemci</label>
                            <input type="text" class="form-control" name="islemci">
                        </div>
                        <div class="form-group">
                            <label>Özellik</label>
                            <input type="text" class="form-control" name="ozellik">
                        </div>
                        <div class="form-group">
                            <label>Zimmet</label>
                            <input type="text" class="form-control" name="zimmet">
                        </div>
                        <div class="form-group">
                            <label>Müdürlük</label>
                            <select class="form-control" name="mudurluk" required>
                                <option value="">Seçiniz</option>
                                @foreach($mudurlukler_tablos as $mudurlukler_tablo)
                                    <option value="{{ $mudurlukler_tablo->mudurluk }}">{{ $mudurlukler_tablo->mudurluk }}</option>
                                @endforeach
                            </select>
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
                            <label>Alınma Tarihi</label>
                            <input type="text" class="form-control" name="alinma_tarihi">
                        </div>
                        <div class="form-group">
                            <label>Durum</label>
                            <input type="text" class="form-control" name="durum">
                        </div>
                        <div class="form-group">
                            <label>Marka</label>
                            <input type="text" class="form-control" name="marka">
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
                    <form method="post" action="{{ route('kasa.update') }}">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" name="id" id="kasa_id">
                            <label>Pc No</label>
                            <input id="pc_no" type="text" class="form-control" name="pc_no">
                        </div>
                        <div class="form-group">
                            <label>İşlemci</label>
                            <input id="islemci" type="text" class="form-control" name="islemci">
                        </div>
                        <div class="form-group">
                            <label>Özellik</label>
                            <input id="ozellik" type="text" class="form-control" name="ozellik">
                        </div>
                        <div class="form-group">
                            <label>Zimmet</label>
                            <input id="zimmet" type="text" class="form-control" name="zimmet">
                        </div>
                        <div class="form-group">
                            <label>Müdürlük</label>
                            <select class="form-control" name="mudurluk" id="mudurluk" required>
                                @foreach ($mudurlukler_tablos as $mudurlukler_tablo)
                                    <option value="{{ $mudurlukler_tablo->mudurluk }}"> {{ $mudurlukler_tablo->mudurluk }} </option>
                                @endforeach
                            </select>
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
                            <label>Alınma Tarihi</label>
                            <input id="alinma_tarihi" type="text" class="form-control" name="alinma_tarihi">
                        </div>
                        <div class="form-group">
                            <label>Durum</label>
                            <input id="durum" type="text" class="form-control" name="durum">
                        </div>
                        <div class="form-group">
                            <label>Marka</label>
                            <input id="marka" type="text" class="form-control" name="marka">
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
                    <form method="post" action="{{ route('kasa.delete') }}">
                        @csrf
                        <input id="kasa_delete_id" type="hidden" name="id">
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
                id = $(this)[0].getAttribute('kasa-id');
                $.ajax({
                    type: 'GET',
                    url: '{{ route('kasa.getdata') }}',
                    data: {id: id},
                    success: function (data) {
                        $('#kasa_id').val(data.id);
                        $('#pc_no').val(data.pc_no);
                        $('#islemci').val(data.islemci);
                        $('#ozellik').val(data.ozellik);
                        $('#zimmet').val(data.zimmet);
                        $('#mudurluk').val(data.mudurluk);
                        $('#verilme_tarihi').val(data.verilme_tarihi	);
                        $('#firma').val(data.firma);
                        $('#alinma_tarihi').val(data.alinma_tarihi);
                        $('#durum').val(data.durum);
                        $('#marka').val(data.marka);
                        $('#ekstra').val(data.ekstra);
                        $('#editModal').modal();
                    }
                });
            })

            $(document).on('click', '.delete-click', function () {
                id = $(this)[0].getAttribute('kasa-id');
                $.ajax({
                    success: function () {
                        $('#kasa_delete_id').val(id);
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
