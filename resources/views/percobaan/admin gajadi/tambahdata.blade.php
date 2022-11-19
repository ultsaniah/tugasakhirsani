@extends('layouts.admin')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@500&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Laila&display=swap" rel="stylesheet">

@section('css')
    <style>
        .ck-editor__editable[role="textbox"] {
            /* editing area */
            min-height: 400px;
        }
        .jdul{
        font-family: 'Baloo 2', cursive;
        }
        .menu {
            font-family: 'Laila', sans-serif;
        }
    </style>
@endsection

@section('content')

<div class="block align-items-center" style="margin-top: 25px; color: white">
    <div>
        <h2 class="jdul">
            DATA MASTER
        </h2>
    </div>
    <div class="mx-1">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb ">
              <li class="breadcrumb-item menu"><a href="{{ url('dashboard') }}" style="text-decoration: none">Dashboard</a></li>
              <li class="breadcrumb-item menu"><a href="{{ url('master') }}" style="text-decoration: none">Data Master</a></li>
              <li class="breadcrumb-item active menu" aria-current="page">Tambah Data</li>
            </ol>
        </nav>
    </div>
    
</div>


<div class="card card-info">
        
    <div class="card-header">
        <h3 class="card-title">Tambah Paket Restorasi</h3>
    </div>
        
    <form action="" class="form-horizontal" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Nama Paket</label>
                <div class="col-sm-10">
                    <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Paket">
                </div>
            </div>
            <div class="form-group row">
                <label for="kategori" class="col-sm-2 col-form-label">Kategori Motor</label>
                <div class="col-sm-10">
                    <select name="kategori" class="form-select">
                        <option selected disabled>-Pilih-</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="harga" class="col-sm-2 col-form-label">Harga Paket</label>
                <div class="col-sm-10">
                    <input type="number" name="harga" class="form-control" id="harga" placeholder="Harga Paket">
                </div>
            </div>
            <div class="form-group row">
                <label for="durasi" class="col-sm-2 col-form-label">Durasi Pengerjaan</label>
                <div class="col-sm-10">
                    <input type="text" name="durasi" class="form-control" id="durasi" placeholder="Durasi Pengerjaan">
                </div>
            </div>
            <div class="form-group row">
                <label for="Deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                <div class="col-sm-10">
                    <textarea name="deskripsi" class="form-control" id="deskripsi" rows="3"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                <div class="input-group col-sm-10">
                    <div class="custom-file">
                        <input type="file" name="foto[]" multiple class="custom-file-input" id="exampleInputFile" accept="image/png, image/jpeg, image/jpg">
                        <label class="custom-file-label" id="exampleInputFileLabel" for="exampleInputFile">Choose file</label>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                    </div>
                </div>
            </div>
            <div class="form-group row" id="prevImg">
                <label for="foto" class="col-sm-2 col-form-label">Preview</label>
                <div class="col-sm-10" id="prevDiv">
                </div>
            </div>
        </div>
    
        <div class="card-footer bg-white">
            <button type="submit" class="btn btn-info">Simpan</button>
            <a href="#" role="button" class="btn btn-default float-right">Batalkan</a>
        </div>
    
    </form>

</div>
@endsection

@section('js')
    <script>
        $(document).ready(function(){
            $('#prevImg').hide();
            $('#exampleInputFile').change(function() {
                const amount = this.files.length;
                var filename = '';
                for(i = 0; i < amount; i++){
                    var reader = new FileReader();
                    reader.onload = function(event){
                        $($.parseHTML('<img>')).addClass('mx-1').width('150px').height('200px').attr('src', event.target.result).appendTo($('#prevDiv'));
                    }
                    reader.readAsDataURL(this.files[i]);
                    filename += this.files[i].name+"; ";
                }
                $('#exampleInputFileLabel').html(filename);
                $('#prevImg').show();
            })
        })
    </script>

    {{-- ckeditor js --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/35.2.1/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
        .create( document.querySelector( '#deskripsi' ) )
        .catch( error => {
            console.error( error );
        } );
    </script>
@endsection