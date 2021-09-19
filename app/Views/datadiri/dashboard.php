<?= $this->extend('layout/index'); ?>
<?= $this->section('page-content'); ?>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" />
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet" />

<div class="container">
<div class="row">

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-6 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Jumlah Data Diri</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($datadiri) + count($datadiri2)?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-users fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- coba -->
<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-6 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Jumlah Pendaftar</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?=  count($datadiri3)?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-users fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="row">

    <div class="col-md-6">
        <canvas id="myChart"></canvas>
    </div>
    <div class="col-md-6">
        <canvas id="myChart1"></canvas>
    </div>
</div>
    <div class="d-flex align-items-center p-3 my-3 text-black bg-purple rounded shadow-sm">
        <div class="lh-1">
            <h1 class="h6 mb-0 text-black lh-1">Halo, Admin</h1>
            <small>Selamat Datang kembali</small>
        </div>
    </div>
</div>

<div class="container">
    
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h6 class="border-bottom pb-2 mb-0 ">Info Penting</h6>
        <div class="d-flex text-muted pt-3">
            <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false">
                <title>Placeholder</title>
                <rect width="100%" height="100%" fill="#007bff" /><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text>
            </svg>

            <p class="pb-0 mb-0 big lh-sm border-bottom">
                <strong class="d-block text-gray-dark">Jangan Lupa selalu cek semua data diri</strong>
            </p>
        </div>
        <div class="d-flex text-muted pt-3">
            <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false">
                <title>Placeholder</title>
                <rect width="100%" height="100%" fill="#e83e8c" /><text x="50%" y="50%" fill="#e83e8c" dy=".3em">32x32</text>
            </svg>

            <p class="pb-0 mb-0 big lh-sm border-bottom">
                <strong class="d-block text-gray-dark">Simpan file excel data UMKM setiap minggu </strong>
            </p>
        </div>
        <div class="d-flex text-muted pt-3">
            <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false">
                <title>Placeholder</title>
                <rect width="100%" height="100%" fill="#6f42c1" /><text x="50%" y="50%" fill="#6f42c1" dy=".3em">32x32</text>
            </svg>
            <p class="pb-0 mb-0 big lh-sm border-bottom">
                <strong class="d-block text-gray-dark">Jangan Lupa untuk hapus semua data diri di hari minggu</strong>
            </p>
        </div>
    </div>
</div>







<?= $this->endSection('page-content'); ?>

<?= $this->section('basic-script'); ?>
<!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>

<?= $this->endSection('basic-script'); ?>

<?= $this->section('new-script'); ?>




<script type="text/javascript">
// $.ajax('dataPendapatan', 
// {
//     dataType: 'json', // type of response data
//     timeout: 500,     // timeout milliseconds
//     success: function (data,status,xhr) {   // success callback function
//         let json = JSON.stringify(data);

//         const dataChart = {
//         //   labels: labels,
//         datasets: [{
//                 label: 'My First dataset',
//                 backgroundColor: 'rgb(255, 99, 132)',
//                 borderColor: 'rgb(255, 99, 132)',
//                 // data: [0, 10, 5, 2, 20, 30, 45],
//                 data: json,
//             }]
//         };

//         const config = {
//             type: 'bar',
//             dataChart,
//             options: {}
//         };

//         var myChart = new Chart(
//             document.getElementById('myChart'),
//             config
//         );


//         console.log(json);
//     },
//     error: function (jqXhr, textStatus, errorMessage) { // error callback 
//         console.log(errorMessage);
//     }
// });


</script>

<script>
    $(document).ready(function() {
        $.ajax({
            url: "dataPendapatan",
            method: "GET",
            success: function(data) {
                json = JSON.parse(data);
                // console.log(json);
                
                var label = json[0];
                var value = json[1];
                var bgColor = [];
                var Max = Math.max.apply(Math, value);
                value.push (Max*1.5);
                // console.log(Max);
                var color = [
                    'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                ];
                for (i = 0; i < label.length; i++)
                {
                    bgColor.push (color[i]);
                }
                var bdColor = [];
                for (i = 0; i < label.length; i++)
                {
                    bdColor.push ('rgba(255, 99, 200, 0.5)');
                }
                // console.log(bgColor);
                
                // console.log(label);
                // for (i=0; i < data.length() ; i++) {
                //     // label.push(data[i].tahun);
                //     // value.push(data[i].jumlahdata);

                //     console.log(data[i]);
                // }
                var ctx = document.getElementById('myChart').getContext('2d');
                var chart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: label,
                        datasets: [{
                            label: 'Jumlah Pendapatan',
                            data: value,
                            backgroundColor: bgColor,
                            borderColor: bdColor,
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        $.ajax({
            url: "dataPekerjaan",
            method: "GET",
            success: function(data) {
                json = JSON.parse(data);
                // console.log(json);
                
                var label = json[0];
                var value = json[1];
                var bgColor = [];
                var Max = Math.max.apply(Math, value);
                // value.push (Max*1.5);
                // console.log(Max);
                var color = [
                    'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                ];
                for (i = 0; i < label.length; i++)
                {
                    bgColor.push (color[i]);
                }
                var bdColor = [];
                for (i = 0; i < label.length; i++)
                {
                    bdColor.push ('rgba(255, 99, 200, 0.5)');
                }
                // console.log(bgColor);
                
                // console.log(label);
                // for (i=0; i < data.length() ; i++) {
                //     // label.push(data[i].tahun);
                //     // value.push(data[i].jumlahdata);

                //     console.log(data[i]);
                // }
                var ctx = document.getElementById('myChart1').getContext('2d');
                var chart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: label,
                        datasets: [{
                            label: 'Jumlah Profesi',
                            data: value,
                            backgroundColor : bgColor,
                        }]
                    },
                    options: {
                    }
                });
            }
        });
    });
</script>
<?= $this->endSection('new-script'); ?>