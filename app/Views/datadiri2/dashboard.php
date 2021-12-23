<?= $this->extend('layout2/index'); ?>
<?= $this->section('page-content'); ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" />
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet" />

<div class="container">
    <div class="row">


        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Jumlah Penduduk Desa Brantaksekarjati</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">± 3607</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-users fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Jumlah Pengguna</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($datadiri3) ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-user fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Jumlah Data Diri penduduk</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($datadiri) + count($datadiri2) ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-user-plus fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-2 py-2 bg-white border shadow rounded">
                    <div class="col-md-12">
                        <h4 class="text-dark font-weight-bold">Informasi</h4>
                        <ul class="timeline">

                            <br>
                            <p><span style="color: rgb(32, 33, 36); font-family: Roboto, Arial, sans-serif; font-size: 14px; letter-spacing: 0.2px; white-space: pre-wrap;">Keterangan fungsi menu sidebar:</span>
                                <br><br style="color: rgb(32, 33, 36); font-family: Roboto, Arial, sans-serif; font-size: 14px; letter-spacing: 0.2px; white-space: pre-wrap;">
                                <span style="color: rgb(32, 33, 36); font-family: Roboto, Arial, sans-serif; font-size: 14px; letter-spacing: 0.2px; white-space: pre-wrap;">1. Dashboard : Menampilkan informasi yang berkaitan jumhlah penduduk Brantaksekarjati</span><br style="color: rgb(32, 33, 36); font-family: Roboto, Arial, sans-serif; font-size: 14px; letter-spacing: 0.2px; white-space: pre-wrap;"><span style="color: rgb(32, 33, 36); font-family: Roboto, Arial, sans-serif; font-size: 14px; letter-spacing: 0.2px; white-space: pre-wrap;">2. Isi data Diri : Mengisi data diri yang sesuai, boleh mengisi lebih dari satu data diri, seperti Keluarga</span><br style="color: rgb(32, 33, 36); font-family: Roboto, Arial, sans-serif; font-size: 14px; letter-spacing: 0.2px; white-space: pre-wrap;"><span style="color: rgb(32, 33, 36); font-family: Roboto, Arial, sans-serif; font-size: 14px; letter-spacing: 0.2px; white-space: pre-wrap;">3. Cek Data Diri : Memastikan Data Diri anda benar, terdapat fungsi edit dan hapus</span><br style="color: rgb(32, 33, 36); font-family: Roboto, Arial, sans-serif; font-size: 14px; letter-spacing: 0.2px; white-space: pre-wrap;"><span style="color: rgb(32, 33, 36); font-family: Roboto, Arial, sans-serif; font-size: 14px; letter-spacing: 0.2px; white-space: pre-wrap;">4. Ganti Password : Mengganti kata sandi yang lama</span><br style="color: rgb(32, 33, 36); font-family: Roboto, Arial, sans-serif; font-size: 14px; letter-spacing: 0.2px; white-space: pre-wrap;"><span style="color: rgb(32, 33, 36); font-family: Roboto, Arial, sans-serif; font-size: 14px; letter-spacing: 0.2px; white-space: pre-wrap;"></span>
                            </p>

                        </ul>

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
                value.push(Max * 1.5);
                // console.log(Max);
                for (i = 0; i < label.length; i++) {
                    bgColor.push('rgba(255, 99, 200, 0.5)');
                }
                var bdColor = [];
                for (i = 0; i < label.length; i++) {
                    bdColor.push('rgba(255, 99, 200, 0.5)');
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
                for (i = 0; i < label.length; i++) {
                    bgColor.push(color[i]);
                }
                var bdColor = [];
                for (i = 0; i < label.length; i++) {
                    bdColor.push('rgba(255, 99, 200, 0.5)');
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
                            backgroundColor: bgColor,
                        }]
                    },
                    options: {}
                });
            }
        });
    });
</script>
<?= $this->endSection('new-script'); ?>