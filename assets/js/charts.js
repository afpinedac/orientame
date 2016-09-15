;$(document).ready(function () {

    var Orientame = Orientame || {};

    Orientame.charts = (function ($, _) {

        var answers = $("#profile").data('answers');

        var __init = function () {

            interest();
            personality();
            skills();
        }


        var interest = function () {


            var ctx = $("#interests");

            var data = {
                labels: ["Eating", "Drinking", "Sleeping", "Designing", "Coding", "Cycling", "Running"],
                datasets: [
                    {
                        label: "My First dataset",
                        backgroundColor: "rgba(179,181,198,0.2)",
                        borderColor: "rgba(179,181,198,1)",
                        pointBackgroundColor: "rgba(179,181,198,1)",
                        pointBorderColor: "#fff",
                        pointHoverBackgroundColor: "#fff",
                        pointHoverBorderColor: "rgba(179,181,198,1)",
                        data: [65, 59, 90, 81, 56, 55, 40]
                    },
                    /*  {
                     label: "My Second dataset",
                     backgroundColor: "rgba(255,99,132,0.2)",
                     borderColor: "rgba(255,99,132,1)",
                     pointBackgroundColor: "rgba(255,99,132,1)",
                     pointBorderColor: "#fff",
                     pointHoverBackgroundColor: "#fff",
                     pointHoverBorderColor: "rgba(255,99,132,1)",
                     data: [28, 48, 40, 19, 96, 27, 100]
                     }*/
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


            var data = {
                labels: ["January", "February", "March", "April", "May"],
                datasets: [
                    {
                        label: "My First dataset",
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderWidth: 1,
                        data: [65, 59, 80, 81, 56],
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
            render: __init()
        }


    })($, _);


    Orientame.charts.render();

})
