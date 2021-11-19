(function($) {
  "use strict";

  /*Start products chart*/
  if ($('#productsChart').length) {
    var ctx = document.getElementById("productsChart");
    var myChart = new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: ["Product One", "Product Two", "Product Three"],
        datasets: [{
          backgroundColor: ["#5897fb", "#7bcf86", "#fb5858"],
          data: [250, 150, 100]
        }]
      },

      options: {}
    });
  } //end if -- product chart

  /*Start users chart*/
  if ($('#usersChart').length) {
    var ctx = document.getElementById('usersChart').getContext('2d');
    var chart = new Chart(ctx, {
      // The type of chart we want to create
      type: 'line',

      // The data for our dataset
      data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [{
          label: 'Users Registered',
          tension: 0.3,
          fill: true,
          backgroundColor: 'rgba(4, 209, 130, 0.2)',
          borderColor: 'rgb(4, 209, 130)',
          data: [40, 20, 17, 9, 23, 35, 39, 30, 34, 25, 27, 17]
        }]
      },
      options: {
        plugins: {
          legend: {
            labels: {
              usePointStyle: true,
            },
          }
        }
      }
    });
  } //End if -- users chart

  /*Start sellers chart*/
  if ($('#sellersChart').length) {
    var ctx = document.getElementById('sellersChart').getContext('2d');
    var chart = new Chart(ctx, {
      // The type of chart we want to create
      type: 'line',

      // The data for our dataset
      data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [{
          label: 'Sellers Registered',
          tension: 0.3,
          fill: true,
          backgroundColor: 'rgb(44, 120, 220, 0.2)',
          borderColor: 'rgb(44, 120, 220)',
          data: [40, 20, 17, 9, 23, 35, 39, 30, 34, 25, 27, 17]
        }]
      },
      options: {
        plugins: {
          legend: {
            labels: {
              usePointStyle: true,
            },
          }
        }
      }
    });
  } //End if -- sellers chart

  /*Start stores chart*/
  if ($('#storesChart').length) {
    var ctx = document.getElementById('storesChart').getContext('2d');
    var chart = new Chart(ctx, {
      // The type of chart we want to create
      type: 'line',

      // The data for our dataset
      data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [{
          label: 'Stores Created',
          tension: 0.3,
          fill: true,
          backgroundColor: 'rgba(380, 200, 230, 0.2)',
          borderColor: 'rgb(380, 200, 230)',
          data: [40, 20, 17, 9, 23, 35, 39, 30, 34, 25, 27, 17]
        }]
      },
      options: {
        plugins: {
          legend: {
            labels: {
              usePointStyle: true,
            },
          }
        }
      }
    });
  } //End if -- stores chart

  /*Start orders chart*/
  if ($('#ordersChart').length) {
    var ctx = document.getElementById('ordersChart').getContext('2d');
    var chart = new Chart(ctx, {
      // The type of chart we want to create
      type: 'line',

      // The data for our dataset
      data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [{
            label: 'Manual',
            tension: 0.3,
            fill: true,
            backgroundColor: 'rgb(44, 120, 220, 0.2)',
            borderColor: 'rgb(44, 120, 220)',
            data: [18, 17, 4, 3, 2, 20, 25, 31, 25, 22, 20, 9]
          },
          {
            label: 'Organic',
            tension: 0.3,
            fill: true,
            backgroundColor: 'rgba(4, 209, 130, 0.2)',
            borderColor: 'rgb(4, 209, 130)',
            data: [40, 20, 17, 9, 23, 35, 39, 30, 34, 25, 27, 17]
          }
        ]
      },
      options: {
        plugins: {
          legend: {
            labels: {
              usePointStyle: true,
            },
          }
        }
      }
    });
  } //End if -- orders chart


  /*Start revenue chart*/
  if ($('#revenueChart').length) {
    var ctx = document.getElementById('revenueChart').getContext('2d');
    var chart = new Chart(ctx, {
      // The type of chart we want to create
      type: 'line',

      // The data for our dataset
      data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [{
            label: 'Total Revenue',
            tension: 0.3,
            fill: true,
            backgroundColor: 'rgb(44, 120, 220, 0.2)',
            borderColor: 'rgb(44, 120, 220)',
            data: [18, 17, 4, 3, 2, 20, 25, 31, 25, 22, 20, 9]
          },
          {
            label: 'Base Revenue',
            tension: 0.3,
            fill: true,
            backgroundColor: 'rgb(70, 220, 44, 0.2)',
            borderColor: 'rgb(70, 220, 44)',
            data: [40, 20, 17, 9, 23, 35, 39, 30, 34, 25, 27, 17]
          }
        ]
      },
      options: {
        plugins: {
          legend: {
            labels: {
              usePointStyle: true,
            },
          }
        }
      }
    });
  } //End if -- revenue chart

})(jQuery);