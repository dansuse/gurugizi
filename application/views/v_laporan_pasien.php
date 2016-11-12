<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sign Up</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().CSS_FOLDER; ?>bootstrap.min.css">
	<script src="<?php echo base_url().JS_FOLDER; ?>moment.js"></script>
	<script src="<?php echo base_url().JS_FOLDER; ?>jquery-3.1.1.min.js"></script>
	<script src="<?php echo base_url().JS_FOLDER; ?>bootstrap.min.js"></script>
	<script src="<?php echo base_url().JS_FOLDER; ?>bootstrap-datetimepicker.js"></script>
	<script src="<?php echo base_url().JS_FOLDER; ?>pwstrength-bootstrap.min.js"></script>

	<script>
		$(function () {
				$('#datetimepicker1').datetimepicker({
					format: 'L'
				});
				$(':password').pwstrength();
		});
	</script>
	<style type="text/css">
	

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	h1 {
		color: #444;
		background-color: transparent;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 0 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
		text-align: center;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	.btn{
		margin: 50px;
	}

	</style>
	<script src="<?php echo base_url().JS_FOLDER; ?>jquery-3.1.1.min.js"></script>
	<script>
		$( document ).ready(function() {

		});

	</script>
</head>
<body>

<div id="container">

	<H1>Laporan Pasien</H1>
	<HR>
	<?php
		echo form_open('c_laporan/fHandlePasien');
		
		if(!isset($perPage)){$perPage=5;}
		if(!isset($keyword)){$keyword='';}
		if(!isset($kategori)){$kategori='email';}
		if(!isset($tanggal))
		{
			$b=false;$e=true;$s=false;
		}
		else
		{
			$b=false;$e=false;$s=false;
			if($tanggal == '<'){$b = true;}
			if($tanggal == '='){$e = true;}
			if($tanggal == '>'){$s = true;}
		}
		
		echo '<p>';
		echo 'Jumlah Data Pasien Per-Halaman : ';
		echo '<input type="number" name="nPerPage" min="1" max="10" value = "'.$perPage.'">';
		echo '</p>';
		
		echo '<p>';
		echo 'Keyword Pencarian : ';
		echo form_input('tbKeyword',$keyword);
		echo '</p>';
		
		echo '<p>';
		$js = 'id="kategori" onChange="gantiKategori();"';
		$options = array(
			'email' => 'Email',
			'nama' => 'Nama',
			'jenis_kelamin' => 'Jenis Kelamin',
			'tanggal_lahir' => 'Tanggal Lahir',
			'domisili' => 'Domisili',
			'keterangan' => 'Keterangan',
		);
		
		echo 'Kategori Pencarian : ';
		echo form_dropdown('ddKategori',$options,$kategori,$js);
		echo '</p>';
		
		$display = 'none';
		if($kategori == 'tanggal_lahir')
		{
			$display = 'block';
		}
		echo '<p id="filterTanggal" style = "display:'.$display.';">';
		echo 'Filter Tanggal "YYYY/MM/DD": <br>';
		echo form_radio('rbFilterTanggal', '<', $b);
		echo 'Lebih Kecil<br>';
		echo form_radio('rbFilterTanggal', '=', $e);
		echo 'Sama Dengan<br>';
		echo form_radio('rbFilterTanggal', '>', $s);
		echo 'Lebih Besar<br>';
		echo '</p>';
		echo '<p>';
		echo form_submit('btnRefresh','Refresh');
		echo '</p>';
		echo '<hr>';
		
		foreach($pasien as $p)
		{
			if (file_exists(base_url('assets/images/'.$p->foto_profil.'.jpg'))) 
			{
				echo '<p>';
				echo "<img style='width : 100px; height : 100px;' src='".base_url('assets/images/'.$p->foto_profil.'.jpg')."'>";
				echo '</p>';
			}
			else
			{
				echo '<p>';
				$foto = '';
				if($p->jenis_kelamin == 'L'){$foto = 'foto-profil-boy.png';}
				else{$foto = 'foto-profil-girl.png';}
				echo "<img style='width : 100px; height : 100px;' src='".base_url('assets/images/'.$foto)."'>";
				echo '</p>';
			}
			echo '<p><b> Email : ';
			echo $p->email;
			echo '</b></p>';
			echo '<p> Nama : ';
			echo $p->nama;
			echo '</p>';
			echo '<p> Tanggal Lahir : ';
			echo $p->tanggal_lahir;
			echo '</p>';
			echo '<p> Jenis Kelamin : ';
			echo $p->jenis_kelamin;
			echo '</p>';
			echo '<p> No Telp : ';
			echo $p->notelp;
			echo '</p>';
			echo '<p> Domisili : ';
			echo $p->domisili;
			echo '</p>';
			echo '<p> Berat Badan : ';
			echo $p->berat_badan;
			echo '</p>';
			echo '<p> Tinggi Badan : ';
			echo $p->tinggi_badan;
			echo '</p>';
			echo '<p > Keterangan : ';
			echo $p->keterangan;
			
			$convertEmail = str_replace("@", ':', $p->email);
			
			echo '<p>';
			echo '<a style="text-decoration:none; color:black;" href = "'.site_url('c_laporan/riwayatPertanyaan/'.$convertEmail).'"><input style="width:180px;" type = "button" value = "Riwayat Pertanyaan">'.'</input></a>';
			echo '</p>';
			echo '<p>';
			echo '<a style="text-decoration:none; color:black;" href = "'.site_url('c_laporan/riwayatKomentar/'.$convertEmail).'"><input style="width:180px;" type = "button" value = "Riwayat Komentar">'.'</input></a>';
			echo '</p>';
			echo '<p>';
			echo '<a style="text-decoration:none; color:black;" href = "'.site_url('c_laporan/deletePasien/'.$convertEmail).'"><input style="width:180px;" type = "button" value = "Delete User">'.'</input></a>';
			echo '</p>';
			echo '<HR>';
		}
		echo $links;
		echo form_close();
	?>

</div>

</body>
<script>
function gantiKategori()
{
	var e = document.getElementById("kategori");
	var strUser = e.options[e.selectedIndex].value;
	if(strUser == 'tanggal_lahir')
	{
		document.getElementById("filterTanggal").style.display = "block";
	}
	else
	{
		document.getElementById("filterTanggal").style.display = "none";
	}
}
</script>
</html>
