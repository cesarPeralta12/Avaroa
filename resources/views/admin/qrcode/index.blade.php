@extends('layout.master')
@section('title')
LISTA DE CÓDIGOS QR
@endsection
@section('main_content')
  <div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                @if(Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ session('success') }}</p>
                </div>
                @endif
                @if(Session::has('fail'))
                <div class="alert alert-danger">
                    <p>{{ session('fail') }}</p>
                </div>
                @endif
                <div class="card-header">
                    <h5>LISTA DE CÓDIGOS QR</h5>
                </div>
                <div class="card-body">
                    <h1>Subir Código QR</h1>

                    <form action="{{ route('qrcode.generate') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="qrcode" class="form-label">Subir imagen del Código QR</label>
                            <input type="file" class="form-control" id="qrcode" name="qrcode" accept="image/*">
                        </div>

                        <!-- Preview container -->
                        <div id="qrcode-preview-container" class="mb-3" style="display: none;">
                            <label for="qrcode-preview" class="form-label">Preview</label>
                            <img id="qrcode-preview" class="img-fluid" alt="QR Code Preview">
                        </div>

                        <button type="submit" class="btn btn-primary">Subir Código QR</button>
                    </form>

                    <!-- JavaScript for QR code preview -->
                    <script>
                        document.getElementById('qrcode').addEventListener('change', function (e) {
                            const previewContainer = document.getElementById('qrcode-preview-container');
                            const previewImage = document.getElementById('qrcode-preview');

                            const file = e.target.files[0];

                            if (file) {
                                const reader = new FileReader();

                                reader.onload = function (e) {
                                    previewImage.src = e.target.result;
                                    previewContainer.style.display = 'block';
                                };

                                reader.readAsDataURL(file);
                            } else {
                                previewImage.src = '';
                                previewContainer.style.display = 'none';
                            }
                        });
                    </script>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card-box table-responsive">
                @if(Session::has('flash_message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    {{ session('flash_message') }}
                </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-bordered display" id="advance-1">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>CÓDIGO QR </th>
                                <th>ACCIÓN</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($qrcode as $data)
                            <tr>
                                <td class="text-center">{{$loop->iteration}}</td>
                                <td>
                                    <img class="img-radius img-70 align-top m-r-15 rounded-circle" src="{{ asset('qrcode/' . $data->qrcode_path) }}" height="70px" alt="">

                                </td>
                                <td>
                                    <a href="{{ url('admin/destroy_qrcode', $data->id) }}" class="btn btn-icon waves-effect waves-light btn-danger m-b-5 m-r-5" data-toggle="tooltip" title="Delete">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
