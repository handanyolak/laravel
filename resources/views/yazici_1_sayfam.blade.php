@extends('master')

@section('title')
    Yazıcı (1)
@endsection

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800 text-center text-primary">TEPEBAŞI BELEDİYESİ YAZICI (1) ZİMMETİ</h1>
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
                            <th>Yazıcı&nbsp;No</th>
                            <th>Seri&nbsp;No</th>
                            <th>Özellik</th>
                            <th>Marka</th>
                            <th>Zimmet</th>
                            <th>Müdürlük</th>
                            <th>Tarih</th>
                            <th>Açıklama</th>
                            <th>Durum</th>
                            <th>Kod</th>
                            <th>Ekstra</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>İşlemler</th>
                            <th>Sıra</th>
                            <th>Yazıcı&nbsp;No</th>
                            <th>Seri&nbsp;No</th>
                            <th>Özellik</th>
                            <th>Marka</th>
                            <th>Zimmet</th>
                            <th>Müdürlük</th>
                            <th>Tarih</th>
                            <th>Açıklama</th>
                            <th>Durum</th>
                            <th>Kod</th>
                            <th>Ekstra</th>
                        </tr>
                        </tfoot>


                        <tbody>

                        @foreach($yazici_1_tablos as $yazici_1_tablo)
                            <tr>
                                <td>
                                    <a yazici_1-id="{{ $yazici_1_tablo->id }}" title="Düzenle" class="btn btn-sm btn-circle btn-warning mx-auto text-white edit-click">
                                        <i class="fa fa-pen align-middle"></i>
                                    </a>
                                    <a yazici_1-id="{{ $yazici_1_tablo->id }}" title="Sil" class="btn btn-sm btn-circle btn-danger mx-auto text-white delete-click">
                                        <i class="fa fa-times align-middle"></i>&nbsp;
                                    </a>
                                </td>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$yazici_1_tablo->yazici_no}}</td>
                                <td>{{$yazici_1_tablo->seri_no}}</td>
                                <td>{{$yazici_1_tablo->ozellik}}</td>
                                <td>{{$yazici_1_tablo->marka}}</td>
                                <td>{{$yazici_1_tablo->zimmet}}</td>
                                <td>{{$yazici_1_tablo->mudurluk}}</td>
                                <td>{{$yazici_1_tablo->tarih}}</td>
                                <td>{{$yazici_1_tablo->aciklama}}</td>
                                <td>{{$yazici_1_tablo->durum}}</td>
                                <td>{{$yazici_1_tablo->kod}}</td>
                                <td>{{$yazici_1_tablo->ekstra}}</td>

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
                    <h4 class="modal-title">Veri Eklee</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('yazici_1.create') }}">
                        @csrf
                        <div class="form-group">
                            <label>Yazıcı No</label>
                            <input type="text" class="form-control" name="yazici_no">
                        </div>
                        <div class="form-group">
                            <label>Seri No</label>
                            <input type="text" class="form-control" name="seri_no">
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
                            <label>Tarih</label>
                            <input type="text" class="form-control" name="tarih">
                        </div>
                        <div class="form-group">
                            <label>Açıklama</label>
                            <input type="text" class="form-control" name="aciklama">
                        </div>
                        <div class="form-group">
                            <label>Durum</label>
                            <input type="text" class="form-control" name="durum">
                        </div>
                        <div class="form-group">
                            <label>Kod</label>
                            <input type="text" class="form-control" name="kod">
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
                    <form method="post" action="{{ route('yazici_1.update') }}">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" name="id" id="yazici_1_id">
                            <label>Yazıcı No</label>
                            <input id="yazici_no" type="text" class="form-control" name="yazici_no">
                        </div>
                        <div class="form-group">
                            <label>Seri No</label>
                            <input id="seri_no" type="text" class="form-control" name="seri_no">
                        </div>
                        <div class="form-group">
                            <label>Özellik</label>
                            <input id="ozellik" type="text" class="form-control" name="ozellik">
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
                            <label>Müdürlük</label>
                            <select class="form-control" name="mudurluk" id="mudurluk">
                                @foreach ($mudurlukler_tablos as $mudurlukler_tablo)
                                    <option value="{{ $mudurlukler_tablo->mudurluk }}" {{ ( $mudurlukler_tablo->mudurluk == $yazici_1_tablos) ? 'selected' : '' }}> {{ $mudurlukler_tablo->mudurluk }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tarih</label>
                            <input id="tarih" type="text" class="form-control" name="tarih">
                        </div>
                        <div class="form-group">
                            <label>Açıklama</label>
                            <input id="aciklama" type="text" class="form-control" name="aciklama">
                        </div>
                        <div class="form-group">
                            <label>Durum</label>
                            <input id="durum" type="text" class="form-control" name="durum">
                        </div>
                        <div class="form-group">
                            <label>Kod</label>
                            <input id="kod" type="text" class="form-control" name="kod">
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
                    <form method="post" action="{{ route('yazici_1.delete') }}">
                        @csrf
                        <input id="yazici_1_delete_id" type="hidden" name="id">
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
                id = $(this)[0].getAttribute('yazici_1-id');
                $.ajax({
                    type: 'GET',
                    url: '{{ route('yazici_1.getdata') }}',
                    data: {id: id},
                    success: function (data) {
                        $('#yazici_1_id').val(data.id);
                        $('#yazici_no').val(data.yazici_no);
                        $('#seri_no').val(data.seri_no);
                        $('#ozellik').val(data.ozellik);
                        $('#marka').val(data.marka);
                        $('#zimmet').val(data.zimmet);
                        $('#mudurluk').val(data.mudurluk	);
                        $('#tarih').val(data.tarih);
                        $('#aciklama').val(data.aciklama);
                        $('#durum').val(data.durum);
                        $('#kod').val(data.kod);
                        $('#ekstra').val(data.ekstra);
                        $('#editModal').modal();
                    }
                });
            });

            $(document).on('click', '.delete-click', function () {
                id = $(this)[0].getAttribute('yazici_1-id');
                $.ajax({
                    success: function () {
                        $('#yazici_1_delete_id').val(id);
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

