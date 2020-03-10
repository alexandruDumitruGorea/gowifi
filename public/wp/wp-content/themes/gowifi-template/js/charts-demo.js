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
    
    var numConnectionsByMonth = function () {
        var monthsYears = [];
        var values = [];
        genericAjax('../../numConnectionsByMonth', null , 'get', function(response){
            response.data.forEach(function(element) {
              let montYear = '';
              for (const data in element) {
                if(data == 'num') {
                  values.push(element[data]);
                } else {
                  if(data == 'month') {
                    if(parseInt(element[data]) < 10) {
                      element[data] = "0" + element[data];
                    }
                  }
                  montYear += element[data] + "/";
                }
              }
              montYear = montYear.substr(0, montYear.length-1);
              monthsYears.push(montYear);
            })
            
            var ctx = document.getElementById("numConnectionsByMonth");
            var myLineChart = new Chart(ctx, {
              type: 'bar',
              data: {
                labels: monthsYears,
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
                    },
                      scaleLabel: {
                      display: true,
                      labelString: 'Month/Year'
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
    if(document.getElementById("numConnectionsByMonth") != null) {
      numConnectionsByMonth();
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
    
    let chartsConnectionByLocationContainer = document.getElementById('chartsConnectionByLocationContainer');
    
    function translateMonth(month) {
      month = parseInt(month);
      if(month == 1) {
        month = "January";
      } else if (month == 2) {
        month = "February";
      } else if (month == 3) {
        month = "March";
      } else if (month == 4) {
        month = "April";
      } else if (month == 5) {
        month = "May";
      } else if (month == 6) {
        month = "June";
      } else if (month == 7) {
        month = "July";
      } else if (month == 8) {
        month = "August";
      } else if (month == 9) {
        month = "September";
      } else if (month == 10) {
        month = "October";
      } else if (month == 11) {
        month = "November";
      } else if (month == 12) {
        month = "December";
      }
      return month;
    }
    
    var numConnectionByLocation = function () {
      
      genericAjax('../../numConnectionByLocation', null , 'get', function(response){
        let months = [];
        let values = [];
        let location = [];
        let oldLocation = response.data[0].location;
        response.data.forEach(function(element) {
          for (const data in element) {
            if(element['location'] === oldLocation) {
              location = element['location'];
              if(data == 'month') {
                // if(parseInt(element[data]) < 10) {
                //   element[data] = "0" + element[data];
                // }
                months.push(translateMonth(element[data]));
              }
              if(data == 'num') {
                values.push(element[data]);
              }
            } else {
              oldLocation = element['location'];
              var objects = [{
                label: location,
                backgroundColor: "transparent",
                borderColor: `rgba(${getRandomInt()},${getRandomInt()},${getRandomInt()},${getRandomInt()})`,
                data: values
              }];
              generateLocationChart('numConnectionByLocation',location);
              fillLocationChart('numConnectionByLocation'+location, months, objects);
              months = [];
              values = [];
              if(data == 'month') {
                if(parseInt(element[data]) < 10) {
                  element[data] = "0" + element[data];
                }
                months.push(element[data]);
              }
              if(data == 'num') {
                values.push(element[data]);
              }
            }
          }
        })
        var objects = [{
            label: location,
            backgroundColor: "transparent",
            borderColor: `rgba(${getRandomInt()},${getRandomInt()},${getRandomInt()},${getRandomInt()})`,
            data: values
          }];
          generateLocationChart('numConnectionByLocation',location);
          fillLocationChart('numConnectionByLocation'+location, months, objects);
      });
    }
    
    function generateLocationChart(idContainer, name) {
      const element = document.createElement('div');
        element.setAttribute('class', 'col-xl-4 col-lg-4 col-md-4 col-xs-12');
        element.innerHTML = `
          <div class="card mb-4">
              <div class="card-header"><i class="fas fa-chart-bar mr-1"></i>Nº Connections By Location (${name})</div>
              <div class="card-body"><canvas id="${idContainer}${name}" width="100%" height="40"></canvas></div>
          </div>
        `;
        chartsConnectionByLocationContainer.appendChild(element);
    }
    
    
    function fillLocationChart(idCanvas, months, objects) {
      var ctx = document.getElementById(idCanvas);
        var myLineChart = new Chart(ctx, {
          type: 'line',
          data: {
              labels: months,
              datasets:
                objects
              ,
            },
            options: {
              responsive: true,
    					hoverMode: 'index',
    					stacked: false,
    					scales: {
      					yAxes: [{
    							type: 'linear',
    							display: true,
    							position: 'left',
    							id: 'y-axis-1',
    							gridLines: {
                    display: true
                  }
    						}],
    						xAxes: [{
                  gridLines: {
                    display: false
                  }
                }]
    					}
            }
        });
    }
    if(document.getElementById("chartsConnectionByLocationContainer") != null) {
        numConnectionByLocation();
    }
    
    var numConnectionsByLocation = function () {
        var location = [];
        var values = [];
        genericAjax('../../numConnectionsByLocation', null , 'get', function(response){
            response.data.forEach(function(element) {
              for (const data in element) {
                if(data == 'num') {
                  values.push(element[data]);
                } else {
                  location.push(element[data]);
                }
              }
            })
            
            var ctx = document.getElementById("numConnectionsByLocation");
            var myLineChart = new Chart(ctx, {
              type: 'bar',
              data: {
                labels: location,
                datasets: [{
                  barPercentage: 1.0,
                  categoryPercentage: 1.0,
                  label: "Nº Connections",
                  backgroundColor: "#648c01",
                  borderColor: "#648c01",
                  data: values,
                }],
              },
              options: {
                scales: {
                  xAxes: [{
                    gridLines: {
                      display: false
                    },
                      scaleLabel: {
                      display: true,
                      labelString: 'Location'
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
    if(document.getElementById("numConnectionsByLocation") != null) {
      numConnectionsByLocation();
    }
    
    var numConnectionsByModel = function () {
        var models = [];
        var values = [];
        var colors = [];
        genericAjax('../../numConnectionsByModel', null , 'get', function(response){
            response.data.forEach(function(element) {
              for (const data in element) {
                if(data == 'model') {
                  models.push(element[data]);
                } else {
                  values.push(element[data]);
                }
              }
              colors.push(`rgba(${getRandomInt()},${getRandomInt()},${getRandomInt()},${getRandomInt()})`);
            })
            
            var ctx = document.getElementById("numConnectionsByModel");
            var myLineChart = new Chart(ctx, {
              type: 'pie',
              data: {
                labels: models,
                datasets: [{
                  backgroundColor: colors,
                  data: values,
                }],
              }
            });
        });
    }
    if(document.getElementById("numConnectionsByModel") != null) {
      numConnectionsByModel();
    }
    
    var numAccessPointByLocation = function () {
        var locations = [];
        var values = [];
        var colors = [];
        genericAjax('../../numAccessPointByLocation', null , 'get', function(response){
            response.data.forEach(function(element) {
              for (const data in element) {
                if(data == 'location') {
                  locations.push(element[data]);
                } else {
                  values.push(element[data]);
                }
              }
              colors.push(`rgba(${getRandomInt()},${getRandomInt()},${getRandomInt()},${getRandomInt()})`);
            })
            
            var ctx = document.getElementById("numAccessPointByLocation");
            var myLineChart = new Chart(ctx, {
              type: 'pie',
              data: {
                labels: locations,
                datasets: [{
                  backgroundColor: colors,
                  data: values,
                }],
              }
            });
        });
    }
    if(document.getElementById("numAccessPointByLocation") != null) {
      numAccessPointByLocation();
    }
});