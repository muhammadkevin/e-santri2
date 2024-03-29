@extends('layout.user')

@section('title')
  Admin-BackEnd Detile
@endsection

@section('header')
<link href="{{url('admin/jquery_ui/jquery-ui.css')}}" rel="stylesheet">
@endsection

@section('conten')<br><br>

    <div class="container"> 
        @if(count($errors) > 0)
        <div class="alert alert-danger">
          @foreach ($errors->all() as $error)
          {{ $error }} <br/>
          @endforeach
        </div>
        @endif

          @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button> 
              <strong>{{ $message }}</strong>
          </div>
          @endif
  <center>
<div class="row">
   <div class="form mt-2">
    <h3>Profil</h3><br>
  <form action="/user/update/{{$santri->id}}" method="post"  class="contactForm" enctype="multipart/form-data" style=" width: 90%;" >
  {{ csrf_field() }}
  {{ method_field('PUT') }}
    <input type="hidden" name="status" id="status" value="1">
      
      <div class="col-xl-10">
        <div class="form-group">
          <div id="upload-img" class="rounded-circle bg-secondary">
            <div class="form-group p-2 pt-5">
              <label class="btn btn-light btn-sm mt-4 btn-block" for="input_gambar">Upload Foto</label>
              <input type="file" class="form-control" name="gambar" id="input_gambar" placeholder="gambar" data-rule="gambar" data-msg="Please enter a valid gambar"/>
          </div>
          </div>
        </div>

          <div class="form-group">
            <input type="hidden" name="user_NIM" class="form-control" id="user_NIM" placeholder="user_NIM" required="on" value="{{Sentinel::getUser()->NIM}}">
          </div>

        <div class="form-group text-left">
          <h4>Isi Informasi Pribadi</h4>
          <div class="form-group mt-3">
            <label for="no_hp">Nomer HP :</label>
            <input type="number" name="no_hp" class="form-control" id="no_hp" required="on" value="{{$santri->no_hp}}">
          </div>
          
          <div class="form-group">
            <label for="tempat_lahir">Tempat Lahir :</label>
            <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" required="on" value="{{$santri->tempat_lahir}}"/>
          </div>

          <div class="form-group">
            <label for="tgl_lahir">Tanggal Lahir :</label>
            <input type="text" class="form-control input-tanggal" name="tgl_lahir" id="tgl_lahir" data-rule="tgl_lahir" autocomplete="ogg" required="on" value="{{$santri->tgl_lahir}}"/>
          </div>

          <div class="form-group">
            <label for="alamat">Alamat Lengkap :</label>
            <input type="text" class="form-control" name="alamat" id="alamat"data-rule="alamat" data-msg="Please enter a valid alamat" required="on" value="{{$santri->alamat}}"/>
          </div>
        </div>

      <div class="form-row text-left">

        <div class="form-group col-lg-6">
          <label for="anake_ke">Anak Ke :</label>
          <input type="text" name="anake_ke" class="form-control" id="anake_ke" required="on" value="{{$santri->anake_ke}}">
        </div>
              
        <div class="form-group col-lg-6">
          <label for="awal_mondok">Awal Mondok :</label>
          <input type="text" name="awal_mondok" class="form-control input-tanggal" id="awal_mondok" required="on" autocomplete="off"b required="on" value="{{$santri->awal_mondok}}">
        </div> 

        <div class="form-group col-lg-6">
          <label for="sosial_media">Sosial Media :</label>
          <input type="text" name="sosial_media" class="form-control" id="sosial_media" required="on" value="{{$santri->sosial_media}}">
        </div>      

        <div class="form-group col-lg-6">
          <label for="asal_sekolah">Asal Sekolah :</label>
          <input type="text" class="form-control" name="asal_sekolah" id="asal_sekolah" required="on" value="{{$santri->asal_sekolah}}"/>
        </div>

        <div class="form-group col-lg-6">
          <label for="jk">Jenis Kelamin :</label>
          <select class="custom-select" name="jk" id="jk">
            <option value="L">Laki-Laki</option>
            <option value="P">Perempuan</option>
        </select>
        </div>

        <div class="form-group col-lg-6">
          <label for="smester_id">Semester :</label>
          <select class="custom-select" name="smester_id" id="smester_id">
            <option value="{{$santri->smester_id}}">Smester/Kelas</option>
            @foreach($smester as $s)
              <option value="{{$s->id}}">{{$s->smester}}</option>
            @endforeach
        </select>
        </div>

        <div class="form-group col-lg-6">
          <label for="prodi_id">Prodi :</label>
          <select class="custom-select" name="prodi_id" id="prodi_id">
            <option value="{{$santri->prodi_id}}">prodi/jurusan</option>
            @foreach($prodi as $p)
              <option value="{{$p->id}}">{{$p->prodi}}</option>
            @endforeach
          </select>
        </div>

      <div class="form-group col-lg-6">
        <label for="kamar_id">Kamar :</label>
        <select class="custom-select" name="kamar_id" id="kamar_id">
          <option value="{{$santri->kamar_id}}">kamar dan asrama</option>
          @foreach($kamar as $k)
            <option value="{{$k->id}}">{{$k->kamar}}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group col-lg-6">
        <label for="madrasah_id">Madrasah :</label>
        <select class="custom-select" name="madrasah_id" id="madrasah_id">
          <option value="1">Idad</option>
          <option value="2">Mi</option>
          <option value="3">Mts</option>
          </select>
        </div>

      <div class="form-group col-lg-6">
        <label for="kls_id">Kelas Madrasah :</label>
        <select class="custom-select" name="kls_id" id="kls_id">
          <option value="1">Satu</option>
          <option value="2">Dua</option>
          <option value="3">Tiga</option>
          <option value="4">Empat</option>
          <option value="5">Lima</option>
          <option value="6">Enam</option>
          </select>
        </div>
      </div>
    </div>                
      <div class="text-center col-lg-3 mt-3">
        <button class="btn btn-success btn-block" type="submit" name="submit" title="Send Message">Save All</button>
      </div>
    </form>
  </div>
</div>
</center><br>
@endsection

@section('footer')
<script src="{{url('admin/js/bootstrap-datetimepicker.js')}}"></script>
<script src="{{url('admin/jquery_ui/jquery-ui.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function(){
   $('.input-tanggal').datepicker({
            dateFormat:'yy-mm-dd',
        });

  });
</script>
@endsection

