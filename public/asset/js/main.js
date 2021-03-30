(function ($) {
    // USE STRICT
    "use strict";
    try {
        //WidgetChart 1
        var ctx = document.getElementById("widgetChart1");
        if (ctx) {
            ctx.height = 130;
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                    type: 'line',
                    datasets: [{
                        data: [78, 81, 80, 45, 34, 12, 40],
                        label: 'Dataset',
                        backgroundColor: 'rgba(255,255,255,.1)',
                        borderColor: 'rgba(255,255,255,.55)',
                    },]
                },
                options: {
                    maintainAspectRatio: true,
                    legend: {
                        display: false
                    },
                    layout: {
                        padding: {
                            left: 0,
                            right: 0,
                            top: 0,
                            bottom: 0
                        }
                    },
                    responsive: true,
                    scales: {
                        xAxes: [{
                            gridLines: {
                                color: 'transparent',
                                zeroLineColor: 'transparent'
                            },
                            ticks: {
                                fontSize: 2,
                                fontColor: 'transparent'
                            }
                        }],
                        yAxes: [{
                            display: false,
                            ticks: {
                                display: false,
                            }
                        }]
                    },
                    title: {
                        display: false,
                    },
                    elements: {
                        line: {
                            borderWidth: 0
                        },
                        point: {
                            radius: 0,
                            hitRadius: 10,
                            hoverRadius: 4
                        }
                    }
                }
            });
        }


        //WidgetChart 2
        var ctx = document.getElementById("widgetChart2");
        if (ctx) {
            ctx.height = 130;
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['January', 'February', 'March', 'April', 'May', 'June'],
                    type: 'line',
                    datasets: [{
                        data: [1, 18, 9, 17, 34, 22],
                        label: 'Dataset',
                        backgroundColor: 'transparent',
                        borderColor: 'rgba(255,255,255,.55)',
                    },]
                },
                options: {

                    maintainAspectRatio: false,
                    legend: {
                        display: false
                    },
                    responsive: true,
                    tooltips: {
                        mode: 'index',
                        titleFontSize: 12,
                        titleFontColor: '#000',
                        bodyFontColor: '#000',
                        backgroundColor: '#fff',
                        titleFontFamily: 'Montserrat',
                        bodyFontFamily: 'Montserrat',
                        cornerRadius: 3,
                        intersect: false,
                    },
                    scales: {
                        xAxes: [{
                            gridLines: {
                                color: 'transparent',
                                zeroLineColor: 'transparent'
                            },
                            ticks: {
                                fontSize: 2,
                                fontColor: 'transparent'
                            }
                        }],
                        yAxes: [{
                            display: false,
                            ticks: {
                                display: false,
                            }
                        }]
                    },
                    title: {
                        display: false,
                    },
                    elements: {
                        line: {
                            tension: 0.00001,
                            borderWidth: 1
                        },
                        point: {
                            radius: 4,
                            hitRadius: 10,
                            hoverRadius: 4
                        }
                    }
                }
            });
        }


        //WidgetChart 3
        var ctx = document.getElementById("widgetChart3");
        if (ctx) {
            ctx.height = 130;
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['January', 'February', 'March', 'April', 'May', 'June'],
                    type: 'line',
                    datasets: [{
                        data: [65, 59, 84, 84, 51, 55],
                        label: 'Dataset',
                        backgroundColor: 'transparent',
                        borderColor: 'rgba(255,255,255,.55)',
                    },]
                },
                options: {

                    maintainAspectRatio: false,
                    legend: {
                        display: false
                    },
                    responsive: true,
                    tooltips: {
                        mode: 'index',
                        titleFontSize: 12,
                        titleFontColor: '#000',
                        bodyFontColor: '#000',
                        backgroundColor: '#fff',
                        titleFontFamily: 'Montserrat',
                        bodyFontFamily: 'Montserrat',
                        cornerRadius: 3,
                        intersect: false,
                    },
                    scales: {
                        xAxes: [{
                            gridLines: {
                                color: 'transparent',
                                zeroLineColor: 'transparent'
                            },
                            ticks: {
                                fontSize: 2,
                                fontColor: 'transparent'
                            }
                        }],
                        yAxes: [{
                            display: false,
                            ticks: {
                                display: false,
                            }
                        }]
                    },
                    title: {
                        display: false,
                    },
                    elements: {
                        line: {
                            borderWidth: 1
                        },
                        point: {
                            radius: 4,
                            hitRadius: 10,
                            hoverRadius: 4
                        }
                    }
                }
            });
        }


        //WidgetChart 4
        var ctx = document.getElementById("widgetChart4");
        if (ctx) {
            ctx.height = 115;
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                    datasets: [
                        {
                            label: "My First dataset",
                            data: [78, 81, 80, 65, 58, 75, 60, 75, 65, 60, 60, 75],
                            borderColor: "transparent",
                            borderWidth: "0",
                            backgroundColor: "rgba(255,255,255,.3)"
                        }
                    ]
                },
                options: {
                    maintainAspectRatio: true,
                    legend: {
                        display: false
                    },
                    scales: {
                        xAxes: [{
                            display: false,
                            categoryPercentage: 1,
                            barPercentage: 0.65
                        }],
                        yAxes: [{
                            display: false
                        }]
                    }
                }
            });
        }

        // Recent Report
        const brandProduct = 'rgba(0,181,233,0.8)'
        const brandService = 'rgba(0,173,95,0.8)'

        var elements = 10
        var data1 = [52, 60, 55, 50, 65, 80, 57, 70, 105, 115]
        var data2 = [102, 70, 80, 100, 56, 53, 80, 75, 65, 90]
        callAjaxLease();
        // var ctx = document.getElementById("recent-rep-chart");
        // if (ctx) {
        //   ctx.height = 250;
        //   var myChart = new Chart(ctx, {
        //     type: 'line',
        //     data: {
        //       labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', ''],
        //       datasets: [
        //         {
        //           label: 'My First dataset',
        //           backgroundColor: brandService,
        //           borderColor: 'transparent',
        //           pointHoverBackgroundColor: '#fff',
        //           borderWidth: 0,
        //           data: callAjaxLease()
        //
        //         },
        //         {
        //           label: 'My Second dataset',
        //           backgroundColor: brandProduct,
        //           borderColor: 'transparent',
        //           pointHoverBackgroundColor: '#fff',
        //           borderWidth: 0,
        //           data: data2
        //
        //         }
        //       ]
        //     },
        //     options: {
        //       maintainAspectRatio: true,
        //       legend: {
        //         display: false
        //       },
        //       responsive: true,
        //       scales: {
        //         xAxes: [{
        //           gridLines: {
        //             drawOnChartArea: true,
        //             color: '#f2f2f2'
        //           },
        //           ticks: {
        //             fontFamily: "Poppins",
        //             fontSize: 12
        //           }
        //         }],
        //         yAxes: [{
        //           ticks: {
        //             beginAtZero: true,
        //             maxTicksLimit: 5,
        //             stepSize: 50,
        //             max: 150,
        //             fontFamily: "Poppins",
        //             fontSize: 12
        //           },
        //           gridLines: {
        //             display: true,
        //             color: '#f2f2f2'
        //
        //           }
        //         }]
        //       },
        //       elements: {
        //         point: {
        //           radius: 0,
        //           hitRadius: 10,
        //           hoverRadius: 4,
        //           hoverBorderWidth: 3
        //         }
        //       }
        //
        //
        //     }
        //   });
        // }

        // Percent Chart
        var ctx = document.getElementById("percent-chart");
        if (ctx) {
            ctx.height = 280;
            var myChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    datasets: [
                        {
                            label: "My First dataset",
                            data: [60, 40],
                            backgroundColor: [
                                '#00b5e9',
                                '#fa4251'
                            ],
                            hoverBackgroundColor: [
                                '#00b5e9',
                                '#fa4251'
                            ],
                            borderWidth: [
                                0, 0
                            ],
                            hoverBorderColor: [
                                'transparent',
                                'transparent'
                            ]
                        }
                    ],
                    labels: [
                        'Products',
                        'Services'
                    ]
                },
                options: {
                    maintainAspectRatio: false,
                    responsive: true,
                    cutoutPercentage: 55,
                    animation: {
                        animateScale: true,
                        animateRotate: true
                    },
                    legend: {
                        display: false
                    },
                    tooltips: {
                        titleFontFamily: "Poppins",
                        xPadding: 15,
                        yPadding: 10,
                        caretPadding: 0,
                        bodyFontSize: 16
                    }
                }
            });
        }

    } catch (error) {
        console.log(error);
    }


    try {

        // Recent Report 2
        const bd_brandProduct2 = 'rgba(0,181,233,0.9)'
        const bd_brandService2 = 'rgba(0,173,95,0.9)'
        const brandProduct2 = 'rgba(0,181,233,0.2)'
        const brandService2 = 'rgba(0,173,95,0.2)'

        var data3 = [52, 60, 55, 50, 65, 80, 57, 70, 105, 115]
        var data4 = [102, 70, 80, 100, 56, 53, 80, 75, 65, 90]

        var ctx = document.getElementById("recent-rep2-chart");
        if (ctx) {
            ctx.height = 230;
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', ''],
                    datasets: [
                        {
                            label: 'My First dataset',
                            backgroundColor: brandService2,
                            borderColor: bd_brandService2,
                            pointHoverBackgroundColor: '#fff',
                            borderWidth: 0,
                            data: data3

                        },
                        {
                            label: 'My Second dataset',
                            backgroundColor: brandProduct2,
                            borderColor: bd_brandProduct2,
                            pointHoverBackgroundColor: '#fff',
                            borderWidth: 0,
                            data: data4

                        }
                    ]
                },
                options: {
                    maintainAspectRatio: true,
                    legend: {
                        display: false
                    },
                    responsive: true,
                    scales: {
                        xAxes: [{
                            gridLines: {
                                drawOnChartArea: true,
                                color: '#f2f2f2'
                            },
                            ticks: {
                                fontFamily: "Poppins",
                                fontSize: 12
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                maxTicksLimit: 5,
                                stepSize: 50,
                                max: 150,
                                fontFamily: "Poppins",
                                fontSize: 12
                            },
                            gridLines: {
                                display: true,
                                color: '#f2f2f2'

                            }
                        }]
                    },
                    elements: {
                        point: {
                            radius: 0,
                            hitRadius: 10,
                            hoverRadius: 4,
                            hoverBorderWidth: 3
                        },
                        line: {
                            tension: 0
                        }
                    }


                }
            });
        }

    } catch (error) {
        console.log(error);
    }


    try {

        // Recent Report 3
        const bd_brandProduct3 = 'rgba(0,181,233,0.9)';
        const bd_brandService3 = 'rgba(0,173,95,0.9)';
        const brandProduct3 = 'transparent';
        const brandService3 = 'transparent';

        var data5 = [52, 60, 55, 50, 65, 80, 57, 115];
        var data6 = [102, 70, 80, 100, 56, 53, 80, 90];

        var ctx = document.getElementById("recent-rep3-chart");
        if (ctx) {
            ctx.height = 230;
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', ''],
                    datasets: [
                        {
                            label: 'My First dataset',
                            backgroundColor: brandService3,
                            borderColor: bd_brandService3,
                            pointHoverBackgroundColor: '#fff',
                            borderWidth: 0,
                            data: data5,
                            pointBackgroundColor: bd_brandService3
                        },
                        {
                            label: 'My Second dataset',
                            backgroundColor: brandProduct3,
                            borderColor: bd_brandProduct3,
                            pointHoverBackgroundColor: '#fff',
                            borderWidth: 0,
                            data: data6,
                            pointBackgroundColor: bd_brandProduct3

                        }
                    ]
                },
                options: {
                    maintainAspectRatio: false,
                    legend: {
                        display: false
                    },
                    responsive: true,
                    scales: {
                        xAxes: [{
                            gridLines: {
                                drawOnChartArea: true,
                                color: '#f2f2f2'
                            },
                            ticks: {
                                fontFamily: "Poppins",
                                fontSize: 12
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                maxTicksLimit: 5,
                                stepSize: 50,
                                max: 150,
                                fontFamily: "Poppins",
                                fontSize: 12
                            },
                            gridLines: {
                                display: false,
                                color: '#f2f2f2'
                            }
                        }]
                    },
                    elements: {
                        point: {
                            radius: 3,
                            hoverRadius: 4,
                            hoverBorderWidth: 3,
                            backgroundColor: '#333'
                        }
                    }


                }
            });
        }

    } catch (error) {
        console.log(error);
    }

    try {
        //WidgetChart 5
        var ctx = document.getElementById("widgetChart5");
        if (ctx) {
            ctx.height = 220;
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                    datasets: [
                        {
                            label: "My First dataset",
                            data: [78, 81, 80, 64, 65, 80, 70, 75, 67, 85, 66, 68],
                            borderColor: "transparent",
                            borderWidth: "0",
                            backgroundColor: "#ccc",
                        }
                    ]
                },
                options: {
                    maintainAspectRatio: true,
                    legend: {
                        display: false
                    },
                    scales: {
                        xAxes: [{
                            display: false,
                            categoryPercentage: 1,
                            barPercentage: 0.65
                        }],
                        yAxes: [{
                            display: false
                        }]
                    }
                }
            });
        }

    } catch (error) {
        console.log(error);
    }

    try {

        // Percent Chart 2
        var ctx = document.getElementById("percent-chart2");
        if (ctx) {
            ctx.height = 209;
            var myChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    datasets: [
                        {
                            label: "My First dataset",
                            data: [60, 40],
                            backgroundColor: [
                                '#00b5e9',
                                '#fa4251'
                            ],
                            hoverBackgroundColor: [
                                '#00b5e9',
                                '#fa4251'
                            ],
                            borderWidth: [
                                0, 0
                            ],
                            hoverBorderColor: [
                                'transparent',
                                'transparent'
                            ]
                        }
                    ],
                    labels: [
                        'Products',
                        'Services'
                    ]
                },
                options: {
                    maintainAspectRatio: false,
                    responsive: true,
                    cutoutPercentage: 87,
                    animation: {
                        animateScale: true,
                        animateRotate: true
                    },
                    legend: {
                        display: false,
                        position: 'bottom',
                        labels: {
                            fontSize: 14,
                            fontFamily: "Poppins,sans-serif"
                        }

                    },
                    tooltips: {
                        titleFontFamily: "Poppins",
                        xPadding: 15,
                        yPadding: 10,
                        caretPadding: 0,
                        bodyFontSize: 16,
                    }
                }
            });
        }

    } catch (error) {
        console.log(error);
    }

    try {
        //Sales chart
        var ctx = document.getElementById("sales-chart");
        if (ctx) {
            ctx.height = 150;
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ["2010", "2011", "2012", "2013", "2014", "2015", "2016"],
                    type: 'line',
                    defaultFontFamily: 'Poppins',
                    datasets: [{
                        label: "Foods",
                        data: [0, 30, 10, 120, 50, 63, 10],
                        backgroundColor: 'transparent',
                        borderColor: 'rgba(220,53,69,0.75)',
                        borderWidth: 3,
                        pointStyle: 'circle',
                        pointRadius: 5,
                        pointBorderColor: 'transparent',
                        pointBackgroundColor: 'rgba(220,53,69,0.75)',
                    }, {
                        label: "Electronics",
                        data: [0, 50, 40, 80, 40, 79, 120],
                        backgroundColor: 'transparent',
                        borderColor: 'rgba(40,167,69,0.75)',
                        borderWidth: 3,
                        pointStyle: 'circle',
                        pointRadius: 5,
                        pointBorderColor: 'transparent',
                        pointBackgroundColor: 'rgba(40,167,69,0.75)',
                    }]
                },
                options: {
                    responsive: true,
                    tooltips: {
                        mode: 'index',
                        titleFontSize: 12,
                        titleFontColor: '#000',
                        bodyFontColor: '#000',
                        backgroundColor: '#fff',
                        titleFontFamily: 'Poppins',
                        bodyFontFamily: 'Poppins',
                        cornerRadius: 3,
                        intersect: false,
                    },
                    legend: {
                        display: false,
                        labels: {
                            usePointStyle: true,
                            fontFamily: 'Poppins',
                        },
                    },
                    scales: {
                        xAxes: [{
                            display: true,
                            gridLines: {
                                display: false,
                                drawBorder: false
                            },
                            scaleLabel: {
                                display: false,
                                labelString: 'Month'
                            },
                            ticks: {
                                fontFamily: "Poppins"
                            }
                        }],
                        yAxes: [{
                            display: true,
                            gridLines: {
                                display: false,
                                drawBorder: false
                            },
                            scaleLabel: {
                                display: true,
                                labelString: 'Value',
                                fontFamily: "Poppins"

                            },
                            ticks: {
                                fontFamily: "Poppins"
                            }
                        }]
                    },
                    title: {
                        display: false,
                        text: 'Normal Legend'
                    }
                }
            });
        }


    } catch (error) {
        console.log(error);
    }

    try {

        //Team chart
        var ctx = document.getElementById("team-chart");
        if (ctx) {
            ctx.height = 150;
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ["2010", "2011", "2012", "2013", "2014", "2015", "2016"],
                    type: 'line',
                    defaultFontFamily: 'Poppins',
                    datasets: [{
                        data: [0, 7, 3, 5, 2, 10, 7],
                        label: "Expense",
                        backgroundColor: 'rgba(0,103,255,.15)',
                        borderColor: 'rgba(0,103,255,0.5)',
                        borderWidth: 3.5,
                        pointStyle: 'circle',
                        pointRadius: 5,
                        pointBorderColor: 'transparent',
                        pointBackgroundColor: 'rgba(0,103,255,0.5)',
                    },]
                },
                options: {
                    responsive: true,
                    tooltips: {
                        mode: 'index',
                        titleFontSize: 12,
                        titleFontColor: '#000',
                        bodyFontColor: '#000',
                        backgroundColor: '#fff',
                        titleFontFamily: 'Poppins',
                        bodyFontFamily: 'Poppins',
                        cornerRadius: 3,
                        intersect: false,
                    },
                    legend: {
                        display: false,
                        position: 'top',
                        labels: {
                            usePointStyle: true,
                            fontFamily: 'Poppins',
                        },


                    },
                    scales: {
                        xAxes: [{
                            display: true,
                            gridLines: {
                                display: false,
                                drawBorder: false
                            },
                            scaleLabel: {
                                display: false,
                                labelString: 'Month'
                            },
                            ticks: {
                                fontFamily: "Poppins"
                            }
                        }],
                        yAxes: [{
                            display: true,
                            gridLines: {
                                display: false,
                                drawBorder: false
                            },
                            scaleLabel: {
                                display: true,
                                labelString: 'Value',
                                fontFamily: "Poppins"
                            },
                            ticks: {
                                fontFamily: "Poppins"
                            }
                        }]
                    },
                    title: {
                        display: false,
                    }
                }
            });
        }


    } catch (error) {
        console.log(error);
    }

    try {
        //bar chart
        var ctx = document.getElementById("barChart");
        if (ctx) {
            ctx.height = 200;
            var myChart = new Chart(ctx, {
                type: 'bar',
                defaultFontFamily: 'Poppins',
                data: {
                    labels: ["January", "February", "March", "April", "May", "June", "July"],
                    datasets: [
                        {
                            label: "My First dataset",
                            data: [65, 59, 80, 81, 56, 55, 40],
                            borderColor: "rgba(0, 123, 255, 0.9)",
                            borderWidth: "0",
                            backgroundColor: "rgba(0, 123, 255, 0.5)",
                            fontFamily: "Poppins"
                        },
                        {
                            label: "My Second dataset",
                            data: [28, 48, 40, 19, 86, 27, 90],
                            borderColor: "rgba(0,0,0,0.09)",
                            borderWidth: "0",
                            backgroundColor: "rgba(0,0,0,0.07)",
                            fontFamily: "Poppins"
                        }
                    ]
                },
                options: {
                    legend: {
                        position: 'top',
                        labels: {
                            fontFamily: 'Poppins'
                        }

                    },
                    scales: {
                        xAxes: [{
                            ticks: {
                                fontFamily: "Poppins"

                            }
                        }],
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                fontFamily: "Poppins"
                            }
                        }]
                    }
                }
            });
        }


    } catch (error) {
        console.log(error);
    }

    try {

        //radar chart
        var ctx = document.getElementById("radarChart");
        if (ctx) {
            ctx.height = 200;
            var myChart = new Chart(ctx, {
                type: 'radar',
                data: {
                    labels: [["Eating", "Dinner"], ["Drinking", "Water"], "Sleeping", ["Designing", "Graphics"], "Coding", "Cycling", "Running"],
                    defaultFontFamily: 'Poppins',
                    datasets: [
                        {
                            label: "My First dataset",
                            data: [65, 59, 66, 45, 56, 55, 40],
                            borderColor: "rgba(0, 123, 255, 0.6)",
                            borderWidth: "1",
                            backgroundColor: "rgba(0, 123, 255, 0.4)"
                        },
                        {
                            label: "My Second dataset",
                            data: [28, 12, 40, 19, 63, 27, 87],
                            borderColor: "rgba(0, 123, 255, 0.7",
                            borderWidth: "1",
                            backgroundColor: "rgba(0, 123, 255, 0.5)"
                        }
                    ]
                },
                options: {
                    legend: {
                        position: 'top',
                        labels: {
                            fontFamily: 'Poppins'
                        }

                    },
                    scale: {
                        ticks: {
                            beginAtZero: true,
                            fontFamily: "Poppins"
                        }
                    }
                }
            });
        }

    } catch (error) {
        console.log(error)
    }

    try {

        //line chart
        var ctx = document.getElementById("lineChart");
        if (ctx) {
            ctx.height = 150;
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ["January", "February", "March", "April", "May", "June", "July"],
                    defaultFontFamily: "Poppins",
                    datasets: [
                        {
                            label: "My First dataset",
                            borderColor: "rgba(0,0,0,.09)",
                            borderWidth: "1",
                            backgroundColor: "rgba(0,0,0,.07)",
                            data: [22, 44, 67, 43, 76, 45, 12]
                        },
                        {
                            label: "My Second dataset",
                            borderColor: "rgba(0, 123, 255, 0.9)",
                            borderWidth: "1",
                            backgroundColor: "rgba(0, 123, 255, 0.5)",
                            pointHighlightStroke: "rgba(26,179,148,1)",
                            data: [16, 32, 18, 26, 42, 33, 44]
                        }
                    ]
                },
                options: {
                    legend: {
                        position: 'top',
                        labels: {
                            fontFamily: 'Poppins'
                        }

                    },
                    responsive: true,
                    tooltips: {
                        mode: 'index',
                        intersect: false
                    },
                    hover: {
                        mode: 'nearest',
                        intersect: true
                    },
                    scales: {
                        xAxes: [{
                            ticks: {
                                fontFamily: "Poppins"

                            }
                        }],
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                fontFamily: "Poppins"
                            }
                        }]
                    }

                }
            });
        }


    } catch (error) {
        console.log(error);
    }


    try {

        //doughut chart
        var ctx = document.getElementById("doughutChart");
        if (ctx) {
            ctx.height = 150;
            var myChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    datasets: [{
                        data: [45, 25, 20, 10],
                        backgroundColor: [
                            "rgba(0, 123, 255,0.9)",
                            "rgba(0, 123, 255,0.7)",
                            "rgba(0, 123, 255,0.5)",
                            "rgba(0,0,0,0.07)"
                        ],
                        hoverBackgroundColor: [
                            "rgba(0, 123, 255,0.9)",
                            "rgba(0, 123, 255,0.7)",
                            "rgba(0, 123, 255,0.5)",
                            "rgba(0,0,0,0.07)"
                        ]

                    }],
                    labels: [
                        "Green",
                        "Green",
                        "Green",
                        "Green"
                    ]
                },
                options: {
                    legend: {
                        position: 'top',
                        labels: {
                            fontFamily: 'Poppins'
                        }

                    },
                    responsive: true
                }
            });
        }


    } catch (error) {
        console.log(error);
    }


    try {

        //pie chart
        var ctx = document.getElementById("pieChart");
        if (ctx) {
            ctx.height = 200;
            var myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    datasets: [{
                        data: [45, 25, 20, 10],
                        backgroundColor: [
                            "rgba(0, 123, 255,0.9)",
                            "rgba(0, 123, 255,0.7)",
                            "rgba(0, 123, 255,0.5)",
                            "rgba(0,0,0,0.07)"
                        ],
                        hoverBackgroundColor: [
                            "rgba(0, 123, 255,0.9)",
                            "rgba(0, 123, 255,0.7)",
                            "rgba(0, 123, 255,0.5)",
                            "rgba(0,0,0,0.07)"
                        ]

                    }],
                    labels: [
                        "Green",
                        "Green",
                        "Green"
                    ]
                },
                options: {
                    legend: {
                        position: 'top',
                        labels: {
                            fontFamily: 'Poppins'
                        }

                    },
                    responsive: true
                }
            });
        }


    } catch (error) {
        console.log(error);
    }

    try {

        // polar chart
        var ctx = document.getElementById("polarChart");
        if (ctx) {
            ctx.height = 200;
            var myChart = new Chart(ctx, {
                type: 'polarArea',
                data: {
                    datasets: [{
                        data: [15, 18, 9, 6, 19],
                        backgroundColor: [
                            "rgba(0, 123, 255,0.9)",
                            "rgba(0, 123, 255,0.8)",
                            "rgba(0, 123, 255,0.7)",
                            "rgba(0,0,0,0.2)",
                            "rgba(0, 123, 255,0.5)"
                        ]

                    }],
                    labels: [
                        "Green",
                        "Green",
                        "Green",
                        "Green"
                    ]
                },
                options: {
                    legend: {
                        position: 'top',
                        labels: {
                            fontFamily: 'Poppins'
                        }

                    },
                    responsive: true
                }
            });
        }

    } catch (error) {
        console.log(error);
    }

    try {

        // single bar chart
        var ctx = document.getElementById("singelBarChart");
        if (ctx) {
            ctx.height = 150;
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["Sun", "Mon", "Tu", "Wed", "Th", "Fri", "Sat"],
                    datasets: [
                        {
                            label: "My First dataset",
                            data: [40, 55, 75, 81, 56, 55, 40],
                            borderColor: "rgba(0, 123, 255, 0.9)",
                            borderWidth: "0",
                            backgroundColor: "rgba(0, 123, 255, 0.5)"
                        }
                    ]
                },
                options: {
                    legend: {
                        position: 'top',
                        labels: {
                            fontFamily: 'Poppins'
                        }

                    },
                    scales: {
                        xAxes: [{
                            ticks: {
                                fontFamily: "Poppins"

                            }
                        }],
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                fontFamily: "Poppins"
                            }
                        }]
                    }
                }
            });
        }

    } catch (error) {
        console.log(error);
    }

})(jQuery);


