<?php
// تفعيل عرض الأخطاء
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once './db_connection.php';

// جلب جميع البيانات من الجدول
try {
    $stmt = $conn->query("SELECT * FROM readings ORDER BY created_at DESC");
    $readings = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    die("حدث خطأ في جلب البيانات: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <<meta http-equiv="refresh" content="30"> -->
	<!-- PAGE TITLE HERE -->
	<title>Admin</title>
	<!-- <link rel="stylesheet" href="vendor/nouislider/nouislider.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<!-- Style css -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/edit.css" rel="stylesheet">
    <link href="css/led.css" rel="stylesheet">
</head>
<body>
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="waviy">
		   <span style="--i:1">L</span>
		   <span style="--i:2">o</span>
		   <span style="--i:3">a</span>
		   <span style="--i:4">d</span>
		   <span style="--i:5">i</span>
		   <span style="--i:6">n</span>
		   <span style="--i:7">g</span>
		   <span style="--i:8">.</span>
		   <span style="--i:9">.</span>
		   <span style="--i:10">.</span>
		</div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="index.html" class="brand-logo">
				<i class="fa-brands fa-slack" width="53" height="53" viewBox="0 0 53 53"></i>
				<p class="brand-title" width="124px" height="33px"  style="font-size: 30px;">IOT</p>
            </a>
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->
		
		
		<!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
							<div class="dashboard_bar">
                                Dashboard 
                            </div>
                        </div>
						
                        <ul class="navbar-nav header-right">
							<div class="all-live" >
							<li class="nav-item"><spn  class="live"> Live </spn>   <div class="indicator"></div> </li> 
							</div>
							<li class="nav-item">
								<a href="https://www.aqi.in/ar" class="btn btn-primary d-sm-inline-block d-none">Air Quality Monitoring Map  <i class="fa-solid fa-map-location-dot"></i></a>
							</li>
                        </ul>
                    </div>
				</nav>
			</div>
		</div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="dlabnav">
            <div class="dlabnav-scroll">
				<ul class="metismenu" id="menu">
					<li class="dropdown header-profile">
						<a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
							<i class="fa-solid fa-user"></i>
							<div class="header-info ms-3">
								<span class="font-w600 ">Hi,<b>Team</b></span>
								<small class="text-end font-w400">team@gmail.com</small>
							</div>
						</a>
						
					</li>
                   <li><a href="#Dashboard" aria-expanded="false">
						<i class="fa-solid fa-table-cells-large"></i>
							<span class="nav-text">Dashboard</span>
						</a>
                    </li>
                    <li><a href="#Charts" aria-expanded="false">
							<!-- <i class="flaticon-041-graph"></i> -->
							<i class="fa-solid fa-chart-line"></i>
							<span class="nav-text">Charts</span>
						</a>
                    </li>
                    <li><a href="javascript:void()" aria-expanded="false">
							<!-- <i class="flaticon-045-heart"></i> -->
							<i class="fa-solid fa-heart"></i>
							<span class="nav-text">Plugins</span>
						</a>
                    </li>
                    <li><a href="javascript:void()" aria-expanded="false">
							<!-- <i class="flaticon-072-printer"></i> -->
							<i class="fa-solid fa-print"></i>
							<span class="nav-text">Forms</span>
						</a>
                    </li>
                    <li><a href="javascript:void()" aria-expanded="false">
							<!-- <i class="flaticon-043-menu"></i> -->
							<i class="fa-solid fa-bars"></i>
							<span class="nav-text">Table</span>
						</a>
                    </li>
                </ul>
			</div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->
		
		<!--**********************************
            Content body start
        ***********************************-->
        <div id="Dashboard" class="content-body">
            <!-- row -->
			<div class="container-fluid">
				<div class="row invoice-card-row">
					<div class="col-xl-3 col-xxl-3 col-sm-6">
						<div class="card bg-warning invoice-card">
							<div class="card-body d-flex">
								<div class="icon me-3">
								<nav class="logo">	<i class="fa-solid fa-temperature-three-quarters"></i></nav>
								</div>
								<div id="weather-data">
									<h2 class="text-white invoice-num">25°C</h2>
									<span class="text-white fs-18">Temperature</span>
									
								</div>
							</div>
						</div>
					</div>
					<!-- ----------------------------------------------------------  -->
					<div class="col-xl-3 col-xxl-3 col-sm-6">
						<div class="card bg-success invoice-card">
							<div class="card-body d-flex">
								<div class="icon me-3">
									<nav class="logo"><i class="fa-solid fa-droplet"></i></nav>
									
								</div>
								<div id="co2-data">
									<h2 class="text-white invoice-num">200 %</h2>
									<span class="text-white fs-18"> humidity</span>
									 
								</div>
							</div>
						</div>
					</div>
					<!-- ----------------------------------------------------------  -->
					<div class="col-xl-3 col-xxl-3 col-sm-6">
						<div class="card bg-info invoice-card">
							<div class="card-body d-flex">
								<div class="icon me-3">
									<nav class="logo"><i class="fa-solid fa-brain"></i></i></nav>
								</div>
								<div id="no2-data">
									<h2 class="text-white invoice-num">40 ppm</h2>
									<span class="text-white fs-18">co</span>
									 
								</div>
							</div>
						</div>
					</div>
					<!-- ----------------------------------------------------------  -->
					<div class="col-xl-3 col-xxl-3 col-sm-6">
						<div class="card bg-secondary invoice-card">
							<div class="card-body d-flex">
								<div class="icon me-3">
								<nav class="logo">	<i class="fa-solid fa-biohazard"></i></nav>
								</div>
								<div id="ch4-data">
									<h2 class="text-white invoice-num">1.8 ppm</h2>
									<span class="text-white fs-18">CH4</span>
									 
								</div>
							</div>
						</div>
					</div>
					<!-- ----------------------------------------------------------  -->
					<div class="col-xl-3 col-xxl-3 col-sm-6">
						<div class="card bg-warning invoice-card">
							<div class="card-body d-flex">
								<div class="icon me-3">
									<nav class="logo"><i class="fa-solid fa-fire-flame-curved"></i></i></nav>
								</div>
								<div id="pm25-data">
									<h2 class="text-white invoice-num">22 ppm</h2>
									<span class="text-white fs-18">H₂</span>
									 
								</div>
							</div>
						</div>
					</div>
				<!-- ----------------------------------------------------------  -->
				<div class="col-xl-3 col-xxl-3 col-sm-6">
					<div class="card bg-success invoice-card">
						<div class="card-body d-flex">
							<div class="icon me-3">
								<nav class="logo"><i class="fa-solid fa-bottle-droplet"></i></nav>
							</div>
							<div id="pm10-data">
								<h2 class="text-white invoice-num">35 ppm</h2>
								<span class="text-white fs-18"> OH</span>
								 
							</div>
						</div>
					</div>
				</div>
				<!-- ----------------------------------------------------------  -->
				<div class="col-xl-3 col-xxl-3 col-sm-6">
					<div class="card bg-info invoice-card">
						<div class="card-body d-flex">
							<div class="icon me-3">
							<nav class="logo"><i class="fa-solid fa-smog"    style=" font-size: 27px;"></i></nav>
							</div>
							<div id="aqi-data">
								<h2 class="text-white invoice-num">60µg/m³</h2>
								<span class="text-white fs-18">smoke</span>
								 
							</div>
						</div>
					</div>
				</div>
				<!-- ----------------------------------------------------------  -->
				<!-- <div class="col-xl-3 col-xxl-3 col-sm-6">
					<div class="card bg-secondary invoice-card">
						<div class="card-body d-flex">
							<div class="icon me-3">
							<nav class="logo"><i class="fa-solid fa-water"></i></nav>
							</div>
							<div id="Charts">
								<h2 class="text-white invoice-num">50 ppm</h2>
								<span class="text-white fs-18">CO</span>
								 
							</div>
						</div>
					</div>
				</div> -->
				<!-- ----------------------------------------------------------  -->
				<!-- Chart -->
				 <div class="card" style="width: 100%;">
				<div class="chart-container" style="width: 100%;" >
					<canvas style="width: 100%;" id="gasChart" ></canvas>
				</div>
				</div>
				<!-- الخريطة -->
				<div class="card" >
				<div class="chart-container" style="width: 100%;" >
                	<iframe class="chart-container-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d775.3393743481398!2d31.389011273838044!3d31.070756481832472!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14f7770071961c77%3A0xa40a3d269eb61cce!2z2YXYudmH2K8g2KfZhNiv2YTYqtinINmG2LjZhSDZiNmF2LnZhNmI2YXYp9iq!5e0!3m2!1sar!2seg!4v1747006877750!5m2!1sar!2seg" width="100%" height="350" style="border: 0px;"  allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
				</div>
					</div>
			<!--End Chart  -->
		<!-- START DATA -->
						<div class="col-xl-6 col-xxl-12">
				<div class="card" style="background: #e8eaec;">
							<div class="card-header d-block d-sm-flex border-0">
								<div class="me-3">
									<h4 class="card-title mb-2">Indicative Record</h4>
									<span class="fs-12">Environmental Indicators Based on Gases and Factors</span>
								</div>
							</div>
							<div class="card-body tab-content p-0">
									<div class="table-responsive">
										<table class="table table-responsive-md card-table transactions-table">
											<tbody>	
												<tr>
													<td>1</td>
													<td>
														<h6 class="fs-16 font-w600 mb-0"><a href="javascript:void(0);" class="text-black">Temperature (°C)</a></h6>
													</td>
													<td>
														<h6 class="fs-16 text-black font-w600 mb-0">20 – 26°C</h6>
													</td>
													<td><span class="fs-16 text-black font-w600">Above 30°C may cause heat stress.</span></td>
													<td><span class="text-success fs-16 font-w500 text-end d-block"> Comfortable</span></td>
												</tr>
												<tr>
													<tr>
    <td>2</td>
    <td>
        <h6 class="fs-16 font-w600 mb-0"><a href="javascript:void(0);" class="text-black">Humidity (%)</a></h6>
    </td>
    <td>
        <h6 class="fs-16 text-black font-w600 mb-0">30 – 60%</h6>
    </td>
    <td><span class="fs-16 text-black font-w600">Below 30% causes dryness – Above 70% promotes mold growth.</span></td>
    <td><span class="text-success fs-16 font-w500 text-end d-block"> Good</span></td>
</tr>
<tr>
    <td>2</td>
    <td>
        <h6 class="fs-16 font-w600 mb-0"><a href="javascript:void(0);" class="text-black">Carbon Monoxide (CO)</a></h6>
    </td>
    <td>
        <h6 class="fs-16 text-black font-w600 mb-0">&lt; 9 ppm</h6>
    </td>
    <td><span class="fs-16 text-black font-w600">35+ ppm is dangerous – Over 200 ppm can lead to unconsciousness.</span></td>
    <td><span class="text-success fs-16 font-w500 text-end d-block"> Safe</span></td>
</tr>
<tr>
    <td>4</td>
    <td>
        <h6 class="fs-16 font-w600 mb-0"><a href="javascript:void(0);" class="text-black">Methane (CH₄)</a></h6>
    </td>
    <td>
        <h6 class="fs-16 text-black font-w600 mb-0">&lt; 1000 ppm</h6>
    </td>
    <td><span class="fs-16 text-black font-w600">Over 5000 ppm is explosive and can cause suffocation.</span></td>
    <td><span class="text-success fs-16 font-w500 text-end d-block">Safe</span></td>
</tr>
<tr>
    <td>5</td>
    <td>
        <h6 class="fs-16 font-w600 mb-0"><a href="javascript:void(0);" class="text-black">Hydrogen (H₂)</a></h6>
    </td>
    <td>
        <h6 class="fs-16 text-black font-w600 mb-0">&lt; 100 ppm</h6>
    </td>
    <td><span class="fs-16 text-black font-w600">Above 4000 ppm is highly flammable.</span></td>
    <td><span class="text-success fs-16 font-w500 text-end d-block"> Safe</span></td>
</tr>
<tr>
    <td>6</td>
    <td>
        <h6 class="fs-16 font-w600 mb-0"><a href="javascript:void(0);" class="text-black">Alcohol (OH)</a></h6>
    </td>
    <td>
        <h6 class="fs-16 text-black font-w600 mb-0">&lt; 1000 ppm</h6>
    </td>
    <td><span class="fs-16 text-black font-w600">High levels may cause dizziness and irritation; flammable.</span></td>
    <td><span class="text-success fs-16 font-w500 text-end d-block"> Relatively Safe</span></td>
</tr>
<tr>
    <td>7</td>
    <td>
        <h6 class="fs-16 font-w600 mb-0"><a href="javascript:void(0);" class="text-black">Smoke (µg/m³)</a></h6>
    </td>
    <td>
        <h6 class="fs-16 text-black font-w600 mb-0">&lt; 12 µg/m³</h6>
    </td>
    <td><span class="fs-16 text-black font-w600">&gt; 35 µg/m³ unhealthy – &gt; 150 µg/m³ hazardous.</span></td>
    <td><span class="text-success fs-16 font-w500 text-end d-block"> Excellent</span></td>
</tr>


											</tbody>
										</table>
									</div>
								</div>
					</div>
					</div>
					
					<!-- END DATA -->
					<div class="custom-container mt-4">
						<div class="custom-card">
							<div class="custom-header">
								<div class="alk-1">
								<h4 class="custom-title">Previous Readings</h4>
								<span class="sp-1">This is a comprehensive record of all previous readings</span>
							</div>
								<ul class="custom-tabs">
									<li><a href="#" class="custom-tab-link active" data-target="#custom-monthly">Monthly</a></li>
									<li><a href="#" class="custom-tab-link" data-target="#custom-weekly">Weekly</a></li>
									<li><a href="#" class="custom-tab-link" data-target="#custom-daily">Today</a></li>
								</ul>
							</div>
								<div class="custom-content active" id="custom-monthly">
						<div id="custom-monthly">
							<table  border="0" style=" color: black; width: 100%; border-collapse: collapse; margin: 20px auto;">
								<thead>
									<tr style="color: black;">
									    <th style="padding: 8px; text-align: center;">ID</th>
										<th style="padding: 8px; text-align: center;">Temperature</th>
										<th style="padding: 8px; text-align: center;">Humidity</th>
										<th style="padding: 8px; text-align: center;">CO</th>
										<th style="padding: 8px; text-align: center;">CH₄</th>
										<th style="padding: 8px; text-align: center;">H₂</th>
										<th style="padding: 8px; text-align: center;">OH</th>
										<th style="padding: 8px; text-align: center;">Smoke</th>
										<th style="padding: 8px; text-align: center;">Time stamp</th>
									</tr>
								</thead>
					<tbody>
	<?php if(count($readings) > 0): ?>
		<?php foreach($readings as $reading): ?>
		<tr>
			<td style="padding: 8px; text-align: center;"><?= $reading['id'] ?></td>
			<td style="padding: 8px; text-align: center;"><?= $reading['temperature'] ?>°C</td>
			<td style="padding: 8px; text-align: center;"><?= $reading['humidity'] ?>%</td>
			<td style="padding: 8px; text-align: center;"><?= $reading['co'] ?> ppm</td>
			<td style="padding: 8px; text-align: center;"><?= $reading['ch4'] ?> ppm</td>
			<td style="padding: 8px; text-align: center;"><?= $reading['h'] ?> ppm</td>
			<td style="padding: 8px; text-align: center;"><?= $reading['oh'] ?> ppm</td>
			<td style="padding: 8px; text-align: center;"><?= $reading['smoke'] ?> µg/m³</td>
			<td style="padding: 8px; text-align: center;"><?= $reading['created_at'] ?></td>
		</tr>
		<?php endforeach; ?>
	<?php else: ?>
		<tr>
			<td colspan="10" style="text-align: center; padding: 20px;">لا توجد بيانات متاحة</td>
		</tr>
	<?php endif; ?>
</tbody>

							</table>
						</div>
							</div>
							</div>
							</div>
								<!-- القراءات الأسبوعية -->
								<!-- <div class="custom-content" id="custom-weekly">
									<table class="custom-table">
										<thead>
											<tr>
												<th>ID</th>
												<th>Temperature</th>
												<th>Humidity</th>
												<th>CO</th>
												<th>CH4</th>
												<th>H₂</th>
												<th>OH</th>
												<th>Smoke</th>
												<th>CO2</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>1</td>
												<td>30°C</td>
												<td>60%</td>
												<td>40ppm</td>
												<td>1.8ppm</td>
												<td>22ppm</td>
												<td>35ppm</td>
												<td>60ppm</td>
												<td>50ppm</td>
											</tr>
										</tbody>
									</table>
								</div>
					 -->
								<!-- القراءات اليومية -->
								<!-- <div class="custom-content" id="custom-daily">
									<table class="custom-table">
										<thead>
											<tr>
												<th>ID</th>
												<th>Temperature</th>
												<th>Humidity</th>
												<th>CO</th>
												<th>CH4</th>
												<th>H₂</th>
												<th>OH</th>
												<th>Smoke</th>
												<th>CO2</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>1</td>
												<td>40°C</td>
												<td>60%</td>
												<td>40ppm</td>
												<td>1.8ppm</td>
												<td>22ppm</td>
												<td>35ppm</td>
												<td>60ppm</td>
												<td>50ppm</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div> -->
					<!-- --------------------------------------- -->
					
					<!-- Chart -->
				 <div  class="card">
				<div class="chart-container">
					<canvas id="airQualityChart"></canvas>
					<script>
fetch('get_chart_data.php')
  .then(response => response.json())
  .then(data => {
    const labels = data.map(item => item.created_at).reverse();

    const datasets = [
      {
        label: 'Temperature (°C)',
        data: data.map(item => parseFloat(item.temperature)).reverse(),
        borderColor: 'rgba(255, 99, 132, 1)',
        backgroundColor: 'rgba(255, 99, 132, 0.2)',
        fill: false
      },
      {
        label: 'Humidity (%)',
        data: data.map(item => parseFloat(item.humidity)).reverse(),
        borderColor: 'rgba(54, 162, 235, 1)',
        backgroundColor: 'rgba(54, 162, 235, 0.2)',
        fill: false
      },
      {
        label: 'CO (ppm)',
        data: data.map(item => parseFloat(item.co)).reverse(),
        borderColor: 'rgba(255, 206, 86, 1)',
        backgroundColor: 'rgba(255, 206, 86, 0.2)',
        fill: false
      },
      {
        label: 'CH₄ (ppm)',
        data: data.map(item => parseFloat(item.ch4)).reverse(),
        borderColor: 'rgba(75, 192, 192, 1)',
        backgroundColor: 'rgba(75, 192, 192, 0.2)',
        fill: false
      },
      {
        label: 'H₂ (ppm)',
        data: data.map(item => parseFloat(item.h)).reverse(),
        borderColor: 'rgba(153, 102, 255, 1)',
        backgroundColor: 'rgba(153, 102, 255, 0.2)',
        fill: false
      },
      {
        label: 'OH (ppm)',
        data: data.map(item => parseFloat(item.oh)).reverse(),
        borderColor: 'rgba(255, 159, 64, 1)',
        backgroundColor: 'rgba(255, 159, 64, 0.2)',
        fill: false
      },
      {
        label: 'Smoke (µg/m³)',
        data: data.map(item => parseFloat(item.smoke)).reverse(),
        borderColor: 'rgba(100, 100, 100, 1)',
        backgroundColor: 'rgba(200, 200, 200, 0.2)',
        fill: false
      }
    ];

    const ctx = document.getElementById('airQualityChart').getContext('2d');
    new Chart(ctx, {
      type: 'line',
      data: {
        labels: labels,
        datasets: datasets
      },
      options: {
        responsive: true,
        interaction: {
          mode: 'index',
          intersect: false
        },
        stacked: false,
        plugins: {
          title: {
            display: true,
            text: 'Air Quality Readings Over Time'
          }
        },
        scales: {
          y: {
            title: {
              display: true,
              text: 'Value'
            },
            beginAtZero: false
          },
          x: {
            title: {
              display: true,
              text: 'Time'
            }
          }
        }
      }
    });
  })
  .catch(error => console.error('Error:', error));
</script>
				</div>
			</div>
			<!--End Chart  -->
				<!-- ---------------------------------------------------- -->
					<div class="col-xl-6 col-xxl-12">
						<div class="row">
							<div class="col-xl-12">
								<div class="card coin-card">
									<div class="card-body d-sm-flex d-block align-items-center">
										<span class="coin-icon">
											<nav class="logo"><i class="fa-brands fa-slack"></i></nav>
										</span>
										<div>
											<h3 class="text-white">Air Quality Monitoring Using the Internet of Things (IoT)</h3>
											<p>Air quality monitoring is becoming increasingly important due to the adverse effects of air pollution on human health and the environment. The integration of the Internet of Things (IoT) has transformed this field by enabling real-time, efficient, and scalable air quality monitoring solutions.

IoT-based systems rely on interconnected sensors to measure various air quality parameters such as Temperature, Humidity, CO, CH4, H, CH, and Smoke.

These sensors are deployed across both urban and rural areas, creating a network that continuously collects data. The data is transmitted to cloud-based platforms through wireless communication technologies such as Wi-Fi, LoRa, or cellular networks.

Advanced analytics and machine learning algorithms process this data to provide insights, visualize trends, and predict pollution patterns. This helps policymakers, industries, and individuals make informed decisions to reduce pollution and protect public health.

IoT-enabled air quality monitoring offers several advantages including cost-effectiveness, real-time updates, and accessibility. It is widely used in smart cities, industrial zones, and environmental conservation projects.

As technology continues to advance, these systems are becoming more accurate and energy-efficient, paving the way for a cleaner and healthier future.
 </p>
											<a class="text-white" href="javascript:void(0);">Learn more >></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
		</div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
		
		
		
        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
		
            <div class="copyright">
                <p>© Designed &amp; by <a href="#" target="_blank">	One Team</a> 2025</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->
	</div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="vendor/global/global.min.js"></script>
	<script src="vendor/chart.js/Chart.bundle.min.js"></script> <!--مكتبة الرسم البياني	 -->
	<!--  Dashboard 1 -->
	<script src="js/edit.js"></script> 
	<script src="js/custom.min.js"></script> 
	<script src="js/dlabnav-init.js"></script>      <!-- لفتح وغلق قائمة الاختصارات -->
	<script src="js/demo.js"></script>              <!-- ✔️ يسمح للمستخدم بتغيير تصميم الموقع بسهولة. ✔️ يحفظ خيارات المظهر حتى بعد إغلاق المتصفح. ✔️  يدعم للغات مثل العربية. ✔️ يوفر عدة ثيمات جاهزة يمكن للمستخدم الاختيار من بينها. -->
    <!-- <script src="./js/Chart.js"></script> -->         <!--الرسم البياني -->
	<script src="js/chart_cleaned.js"></script>            <!-- الرسم البيانى الجديد المربوط بقاعده البيانات -->

	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<script src="./js/charttest.js"></script>          <!-- الرسم البياني -->
<script>
    fetch('getData.php')
        .then(response => response.text())
        .then(data => {
            document.getElementById('weather-data').innerHTML = data.match(/<div id='Temperature'>[\s\S]*?<\/div>/)?.[0] || '';
            document.getElementById('co2-data').innerHTML = data.match(/<div id='humidity'>[\s\S]*?<\/div>/)?.[0] || '';
            document.getElementById('no2-data').innerHTML = data.match(/<div id='co'>[\s\S]*?<\/div>/)?.[0] || '';
            document.getElementById('ch4-data').innerHTML = data.match(/<div id='ch4'>[\s\S]*?<\/div>/)?.[0] || '';
            document.getElementById('pm25-data').innerHTML = data.match(/<div id='h'>[\s\S]*?<\/div>/)?.[0] || '';
            document.getElementById('pm10-data').innerHTML = data.match(/<div id='oh'>[\s\S]*?<\/div>/)?.[0] || '';
            document.getElementById('aqi-data').innerHTML = data.match(/<div id='smoke'>[\s\S]*?<\/div>/)?.[0] || '';
            document.getElementById('Charts').innerHTML = data.match(/<div id='co2'>[\s\S]*?<\/div>/)?.[0] || '';
        })
        .catch(error => console.error('Error:', error));
</script>
</body>

</html>