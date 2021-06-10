<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		
		.tableheader td {
			 text-align: center;
		}
		.tableheader{
			margin-top: 50px;
		}
		.nosurat td {
			 text-align: center;
		}
		.nosurat{
			 margin-top: 20px;
			 margin-bottom: 50px;
		}
		.tabelisi{
		}
		.ttdsurat{
			 margin-top: 20px;
			 margin-bottom: 50px;
		}
		* {
        	font-family: "Times New Roman", Times, serif;
   		}
	</style>
	<div class="col-12">
		<div class="col-12">
			<div class="col-12">

	<table width="100%" class='tableheader' >
			<tr> 
				<td rowspan="6"><img src="{{ asset('/img/logo.png') }}" width="130px"></td>
			</tr>
			<tr>
				<td><font size="5"><b>PEMERINTAH DAERAH PROVINSI JAWA BARAT <br/>DINAS PENDIDIKAN <br/>CABANG DINAS PENDIDIKAN WILAYAH V</b> </font></td>
			</tr>
			<tr>
				<td><font size="5"><b>SEKOLAH MENENGAH ATAS NEGERI 1 CIKEMBAR</b></font></td>
			</tr>
			<tr>
				<td>Jl Pelabuhan II Km. No 20 Telepon.(0266) 321032</td>
			</tr>
			<tr>
				<td>Website: www.sman1cikembar.sch.id e-mail:cikembarsma@yahoo.co.id</td>
			</tr>
			<tr>
				<td>Cikembar - Kabupaten Sukabumi Kode pos 43161</td>
			</tr>
			<tr>
				<td colspan="2"><img src="{{ asset('/img/line.png') }}" width="100%"></td>
			</tr>
	</table>	
			</div>
		</div>
	</div>

	<div class="col-12">
		<div class="col-12">
			<div class="col-12">
				<table width="100%" class="nosurat">
					<tr>
						<td><h2><b><u>SURAT TUGAS</u></b> </h2></td>
					</tr>
					<tr>
						<td><h5>@if($no_surat == null || $no_surat == "")
									Nomor : 800/087/SMAN1.CADISDIK WILV/2021
								@else
									{{$no_surat}}
								@endif
						</h5></td>
					</tr>
				</table>
			</div>
		</div>
	</div>

	<div class="col-12">
		<div class="col-12">
			<div class="col-12"> <h5>
				<table width="100%" class="tableisi">
						<tr>
							<td colspan="3"><h5>Kepala SMA Negeri 1 Cikembar Kabupaten Sukabumi Provinsi Jawa Barat dengan ini menugaskan kepada : </h5></td>
						</tr>
						<tr>
							<td width="30%"><h5>Nama</h5></td>
							<td width="2%"><h5>:</h5></td>
							<td><h5>{{$nama_lengkap}}</h5></td>
						</tr>
						<tr>
							<td><h5>NIP</h5></td>
							<td><h5>:</h5></td>
							<td><h5>{{$nip}}</h5></td>
						</tr>
						<tr>
							<td><h5>Pangkat / Gol.Ruang</h5></td>
							<td><h5>:</h5></td>
							<td><h5>{{$pangkat}}</h5></td>
						</tr>
						<tr>
							<td><h5>Jabatan</h5></td>
							<td><h5>:</h5></td>
							<td><h5>{{$jabatan}}</h5></td>
						</tr>
						<tr>
							<td><h5>Unit Kerja</h5></td>
							<td><h5>:</h5></td>
							<td><h5>{{$unit_kerja}}</h5></td>
						</tr>
						<tr>
							<td colspan="3" style="padding-top: 16px; padding-bottom:16px;"><h5>Untuk Menjadi Peserta dengan ketentuan sebagai berikut : </h5></td>
						</tr>
						<tr>
							<td><h5>Nama Kegiatan</h5></td>
							<td><h5>:</h5></td>
							<td><h5>{{$nama_kegiatan}}</h5></td>
						</tr>
						<tr>
							<td><h5>Hari/Tanggal</h5></td>
							<td><h5>:</h5></td>
							<td><h5>{{$tanggal}}</h5></td>
						</tr>
						<tr>
							<td><h5>Waktu</h5></td>
							<td><h5>:</h5></td>
							<td><h5>{{$jam}}</h5></td>
						</tr>
						<tr>
							<td><h5>Tempat</h5></td>
							<td><h5>:</h5></td>
							<td><h5>{{$tempat}}</h5></td>
						</tr>
						<tr>
							<td colspan="3" style="padding-top: 16px; padding-bottom:16px;"><h5>Demikian Surat Tugas ini dibuat untuk dilaksanakan dengan penuh tanggung jawab dan menyampaikan laporan setelah dikerjakan</h5></td>
						</tr>
				</table>
			</div>
		</div>
	</div>


	<div class="col-12">
		<div class="col-12">
			<div class="col-12">
				<table width="100%" class="ttdsurat">
						<tr>
							<td width="33%" style="vertical-align: bottom;"><h5>Yang Diberi Tugas</h5></td>
							<td width="33%"></td>
							<td width="33%"><h5>Cikembar, 17 Maret 2021 <br/> Kepala Sekolah</td>
						</tr>
						<tr>
							<td height="100px"></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td><h5>{{$nama_lengkap}}<br/> NIP:{{$nip}}</h5></td>
							<td></td>
							<td><h5>Drs. Erwanda, M,Pd. <br/> NIP:19600000000</h5></td>
						</tr>
				</table>
			</div>
		</div>
	</div>

	<div class="col-12">
		<div class="col-12">
			<div class="col-12">
				<table width="100%" class="ttdsurat">
						<tr>
							<td width="33%" style="vertical-align: bottom;"><h5>Yang Menerima</h5></td>
							<td width="33%"></td>
							<td width="33%"></td>
						</tr>
						<tr>
							<td height="100px"></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td><h5>(.....................................)</h5></td>
							<td></td>
							<td></td>
						</tr>
				</table>
			</div>
		</div>
	</div>

</body>
</html>


<script type="text/javascript">
<!--
window.print();
//-->
</script>