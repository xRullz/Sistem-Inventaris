@extends('layout.layout')

@section('content')
		
		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<!-- Card -->
					<h4 class="page-title">Dashboard</h4>
					<div class="row">
						<div class="col-sm-6 col-md-4">
							<div class="card card-stats card-primary card-round">
								<div class="card-body">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
												<i class="flaticon-users"></i>
											</div>
										</div>
										<div class="col-7 col-stats">
											<div class="numbers">
												<p class="card-category">Data User</p>
												<h4 class="card-title">{{ $user }}</h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-4">
							<div class="card card-stats card-info card-round">
								<div class="card-body">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
												<i class="flaticon-suitcase"></i>
											</div>
										</div>
										<div class="col-7 col-stats">
											<div class="numbers">
												<p class="card-category">Data Barang</p>
												<h4 class="card-title">{{ $barang }}</h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-4">
							<div class="card card-stats card-success card-round">
								<div class="card-body ">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
												<i class="flaticon-box-3"></i>
											</div>
										</div>
										<div class="col-7 col-stats">
											<div class="numbers">
												<p class="card-category">Data Kategori</p>
												<h4 class="card-title">{{ $kategori }}</h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-6">
							<div class="card card-stats card-secondary card-round">
								<div class="card-body ">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
												<i class="flaticon-graph"></i>
											</div>
										</div>
										<div class="col-7 col-stats">
											<div class="numbers">
												<p class="card-category">Data Barang Masuk Hari Ini</p>
												<h4 class="card-title">{{ $brg_msk_tdy }}</h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-6">
							<div class="card card-stats card-warning card-round">
								<div class="card-body ">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
												<i class="flaticon-graph-2"></i>
											</div>
										</div>
										<div class="col-7 col-stats">
											<div class="numbers">
												<p class="card-category">Data Barang Keluar Hari Ini</p>
												<h4 class="card-title">{{ $brg_keluar_tdy }}</h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-6">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Jumlah Barang Masuk & Keluar</div>
								</div>
								<div class="card-body">
									<div class="chart-container">
										<canvas id="doughnutChart"></canvas>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Barang Masuk & Keluar Perbulan</div>
								</div>
								<div class="card-body">
									<div class="chart-container">
										<canvas id="barChart"></canvas>
									</div>
								</div>
							</div>
						</div>
					</div>
		</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const ctx = document.getElementById('doughnutChart');
const doughnutChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Barang Masuk', 'Barang Keluar'],
        datasets: [{
            label: '# of Votes',
            data: [{{ $brg_msk }}, {{ $brg_keluar }}],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>

<script>
const ctr = document.getElementById('barChart');
const barChart = new Chart(ctr, {
    type: 'bar',
    data: {
        labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        datasets: [{
            label: 'Barang Masuk',
            data: [{{ $m_jan }}, {{ $m_feb }}, {{ $m_mar }}, {{ $m_apr }}, {{ $m_mei }}, {{ $m_jun }}, {{ $m_jul }}, {{ $m_agu }}, {{ $m_sep }}, {{ $m_okt }}, {{ $m_nov }}, {{ $m_des }}],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)'
                
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)'
                
            ],
            borderWidth: 1
        },
		{
            label: 'Barang Keluar',
            data: [{{ $k_jan }}, {{ $k_feb }}, {{ $k_mar }}, {{ $k_apr }}, {{ $k_mei }}, {{ $k_jun }}, {{ $k_jul }}, {{ $k_agu }}, {{ $k_sep }}, {{ $k_okt }}, {{ $k_nov }}, {{ $k_des }}],
            backgroundColor: [
                'rgba(54, 162, 235, 0.2)',
                
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)',
                
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>

@endsection
