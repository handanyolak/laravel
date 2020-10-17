@extends('master')

@section('title')
    Notebook
@endsection

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800 text-center text-primary">TEPEBAŞI BELEDİYESİ NOTEBOOK ZİMMETİ</h1>
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
                            <th>Seri&nbsp;No</th>
                            <th>Marka</th>
                            <th>Özellik</th>
                            <th>Zimmet</th>
                            <th>Müdürlük</th>
                            <th>Tarih</th>
                            <th>Açıklama</th>
                            <th>Ekstra</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>İşlemler</th>
                            <th>Sıra</th>
                            <th>Seri&nbsp;No</th>
                            <th>Marka</th>
                            <th>Özellik</th>
                            <th>Zimmet</th>
                            <th>Müdürlük</th>
                            <th>Tarih</th>
                            <th>Açıklama</th>
                            <th>Ekstra</th>
                        </tr>
                        </tfoot>


                        <tbody>

                        @foreach($notebook_tablos as $notebook_tablo)
                            <tr>
                                <td>
                                    <a notebook-id="{{ $notebook_tablo->id }}" title="Düzenle" class="btn btn-sm btn-circle btn-warning mx-auto text-white edit-click">
                                        <i class="fa fa-pen align-middle"></i>
                                    </a>
                                    <a notebook-id="{{ $notebook_tablo->id }}" title="Sil" class="btn btn-sm btn-circle btn-danger mx-auto text-white delete-click">
                                        <i class="fa fa-times align-middle"></i>&nbsp;
                                    </a>
                                </td>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$notebook_tablo->sn}}</td>
                                <td>{{$notebook_tablo->marka}}</td>
                                <td>{{$notebook_tablo->ozellik}}</td>
                                <td>{{$notebook_tablo->zimmet}}</td>
                                <td>{{$notebook_tablo->mudurluk}}</td>
                                <td>{{$notebook_tablo->tarih}}</td>
                                <td>{{$notebook_tablo->aciklama}}</td>
                                <td>{{$notebook_tablo->ekstra}}</td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
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
                    <form method="post" action="{{ route('notebook.update') }}">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" name="id" id="notebook_id">
                            <label>Seri No</label>
                            <input id="sn" type="text" class="form-control" name="sn">
                        </div>
                        <div class="form-group">
                            <label>Marka</label>
                            <input id="marka" type="text" class="form-control" name="marka">
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
                            <select class="form-control" name="mudurluk" id="mudurluk">
                                @foreach ($mudurlukler_tablos as $mudurlukler_tablo)
                                    <option value="{{ $mudurlukler_tablo->mudurluk }}" {{ ( $mudurlukler_tablo->mudurluk == $notebook_tablos) ? 'selected' : '' }}> {{ $mudurlukler_tablo->mudurluk }} </option>
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

    <div id="createModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Veri Ekle</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('notebook.create') }}">
                        @csrf
                        <div class="form-group">
                            <label>Seri No</label>
                            <input type="text" class="form-control" name="sn">
                        </div>
                        <div class="form-group">
                            <label>Marka</label>
                            <input type="text" class="form-control" name="marka">
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

    <div id="deleteModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Veri Silme</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('notebook.delete') }}">
                        @csrf
                        <input id="notebook_delete_id" type="hidden" name="id">
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
                id = $(this)[0].getAttribute('notebook-id');
                $.ajax({
                    type: 'GET',
                    url: '{{ route('notebook.getdata') }}',
                    data: {id: id},
                    success: function (data) {
                        $('#notebook_id').val(data.id);
                        $('#sn').val(data.sn);
                        $('#marka').val(data.marka);
                        $('#ozellik').val(data.ozellik);
                        $('#zimmet').val(data.zimmet);
                        $('#mudurluk').val(data.mudurluk);
                        $('#tarih').val(data.tarih);
                        $('#aciklama').val(data.aciklama);
                        $('#ekstra').val(data.ekstra);
                        $('#editModal').modal();
                    }
                });
            });

            $(document).on('click', '.delete-click', function () {
                id = $(this)[0].getAttribute('notebook-id');
                $.ajax({
                    success: function () {
                        $('#notebook_delete_id').val(id);
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
