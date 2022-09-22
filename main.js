const temps = [
    '20',
    '-15',
    '-10',
    '-5',
    '0',
    '5',
    '10',
    '15',
    '20',
    
];

// recup donnes températures depuis le json + requete
console.log(json, 'the json obj');


var celsius = [0, 10, 5, 2, 20, 30, 45]; // température fixe}]
var fahrenheit = [10, 10, 50, 2, 20, 30, 45]; // température fixe}]

const data = {
    labels: temps,
    datasets: [{
      label: 'Température colis en celsius',
      backgroundColor: 'rgb(255, 99, 132)',
      borderColor: 'rgb(255, 99, 132)',
      data: celsius, // température fixe
    }],
};

const data2 = {
    labels: temps,
    datasets: [
      {
        label: 'Celcius',
        data: celsius,
        borderColor: 'rgb(255, 99, 132)',
        backgroundColor: 'rgb(255, 99, 132)',
        yAxisID: 'y',
      },
      {
        label: 'Fahrenheit',
        data: fahrenheit,
        borderColor: 'rgb(005, 99, 132)',
        backgroundColor: 'rgb(005, 99, 132)',
        yAxisID: 'y1',
      }
    ]
  };

// prévoir un bouton farenheight ->  celsius

const config = {
    type: 'line',
    data: data,
    options: {}
};


const config2 = {
    type: 'line',
    data: data2,
    options: {
      responsive: true,
      interaction: {
        mode: 'index',
        intersect: false,
      },
      stacked: false,
      plugins: {
        title: {
          display: true,
          text: 'Suivi température'
        }
      },
      scales: {
        y: {
          type: 'linear',
          display: true,
          position: 'left',
        },
        y1: {
          type: 'linear',
          display: true,
          position: 'right',
  
          // grid line settings
          grid: {
            drawOnChartArea: false, // only want the grid lines for one axis to show up
          },
        },
      }
    },
  };

const myChart = new Chart(
    document.getElementById('myChart'),
    config2
);


