@extends('master')

@section('title')
    Monitör
@endsection

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800 text-center text-primary">TEPEBAŞI BELEDİYESİ MONİTÖR ZİMMETİ</h1>
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
                            <th>No</th>
                            <th>Müdürlük</th>
                            <th>Ad Soyad</th>
                            <th>Alındı</th>
                            <th>Boyut</th>
                            <th>Verildi</th>
                            <th>Marka</th>
                            <th>Ekstra</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>İşlemler</th>
                            <th>Sıra</th>
                            <th>No</th>
                            <th>Müdürlük</th>
                            <th>Ad Soyad</th>
                            <th>Alındı</th>
                            <th>Boyut</th>
                            <th>Verildi</th>
                            <th>Marka</th>
                            <th>Ekstra</th>
                        </tr>
                        </tfoot>
                        <tbody>

                        @foreach($monitor_tablos as $monitor_tablo)
                            <tr>
                                <td>
                                    <a monitor-id="{{ $monitor_tablo->id }}" title="Düzenle" class="btn btn-sm btn-circle btn-warning mx-auto text-white edit-click">
                                        <i class="fa fa-pen align-middle"></i>
                                    </a>
                                    <a monitor-id="{{ $monitor_tablo->id }}" title="Sil" class="btn btn-sm btn-circle btn-danger mx-auto text-white delete-click">
                                        <i class="fa fa-times align-middle"></i>&nbsp;
                                    </a>
                                </td>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$monitor_tablo->sira_no}}</td>
                                <td>{{$monitor_tablo->mudurluk}}</td>
                                <td>{{$monitor_tablo->ad_soyad}}</td>
                                <td>{{$monitor_tablo->alindi}}</td>
                                <td>{{$monitor_tablo->boyut}}</td>
                                <td>{{$monitor_tablo->verildi}}</td>
                                <td>{{$monitor_tablo->marka}}</td>
                                <td>{{$monitor_tablo->ekstra}}</td>
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
                    <form method="post" action="{{ route('monitor.create') }}">
                        @csrf
                        <div class="form-group">
                            <label>Sıra No</label>
                            <input type="text" class="form-control" name="sira_no">
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
                            <label>Ad Soyad</label>
                            <input type="text" class="form-control" name="ad_soyad">
                        </div>
                        <div class="form-group">
                            <label>Alındı</label>
                            <input type="text" class="form-control" name="alindi">
                        </div>
                        <div class="form-group">
                            <label>Boyut</label>
                            <input type="text" class="form-control" name="boyut">
                        </div>
                        <div class="form-group">
                            <label>Verildi</label>
                            <input type="text" class="form-control" name="verildi">
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
                    <form method="post" action="{{ route('monitor.update') }}">
                        @csrf
                        <div class="form-group">
                            <label>Sıra No</label>
                            <input id="sira_no" type="text" class="form-control" name="sira_no">
                            <input type="hidden" name="id" id="monitor_id">
                        </div>
                        <div class="form-group">
                            <label>Müdürlük</label>
                            <select class="form-control" name="mudurluk" id="mudurluk">
                                @foreach ($mudurlukler_tablos as $mudurlukler_tablo)
                                    <option value="{{ $mudurlukler_tablo->mudurluk }}" {{ ( $mudurlukler_tablo->mudurluk == $monitor_tablos) ? 'selected' : '' }}> {{ $mudurlukler_tablo->mudurluk }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Ad Soyad</label>
                            <input id="ad_soyad" type="text" class="form-control" name="ad_soyad">
                        </div>
                        <div class="form-group">
                            <label>Alındı</label>
                            <input id="alindi" type="text" class="form-control" name="alindi">
                        </div>
                        <div class="form-group">
                            <label>Boyut</label>
                            <input id="boyut" type="text" class="form-control" name="boyut">
                        </div>
                        <div class="form-group">
                            <label>Verildi</label>
                            <input id="verildi" type="text" class="form-control" name="verildi">
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
                    <form method="post" action="{{ route('monitor.delete') }}">
                        @csrf
                        <input id="monitor_delete_id" type="hidden" name="id">
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
                id = $(this)[0].getAttribute('monitor-id');
                $.ajax({
                    type: 'GET',
                    url: '{{ route('monitor.getdata') }}',
                    data: {id: id},
                    success: function (data) {
                        $('#monitor_id').val(data.id);
                        $('#sira_no').val(data.sira_no);
                        $('#mudurluk').val(data.mudurluk);
                        $('#ad_soyad').val(data.ad_soyad);
                        $('#alindi').val(data.alindi);
                        $('#boyut').val(data.boyut);
                        $('#verildi').val(data.verildi);
                        $('#marka').val(data.marka);
                        $('#ekstra').val(data.ekstra);
                        $('#editModal').modal();
                    }
                });
            });

            $(document).on('click', '.delete-click', function () {
                id = $(this)[0].getAttribute('monitor-id');
                $.ajax({
                    success: function () {
                        $('#monitor_delete_id').val(id);
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
