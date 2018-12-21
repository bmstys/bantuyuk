@extends('template.utamabpbd')

@section('css')
<link rel="stylesheet" href="{{asset('/css/styleRegistrasi.css')}}">
@endsection

@section('content')
<header id="home_page" style="padding-top: 125px;background-color: #F5F6FF;z-index: 0;">
    <div class="container" style="min-height: 595px;">
	    <div class="row justify-content-center">
	        <h3 style="color: black;margin-bottom: 25px;"><b>Tulis Bencana Terbaru</b></h3>
	    </div>
        <div class="row">
            <form action="{{ url('/tambah_bencana') }}" class="form-registrasi justify-content-center" style="padding-left: 20px;padding-right: 30px;" method="POST" enctype="multipart/form-data" >
                @csrf

            	<div class="form-row">
            		<div class="form-group col-md-6">
		                <label for="namaBencana" style="color: black;font-weight: 500;">Nama Bencana</label>
		                <input type="text" class="form-control" id="namaBencana" style="padding-top: 5px;padding-bottom: 5px;" name="namaBencana" autofocus required>
		            </div>
		            <div class="form-group col-md-6">
		                <label for="lokasiBencana" style="color: black;font-weight: 500;">Lokasi  Bencana</label>
		                <input type="text" class="form-control" id="lokasiBencana" style="padding-top: 5px;padding-bottom: 5px;" name="lokasiBencana" required>
		            </div>
            	</div>
            	<div class="form-row">
            		<div class="form-group col-md-6   ">
                        <label for="tanggalBencana" style="color: black;font-weight: 500;">Tanggal Bencana</label>
                        <input type="date" class="form-control" id="tanggalBencana" style="padding-top: 5px;padding-bottom: 5px;height: 32px;" name="tanggalBencana" required>
                    </div>
                    <div class="form-group col-md-6   ">
                        <label for="jumlahKorban" style="color: black;font-weight: 500;">Jumlah Korban</label>
                        <input type="number" class="form-control" id="jumlahKorban" style="padding-top: 5px;padding-bottom: 5px;" name="jumlahKorban" required>
                    </div>
            	</div>
                <div class="form-row">
                    <div class="form-group col-md-6   ">
                        <label for="bukaDonasi" style="color: black;font-weight: 500;">Buka Donasi</label>
                        <input type="date" class="form-control" id="bukaDonasi" style="padding-top: 5px;padding-bottom: 5px;height: 32px;" name="bukaDonasi" required>
                    </div>
                    <div class="form-group col-md-6   ">
                        <label for="tutupDonasi" style="color: black;font-weight: 500;">Tutup Donasi</label>
                        <input type="date" class="form-control" id="tutupDonasi" style="padding-top: 5px;padding-bottom: 5px;height: 32px;" name="tutupDonasi" required>
                    </div>
                </div>

                <div class="form-group text-left">
                    <label style="color: black;font-weight: 500;">Upload foto bencana</label>
                    <input id="input-b2" name="file_upload" type="file" class="file" data-show-preview="false" style="width: 100%;">
                </div>

                <div class="form-row">
                    <div class="form-group" style="padding-left: 5px;">
                        <table style="border: 0px;">
                            <thead>
                                <tr>
                                    <th style="width: 300px;margin-right: 5px;"><label style="color: black;font-weight: 500;">Kebutuhan</label></th>
                                    <th style="width: 200px;margin-right: 5px;"><label style="color: black;font-weight: 500;">Satuan</label></th>
                                    <th style="margin-right: 5px;"><label style="color: black;font-weight: 500;">Jumlah</label></th>
                                </tr>
                            </thead>
                            <tbody id="form-kebutuhan">
                                <tr>
                                    <td>
                                        <input name="kebutuhan[]" class="form-control" style="height: 32px;margin-right: 10px;width: 300px;margin-bottom: 10px;color: black;" required>     
                                    </td>
                                    <td>
                                        <input name="satuan[]" class="form-control" style="height: 32px;margin-right: 10px;width: 200px;margin-bottom: 10px;color: black;" required>     
                                    </td>
                                    <td>
                                        <input name="jumlah[]" class="form-control" style="height: 32px;margin-bottom: 10px;color: black;" required>     
                                    </td>
                                </tr>
                                <tr id="tr-tambah-kebutuhan">
                                    <td colspan="2"></td>
                                    <td>
                                        <button id="btn-tambah-kebutuhan" type="button" class="btn" style="float: right;background-color: #E32F43;color: white;margin-bottom: 10px;margin-top: 10px;">Tambah</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

	            <button type="submit" class="btn" style="float: right;background-color: #E32F43;color: white;margin-bottom: 40px;width: 650px;">Update</button>
	        </form>
        </div>
    </div>
</header>
@endsection

@section('js')
<script>
    $(document).ready(function () {
        $('#btn-tambah-kebutuhan').click(function () {
            var tr = $('#form-kebutuhan').children().first().clone();
            tr.find('input').val('');
            tr.insertBefore($('#tr-tambah-kebutuhan'));
            });
    });
</script>
@endsection