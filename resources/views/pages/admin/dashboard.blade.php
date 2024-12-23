@extends('layouts.admin')

@section('title')
  Store Dashboard
@endsection

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
  <div class="container-fluid">
    <div class="dashboard-heading text-center">
      <h2 class="dashboard-title">Admin Dashboard</h2>
      <p class="dashboard-subtitle">
        This is  Administrator Panel
      </p>
    </div>
    
    <div class="dashboard-content">
      <div class="row g-4">
        <!-- Customer Card -->
        <div class="col-md-4">
          <div class="card border-0 shadow-sm">
            <div class="card-body d-flex justify-content-between align-items-center">
              <div>
                <div class="dashboard-card-title">Customer</div>
                <div class="dashboard-card-subtitle h4">{{ $customer }}</div>
              </div>
              <div class="icon-circle style="color: #223A59"">
                <i class="fas fa-users"></i>
              </div>
            </div>
          </div>
        </div>

        <!-- Revenue Card -->
        <div class="col-md-4">
          <div class="card border-0 shadow-sm">
            <div class="card-body d-flex justify-content-between align-items-center">
              <div>
                <div class="dashboard-card-title">Revenue</div>
                <div class="dashboard-card-subtitle h4">Rp {{ number_format($revenue, 0, ',', '.') }}</div>
              </div>
              <div class="icon-circle bg-color white" style="color: #223A59">
                <i class="fas fa-dollar-sign"></i>
              </div>
            </div>
          </div>
        </div>

        <!-- Transaction Card -->
        <div class="col-md-4">
          <div class="card border-0 shadow-sm">
            <div class="card-body d-flex justify-content-between align-items-center">
              <div>
                <div class="dashboard-card-title">Transaction</div>
                <div class="dashboard-card-subtitle h4">{{ $transaction }}</div>
              </div>
              <div class="icon-circle" style="color: #223A59">
                <i class="fas fa-exchange-alt"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Row for Charts -->
      <div class="row mt-5 g-4">
        <!-- Bar Chart -->
        <div class="col-md-6">
          <div class="card border-0 shadow-sm">
            <div class="card-header bg-transparent">
              <h5 class="mb-0">Revenue Over Time</h5>
            </div>
            <div class="card-body">
              <canvas id="revenueChart"></canvas>
            </div>
          </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-md-6">
          <div class="card border-0 shadow-sm">
            <div class="card-header bg-transparent">
              <h5 class="mb-0">Customer Distribution</h5>
            </div>
            <div class="card-body">
              <canvas id="customerChart"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Chart.js Script -->


  </div>
</div>
@endsection
@push('addon-script')
<!-- Chart.js Script -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  // Bar Chart for Revenue
  var ctx = document.getElementById('revenueChart').getContext('2d');
  var revenueChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['January', 'February', 'March', 'April', 'May', 'June'],
      datasets: [{
        label: 'Revenue',
        data: [12000, 15000, 8000, 19000, 23000, 17000],
        backgroundColor: 'rgba(54, 162, 235, 0.6)',
        borderColor: 'rgba(54, 162, 235, 1)',
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      },
      plugins: {
        tooltip: {
          enabled: true,
          backgroundColor: 'rgba(0, 0, 0, 0.7)',
          titleColor: '#ffffff',
          bodyColor: '#ffffff',
          borderColor: '#ffffff',
          borderWidth: 1
        }
      },
      animation: {
        duration: 2000,
        easing: 'easeOutBounce'
      }
    }
  });

  // Pie Chart for Customer Distribution
  var ctx = document.getElementById('customerChart').getContext('2d');
  var customerChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: ['New', 'Returning', 'VIP'],
      datasets: [{
        data: [55, 25, 20],
        backgroundColor: [
          'rgba(255, 99, 132, 0.6)',
          'rgba(54, 162, 235, 0.6)',
          'rgba(255, 206, 86, 0.6)'
        ],
        borderColor: [
          'rgba(255, 99, 132, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)'
        ],
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: {
          position: 'bottom',
          labels: {
            boxWidth: 15,
            padding: 20
          }
        },
        tooltip: {
          backgroundColor: 'rgba(0, 0, 0, 0.7)',
          titleColor: '#ffffff',
          bodyColor: '#ffffff',
          borderColor: '#ffffff',
          borderWidth: 1
        }
      },
      animation: {
        animateScale: true,
        animateRotate: true
      }
    }
  });
</script>
@endpush