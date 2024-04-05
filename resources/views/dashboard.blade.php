@extends('layout.base')

@section('title', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-xl-3 col-sm-6 m-t35">
            <div class="card card-coin">
                <div class="card-body text-center">
                    <h2 class="text-black mb-2 font-w600">{{ $employeeCount }}</h2>
                    <p class="mb-0 fs-14">Nombre d'employés</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 m-t35">
            <div class="card card-coin">
                <div class="card-body text-center">
                    <h2 class="text-black mb-2 font-w600">{{ $departmentCount }}</h2>
                    <p class="mb-0 fs-14">Nombre de départements</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Contrats</h4>
            </div>
            <div class="card-body">
                <canvas id="pie_chart"></canvas>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <script>
        var ctx = document.getElementById('pie_chart').getContext('2d');
        var contractsData = @json($contracts);

        var labels = contractsData.map(function(item) {
            return item.type;
        });

        var data = contractsData.map(function(item) {
            return item.count;
        });

        var colors = ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF']; // Choisissez vos propres couleurs

        var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    data: data,
                    backgroundColor: colors
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });
    </script>

@endsection
