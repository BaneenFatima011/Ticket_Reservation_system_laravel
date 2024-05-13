@extends('layout2') 

@php
use App\Models\Reservation; 
use App\Models\Payment;
use App\Models\Passenger;
use App\Models\Company;

$companyCount = Company::count();
$passengerCount = Passenger::count();
$totalAmount = Payment::where('status', 'Done')->sum('amount');


$reservations = Reservation::selectRaw('COUNT(CASE WHEN status = "Done" THEN 1 END) AS done_count')
    ->selectRaw('COUNT(CASE WHEN status = "Due" THEN 1 END) AS due_count')
    ->first();
@endphp

@section('content') =
<h1 class="text-3xl font-bold my-8 p-4">Dashboard</h1>

=
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>
    #transportPieChart,
    #reservationPieChart {
        width: 100%; 
        height: auto;
        max-width: 400px; 
    }
</style>

<div class="container mx-auto p-4">
    <div style="background-color:#C19875" class="rounded-lg shadow-md">
        <h2 class="text-xl font-bold p-3 text-black">Admin Information</h2>
    </div>

    <div class="p-6 rounded-lg shadow-md">
        <div class="flex flex-wrap justify-between">
            <div class="w-full sm:w-1/2 mb-4">
                <p><strong>Role:</strong> {{ $data->role == 1 ? 'Passenger' : 'Admin' }}</p>
                <p><strong>Email:</strong> {{ $data->name }}</p>
                <p><strong>ID:</strong> {{ $data->id }}</p>
            </div>
        </div>
    </div>

    <br>

    <div style="background-color:#C19875" class="rounded-lg shadow-md">
        <h2 class="text-xl font-bold p-3 text-black">Analytics</h2>
    </div> 

    <div class="flex flex-wrap mt-4 shadow-md w-full" >
       
            <!-- Cards for displaying analytics data -->
            <div class="w-40 sm:w-auto md:w-1/2 lg:w-full xl:w-1/5 h-40 text-white rounded-md flex flex-col justify-center items-center mb-8 mr-4 ml-4 p-4" style="background-color:#526c6a">
                <h3 class="text-lg font-bold">Reservations</h3>
                <div class="text-3xl">{{$reservations->due_count}}</div>
            </div>
            
            <div class="w-40 sm:w-auto md:w-1/2 lg:w-1/3 xl:w-1/5 h-40 text-white rounded-md flex flex-col justify-center items-center mb-8 mr-4 ml-4 p-5" style="background-color:#414535">
                <h3 class="text-lg font-bold">Bookings</h3>
                <div class="text-3xl">{{$reservations->done_count}}</div>
            </div>
            <div class="w-40 sm:w-auto md:w-1/2 lg:w-1/3 xl:w-1/5 h-40 text-white rounded-md flex flex-col justify-center items-center mb-8 mr-4 ml-4 p-5" style="background-color:#906f52">
                <h3 class="text-lg font-bold">Payments</h3>
                <div class="text-3xl">${{$totalAmount}}</div>
            </div>
            <div class="w-40 sm:w-auto md:w-1/2 lg:w-1/3 xl:w-1/5 h-40 text-white rounded-md flex flex-col justify-center items-center mb-8 mr-4 ml-4 p-5" style="background-color:#ada286">
                <h3 class="text-lg font-bold">Active Users</h3>
                <div class="text-3xl">{{$passengerCount}}</div>
            </div>
            <div class="w-40 sm:w-auto md:w-1/2 lg:w-1/3 xl:w-1/5 h-40 text-white rounded-md flex flex-col justify-center items-center mb-8 mr-4 ml-4 p-5" style="background-color:#30312a">
                <h3 class="text-lg font-bold">Companies</h3>
                <div class="text-3xl">{{$companyCount }}</div>
            
        </div>
    </div>

    
    

    <div class="flex flex-wrap mt-4 shadow-md">
        <!-- Charts for visualization -->
        <div class="w-full md:w-1/2 px-4">
            <div class="rounded-lg">
                <div><canvas id="transportPieChart"></canvas></div>
            </div>
        </div>
        <div class="w-full md:w-1/2 px-4 pt-8 md:pt-0">
            <div class="rounded-lg">
                <div><canvas id="reservationPieChart"></canvas></div>
            </div>
        </div>
    </div>
</div>
    
    <script>
      
        const labels = {!! json_encode($labels) !!};
        const data = {!! json_encode($data1) !!};

        
        const config = {
            type: 'doughnut',
            data: {
                labels: labels,
                datasets: [{
                    data: data,
                    backgroundColor: [
    '#F2E3BC',
    '#414535',
    '#618985',
    '#D9BF77',
],
borderColor: [
    '#D9BF77',
    '#414535',
    '#618985',
    '#F2E3BC',
],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                        
                    },
                    title: {
                        display: true,
                        text: 'Transport Types'
                    }
                },
            },
        };
        const labels1 = {!! json_encode($companyLabels) !!};
        const data1 = {!! json_encode($companyData) !!};

        
        const config2 = {
            type: 'doughnut',
            data: {
                labels: labels1,
                datasets: [{
                    data: data1,
                    backgroundColor: [
    '#F2E3BC',
    '#414535',
    '#618985',
    '#D9BF77',
],
borderColor: [
    '#D9BF77',
    '#414535',
    '#618985',
    '#F2E3BC',
],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                        
                    },
                    title: {
                        display: true,
                        text: 'Company Distribution'
                    }
                },
            },
        };

     
        const ctx = document.getElementById('transportPieChart').getContext('2d');
        console.log(ctx);
       
        const myChart = new Chart(ctx, config);
        const ctx1 = document.getElementById('reservationPieChart').getContext('2d');
        console.log(ctx1);
       
        const myChart2 = new Chart(ctx1, config2);
        
        
         
       
    </script>
@endsection
