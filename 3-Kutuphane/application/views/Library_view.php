<?php
defined('BASEPATH') or exit('No direct script access allowed');
//print_r($books);
//print_r($types);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Kütüphane Otomasyonu</title>

	<style type="text/css">
		::selection {
			background-color: #E13300;
			color: white;
		}

		::-moz-selection {
			background-color: #E13300;
			color: white;
		}

		body {
			background-color: #fff;
			margin: 40px;
			font: 13px/20px normal Helvetica, Arial, sans-serif;
			color: #4F5155;
		}

		a {
			color: #003399;
			background-color: transparent;
			font-weight: normal;
			text-decoration: none;
		}

		a:hover {
			color: #97310e;
		}

		h1 {
			color: #444;
			background-color: transparent;
			border-bottom: 1px solid #D0D0D0;
			font-size: 19px;
			font-weight: normal;
			margin: 0 0 14px 0;
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
			min-height: 96px;
		}

		p {
			margin: 0 0 10px;
			padding: 0;
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
	</style>
</head>

<body>

	<div id="container">
		<a href="<?php echo base_url("type") ?>"><button>Tür Ekleme </button></a>

		<h1>Kitap Ekleme Modülü</h1>

		<div id="body">
			<form action="<?php echo base_url("library/save") ?>" method="post">

				<label>Kitap Adı:</label>
				<input type="text" name="name">

				<br>
				<label>Yazar:</label>
				<input type="text" name="author">

				<br>
				<label>Tür:</label>
				<select name="type">
					<?php foreach ($types as $type) { ?>
						<option value="<?php echo $type->id; ?>"><?php echo $type->name; ?></option>
					<?php } ?>
				</select>

				<br>
				<label>Yayınlanma Tarihi: </label>
				<input type="date" name="publish_date">

				<br>
				<label>Durum</label>
				<input type="radio" name="status" value="1">
				<label>Aktif</label>
				<input type="radio" name="status" value="0">
				<label>Pasif</label>

				<input type="submit" value="Formu Gönder">
			</form>

		</div>

		<div>
			<table border="2px">
				<thead>
					<tr>
						<th>id</th>
						<th>Kitap Adı</th>
						<th>Yazar Adı</th>
						<th>Tür</th>
						<th>Yayınlanma Tarihi</th>
						<th>Durum</th>
					</tr>
				</thead>

				<tbody>
					<?php foreach ($books as $book) { ?>
						<tr>
							<td><?php echo $book->id; ?></td>
							<td><?php echo $book->name; ?></td>
							<td><?php echo $book->author; ?></td>
							<td><?php echo getTypeName($book->type); ?></td>
							<td><?php echo $book->publish_date; ?></td>
							<td><?php echo $book->status == 1 ? "Aktif" : "Pasif"; ?></td>
						</tr>
					<?php } ?>

				</tbody>
			</table>
		</div>

		<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
	</div>

</body>

</html>