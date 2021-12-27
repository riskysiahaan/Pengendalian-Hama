@extends('layouts.app')
@section('content')
<div id="content_input"></div>
<div id="content_list">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mt-3">
            <button onclick="load_input('{{route('pesanan.create')}}');" style="float: right;" class="btn btn-primary mb-3" type="button">
                Tambah Pesanan
            </button>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h2>Daftar Pesanan</h2>
                            <div id="list_result"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button onclick="window.print()" style="float: right;" class="btn btn-primary mt-3" type="button"  data-toggle="modal" data-target="#CreateArticleModal">
            Cetak Daftar Pesanan
        </button>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
    load_list(1);
</script>
@endsection