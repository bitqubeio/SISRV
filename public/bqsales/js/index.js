/*Chart hoy*/
var ctxHoy = document.getElementById("hoyChart");
var chartHoy = new Chart(ctxHoy, {
    type: 'bar',
    data: {
        lineTension: 0,
        labels: ["Hoy"],
        datasets: [{
                label: "Ventas",
                borderWidth: 1,
                backgroundColor: "rgba(20, 133, 165, 0.2)",
                borderColor: "rgba(20, 133, 165, 1)",
                pointBorderColor: "rgba(20, 133, 165, 1)",
                pointHoverBackgroundColor: "rgb(255, 255, 255)",
                pointHoverBorderColor: "rgba(20, 133, 165, 1)",
                data: [65],
                    },
            {
                label: "Compras",
                borderWidth: 1,
                backgroundColor: "rgba(165, 20, 20, 0.2)",
                borderColor: "rgba(165, 20, 20, 1)",
                pointBorderColor: "rgba(165, 20, 20, 1)",
                pointHoverBackgroundColor: "rgb(255, 255, 255)",
                pointHoverBorderColor: "rgba(165, 20, 20, 1)",
                data: [75.50],
                    }
                ]
    },
    options: {
        responsive: true,
        tooltips: {
            //                    mode: 'index',
            intersect: false,
        },
        scales: {
            xAxes: [{
                barThickness: 70,
                    }]
        }
    }
});
/*Chart Semana*/
var ctxSemana = document.getElementById("semanaChart");
var chartSemana = new Chart(ctxSemana, {
    type: 'line',
    title: {
        display: true,
        text: 'Custom Chart Title'
    },
    data: {
        labels: ["Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo"],
        datasets: [{
                label: "Ventas",
                borderWidth: 1,
                backgroundColor: "rgba(20, 133, 165, 0.2)",
                borderColor: "rgba(20, 133, 165, 1)",
                borderDashOffset: 0.0,
                pointBorderColor: "rgba(20, 133, 165, 1)",
                pointBackgroundColor: "#fff",
                pointBorderWidth: 5,
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgb(255, 255, 255)",
                pointHoverBorderColor: "rgba(20, 133, 165, 1)",
                pointHoverBorderWidth: 2,
                pointRadius: 1,
                pointHitRadius: 10,
                data: [65, 59, 80, 81, 56, 55, 40],
                    },
            {
                label: "Compras",
                borderWidth: 1,
                backgroundColor: "rgba(165, 20, 20, 0.2)",
                borderColor: "rgba(165, 20, 20, 1)",
                borderDashOffset: 0.0,
                pointBorderColor: "rgba(165, 20, 20, 1)",
                pointBackgroundColor: "#fff",
                pointBorderWidth: 5,
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgb(255, 255, 255)",
                pointHoverBorderColor: "rgba(165, 20, 20, 1)",
                pointHoverBorderWidth: 2,
                pointRadius: 1,
                pointHitRadius: 10,
                data: [75.50, 69, 70, 91, 66, 65, 50],
                    }
                ]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    callback: function (value, index, values) {
                        return "S/." + value;
                    }
                }
                    }]
        },
        responsive: true,
        tooltips: {
            mode: 'index',
            intersect: false,
            callbacks: {
                label: function (tooltipItems, data) {
                    return ' S/.' + tooltipItems.yLabel;
                }
            }
        }
    }
});
/*Chart Mes*/
var ctxMes = document.getElementById("mesChart");
var chartMes = new Chart(ctxMes, {
    type: 'line',
    data: {
        labels: ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30"],
        datasets: [{
                label: "Ventas",
                borderWidth: 1,
                backgroundColor: "rgba(20, 133, 165, 0.2)",
                borderColor: "rgba(20, 133, 165, 1)",
                borderDashOffset: 0.0,
                pointBorderColor: "rgba(20, 133, 165, 1)",
                pointBackgroundColor: "#fff",
                pointBorderWidth: 5,
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgb(255, 255, 255)",
                pointHoverBorderColor: "rgba(20, 133, 165, 1)",
                pointHoverBorderWidth: 2,
                pointRadius: 1,
                pointHitRadius: 10,
                data: [65, 59, 80, 81, 56, 55, 40, 65, 59, 80, 81, 56, 55, 40, 65, 59, 80, 81, 56, 55, 40, 65, 59, 80, 81, 56, 55, 40, 54, 23],
                    },
            {
                label: "Compras",
                borderWidth: 1,
                backgroundColor: "rgba(165, 20, 20, 0.2)",
                borderColor: "rgba(165, 20, 20, 1)",
                borderDashOffset: 0.0,
                pointBorderColor: "rgba(165, 20, 20, 1)",
                pointBackgroundColor: "#fff",
                pointBorderWidth: 5,
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgb(255, 255, 255)",
                pointHoverBorderColor: "rgba(165, 20, 20, 1)",
                pointHoverBorderWidth: 2,
                pointRadius: 1,
                pointHitRadius: 10,
                data: [75.50, 69, 70, 91, 66, 65, 50, 75.50, 69, 70, 91, 66, 65, 50, 75.50, 69, 70, 91, 66, 65, 50, 75.50, 69, 70, 91, 66, 65, 50, 43, 56],
                    }
                ]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    callback: function (value, index, values) {
                        return "S/." + value;
                    }
                }
                    }]
        },
        responsive: true,
        tooltips: {
            mode: 'index',
            intersect: false,
            callbacks: {
                label: function (tooltipItems, data) {
                    return ' S/.' + tooltipItems.yLabel;
                }
            }
        }
    }
});
/*Chart Año*/
var ctxAnio = document.getElementById("anioChart");
var chartAnio = new Chart(ctxAnio, {
    type: 'line',
    data: {
        labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
        datasets: [{
                label: "Ventas",
                borderWidth: 1,
                backgroundColor: "rgba(20, 133, 165, 0.2)",
                borderColor: "rgba(20, 133, 165, 1)",
                borderDashOffset: 0.0,
                pointBorderColor: "rgba(20, 133, 165, 1)",
                pointBackgroundColor: "#fff",
                pointBorderWidth: 5,
                pointHoverBorderWidth: 1,
                pointRadius: 1,
                pointHitRadius: 10,
                data: [65, 59, 80, 81, 56, 55, 40, 65, 59, 80, 81, 56],
                    },
            {
                label: "Compras",
                borderWidth: 1,
                backgroundColor: "rgba(165, 20, 20, 0.2)",
                borderColor: "rgba(165, 20, 20, 1)",
                borderDashOffset: 0.0,
                pointBorderColor: "rgba(165, 20, 20, 1)",
                pointBackgroundColor: "#fff",
                pointBorderWidth: 5,
                pointHoverBorderWidth: 1,
                pointRadius: 1,
                pointHitRadius: 10,
                data: [75.50, 69, 70, 91, 66, 65, 50, 75.50, 69, 70, 91, 34.4],
                    }
                ]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    callback: function (value, index, values) {
                        return "S/." + value;
                    }
                }
                    }]
        },
        responsive: true,
        tooltips: {
            mode: 'index',
            intersect: false,
            callbacks: {
                label: function (tooltipItems, data) {
                    return ' S/.' + tooltipItems.yLabel;
                }
            }
        }
    }
});