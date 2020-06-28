@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')
    <h1> Home <small> Dashboard</small></h1>
@stop

@section('content')

<!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Your Dashboard</h3>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
              <div class="row">
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Total domains</span>
                      <span class="info-box-number text-center text-muted mb-0">{{ $domains}}</span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Total Databases</span>
                      <span class="info-box-number text-center text-muted mb-0">2000</span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Total email Accounts</span>
                      <span class="info-box-number text-center text-muted mb-0">20 <span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <h4>Server load</h4>
                    <div class="post">
                     <div class="chart">
                        <canvas id="lineChart"></canvas>
                      </div>
                  </div>

                    <div class="post clearfix">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="../../dist/img/user7-128x128.jpg" alt="User Image">
                        <span class="username">
                          <a href="#">Sarah Ross</a>
                        </span>
                        <span class="description">Sent you a message - 3 days ago</span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        Lorem ipsum represents a long-held tradition for designers,
                        typographers and the like. Some people hate it and argue for
                        its demise, but others ignore.
                      </p>
                      <p>
                        <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Demo File 2</a>
                      </p>
                    </div>

                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
                        <span class="username">
                          <a href="#">Jonathan Burke Jr.</a>
                        </span>
                        <span class="description">Shared publicly - 5 days ago</span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        Lorem ipsum represents a long-held tradition for designers,
                        typographers and the like. Some people hate it and argue for
                        its demise, but others ignore.
                      </p>

                      <p>
                        <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Demo File 1 v1</a>
                      </p>
                    </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
              <h3 class="text-primary"><i class="fas fa-paint-brush"></i> Capanel</h3>
              <p class="text-muted">Welcome on CApanel, the most advanced and simple webhosting control panel of the world. It is just simple works!</p>
              <br>
              <div class="text-muted">
                <p class="text-sm">Server OS:
                  <b class="d-block">{{ $serversoftware }}</b>
                </p>
                <p class="text-sm">Server CPU:
                  <b class="d-block">{{ $servercpu }}</b>
                </p>
                <p class="text-sm">Server Uptime:
                  <b class="d-block">{{ $serveruptime }}</b>
                </p>
                <p class="text-sm">Webserver:
                  <b class="d-block">{{ $serverwebserver }}</b>
                </p>
                <p class="text-sm">PHP version:
                  <b class="d-block">{{ $serverphp }}</b>
                </p>
                <p class="text-sm">Database server:
                  <b class="d-block">{{ $dbserver }} <smal>{{ $dbversion }}</smal></b>
                </p>
                <p class="text-sm">Server datetime zone:
                  <b class="d-block">{{$cf}}</smal></b>
                </p>
              </div>

              
              <div class="text-center mt-5 mb-3">
                <a href="#" class="btn btn-sm btn-primary">Request Support</a>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
@stop
@section('footer')
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.3
    </div>
    <strong>Copyright &copy; <?php echo date('Y');?> <a href="https://www.cs-hosting.nl">Cs-hosting.nl</a>.</strong> All rights
    reserved.
@stop
@section('plugins.Chartjs', true)

@section('js')
<script>
var ctx = document.getElementById('lineChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        backgroundColor: [
                'rgba(255, 99, 132, 0.0)',
                'rgba(54, 162, 235, 0.0)',
                'rgba(255, 206, 86, 0.0)',
                'rgba(75, 192, 192, 0.0)',
                'rgba(153, 102, 255, 0.0)',
                'rgba(255, 159, 64, 0.0)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
        datasets: [{
            label: 'Server load',
            //backgroundColor: 'rgb(255, 99, 132)',
            //borderColor: 'rgb(255, 99, 132)',
            data: [0, 10, 5, 2, 20, 30, 45]
        }]
    },

    // Configuration options go here
    options: {
      scales: {
        xAxes: [{
            gridLines: {
                display:false
            }
        }],
        yAxes: [{
            gridLines: {
                display:false
            }   
        }]
      }
    }
});
</script>
@stop