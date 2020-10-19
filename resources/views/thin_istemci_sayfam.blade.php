@extends('master')

@section('title')
    Thin İstemci
@endsection

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800 text-center text-primary">TEPEBAŞI BELEDİYESİ THIN İSTEMCİ ZİMMETİ</h1>
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
                            <th>Thin&nbsp;No</th>
                            <th>Seri&nbsp;No</th>
                            <th>Adaptör</th>
                            <th>Zimmet</th>
                            <th>Müdürlük</th>
                            <th>Verilme&nbsp;Tarihi</th>
                            <th>Durum</th>
                            <th>Durum 2</th>
                            <th>Ad&nbsp;Soyad</th>
                            <th>Ekstra</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>İşlemler</th>
                            <th>Sıra</th>
                            <th>Thin&nbsp;No</th>
                            <th>Seri&nbsp;No</th>
                            <th>Adaptör</th>
                            <th>Zimmet</th>
                            <th>Müdürlük</th>
                            <th>Verilme&nbsp;Tarihi</th>
                            <th>Durum</th>
                            <th>Durum 2</th>
                            <th>Ad&nbsp;Soyad</th>
                            <th>Ekstra</th>
                        </tr>
                        </tfoot>



                        <tbody>

                        @foreach($thin_istemci_tablos as $thin_istemci_tablo)
                            <tr>
                                <td>
                                    <a thin_istemci-id="{{ $thin_istemci_tablo->id }}" title="Düzenle" class="btn btn-sm btn-circle btn-warning mx-auto text-white edit-click">
                                        <i class="fa fa-pen align-middle"></i>
                                    </a>
                                    <a thin_istemci-id="{{ $thin_istemci_tablo->id }}" title="Sil" class="btn btn-sm btn-circle btn-danger mx-auto text-white delete-click">
                                        <i class="fa fa-times align-middle"></i>&nbsp;
                                    </a>
                                </td>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$thin_istemci_tablo->t_no}}</td>
                                <td>{{$thin_istemci_tablo->seri_no}}</td>
                                <td>{{$thin_istemci_tablo->adaptor}}</td>
                                <td>{{$thin_istemci_tablo->zimmet}}</td>
                                <td>{{$thin_istemci_tablo->mudurluk}}</td>
                                <td>{{$thin_istemci_tablo->verilme_tarihi}}</td>
                                <td>{{$thin_istemci_tablo->durum}}</td>
                                <td>{{$thin_istemci_tablo->durum_2}}</td>
                                <td>{{$thin_istemci_tablo->ad_soyad}}</td>
                                <td>{{$thin_istemci_tablo->ekstra}}</td>
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
                    <form method="post" action="{{ route('thin_istemci.create') }}">
                        @csrf
                        <div class="form-group">
                            <label>Thin No</label>
                            <input type="text" class="form-control" name="t_no">
                        </div>
                        <div class="form-group">
                            <label>Seri No</label>
                            <input type="text" class="form-control" name="seri_no">
                        </div>
                        <div class="form-group">
                            <label>Adaptor</label>
                            <input type="text" class="form-control" name="adaptor">
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
                            <label>Durum</label>
                            <input type="text" class="form-control" name="durum">
                        </div>
                        <div class="form-group">
                            <label>Durum 2</label>
                            <input type="text" class="form-control" name="durum_2">
                        </div>
                        <div class="form-group">
                            <label>Ad Soyad</label>
                            <input type="text" class="form-control" name="ad_soyad">
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
                    <form method="post" action="{{ route('thin_istemci.update') }}">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" name="id" id="thin_istemci_id">
                            <label>Thin No</label>
                            <input id="t_no" type="text" class="form-control" name="t_no">
                        </div>
                        <div class="form-group">
                            <label>Seri No</label>
                            <input id="seri_no" type="text" class="form-control" name="seri_no">
                        </div>
                        <div class="form-group">
                            <label>Adaptor</label>
                            <input id="adaptor" type="text" class="form-control" name="adaptor">
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
                            <label>Durum</label>
                            <input id="durum" type="text" class="form-control" name="durum">
                        </div>
                        <div class="form-group">
                            <label>Durum 2</label>
                            <input id="durum_2" type="text" class="form-control" name="durum_2">
                        </div>
                        <div class="form-group">
                            <label>Ad Soyad</label>
                            <input id="ad_soyad" type="text" class="form-control" name="ad_soyad">
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
                    <form method="post" action="{{ route('thin_istemci.delete') }}">
                        @csrf
                        <input id="thin_istemci_delete_id" type="hidden" name="id">
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
                id = $(this)[0].getAttribute('thin_istemci-id');
                console.log(id);
                $.ajax({
                    type: 'GET',
                    url: '{{ route('thin_istemci.getdata') }}',
                    data: {id: id},
                    success: function (data) {
                        $('#thin_istemci_id').val(data.id);
                        $('#t_no').val(data.t_no);
                        $('#seri_no').val(data.seri_no);
                        $('#adaptor').val(data.adaptor);
                        $('#zimmet').val(data.zimmet);
                        $('#zimmet').val(data.zimmet);
                        $('#mudurluk').val(data.mudurluk	);
                        $('#verilme_tarihi	').val(data.verilme_tarihi	);
                        $('#durum').val(data.durum);
                        $('#durum_2').val(data.durum_2);
                        $('#ad_soyad').val(data.ad_soyad);
                        $('#ekstra').val(data.ekstra);
                        $('#editModal').modal();
                    }
                });
            });

            $(document).on('click', '.delete-click', function () {
                id = $(this)[0].getAttribute('thin_istemci-id');
                $.ajax({
                    success: function () {
                        $('#thin_istemci_delete_id').val(id);
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
