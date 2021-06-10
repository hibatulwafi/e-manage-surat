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
						<td><h2><b><u>SURAT KETERANGAN</u></b> </h2></td>
					</tr>
					<tr>
						<td><h5>
								@if($no_surat == null || $no_surat == "")
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
							<td colspan="3"><h5>Yang bertanda tangan di bawah ini: </h5></td>
						</tr>
						<tr>
							<td width="30%"><h5>Nama</h5></td>
							<td width="2%"><h5>:</h5></td>
							<td><h5>Drs.Erwanda, M.Pd</h5></td>
						</tr>
						<tr>
							<td><h5>NIP</h5></td>
							<td><h5>:</h5></td>
							<td><h5>196606271993031000</h5></td>
						</tr>
						<tr>
							<td><h5>Jabatan</h5></td>
							<td><h5>:</h5></td>
							<td><h5>Kepala Sekolah SMA Negeri 1 Cikembar</h5></td>
						</tr>
						<tr>
							<td><h5>Alamat</h5></td>
							<td><h5>:</h5></td>
							<td><h5>Jl. Pelabuhan II KM.20 Tlp.(0266)321632</h5></td>
						</tr>
						<tr>
							<td><h5>Kecamatan</h5></td>
							<td><h5>:</h5></td>
							<td><h5>Cikembar</h5></td>
						</tr>
						<tr>
							<td colspan="3" style="padding-top: 16px; padding-bottom:16px;"><h5> Menerangkan Bahwa : </h5></td>
						</tr>
						<tr>
							<td><h5>Nama</h5></td>
							<td><h5>:</h5></td>
							<td><h5>{{$nama}}</h5></td>
						</tr>
						<tr>
							<td><h5>Kelas</h5></td>
							<td><h5>:</h5></td>
							<td><h5>{{$kelas}}</h5></td>
						</tr>
						<tr>
							<td><h5>NIS</h5></td>
							<td><h5>:</h5></td>
							<td><h5>{{$nis}}</h5></td>
						</tr>
						<tr>
							<td><h5>NISN</h5></td>
							<td><h5>:</h5></td>
							<td><h5>{{$nisn}}</h5></td>
						</tr>
						<tr>
							<td><h5>Tempat/Tanggal Lahir</h5></td>
							<td><h5>:</h5></td>
							<td><h5>{{$ttl}}</h5></td>
						</tr>
						<tr>
							<td><h5>Alamat</h5></td>
							<td><h5>:</h5></td>
							<td><h5>{{$alamat}}</h5></td>
						</tr>
						<tr>
							<td colspan="3" style="padding-top: 16px; padding-bottom:16px;"><h5>Nama tersebut diatas adalah benar benar siswa SMA Negeri 1 Cikembar Desa Cikembar Kec.Cikembar Kab.Sukabumi, Pada Tahun Pelajaran 
							<?php 
								$year =  date_create()->format('Y');
								$year2 = $year + 1;
							echo $year.'/'.$year2;
							?>
							</h5></td>
						</tr>
						<tr>
							<td colspan="3" style="padding-bottom:16px;"><h5>Demikian surat keterangan ini dibuat untuk dipergunakan sebagai mana mestinya.
							</h5></td>
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
							<td width="33%" style="vertical-align: bottom;"></td>
							<td width="33%"></td>
							<td width="33%"><h5>Cikemar, {{$tanggal}} <br/> Kepala Sekolah</td>
						</tr>
						<tr>
							<td height="100px"></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td><h5>Drs. Erwanda, M,Pd. <br/> NIP:19600000000</h5></td>
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