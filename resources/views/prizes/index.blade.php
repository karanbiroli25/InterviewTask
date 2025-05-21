<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Price Distribution</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="row mt-5">
            @include('probability_message')
            <div class="col-md-12 d-flex justify-content-end">
                <a href="{{ url('prizes/create') }}" class="btn btn-primary">create</a>
            </div>

            <div class="col-md-12">
            
            
                
           
            <h2>Prizes</h2>
               
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Probability</th>
                        <th>Awarded</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if ($prizes->isNotEmpty())
                     @foreach ($prizes as $prize)
                      <tr>
                        <td>{{ $prize->id  ?? ''}}</td>
                        <td>{{ $prize->title  ?? ''}}</td>
                        <td>{{ $prize->probability  ?? ''}}</td>
                        <td>{{ $prize->awarded  ?? ''}}</td>
                        <td>
                            <a href="{{ url('prizes/edit/'.$prize->id) }}" class="btn btn-sm btn-primary">
                                Edit
                            </a>
                            <a href="{{ url('prizes/delete/'.$prize->id) }}" class="btn btn-sm btn-danger">
                                Delete
                            </a>
                        </td>

                      </tr>
                     @endforeach
                     @endif
                   
                    
                    </tbody>
                </table>

                 
            </div>

            <div class="col-md-6" style="margin: auto">
                <div class="card">
                    <div class="card-header">
                        <h3>Simulate</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('prizes/simulate') }}" method="post">
                            @csrf
                            <label for="">Number of prizes :</label>
                            <input type="number" min="1" class="form-control" name="number_of_prizes" required>
                            <button type="submit" class="btn btn-primary mt-2">Simulate</button></br></br>
                            <a href="{{ url('prizes/reset') }}" class="btn btn-danger mt-2">Reset</a>
                        </form>
                    </div>
                    
                    
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div id="probability-setting" style="max-width:700px; height:400px"></div>
                </div>

                <div class="col-md-6">
                    <div id="actual-reward-setting" style="max-width:700px; height:400px"></div>
                </div>
                
            </div>


           
          
        </div>
    </div>

<script src="https://www.gstatic.com/charts/loader.js"></script>

<script>
    google.charts.load('current', {
        packages: ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        const PROBABILITY_SETTING = {!! json_encode($prizes ?? []) !!};
        
        // Start with the header row
        let dataArray = [['Prize', 'Probability']];

        PROBABILITY_SETTING.forEach(prize => {
            dataArray.push([prize.title, parseFloat(prize.probability)]);
        });

        const data = google.visualization.arrayToDataTable(dataArray);

        const options = {
            title: 'Probability Setting'
        };

        const chart = new google.visualization.PieChart(document.getElementById('probability-setting'));
        chart.draw(data, options);
    }
</script>



<script>
    google.charts.load('current', {
        packages: ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        const ACTUAL_REWARD_SETTING = {!! json_encode($prizes ?? []) !!};
        
        // Start with the header row
        let dataArray = [['Prize', 'Reward']];

        ACTUAL_REWARD_SETTING.forEach(prize => {
            dataArray.push([prize.title, parseFloat(prize.actual_rewards)]);
        });

        const data = google.visualization.arrayToDataTable(dataArray);

        const options = {
            title: 'Actual Reward Setting'
        };

        const chart = new google.visualization.PieChart(document.getElementById('actual-reward-setting'));
        chart.draw(data, options);
    }
</script>

</body>
</html>