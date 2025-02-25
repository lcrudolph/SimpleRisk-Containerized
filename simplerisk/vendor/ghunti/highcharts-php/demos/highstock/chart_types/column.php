<?php
use Ghunti\HighchartsPHP\Highchart;
use Ghunti\HighchartsPHP\HighchartJsExpr;

$chart = new Highchart(Highchart::HIGHSTOCK);

$chart->chart->renderTo = "container";
$chart->chart->alignTicks = false;
$chart->rangeSelector->selected = 1;
$chart->title->text = "AAPL Stock Volume";

$chart->series[] = array(
    'type' => "column",
    'name' => "AAPL Stock Price",
    'data' => new HighchartJsExpr("data"),
    'dataGrouping' => array(
        'units' => array(
            array(
                "week",
                array(
                    1
                )
            ),
            array(
                "month",
                array(
                    1,
                    2,
                    3,
                    4,
                    6
                )
            )
        )
    )
);
?>

<html>
    <head>
        <title>Column</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <?php $chart->printScripts(); ?>
    </head>
    <body>
        <div id="container"></div>
        <script type="text/javascript">
            $.getJSON('http://www.highcharts.com/samples/data/jsonp.php?filename=aapl-v.json&callback=?', function(data) {
                <?php echo $chart->render("chart"); ?>;
            });
        </script>
    </body>
</html>