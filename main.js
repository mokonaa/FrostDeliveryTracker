console.log("coucoucocuo");
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
var fahrenheit = [0, 10, 5, 2, 20, 30, 45]; // température fixe}]

const data = {
    labels: temps,
    datasets: [{
      label: 'Température colis en celsius',
      backgroundColor: 'rgb(255, 99, 132)',
      borderColor: 'rgb(255, 99, 132)',
      data: celsius, // température fixe
    }],
};

// prévoir un bouton farenheight ->  celsius

const config = {
    type: 'line',
    data: data,
    options: {}
};

const myChart = new Chart(
    document.getElementById('myChart'),
    config
);


