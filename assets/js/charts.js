$(document).ready(function () {

    Orientame = Orientame || {};

    Orientame.charts = (function ($, _) {

        var answers = $("#profile").data('answers');

        var _init = function () {

            interest();
            personality();
            skills();
        }


        var interest = function () {

            var dataPoints = _.map(answers[0], function (v) {
                return v * 100;
            });


            var ctx = $("#interests");

            var data = {
                labels: ["Realista", "Investigativo", "Artístico", "Social", "Emprendedor", "Convencional"],
                datasets: [
                    {
                        label: "Mis intereses",
                        backgroundColor: "rgba(179,181,198,0.2)",
                        borderColor: "rgba(179,181,198,1)",
                        pointBackgroundColor: "rgba(179,181,198,1)",
                        pointBorderColor: "#fff",
                        pointHoverBackgroundColor: "#fff",
                        pointHoverBorderColor: "rgba(179,181,198,1)",
                        data: dataPoints
                    }
                ]
            };


            var myRadarChart = new Chart(ctx, {
                type: 'radar',
                data: data,
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });


        }


        var personality = function () {


            $("#personality-1").slider({
                value: 100,
                min: 0,
                max: 500,
                step: 50,
                disabled: true,
                slide: function (event, ui) {
                    $("#amount").val("$" + ui.value);
                }

            });
            $("#personality-2").slider();
            $("#personality-3").slider();
            $("#personality-4").slider();


        }

        var skills = function () {

            var ctx = $("#skills");

            var dataPoints = _.map(answers[2], function (v) {
                return v * 100;
            });


            var data = {
                labels: ["Razonamiento Aritmético", "Vocabulario", "Espacio tridimensional", "Cálculo", "Comparación de nombres", "Mapeo de Objetos"],
                datasets: [
                    {
                        label: "Mis habilidades",
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderWidth: 1,
                        data: dataPoints,
                    }
                ]
            };


            var myBarChart = new Chart(ctx, {
                type: 'bar',
                data: data,
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });

        }


        return {
            render: _init
        }


    })($, _);


    Orientame.charts.render();


});
