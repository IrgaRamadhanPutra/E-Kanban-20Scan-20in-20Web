@extends('layouts.admin.app', ['title' => 'Dashboard'])
@section('judul')
    SCAN IN
@endsection(judul')
@section('content')
    <style>
        .container {
            display: none;
        }
    </style>
    <form id="form" method="post">
        @csrf
        @method('POST')
        <div class="form-outline mb-4 ">
            {{-- <textarea class="form-control" id="input1" rows="3"></textarea> --}}
            <label class="form-label" for="textAreaExample6"></label>
            <input type="text" class="form-control" id="input" name="input" placeholder="" value=""
                required="">
        </div>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body text-center">
                            <img id="gambar" class="card-img-top attractive-image" src="" alt="img"
                                style="height: 250px; widht:100px;">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="datatable datatable-primary">
                    <div class="table-responsive">
                        <table id="myTable" class="table table-bordered table-striped  table-hover">
                            <thead class="text-center"
                                style="text-transform: uppercase; font-size: 14px; background-color:#20598f">
                                <tr class="text-center">
                                    <th style="width: 1%; font-size: 10px; " class="text-white text-center">
                                        KANBAN NO</th>
                                    <th style="width: 1%; font-size: 10px;" class="text-white text-center">
                                        SQUENCE</th>
                                    <th style="width: 3%; font-size: 10px;" class="text-white text-center">
                                        PART NO</th>
                                    <th style="width: 2%; font-size: 10px;" class="text-white text-center">
                                        ITEM CODE</th>
                                    <th style="width: 1%; font-size: 10px;" class="text-white text-center">
                                        QTY</th>
                                    <th style="width: 0%; font-size: 10px;" class="text-white text-center">
                                        CUSTOMER</th>
                                    {{-- <th style="width: 1%; font-size: 10px;" class="text-white text-center">
                                    </th> --}}
                                </tr>
                            </thead>
                            <tbody id="body">
                            </tbody>
                        </table>
                        <input type="hidden" id="jml_row" name="jml_row" value="">
                    </div>
                </div>
            </div>
        </div>
        <br>
        <audio id="Audiosucces" src="{{ asset('audio\succes.mp3') }}"></audio>
        <audio id="Audioerror" src="{{ asset('audio\error.mp3') }}"></audio>
    </form>
    <!-- General JS Scripts -->
    </body>

    </html>
    @include('pokayoke.SCAN-IN.ajax')
@endsection('content')
