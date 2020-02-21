jQuery(document).ready(function ($) {    
    var genericAjax = function (url, data, type, callBack) {
        $.ajax({
            url: url,
            data: data,
            type: type,
            dataType : 'json',
        })
        .done(function( json ) {
            console.log('ajax done');
            console.log(json);
            callBack(json);
        })
        .fail(function( xhr, status, errorThrown ) {
            console.log('ajax fail');
        })
        .always(function( xhr, status ) {
            console.log('ajax always');
        });
    };
    
    var numConnectionsByDaY = function () {
        var days = [];
        var values = [];
        genericAjax('../../numConnectionsByDaY', null , 'get', function(response){
            for (const data in response.data) {
                days.push(data);
                values.push(response.data[data].length);
            }
            
            
            var ctx = document.getElementById("numConnectionsByDaY");
            var myLineChart = new Chart(ctx, {
              type: 'bar',
              data: {
                labels: days,
                datasets: [{
                  barPercentage: 1.0,
                  categoryPercentage: 1.0,
                  label: "Nº Connections",
                  backgroundColor: "rgba(2,117,216,1)",
                  borderColor: "rgba(2,117,216,1)",
                  data: values,
                }],
              },
              options: {
                scales: {
                  xAxes: [{
                    gridLines: {
                      display: false
                    }
                  }],
                  yAxes: [{
                    ticks: {
                      min: 0,
                      max: Math.max(...values) + 10,
                      maxTicksLimit: 5
                    },
                    gridLines: {
                      display: true
                    }
                  }],
                },
                legend: {
                  display: true
                }
              }
            });
        });
    }
    if(document.getElementById("numConnectionsByDaY") != null) {
      numConnectionsByDaY();
    }
    
    function getRandomInt(min = 0, max = 255) {
        min = Math.ceil(min);
        max = Math.floor(max);
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }
    
    var numAccessPointByTechnical = function () {
        var technicians = [];
        var values = [];
        var colors = [];
        genericAjax('../../numAccessPointByTechnical', null , 'get', function(response){
            response.data.forEach(function(element) {
              for (const data in element) {
                if(data == 'technical') {
                  technicians.push(element[data]);
                } else {
                  values.push(element[data]);
                }
              }
              colors.push(`rgba(${getRandomInt()},${getRandomInt()},${getRandomInt()},${getRandomInt()})`);
            })
            
            var ctx = document.getElementById("numAccessPointByTechnical");
            var myLineChart = new Chart(ctx, {
              type: 'pie',
              data: {
                labels: technicians,
                datasets: [{
                  backgroundColor: colors,
                  data: values,
                }],
              }
            });
        });
    }
    if(document.getElementById("numAccessPointByTechnical") != null) {
      numAccessPointByTechnical();
    }
});