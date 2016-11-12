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

	<?php
		echo form_open('c_laporan/fHandleNutritionist');
		echo '<H1>Laporan Postingan Nutritionist '.$nutritionist->nama.'</H1>';
		echo form_submit('btnKembaliKeLapNutritionist','Kembali Ke Laporan Nutritionist');
		echo '<HR>';
	
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
		echo 'Jumlah Pertanyaan Per-Halaman : ';
		echo '<input type="number" name="nPerPage" min="1" max="10" value = "'.$perPage.'">';
		echo '</p>';
		
		echo '<p>';
		echo 'Keyword Pencarian : ';
		echo form_input('tbKeyword',$keyword);
		echo '</p>';
		
		echo '<p>';
		$js = 'id="kategori" onChange="gantiKategori();"';
		$options = array(
			'judul' => 'Judul',
			'isi_postingan' => 'Isi',
			'tag' => 'Tag',
			'waktu_posting' => 'Waktu',
			'keterangan' => 'Keterangan',
		);
		
		echo 'Kategori Pencarian : ';
		echo form_dropdown('ddKategori',$options,$kategori,$js);
		echo '</p>';
		
		$display = 'none';
		if($kategori == 'waktu_posting')
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
		echo form_submit('btnRefreshPostingan','Refresh');
		echo '</p>';
		echo '<hr>';
		
		foreach($postingan as $p)
		{
			echo '<H4>';
			echo $p->judul;
			echo '</H4>';
			echo '<p><b>Isi : </b><br>';
			echo $p->isi_postingan;
			echo '</p>';
			echo '<p><b>Tag : </b><br>';
			echo $p->tag;
			echo '</p>';
			echo '<p><b>Tanggal Postingan : </b>';
			echo $p->waktu_posting;
			echo '</p>';
			
			$convertEmail = str_replace("@", ':', $p->email_nutritionist);
			echo '<p>';
			echo '<a style="text-decoration:none; color:black;" href = "'.site_url('c_laporan/deletePostingan/'.$convertEmail.'/'.$p->id_postingan).'"><input type = "button" value = "Hapus Postingan">'.'</input></a>';
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
	if(strUser == 'waktu_posting')
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
