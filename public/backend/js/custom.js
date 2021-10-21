(function($) {
    "use strict";

    // Users
    if($('#chart-users').length > 0) {
        var barChart1 = {
            labels: userChart.labels,
            datasets: [{
                label: 'Users',
                backgroundColor: 'rgba(60,141,188,0.9)',
                borderColor: 'rgba(60,141,188,0.8)',
                pointRadius: false,
                pointColor: '#3b8bba',
                pointStrokeColor: 'rgba(60,141,188,1)',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data: userChart.data
            }]
        }

        var barCanvas = $('#chart-users').get(0).getContext('2d')
        var barChartData = $.extend(true, {}, barChart1)
        barChartData.datasets[0] = barChart1.datasets[0]

        new Chart(barCanvas, {
            type: 'bar',
            data: barChartData,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                datasetFill: false
            }
        })
    }

    // Survey
    if($('#chart-survey').length > 0) {
        var barChart2 = {
            labels: surveyChart.labels,
            datasets: [{
                label: 'Surveys',
                backgroundColor: 'rgba(60,141,188,0.9)',
                borderColor: 'rgba(60,141,188,0.8)',
                pointRadius: false,
                pointColor: '#3b8bba',
                pointStrokeColor: 'rgba(60,141,188,1)',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data: surveyChart.data
            }]
        }

        var barCanvas = $('#chart-survey').get(0).getContext('2d')
        var barData = $.extend(true, {}, barChart2)
        barData.datasets[0] = barChart2.datasets[0]

        new Chart(barCanvas, {
            type: 'bar',
            data: barData,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                datasetFill: false
            }
        })
    }

     // Response
    if($('#chart-response').length > 0) {
        var barChart3 = {
            labels: responseChart.labels,
            datasets: [{
                label: 'Responses',
                backgroundColor: 'rgba(60,141,188,0.9)',
                borderColor: 'rgba(60,141,188,0.8)',
                pointRadius: false,
                pointColor: '#3b8bba',
                pointStrokeColor: 'rgba(60,141,188,1)',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data: responseChart.data
            }]
        }

        var barCanvas = $('#chart-response').get(0).getContext('2d')
        var barData = $.extend(true, {}, barChart3)
        barData.datasets[0] = barChart3.datasets[0]

        new Chart(barCanvas, {
            type: 'bar',
            data: barData,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                datasetFill: false
            }
        })
    }
})(jQuery);