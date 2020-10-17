@extends('master')

@section('title')
    Monitör (Yeni)
@endsection

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800 text-center text-primary">TEPEBAŞI BELEDİYESİ MONİTÖR (YENİ) ZİMMETİ</h1>
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
                            <th>Monitör&nbsp;No</th>
                            <th>Özellik</th>
                            <th>Marka</th>
                            <th>Zimmet</th>
                            <th>Müdürlük</th>
                            <th>Verilme&nbsp;Tarihi</th>
                            <th>Firma</th>
                            <th>Alınma&nbsp;Tarihi</th>
                            <th>Seri&nbsp;No</th>
                            <th>Durum</th>
                            <th>Ekstra&nbsp;1</th>
                            <th>Ekstra&nbsp;2</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>İşlemler</th>
                            <th>Sıra</th>
                            <th>Monitör&nbsp;No</th>
                            <th>Özellik</th>
                            <th>Marka</th>
                            <th>Zimmet</th>
                            <th>Müdürlük</th>
                            <th>Verilme&nbsp;Tarihi</th>
                            <th>Firma</th>
                            <th>Alınma&nbsp;Tarihi</th>
                            <th>Seri&nbsp;No</th>
                            <th>Durum</th>
                            <th>Ekstra&nbsp;1</th>
                            <th>Ekstra&nbsp;2</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($monitor_yeni_tablos as $monitor_yeni_tablo)
                            <tr>
                                <td>
                                    <a monitor-yeni-id="{{$monitor_yeni_tablo->id}}" title="Düzenle" class="btn btn-sm btn-circle btn-warning mx-auto text-white edit-click">
                                        <i class="fa fa-pen align-middle"></i>
                                    </a>
                                    <a monitor-yeni-id="{{ $monitor_yeni_tablo->id }}" title="Sil" class="btn btn-sm btn-circle btn-danger mx-auto text-white delete-click">
                                        <i class="fa fa-times align-middle"></i>&nbsp;
                                    </a>
                                </td>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$monitor_yeni_tablo->monitor_no}}</td>
                                <td>{{$monitor_yeni_tablo->ozellik}}</td>
                                <td>{{$monitor_yeni_tablo->marka}}</td>
                                <td>{{$monitor_yeni_tablo->zimmet}}</td>
                                <td>{{$monitor_yeni_tablo->mudurluk}}</td>
                                <td>{{$monitor_yeni_tablo->verilme_tarihi}}</td>
                                <td>{{$monitor_yeni_tablo->firma}}</td>
                                <td>{{$monitor_yeni_tablo->alinma_tarihi}}</td>
                                <td>{{$monitor_yeni_tablo->seri_no}}</td>
                                <td>{{$monitor_yeni_tablo->durum}}</td>
                                <td>{{$monitor_yeni_tablo->ekstra}}</td>
                                <td>{{$monitor_yeni_tablo->ekstra_2}}</td>
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
                    <form method="post" action="{{ route('monitoryeni.create') }}">
                        @csrf
                        <div class="form-group">
                            <label>Monitör No</label>
                            <input type="text" class="form-control" name="monitor_no">
                        </div>
                        <div class="form-group">
                            <label>Özellik</label>
                            <input type="text" class="form-control" name="ozellik">
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
                            <label>Müdürlük</label>
                            <select class="form-control" name="mudurluk">
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
                            <label>Seri No</label>
                            <input type="text" class="form-control" name="seri_no">
                        </div>
                        <div class="form-group">
                            <label>Durum</label>
                            <input type="text" class="form-control" name="durum">
                        </div>
                        <div class="form-group">
                            <label>Ekstra 1</label>
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
                    <h4 class="modal-title">Veriyi Düzenle</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('monitoryeni.update') }}">
                        @csrf
                        <div class="form-group">
                            <label>Monitör No</label>
                            <input id="monitor_no" type="text" class="form-control" name="monitor_no">
                        </div>
                        <div class="form-group">
                            <label>Özellik</label>
                            <input id="ozellik" type="text" class="form-control" name="ozellik">
                        </div>
                        <div class="form-group">
                            <label>Marka</label>
                            <select class="form-control" name="mudurluk" id="mudurluk">
                                @foreach ($mudurlukler_tablos as $mudurlukler_tablo)
                                    <option value="{{ $mudurlukler_tablo->mudurluk }}" {{ ( $mudurlukler_tablo->mudurluk == $monitor_yeni_tablos) ? 'selected' : '' }}> {{ $mudurlukler_tablo->mudurluk }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Zimmet</label>
                            <input id="zimmet" type="text" class="form-control" name="zimmet">
                        </div>
                        <div class="form-group">
                            <label>Müdürlük</label>
                            <input id="mudurluk" type="text" class="form-control" name="mudurluk">
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
                            <label>Seri No</label>
                            <input id="seri_no" type="text" class="form-control" name="seri_no">
                        </div>
                        <div class="form-group">
                            <label>Durum</label>
                            <input id="durum" type="text" class="form-control" name="durum">
                        </div>
                        <div class="form-group">
                            <label>Ekstra 1</label>
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
                    <form method="post" action="{{ route('monitoryeni.delete') }}">
                        @csrf
                        <input id="monitor_yeni_delete_id" type="hidden" name="id">
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
                id = $(this)[0].getAttribute('monitor-yeni-id');
                $.ajax({
                    type: 'GET',
                    url: '{{ route('monitoryeni.getdata') }}',
                    data: {id: id},
                    success: function (data) {
                        console.log(data);
                        $('#monitor_no').val(data.monitor_no);
                        $('#ozellik').val(data.ozellik);
                        $('#marka').val(data.marka);
                        $('#zimmet').val(data.zimmet);
                        $('#mudurluk').val(data.mudurluk);
                        $('#verilme_tarihi').val(data.verilme_tarihi);
                        $('#firma').val(data.firma);
                        $('#alinma_tarihi').val(data.alinma_tarihi);
                        $('#seri_no').val(data.seri_no);
                        $('#durum').val(data.durum);
                        $('#ekstra').val(data.ekstra);
                        $('#ekstra_2').val(data.ekstra_2);
                        $('#monitor_yeni_id').val(data.id);
                        $('#editModal').modal();
                    }
                });
            });

            $(document).on('click', '.delete-click', function () {
                id = $(this)[0].getAttribute('monitor-yeni-id');
                $.ajax({
                    success: function () {
                        $('#monitor_yeni_delete_id').val(id);
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
