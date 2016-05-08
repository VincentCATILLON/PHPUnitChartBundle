$(function () {
    var categories = [],
        elements = [];
    for (var index in PHPUnitChartBundle.last_metrics) {
        var metrics = PHPUnitChartBundle.last_metrics[index];
        var date = new Date(metrics.created_at);
        categories.push(date.toLocaleDateString()+'<br>'+date.toLocaleTimeString());
        elements.push(metrics.percentage_elements);
    }
    $('#container').highcharts({
        chart: {
            type: 'areaspline'
        },
        title: {
            text: PHPUnitChartBundle.title || 'Unit tests coverage history'
        },
        xAxis: {
            categories: categories
        },
        yAxis: {
            title: {
                text: 'Percentage'
            }
        },
        legend: {
            enabled: false
        },
        tooltip: {
            shared: true,
            pointFormat: '<span style="color:{point.color}">\u25CF</span> {series.name}: <b>{point.y:.3f} %</b><br/>'
        },
        plotOptions: {
            areaspline: {
                fillOpacity: 0.5,
                dataLabels: {
                    enabled: true,
                    format: '{point.y:.3f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            name: 'Elements',
            data: elements
        }],
        credits: PHPUnitChartBundle.credits
    });
});