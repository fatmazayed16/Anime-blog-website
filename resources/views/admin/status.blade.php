<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin panel</title>
    <link rel="stylesheet" href="{{ url('css/admin/status.css') }}">
    <script src="https://kit.fontawesome.com/2924b03037.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawChart);
  
        function drawChart() {
          var d = <?php echo $visitor; ?>;
         var data = google.visualization.arrayToDataTable(d
            );
          var options = {
            chart: {
              title: 'Performance',
              subtitle: 'Visits And Sales Statistics',
            }
          };
  
          var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
  
          chart.draw(data, google.charts.Bar.convertOptions(options));
        }
      </script>

</head>
<body>
    <div class="container">
    <!-- ---------------------header----------------------- -->
        <header>
      
                <div class="cust_data">
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">logout</a>
                <form id="logout-form" action="{{ route('admin.logout') }}" method = "POST" >
                @csrf
                </form>
            </div>
            <a href="/" class="logo_admin">o blog</a>
        </header>
    <!-- -------------------------header-------------------------     -->

    <!-- ---------------------------sidebar--------------------- -->
        <div class="sidebar">
            <ul>
                <li>
                    <div class="status">
                        <a >
                            <i class="fas fa-chart-bar"></i>
                            <div>Status</div>
                        </a>
                    </div>
                </li>
                <li class="list-of-post">
                    <a href="{{ route('admin.posts') }}">
                        <i class="fas fa-th-large"></i>
                        <div>list of posts</div>
                    </a>
                </li>
                <li class="user-data">
                    <a href="{{ route('admin.user') }}">
                        <i class="fas fa-barcode"></i>
                        <div>user data</div>
                    </a>
                </li>
                

            </ul>
        </div>
    <!-- ----------------sidebar-------------------     -->

    <div class="main">
            <div class="cards">
                <div class="card" id="card1">
                    <div class="card-content"  >
                        <div class="card-name">Monthly Posts</div>
                        <div class="number">{{$datas}}</div>
                    </div>
                    <div class="icon-box">
                        <i class="fa-solid fa-chart-line"></i>
                    </div>
                </div>
                <div class="card" id="card2">
                    <div class="card-content">
                        <div class="card-name">Monthly Views</div>
                        <div class="number">{{$datao}}</div>
                    </div>
                    <div class="icon-box">
                        <i class="fa-solid fa-bookmark"></i>
                    </div>
                </div>
                <div class="card" id="card3">
                    <div class="card-content">
                        <div class="card-name">Monthly Users</div>
                        <div class="number">{{$datau}}</div>
                    </div>
                    <div class="icon-box">
                        <i class="fa-solid fa-users-viewfinder"></i>
                    </div>
                </div>
            </div>
            <div class="charts">
                <div class="chart">
                    <div id="columnchart_material" style="width: 100% ; height: 600px;" ></div>
                </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.6.0/dist/chart.min.js"></script>
    <script src="js/chart2.js"></script>
</body>
</html>