(function ($) {
    // USE STRICT
    "use strict";
    var navbars = ['header', 'aside'];
    var hrefSelector = 'a:not([target="_blank"]):not([href^="#"]):not([class^="chosen-single"])';
    var linkElement = navbars.map(element => element + ' ' + hrefSelector).join(', ');
    $(".animsition").animsition({
        inClass: 'fade-in',
        outClass: 'fade-out',
        inDuration: 900,
        outDuration: 900,
        linkElement: linkElement,
        loading: true,
        loadingParentElement: 'html',
        loadingClass: 'page-loader',
        loadingInner: '<div class="page-loader__spin"></div>',
        timeout: false,
        timeoutCountdown: 5000,
        onLoadEvent: true,
        browser: ['animation-duration', '-webkit-animation-duration'],
        overlay: false,
        overlayClass: 'animsition-overlay-slide',
        overlayParentElement: 'html',
        transition: function (url) {
            window.location.href = url;
        }
    });


})(jQuery);
(function ($) {
    // USE STRICT
    "use strict";

    // Map
    try {

        var vmap = $('#vmap');
        if (vmap[0]) {
            vmap.vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        }

    } catch (error) {
        console.log(error);
    }

    // Europe Map
    try {

        var vmap1 = $('#vmap1');
        if (vmap1[0]) {
            vmap1.vectorMap({
                map: 'europe_en',
                color: '#007BFF',
                borderColor: '#fff',
                backgroundColor: '#fff',
                enableZoom: true,
                showTooltip: true
            });
        }

    } catch (error) {
        console.log(error);
    }

    // USA Map
    try {

        var vmap2 = $('#vmap2');

        if (vmap2[0]) {
            vmap2.vectorMap({
                map: 'usa_en',
                color: '#007BFF',
                borderColor: '#fff',
                backgroundColor: '#fff',
                enableZoom: true,
                showTooltip: true,
                selectedColor: null,
                hoverColor: null,
                colors: {
                    mo: '#001BFF',
                    fl: '#001BFF',
                    or: '#001BFF'
                },
                onRegionClick: function (event, code, region) {
                    event.preventDefault();
                }
            });
        }

    } catch (error) {
        console.log(error);
    }

    // Germany Map
    try {

        var vmap3 = $('#vmap3');
        if (vmap3[0]) {
            vmap3.vectorMap({
                map: 'germany_en',
                color: '#007BFF',
                borderColor: '#fff',
                backgroundColor: '#fff',
                onRegionClick: function (element, code, region) {
                    var message = 'You clicked "' + region + '" which has the code: ' + code.toUpperCase();

                    alert(message);
                }
            });
        }

    } catch (error) {
        console.log(error);
    }

    // France Map
    try {

        var vmap4 = $('#vmap4');
        if (vmap4[0]) {
            vmap4.vectorMap({
                map: 'france_fr',
                color: '#007BFF',
                borderColor: '#fff',
                backgroundColor: '#fff',
                enableZoom: true,
                showTooltip: true
            });
        }

    } catch (error) {
        console.log(error);
    }

    // Russia Map
    try {
        var vmap5 = $('#vmap5');
        if (vmap5[0]) {
            vmap5.vectorMap({
                map: 'russia_en',
                color: '#007BFF',
                borderColor: '#fff',
                backgroundColor: '#fff',
                hoverOpacity: 0.7,
                selectedColor: '#999999',
                enableZoom: true,
                showTooltip: true,
                scaleColors: ['#C8EEFF', '#006491'],
                normalizeFunction: 'polynomial'
            });
        }


    } catch (error) {
        console.log(error);
    }

    // Brazil Map
    try {

        var vmap6 = $('#vmap6');
        if (vmap6[0]) {
            vmap6.vectorMap({
                map: 'brazil_br',
                color: '#007BFF',
                borderColor: '#fff',
                backgroundColor: '#fff',
                onRegionClick: function (element, code, region) {
                    var message = 'You clicked "' + region + '" which has the code: ' + code.toUpperCase();
                    alert(message);
                }
            });
        }

    } catch (error) {
        console.log(error);
    }
})(jQuery);
(function ($) {
    // Use Strict
    "use strict";
    try {
        var progressbarSimple = $('.js-progressbar-simple');
        progressbarSimple.each(function () {
            var that = $(this);
            var executed = false;
            $(window).on('load', function () {

                that.waypoint(function () {
                    if (!executed) {
                        executed = true;
                        /*progress bar*/
                        that.progressbar({
                            update: function (current_percentage, $this) {
                                $this.find('.js-value').html(current_percentage + '%');
                            }
                        });
                    }
                }, {
                    offset: 'bottom-in-view'
                });

            });
        });
    } catch (err) {
        console.log(err);
    }
})(jQuery);
(function ($) {
    // USE STRICT
    "use strict";

    // Scroll Bar
    try {
        var jscr1 = $('.js-scrollbar1');
        if (jscr1[0]) {
            const ps1 = new PerfectScrollbar('.js-scrollbar1');
        }

        var jscr2 = $('.js-scrollbar2');
        if (jscr2[0]) {
            const ps2 = new PerfectScrollbar('.js-scrollbar2');

        }

    } catch (error) {
        console.log(error);
    }

})(jQuery);
(function ($) {
    // USE STRICT
    "use strict";

    // Select 2
    try {

        $(".js-select2").each(function () {
            $(this).select2({
                minimumResultsForSearch: 20,
                dropdownParent: $(this).next('.dropDownSelect2')
            });
        });

    } catch (error) {
        console.log(error);
    }


})(jQuery);
(function ($) {
    // USE STRICT
    "use strict";

    // Dropdown
    try {
        var menu = $('.js-item-menu');
        var sub_menu_is_showed = -1;

        for (var i = 0; i < menu.length; i++) {
            $(menu[i]).on('click', function (e) {
                e.preventDefault();
                $('.js-right-sidebar').removeClass("show-sidebar");
                if (jQuery.inArray(this, menu) == sub_menu_is_showed) {
                    $(this).toggleClass('show-dropdown');
                    sub_menu_is_showed = -1;
                } else {
                    for (var i = 0; i < menu.length; i++) {
                        $(menu[i]).removeClass("show-dropdown");
                    }
                    $(this).toggleClass('show-dropdown');
                    sub_menu_is_showed = jQuery.inArray(this, menu);
                }
            });
        }
        $(".js-item-menu, .js-dropdown").click(function (event) {
            event.stopPropagation();
        });

        $("body,html").on("click", function () {
            for (var i = 0; i < menu.length; i++) {
                menu[i].classList.remove("show-dropdown");
            }
            sub_menu_is_showed = -1;
        });

    } catch (error) {
        console.log(error);
    }

    var wW = $(window).width();
    // Right Sidebar
    var right_sidebar = $('.js-right-sidebar');
    var sidebar_btn = $('.js-sidebar-btn');

    sidebar_btn.on('click', function (e) {
        e.preventDefault();
        for (var i = 0; i < menu.length; i++) {
            menu[i].classList.remove("show-dropdown");
        }
        sub_menu_is_showed = -1;
        right_sidebar.toggleClass("show-sidebar");
    });

    $(".js-right-sidebar, .js-sidebar-btn").click(function (event) {
        event.stopPropagation();
    });

    $("body,html").on("click", function () {
        right_sidebar.removeClass("show-sidebar");

    });


    // Sublist Sidebar
    try {
        var arrow = $('.js-arrow');
        arrow.each(function () {
            var that = $(this);
            that.on('click', function (e) {
                e.preventDefault();
                that.find(".arrow").toggleClass("up");
                that.toggleClass("open");
                that.parent().find('.js-sub-list').slideToggle("250");
            });
        });

    } catch (error) {
        console.log(error);
    }


    try {
        // Hamburger Menu
        $('.hamburger').on('click', function () {
            $(this).toggleClass('is-active');
            $('.navbar-mobile').slideToggle('500');
        });
        $('.navbar-mobile__list li.has-dropdown > a').on('click', function () {
            var dropdown = $(this).siblings('ul.navbar-mobile__dropdown');
            $(this).toggleClass('active');
            $(dropdown).slideToggle('500');
            return false;
        });
    } catch (error) {
        console.log(error);
    }
})(jQuery);
(function ($) {
    // USE STRICT
    "use strict";

    // Load more
    try {
        var list_load = $('.js-list-load');
        if (list_load[0]) {
            list_load.each(function () {
                var that = $(this);
                that.find('.js-load-item').hide();
                var load_btn = that.find('.js-load-btn');
                load_btn.on('click', function (e) {
                    $(this).text("Loading...").delay(1500).queue(function (next) {
                        $(this).hide();
                        that.find(".js-load-item").fadeToggle("slow", 'swing');
                    });
                    e.preventDefault();
                });
            })

        }
    } catch (error) {
        console.log(error);
    }

})(jQuery);
(function ($) {
    // USE STRICT
    "use strict";

    try {

        $('[data-toggle="tooltip"]').tooltip();

    } catch (error) {
        console.log(error);
    }

    // Chatbox
    try {
        var inbox_wrap = $('.js-inbox');
        var message = $('.au-message__item');
        message.each(function () {
            var that = $(this);

            that.on('click', function () {
                $(this).parent().parent().parent().toggleClass('show-chat-box');
            });
        });


    } catch (error) {
        console.log(error);
    }

})(jQuery);

