$(function () {
    $('#container').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'PHPUnit coverage'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.3f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.3f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            name: 'Coverage',
            colorByPoint: true,
            data: [{
                name: 'Yes',
                y: metrics.percentage,
                sliced: true,
                selected: true
            }, {
                name: 'Not yet',
                y: (100 - metrics.percentage)
            }]
        }]
    });
});