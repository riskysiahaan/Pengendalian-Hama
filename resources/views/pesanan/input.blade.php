<div class="container">
    <form class="form-horizontal mt-5" id="form-tambah">
        <div class="row justify-content-center">
            <div class="card">
                <h4 class="modal-title">Tambah Pesanan Baru</h4>
                    <div class="form-group">
                        <label class="form-label"for="nama_Pemesan">Nama Pemesan</label>
                        <input type="text" class="form-control form-control-solid" name="nama_Pemesan" id="nama_Pemesan" value="{{$pesanan->nama_Pemesan}}">
                    </div>
                    <div class="form-group">
                        <label  class="form-label"for="id_penanganan">Jenis Penanganan</label>
                        <select name="id_penanganan" name="id_penanganan" class="form-select" aria-label="Default select example">
                            <option>Pilih Jenis Penanganan</option>
                            @foreach ($jenispenanganan as $jp)
                                <option value="{{ $jp->id }}" {{$jp->id==$pesanan->id_penanganan ? 'selected' : ''}}>{{ $jp->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label"for="id_jenis_tempat">Jenis Tempat</label>
                        <select name="id_jenis_tempat" name="id_jenis_tempat" class="form-select" aria-label="Default select example">
                            <option>Pilih Jenis Tempat</option>
                            @foreach ($jenistempat as $jt)
                                <option value="{{ $jt->id }}" {{$jt->id==$pesanan->id_jenis_tempat ? 'selected' : ''}}>{{ $jt->nama_tempat }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label"for="panjang">Panjang Area</label>
                        <input type="number" class="form-control form-control-solid" name="panjang" id="panjang" value="{{$pesanan->panjang}}">
                    </div>
                    <div class="form-group">
                        <label class="form-label"for="lebar">Lebar Area</label>
                        <input type="number" class="form-control form-control-solid" name="lebar" id="lebar" value="{{$pesanan->lebar}}">
                    </div>
                    <div class="form-group">
                        <label class="form-label"for="alamat">Alamat Pemesan</label>
                        <input type="text" class="form-control form-control-solid" name="alamat" id="alamat" value="{{$pesanan->alamat}}">
                    </div>
                    <div class="form-group">
                        <label class="form-label"for="tanggal_pengerjaan">Tanggal Pengerjaan</label>
                        <input type="date" class="form-control form-control-solid" name="tanggal_pengerjaan" value="{{$pesanan->tanggal_pengerjaan}}">
                    </div>
                    <div class="form-group">
                        <label class="form-label"for="no_telp">Nomor Telepon Pemesan</label>
                        <input type="text" class="form-control form-control-solid" name="no_telp" value="{{$pesanan->no_telp}}">
                    </div>
                    <div class="form-group">
                        <label class="form-label"for="email">Email</label>
                        <input type="text" class="form-control form-control-solid" name="email" value="{{$pesanan->email}}">
                    </div>
                    @if($pesanan->id)
                    <div class="form-group">
                        <label class="form-label"for="status">Status</label>
                        <select name="status" name="status" class="form-select" aria-label="Default select example">
                            @if($pesanan->status == 'Pending')
                            <option>Pilih Status</option>
                                <option value="{{ $pesanan->status }}" Selected>{{ $pesanan->status }}</option>
                                <option value="selesai">Selesai</option>
                                @else
                                <option value="selesai" selected>Selesai</option>
                                @endif
                        </select>
                    </div>
                    @endif
                </div>
        </div>
            @if($pesanan->id)
            <button type="button" class="btn btn-success" onclick="handle_save('#SubmitCreateArticleForm','#form-tambah','{{route('pesanan.update',$pesanan->id)}}','PUT','Update')" id="SubmitCreateArticleForm">Update</button>
            @else
            <div class="mb-0">
            <button type="button" class="btn btn-success" onclick="handle_save('#SubmitCreateArticleForm','#form-tambah','{{route('pesanan.store')}}','POST','Kirim')" id="SubmitCreateArticleForm">Create</button>
            @endif
            <button type="button" class="btn btn-danger" onclick="load_list(1);">Back</button>
            </div>
    </form>
</div>