$(function () {
    $("#datepicker").datepicker();
});

$('#content_contract').change(function () {

    let listValidFileType = [
        'docx',
        'doc',
        'pdf'
    ];

    var i = $(this).prev('label').clone();
    var file = $('#content_contract')[0].files[0].name;
    $(this).prev('label').text(file);

    let fileType = file.slice((file.lastIndexOf(".") - 1 >>> 0) + 2);

    if (listValidFileType.indexOf(fileType) < 0) {
        $(this).next('div').show();
    }
});

(function () {
    'use strict';
    window.addEventListener('load', function () {
        // Get the forms we want to add validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function (form) {
            form.addEventListener('submit', function (event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();
var $table = $('table.scroll'),
    $bodyCells = $table.find('tbody tr:first').children(),
    colWidth;

// Adjust the width of thead cells when window resizes
$(window).resize(function () {
    // Get the tbody columns width array
    colWidth = $bodyCells.map(function () {
        return $(this).width();
    }).get();

    // Set the width of thead columns
    $table.find('thead tr').children().each(function (i, v) {
        $(v).width(colWidth[i]);
    });
}).resize(); // Trigger resize handler

// $('#open-dueContract').click(function () {
//     var contract = $(this).closest('tr.dropdown');
//     var startDate = contract.children('td.date_start').text();
//     $('input[name=date_start]').val(startDate);
//     var startEnd = contract.children('td.date_end').text();
//     $('input[name=date_end]').val(startEnd);
//     var contract_value = contract.children('td.value_contract').text();
//     $('input[name=value_contract]').val(contract_value);
//     var contract = $(this).data('contract_id');
//     var link = $("#due-contract").data('due-link');
//     $("#due-contract").attr("action", link + contract)
// });

function openDestroyDialog(element, submitType) {
    var product = $(element).data('id_data');
    var link = $("#destroy-value").data('destroy-link');
    $("#" + submitType).attr("href", link + product);
}

function openDueContract(element) {
    var contract = $(element).closest('tr.dropdown');
    var startDate = contract.children('td.date_start').text();
    $('input[name=date_start]').val(startDate);
    var startEnd = contract.children('td.date_end').text();
    $('input[name=date_end]').val(startEnd);
    var contract_value = $('.value_contract span').text();
    $('input[name=value_contract]').val(contract_value);
    var contract = $(element).data('contract_id');
    var link = $("#due-contract").data('due-link');
    $("#due-contract").attr("action", link + contract)
};

function get(element) {

}


$(document).ready(function () {
    $('#table-data_reponse').dataTable({
        "language": {
            "sProcessing": "Đang xử lý...",
            "sZeroRecords": "Không tìm thấy dòng nào phù hợp",
            "sInfo": "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
            "sInfoEmpty": "Đang xem 0 đến 0 trong tổng số 0 mục",
            "sInfoFiltered": "(được lọc từ _MAX_ mục)",
            "oPaginate": {
                "sFirst": "Đầu",
                "sPrevious": "Trước",
                "sNext": "Tiếp",
                "sLast": "Cuối"
            }
        },
        "processing": true, // tiền xử lý trước
        "aLengthMenu": [[10, 20, 30, 50], [10, 20, 30, 50]], // danh sách số trang trên 1 lần hiển thị bảng
        "order": [[1, 'desc']] //sắp xếp giảm dần theo cột thứ 1
    });

});


$("#riverroad-tb").tooltip({content: '<img src="' + $("#riverroad-tb").attr("data") + '" />'});

// Chức năng chọn hết


function checkAll() {
    document.getElementById('check-all').onclick = function () {
        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
        for (var checkbox of checkboxes) {
            checkbox.checked = this.checked;
        }
    }
}

$('.input-images').imageUploader();

function getQuan(element) {
    var url = $('#domain').attr('href');
    var id = $(element).find(":selected").val();
    $.ajax({
        url: url + "/api/product/province/" + id,
        async: false,
        success: function (result) {
            var quan = JSON.parse(result).district;

            var select = document.getElementById("quan");
            var length = select.options.length;
            for (i = length - 1; i >= 0; i--) {
                select.options[i] = null;
            }
            $.each(quan, function (index, ele) {

                if ($('#quan')[0].getAttribute('data-target') == ele.id) {
                    $('#quan').append(`<option value='${ele.id_district}' selected>${ele._name_district}</option>`);
                } else {

                    $('#quan').append(`<option value='${ele.id_district}' >${ele._name_district}</option>`);
                }

            });
        }
    });
}

checkAll();
$('#addrowPayment').on('click', function () {

    $('#idBodyPayment').append(
        `<tr class="idTrPayment">
            <td><input type="checkbox" id="check-box" name="check_box[]" value="1"
                       class="display-input m-r-5"></td>
            <td><input type="text" class="display-input form-control" id="payment_period" name="payment_period"
                       required>
            </td>
            <td><input type="text" class="form-control display-input" id="ratio" name="ratio" required></td>
            <td><input type="text" class="form-control display-input" id="id_value_contract" onchange="getRatio()"
                       name="id_value_contract[]" required></td>
            <td><input type="text" class="form-control display-input" id="id_vat" onchange="getRatio()" name="id_vat" required></td>
            <td><input type="text" class="form-control display-input" id="total" name="total_value" required></td>
            <td><input type="date" class="form-control display-input" name="_pay_due" id="_pay_due" required>
            </td>
        </tr>
`
    )
})


function deleteRowPayment() {
    var arrId = [];
    var url = $('#domain').attr('href');
    var checked = $("#check-box:checked");

    $.each(checked, function (index, element) {
        var td = element.closest("td");
        var tr = td.closest("tr")

        tr.remove();
    })


}

getCustomer()

function getCustomer() {
    var url = $('#domain').attr('href');
    var data = $('#name_customer').val();
    $.ajax({
        url: url + "/api/contract/getCustomer/" + data,
        async: false,
        method: "POST",
        success: function (result) {
            var datas = "";
            datas = JSON.parse(result).customer;
            if (datas.length > 0) {
                $.each(datas, function (index, ele) {
                    $('#id_nguoncustomer').append(`<option value='${ele.id_nguon}' selected>${ele.name_nguon}</option>`);
                    $('#position_customer').append(`<option value='${ele.position_customer}' selected>${ele.name_position}</option>`);
                    $('#mst').val(ele.mst);
                    $('#adress_customer').val(ele.adress_customer);
                    $('#phone_customer').val(ele.phone_customer);
                    $('#name_contact').val(ele.phone_customer);
                    $('#contact_name').val(ele.contact_name);
                });
            } else if (datas.length == 0) {
                $('#id_nguoncustomer').val('');
                $('#adress_customer').val('');
                $('#phone_customer').val('');
                $('#mst').val('');
                $('#contact_name').val('');
                $('#position_customer').val('');
            }

        }

    });

}

$(document).ready(function () {
    toastr.options = {
        'closeButton': true,
        'debug': false,
        'newestOnTop': false,
        'progressBar': false,
        'positionClass': 'toast-top-right',
        'preventDuplicates': false,
        'showDuration': '1000',
        'hideDuration': '1000',
        'timeOut': '5000',
        'extendedTimeOut': '1000',
        'showEasing': 'swing',
        'hideEasing': 'linear',
        'showMethod': 'fadeIn',
        'hideMethod': 'fadeOut',
    }
});
getTong();
getRatio();

function getTong() {
    var gia = $('#value_contract').val();
    var thue = (($('#thue').val() * gia) / 100);
    $('#tong').val(parseInt(gia) + parseInt(thue));
}

function getRatio() {
    var gia = $('#id_value_contract').val();
    var thue = (($('#id_vat').val() * gia) / 100);
    $('#total').val(parseInt(gia) + parseInt(thue));


}

function getProduct() {
    var url = $('#domain').attr('href');
    var data = $('#id_banner').val();
    $.ajax({
        url: url + '/api/contract/getProduct/' + data,
        async: false,
        headers: {
            'Access-Control-Allow-Origin': '*',

        },
        method: 'POST',
        success: function (result) {
            var datas = JSON.parse(result).banner[0].total_id;
            if (datas > 0) {
                toastr.error('Mã Pano đã tồn tại')
            }
        }
    });
}

product()

function product() {
    var url = $('#domain').attr('href');
    var data = $('#id_banner').val();
    $('#image-input').children().remove();
    $.ajax({
        url: url + '/api/contract/product/' + data,
        async: false,
        headers: {
            'Access-Control-Allow-Origin': '*',
            'Access-Control-Allow-Headers': '*'
        },
        method: 'POST',
        success: function (result) {
            var datas = JSON.parse(result).banner;
            if (datas.length > 0) {
                $.each(datas, function (index, ele) {
                    $('#id_typebanner').append(`<option value='${ele.id_typebanner}' selected>${ele.name_type}</option>`);
                    $('#id_system').val(ele.id_system)
                    $('#location').val(ele.location);
                    $('#dien_tích').val(ele.dien_tich);
                    $('#tinh').val(ele.tinh);
                    getQuan($('#tinh'))
                    $('#quan').val(ele.quan);

                    $('#banner_adress').val(ele.banner_adress);
                    // $.ajax({
                    //     url: 'https://api.mysupership.vn/v1/partner/areas/district?province=' + $('#tinh').val(),
                    //     async: false,
                    //     success: function (result) {
                    //         var quan = result.results;
                    //         var id_quan = $('#quan').val()
                    //         $.each(quan, function (index, element) {
                    //             if (id_quan == element.code) {
                    //                 $('#quan').append(`<option value='${element.code}' selected>${element.name}</option>`);
                    //                 return false;
                    //             }
                    //         })
                    //     }
                    // })
                    $.ajax({
                        url: url + '/api/contract/photo/' + data,
                        async: false,
                        method: "POST",
                        success: function (result) {
                            var photo = JSON.parse(result).photo;
                            if (photo !== "") {
                                $.each(photo, function (index, element) {
                                    $('#image-input').append(`
                                                    <div class="polaroid">
                                                        <img src="${url}/public/storage/content/${element._name_photo}" id="img-check" alt="${element._name_photo}" style="width:100%">
                                                        <div class="container container-image-text">
                                                        <p>1-10.jpg</p></div>
                                                    </div>

                                                </div>`);

                                })
                            }

                        }
                    })
                })
            } else if (datas.length == 0) {
                $('#id_nguoncustomer').val('');
                $('#adress_customer').val('');
                $('#phone_customer').val('');
                $('#mst').val('');
                $('#contact_name').val('');
                $('#position_customer').val('');
            }


        }
    })
}


Ratio();

function Ratio() {
    var url = $('#domain').attr('href');
    var data = $('#id_contract').val();
    $.ajax({
        url: url + '/api/contract/ratio/' + data,
        async: false,
        headers: {
            'Access-Control-Allow-Origin': '*',
            'Access-Control-Allow-Headers': '*'
        },
        method: 'POST',
        success: function (result) {
            var datas = JSON.parse(result).detail
            if (datas.length > 0) {
                if (datas.length == 1) {
                    $.each(datas, function (index, ele) {
                        $('#payment_period').val(ele.payment_period)
                        $('#ratio').val(ele.ratio)
                        $('#id_value_contract').val(ele.id_value_contract)
                        $('#id_vat').val(ele.id_vat)
                        $('#total').val(ele.total_value)
                        $('#_pay_due').val(ele._pay_due)
                    })
                } else if (datas.length > 1) {
                    $('.idTrPayment').remove();
                    $.each(datas, function (index, ele) {
                        $('#idBodyPayment').append(
                            `<tr class="idTrPayment">
            <td><input type="checkbox" id="check-box" name="check_box[]" value="1"
                       class="display-input m-r-5"></td>
            <td><input type="text" class="display-input form-control" value="${ele.payment_period}" id="payment_period" name="payment_period"
                       required>
            </td>
            <td><input type="text" class="form-control display-input" value="${ele.ratio}" id="ratio" name="ratio" required></td>
            <td><input type="text" class="form-control display-input" value="${ele.id_value_contract}" onchange="getRatio()" id="id_value_contract"
                       name="id_value_contract" required></td>
            <td><input type="text" class="form-control display-input" value="${ele.id_vat}" onchange="getRatio()" id="id_vat" name="id_vat" required></td>
            <td><input type="text" class="form-control display-input" value="${ele.total_value}" id="total" name="total_value" required></td>
            <td><input type="date" class="form-control display-input" value="${ele._pay_due}" name="_pay_due" id="_pay_due" required>
            </td>
        </tr>
`
                        )
                    })
                }

            }
        }
    })
}






