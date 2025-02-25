<?php
use Ghunti\HighchartsPHP\Highchart;
use Ghunti\HighchartsPHP\HighchartJsExpr;

$chart = new Highchart();

$chart->chart = array(
    'renderTo' => 'container',
    'type' => 'line'
);
$chart->title = array(
    'text' => 'Monthly Average Temperature'
);
$chart->subtitle->text = 'Source: WorldClimate.com';
$chart->xAxis->categories = array(
    'Jan',
    'Feb',
    'Mar',
    'Apr',
    'May',
    'Jun',
    'Jul',
    'Aug',
    'Sep',
    'Oct',
    'Nov',
    'Dec'
);
$chart->yAxis->title->text = 'Temperature (°C)';
$chart->tooltip->enabled = false;
$chart->tooltip->formatter = new HighchartJsExpr(
    "function() {
        return '<b>' + this.series.name + '</b><br/>' +
            this.x + ': ' + this.y + 'Â°C';
    }");
$chart->plotOptions->line->dataLabels->enabled = true;
$chart->plotOptions->line->enableMouseTracking = false;
$chart->series[] = array(
    'name' => 'Tokyo',
    'data' => array(
        7.0,
        6.9,
        9.5,
        14.5,
        18.4,
        21.5,
        25.2,
        26.5,
        23.3,
        18.3,
        13.9,
        9.6
    )
);
$chart->series[] = array(
    'name' => 'London',
    'data' => array(
        3.9,
        4.2,
        5.7,
        8.5,
        11.9,
        15.2,
        17.0,
        16.6,
        14.2,
        10.3,
        6.6,
        4.8
    )
);
?>

<html>
    <head>
        <title>With data labels</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <?php $chart->printScripts(); ?>
    </head>
    <body>
        <div id="container"></div>
        <script type="text/javascript"><?php echo $chart->render("chart1"); ?></script>
    </body>
</html>