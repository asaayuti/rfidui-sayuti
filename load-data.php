<?php 
   require "koneksidb.php";	
  
    $data = query("SELECT * FROM tb_monitoring")[0];

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>	</title>
 </head>
 <body>

   <div class="row">
                           
		<div class="col-xl-6 col-lg-3 col-md-6 col-sm-12 col-12">
			<div class="card border-3 border-top border-top-primary">
				<div class="card-body">
					<h5 class="text-muted">TIME</h5>
					<div class="metric-value d-inline-block">
						<h1 class="mb-1"><div id="DigitalCLOCK" class="clock" onload="showTime()"></div></h1>
						<script  src="function.js"></script>
					</div>
					<div class="metric-label d-inline-block float-right text-success font-weight-bold">
						<span class="icon-circle-small icon-box-xs text-success bg-success-light"><i class="fa fa-fw fa-arrow-up"></i></span><span class="ml-1">update</span>
					</div>
				</div>
			</div>
		</div>
                            
		<div class="col-xl-6 col-lg-3 col-md-6 col-sm-12 col-12">
			<div class="card border-3 border-top border-top-primary">
				<div class="card-body">
					<h5 class="text-muted">RFID</h5>
					<div class="metric-value d-inline-block">
						<h1 class="mb-1"><?=$data["rfid"];?></h1>
					</div>
					<div class="metric-label d-inline-block float-right text-success font-weight-bold">
						<span class="icon-circle-small icon-box-xs text-success bg-success-light"><i class="fa fa-fw fa-arrow-up"></i></span><span class="ml-1">update</span>
					</div>
				</div>
			</div>
		</div>
		
		
                         
    </div>	

 </body>
 </html>