$(function () {
    $('#container').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: PHPUnitChartBundle.title || 'Unit tests coverage'
        },
        tooltip: {
            pointFormat: '<span style="color:{point.color}">\u25CF</span> {series.name}: <b>{point.y:.3f} %</b><br/>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.y:.3f} %',
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
                y: PHPUnitChartBundle.metrics.percentage_elements,
                sliced: true,
                selected: true
            }, {
                name: 'Not yet',
                y: (100 - PHPUnitChartBundle.metrics.percentage_elements)
            }]
        }],
        credits: PHPUnitChartBundle.credits
    });
});