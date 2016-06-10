<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Minha Conta</title>

  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!--Fonts -->
  <link href='https://fonts.googleapis.com/css?family=Quicksand:400,300,700' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Shadows+Into+Light+Two' rel='stylesheet' type='text/css'>

  <!--CSS-->
  <link href="css/comum.css" rel="stylesheet">
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<!-- Google Charts -->
  <script type="text/javascript">

    // Load Charts and the corechart package.
    google.charts.load('current', {'packages':['corechart']});

    // Draw the pie chart for device usage
    google.charts.setOnLoadCallback(drawSarahChart);



    // Draw the column chart for the Week Usage
    google.charts.setOnLoadCallback(drawAnthonyChart);


    //Draw the line chart for daily usage
    google.charts.setOnLoadCallback(drawDailyChart);

    // Callback that draws the pie chart for Sarah's pizza.
    function drawSarahChart() {

      // Create the data table for Sarah's pizza.
      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Aparelho');
      data.addColumn('number', 'Energia');
      data.addRows([
        ['TV da Sala', 2],
        ['TV do Quarto', 4],
        ['Aparelho super secreto', 10]
      ]);

      // Set options for Sarah's pie chart.
      var options = {title:'Aparelhos de maior uso',
                     width:400,
                     height:300};

      // Instantiate and draw the chart for Sarah's pizza.
      var chart = new google.visualization.PieChart(document.getElementById('Sarah_chart_div'));
      chart.draw(data, options);
    }

    // Callback that draws the pie chart for Anthony's pizza.
    function drawAnthonyChart() {

      // Create the data table for Anthony's pizza.
      var data = google.visualization.arrayToDataTable([
        ['Dia', 'TV da Sala', 'TV do Quarto', 'Aparelho super secreto'],
        ['Segunda', 1000, 400, 200],
        ['Terca', 1170, 460, 250],
        ['Quarta', 660, 1120, 300],
        ['Quinta', 1030, 540, 350],
        ['Sexta', 660, 1120, 300],
        ['Sabado', 1170, 460, 250],
        ['Domingo', 1030, 540, 350]
      ]);

      // Set options for Anthony's pie chart.
      var options = {title:'Uso por aparelho',
                     width:400,
                     height:250};

      // Instantiate and draw the chart for Anthony's pizza.
      var chart = new google.visualization.ColumnChart(document.getElementById('Anthony_chart_div'));
      chart.draw(data, options);
    }



    // Callback that draws the pie chart for Daily Usage
    function drawDailyChart() {
      var data = new google.visualization.DataTable();
            data.addColumn('string', 'Mês');
            data.addColumn('number', 'TV da Sala');
            data.addColumn('number', 'TV do Quarto');
            data.addColumn('number', 'Aparelho super secreto');

            data.addRows([
              ['Janeiro',  37.8, 80.8, 41.8],
              ['Fevereiro',  30.9, 69.5, 32.4],
              ['Março',  25.4,   57, 25.7],
              ['Abril',  11.7, 18.8, 10.5],
              ['Maio',  11.9, 17.6, 10.4],
              ['Junho',   8.8, 13.6,  7.7],
              ['Julho',   7.6, 12.3,  9.6],
              ['Agosto',  12.3, 29.2, 10.6],
              ['Setembro',  16.9, 42.9, 14.8],
              ['Outubro', 12.8, 30.9, 11.6],
              ['Novembro',  5.3,  7.9,  4.7],
              ['Dezembro',  6.6,  8.4,  5.2],
            ]);

            var options = {
              chart: {
                title: 'Uso diario'
              },
              width: 400,
              height: 300
            };
            //Instantiate graph
            var chart = new google.visualization.LineChart(document.getElementById('Daily'));

            chart.draw(data, options);
    }



  </script>
</head>
<body>



  <?php  include 'layout/navbar.php';

// $_SESSION["nome"] = $_GET['nome'];

if(!$_SESSION["nome"])
  include 'login.php';
else{
	?>
  <div class="infoSecao text-right container-fluid">
    <p>Bem vindo, <span class="atencaoCreme">
  <?php
  print $_SESSION["nome"]."\n";
  ?></span>! (<a href="logout.php">Sair</a>)

</div>

<?php
  include 'controle.php';
  }
?>





  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
