<!DOCTYPE html>
<html>
	
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Pendaftaran Rute Penerbangan </title>
    
	<!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" 
	integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
</head>

<body>	
	<div class="container">
	<h3 class="my-5 text-center"> Pendaftaran Tiket</h3>

	<!-- Membuat Form  -->
		<form method="post" action="">
		<div class="form-group mt-3 mx-auto col-sm-8">
				<label for="nomor-pendaftaran" >Nomor Pendaftaran: </label>
				<input type="text" class="form-control" id="nomor-pendaftaran" name="nomor-pendaftaran" required>
			</div>
		<div class="form-group mt-3 mx-auto col-sm-8">
				<label for="nama-maskapai" >Nama Maskapai:</label>
				<input type="text" class="form-control" id="nama-maskapai" name="nama-maskapai" required>
			</div>

			<div class="form-group mt-3 mx-auto col-sm-8">
				<label for="bandara-asal">Bandara Asal:</label>
				<select class="form-control" id="bandara-asal" name="bandara-asal" required>
					<option value="">Pilih Bandara Asal</option>
					<?php 
					$bandaraAsal = array(
						"Soekarno Hatta",
						"Husein Sastranegara",
						"Abdul Rachman Saleh",
						"Juanda"
					);

					sort($bandaraAsal);

					foreach ($bandaraAsal as $bandara) {
						echo "<option value='" . $bandara . "'>" . $bandara . "</option>";
					}
					?>
				</select>
			</div>
             
			<div class="form-group mt-3 mx-auto col-sm-8">
				<label for="bandara-tujuan">Bandara Tujuan:</label>
				<select class="form-control" id="bandara-tujuan" name="bandara-tujuan" required>
					<option value="">Pilih Bandara Tujuan</option>
					<?php 
					$bandaraTujuan = array(
						"Ngurah Rai",
						"Hasanuddin",
						"Inanwatan",
						"Sultan Iskandar Muda"
					);

					sort($bandaraTujuan);

					foreach ($bandaraTujuan as $bandara) {
						echo "<option value='" . $bandara . "'>" . $bandara . "</option>";
					}
					?>
				</select>
			</div>

			<div class="form-group mt-3 mx-auto col-sm-8">
				<label for="tanggal-keberangkatan">Tanggal Keberangkatan:</label>
				<input type="date" class="form-control" id="tanggal-keberangkatan" name="tanggal-keberangkatan" required>
			</div>
		    <div class="form-group mt-3 mx-auto col-sm-8">
				<label for="harga-tiket">Harga Tiket:</label>
				<input type="number" class="form-control" id="harga-tiket" name="harga-tiket" required>
			</div>

		<div class="text-center">
			<button type="submit" class="btn btn-primary mt-3">Pesan</button>
			<button class="btn btn-primary mt-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample"
			 aria-expanded="false" aria-controls="collapseWidthExample">
             Lihat Tiket
             </button>
		</div>
        
		<!-- PHP -->
		<?php
          if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
			$nomorPendaftaran = $_POST["nomor-pendaftaran"];
            $namaMaskapai = $_POST["nama-maskapai"];
            $bandaraAsal = $_POST["bandara-asal"];
            $bandaraTujuan = $_POST["bandara-tujuan"];
            $tanggalKeberangkatan = $_POST["tanggal-keberangkatan"];
            $hargaTiket = $_POST["harga-tiket"];

            switch ($bandaraAsal) {
              case "Soekarno Hatta":
                $pajakBandaraAsal = 65000;
                break;
              case "Husein Sastranegara":
                $pajakBandaraAsal = 50000;
                break;
              case "Abdul Rachman Saleh":
                $pajakBandaraAsal = 40000;
                break;
              case "Juanda":
                $pajakBandaraAsal = 30000;
                break;
            }

            switch ($bandaraTujuan) {
              case "Ngurah Rai":
                $pajakBandaraTujuan = 85000;
                break;
              case "Hasanuddin":
                $pajakBandaraTujuan = 70000;
                break;
              case "Inanwatan":
                $pajakBandaraTujuan = 90000;
                break;
              case "Sultan Iskandar Muda":
                $pajakBandaraTujuan = 60000;
                break;
            }

            $totalPajak = $pajakBandaraAsal + $pajakBandaraTujuan;
            $totalHargaTiket = $hargaTiket + $totalPajak;
		  }
       ?>

	   <!-- Output -->
               <div style="min-height: 120px;">
			     <div class="collapse collapse-horizontal" id="collapseWidthExample">
				   <div class="card card-body mt-3  border border-primary mx-auto" style="width: 400px;">
				         <h3 class="text-center mb-4">Tiket</h3>
				         <table>
						    <tr>
								<td>Nomor Pendaftaran</td>
								<td>:</td>
								<td><?php echo $nomorPendaftaran; ?></td>
							</tr>						
							<tr>
								<td>Tanggal</td>
								<td>:</td>
								<td><?php echo $tanggalKeberangkatan; ?></td>
							</tr>							
							<tr>
								<td>Nama Maskapai</td>
								<td>:</td>
								<td><?php echo $namaMaskapai; ?></td>
							</tr>							 
                            <tr>
								<td>Asal Penerbangan</td>
								<td>:</td>
								<td><?php echo $bandaraAsal; ?></td>
							</tr>							
							<tr>
								<td>Tujuan Penerbangan</td>
								<td>:</td>
								<td><?php echo $bandaraTujuan; ?></td>
							</tr>
								<td>Harga Tiket</td>
								<td>:</td>
								<td> Rp. <?php echo $hargaTiket; ?></td>
							</tr>
							<tr>
								<td>Pajak</td>
								<td>: </td>
								<td> Rp. <?php echo $totalPajak; ?></td>
							</tr>
							<tr>
								<td>Total Harga Tiket</td>
								<td>: </td>
								<td> Rp.<?php echo $totalHargaTiket; ?></td>
							</tr>
						</table>
					</div>
		    </div> 
		</div>
		</form>
	</div>

<!-- Boostrap JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
 integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" 
integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</body>
</html>

