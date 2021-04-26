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
$('#contented').change(function () {

    let listValidFileType = [
        'docx',
        'doc',
        'pdf'
    ];

    var i = $(this).prev('label').clone();
    var file = $('#contented')[0].files[0].name;
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
    if(document.getElementById('check-all') !== null){
        document.getElementById('check-all').onclick = function () {
            var checkboxes = document.querySelectorAll('input[type="checkbox"]');
            for (var checkbox of checkboxes) {
                checkbox.checked = this.checked;
            }
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
    var i = 0;
    var ek = $('.ratio').map((_,el) => el.value).get()
    $.each(ek ,function (index, ele) {
       i +=parseInt(ele);
    })
       if(i>=100)
       {
           alert("Tổng tỉ lệ đã đạt 100%")
           $('#addrowPayment').prop('disabled',true)
       }
       $('#idBodyPayment').append(
               `
                                <tr class="idTrPayment">
                                    <td><input type="checkbox" id="check-box" name="check_box[]" value="1"
                                               class="display-input m-r-5"></td>
                                    <td><input type="text" class="display-input form-control payment_period" data-target="{{$contract->id_contract}}" id="payment_period" name="payment_period[]"
                                               required>
                                    </td>
                                    <td><input type="text" class="form-control display-input ratio" placeholder="Tỉ Lệ(%)" id="ratio" onblur="setRatio(this)" name="ratio[]" required></td>
                                    <td><input type="text" class="form-control display-input id_value_contract"  id="id_value_contract"
                                               name="id_value_contract[]" placeholder="Số Tiền (USD)" readonly></td>
                                    <td><input type="text" class="form-control display-input id_vat" placeholder="Thuế (%)" value="10" id="id_vat" name="id_vat[]" readonly></td>
                                    <td><input type="text" class="form-control display-input total" placeholder="Tổng Tiền (USD)" id="total" name="total_value[]" readonly></td>
                                    <td><input type="date" class="form-control display-input" name="_pay_due[]" required>
                                    </td>
                                    <td><a class="dropdown-toggle form-control display-input" data-toggle="dropdown" aria-haspopup="true"
                                           aria-expanded="false" id="dropdownMenuLink"> Trạng Thái</a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item"
                                               href="{{url('/contract/setpay1/'.$contract->id_contract)}}">Đã Thanh Toán</a>
                                            <a  class="dropdown-item"
                                               href="{{url('/contract/setpay2/'.$contract->id_contract)}}">Công Nợ</a>
                                        </div>
                                    </td>
                                </tr>
           `)




})
$('#addrowPayment1').on('click', function () {
    $('#idBodyPayment').append(
        `
                                <tr class="idTrPayment">
                                    <td><input type="checkbox" id="check-box" name="check_box[]" value="1"
                                               class="display-input m-r-5"></td>
                                    <td><input type="text" class="display-input form-control payment_period" id="payment_period" name="payment_period[]"
                                               required>
                                    </td>
                                    <td><input type="text" class="form-control display-input ratio" placeholder="Tỉ Lệ(%)" id="ratio" onchange="setRatio(this)" name="ratio[]" required></td>
                                    <td><input type="text" class="form-control display-input id_value_contract"  id="id_value_contract"
                                               name="id_value_contract[]" placeholder="Số Tiền (USD)" readonly></td>
                                    <td><input type="text" class="form-control display-input id_vat" placeholder="Thuế (%)" value="10" id="id_vat" name="id_vat[]" readonly></td>
                                    <td><input type="text" class="form-control display-input total" placeholder="Tổng Tiền (USD)" id="total" name="total_value[]" readonly></td>
                                    <td><input type="date" class="form-control display-input" name="_pay_due[]" required>

                               </tr>

`
    )
})


function deleteRowPayment() {
    var arrId = [];
    var url = $('#domain').attr('href');
    var checked = $("#check-box:checked").closest('tr');
    var chill = checked.children('td').find('.payment_period');
    var data = $('#id_contract').val();
    var data1 = $(chill).val()
    if(data1 == ""){
        checked.remove();
    }else {
        $.ajax({
            url: url +'/api/contract/deletepay/'+data+'/'+data1,
            async: false,
            method: "POST",
            success: function () {
                $.each(parent, function (index, element) {
                    checked.remove();
                })
            }
        })
    }



}
function deleteRowPayment1() {
    var checked = $("#check-box:checked").closest('tr');
    checked.remove();

}

getCustomer()

function getCustomer() {
    var url = $('#domain').attr('href');
    var data = $('#id_customer').val();
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
                    $('#position_customer').append(`<option value='${ele.position_customer}' selected>${ele.position_customer}</option>`);
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
function getTong() {
    var gia = $('#value_contract').val();
    gia = gia.split('$').join("");
    gia = gia.split(',').join("");
    var thue = (($('#thue').val() * gia) / 100);
    $('#tong').val(parseInt(gia) + parseInt(thue));
}

function setRatio(elements) {
    var parent = $(elements).closest('tr');
    var gia = parent.children('td').find('.ratio');
    var value = $('#value_contract').val()
    var id_value = parent.children('td').find('.id_value_contract');
        value = value.split('$').join("");
        value = value.split(',').join("");
     $(id_value).val((value * $(gia).val())/100)
    var thue = parent.children('td').find('.id_vat');
    var total = parent.children('td').find('.total');
    var vat = ($(thue).val() * $(id_value).val())/ 100
    $(total).val(parseInt($(id_value).val()) + parseInt(vat));

}
// function getRatio(element) {
//     var parent = $(element).closest('tr');
//     var gia = parent.children('td').find('.id_value_contract');
//
//     // var gia = $('#id_value_contract').val();
//     // var thue = (($('#id_vat').val() * gia) / 100);
//     // $('[id^="total"]').val(parseInt(gia) + parseInt(thue));
// }



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
// var baloon = 1;
// product()
//
// function product(element) {
//     $('#more_product').on('click',function () {
//         baloon++;
//     })
//
//     var data =    $(element).find(':selected').val();
//     var url = $('#domain').attr('href');
//         $.ajax({
//             url: url + '/api/contract/product/' + data,
//             async: false,
//             headers: {
//                 'Access-Control-Allow-Origin': '*',
//                 'Access-Control-Allow-Headers': '*'
//             },
//             method: 'POST',
//             success: function (result) {
//                 var datas = JSON.parse(result).banner;
//                 if (datas.length > 0) {
//                     $.each(datas, function (index, ele) {
//                         $('#id_typebanner_'+baloon+'').append(`<option value='${ele.id_typebanner}' selected>${ele.name_type}</option>`);
//                         $('#id_system_'+baloon+'').val(ele.id_system)
//                         $('#id_banner_'+baloon+'').append(`<option value='${ele.id_banner}' selected>${ele.id_banner}</option>`)
//                         $('#dien_tich_'+baloon+'').val(ele.dien_tich);
//                         $('#tinh_'+baloon+'').val(ele.tinh);
//                         getQuan($('#tinh_'+baloon+''))
//                         $('#quan_'+baloon+'').val(ele.quan);
//                         $('#banner_adress_'+baloon+'').val(ele.banner_adress);
//                         $('#size_banner_'+baloon+'').val(ele.size_banner);
//                         $('#gianam_'+baloon+'').val(ele.gianam);
//                     })
//                 } else if (datas.length == 0) {
//                     $('#id_nguoncustomer'+baloon+'').val('');
//                     $('#adress_customer'+baloon+'').val('');
//                     $('#phone_customer'+baloon+'').val('');
//                     $('#mst'+baloon+'').val('');
//                     $('#contact_name'+baloon+'').val('');
//                     $('#position_customer'+baloon+'').val('');
//                     $('#size_banner_'+baloon+'').val('');
//                     $('#gianam_'+baloon+'').val('');
//                 }
//
//
//             }
//         })
//     }



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
                            ` <tr class="idTrPayment">
                                    <td><input type="checkbox" id="check-box" name="check_box[]" value="1"
                                               class="display-input m-r-5"></td>
                                    <td><input type="text" class="display-input form-control payment_period" id="payment_period" value="${ele.payment_period}" name="payment_period[]"
                                               required>
                                    </td>
                                    <td><input type="text" class="form-control display-input ratio" placeholder="Tỉ Lệ(%)" value="${ele.ratio}" id="ratio" onblur="setRatio(this)" name="ratio[]" required></td>
                                    <td><input type="text" class="form-control display-input id_value_contract" value="${ele.id_value_contract}" id="id_value_contract"
                                               name="id_value_contract[]" readonly></td>
                                    <td><input type="text" class="form-control display-input id_vat" placeholder="Thuế (%)" id="id_vat" value="${ele.id_vat}" name="id_vat[]" readonly></td>
                                    <td><input type="text" class="form-control display-input total" value="${ele.total_value}" id="total" name="total_value[]" readonly></td>
                                    <td><input type="date" class="form-control display-input" value="${ele._pay_due}" name="_pay_due[]" required>
                                    </td>
                                    <td><a class="dropdown-toggle form-control display-input" data-toggle="dropdown" aria-haspopup="true"
                                           aria-expanded="false" id="dropdownMenuLink"> Trạng Thái</a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item"
                                               href="${url+'/contract/setpay1/'+$('#id_contract').val()}">Đã Thanh Toán</a>
                                            <a  class="dropdown-item"
                                               href="${url+'/contract/setpay2/'+$('#id_contract').val()}">Công Nợ</a>
                                        </div>
                                    </td>
                                </tr>` )
                    })
                }

            }
        }
    })
}
countSearch()
function countSearch() {
    $('#count').append(`<label> Tìm Thấy Được ${$('.id_banner').length} Sản Phẩm</label>`)
}
countSearchCustomer()
function countSearchCustomer() {
    $('#count_customer').append(`<label> Tìm Thấy Được ${$('.id_customer').length} Kết Quả</label>`)
}


function fomatBank(elements) {
    var num = $(elements).val();
    var number = num.replace(/\s/g, '');
    var result = "";
    var gap_size = 4; //Desired distance between spaces

    while ((number.length%4) == 0) // Loop through string
    {
        result = result  + number.substring(0,number.length % gap_size)+" "; // Insert space character
        number = number.substring(gap_size);
        return $(elements).val(number+result);

    }


}
// $('#_bank').change(function () {
//     var num =$('#_bank').val();
//     var result = "";
//     var gap_size = 4; //Desired distance between spaces
//
//     while (num.length > 0) // Loop through string
//     {
//         result = result + " " + num.substring(0,gap_size); // Insert space character
//         num = num.substring(gap_size);  // Trim String
//         $('#_bank').val(result)
//     }
//
// })

function addCommas(elements) {
    var nStr = $(elements).val().toString().replace(/\s/g, '');
    var x = nStr.split('.');
    var x1 = x[0];
    var x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{4})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ' ' + '$2');
    } nStr = x1 + x2
    $(elements).val(nStr);
}

$('[id^="redirect"]').dblclick(function () {
    var url = $('#domain').attr('href');
    var data = $(this).find('td:first').find('input').attr('data-target');
    location.assign(url+"/customer/update/"+data)
})
$('[id^="row_product"]').dblclick(function () {
    var url = $('#domain').attr('href');
    var data = $(this).find('td:first').find('input').attr('data-target')
    location.assign(url+"/product/update/"+data)
})
$('[id^="row_contract"]').dblclick(function () {
    var url = $('#domain').attr('href');
    var data = $(this).find('td:first').find('input').attr('data-target')
    location.assign(url+"/contract/update/"+data)
})
getPhoto()
function getPhoto() {
    var url = $('#domain').attr('href');
    var data = $('#id_banner').val();
    var i = 1
    $.ajax({
        url: url + '/api/product/photo/'+ data,
        async: false,
        method: 'POST',
        success: function (result) {
            var datas = JSON.parse(result).photo
            let preloaded1 = [];
            let preloaded2 =[];
            if(datas != ""){
                $.each(datas,function (index,elements) {
                    preloaded1.push(
                        {id: elements._name_photo , src: url+'/public/storage/content/'+elements._name_photo}
                    );
                    if(typeof elements._name_map !== 'undefined'){
                        preloaded2.push(
                            {id: elements._name_map , src: url+'/public/storage/content/'+elements._name_map}
                        );
                    }
                    $('#views-photo').append(`
                    <div class="col-md-3 col-sm-12">
                                        <input type="hidden" value="${elements.id_photo}" name="id_photo[]"
                                           >
                                    <input class="form-customer-input" type="text" value="${elements.views}" name="views[]"
                                           placeholder="Hướng Nhìn ${i++}">
                                </div>
                `)
                })
            }else {
                for(var j = 1;j<5;j++){
                    $('#views-photo').append(`
                    <div class="col-md-3 col-sm-12">
                                        <input type="hidden" value="" name="id_photo[]"
                                           >
                                    <input class="form-customer-input" type="text" value="" name="views[]"
                                           placeholder="Hướng Nhìn ${j}">
                                </div>
                `)
                }

            }

            $('.input-images-2').imageUploader({
                preloaded: preloaded1,
                imagesInputName: 'files',
                preloadedInputName: 'files',
                maxSize: 2 * 1024 * 1024,
                maxFiles: 4
            });
            var preloaded = preloaded2.splice(0,3);
            $('.input-images-map-2').imageUploader({
                preloaded: preloaded2,
                imagesInputName: 'maps',
                preloadedInputName: 'maps',
                maxSize: 2 * 1024 * 1024,
                maxFiles: 1
            });
        }
    });
}
$(document).ready(function(){
    $(".chosen-select").chosen({no_results_text: "Không có kết quả nào!"+" "})
});
$('.input-images-map').imageUploader({
    imagesInputName: 'maps',
    maxFiles: 1
})
function getCheckedBox() {
    var checkbox = $("input[name='check_box[]']:checked");
    var name = []
    $.each(checkbox,function (index,ele) {
        name.push(ele.value)
    })
    $('#checkbox_hidden').val(name);
    $('#export_product').val(name);
}
// function disableButton() {
//
//     if ($('#checkbox_hidden').val() == ""){
//            alert("Vui lòng chọn sản phẩm xuất để file");
//     }else {
//         document.getElementById('export_ppt_form').submit();
//     }
//
// }
function disableButton(elements) {
    var div  = elements.closest('div');
    var input = div.children[0];
    var button = div.children[1];
    var form = div.closest('form')
    if (document.getElementById(''+input.id+'').value == ""){
        alert("Vui lòng chọn sản phẩm xuất để file");
    }else {
        document.getElementById(''+form.id+'').submit();
    }
}
$('#export_ppt_form').submit(function(e){
    e.preventDefault();
});
// $('#export_excel_form').submit(function(e){
//     e.preventDefault();
// });

// Jquery Dependency

$("input[data-type='currency']").on({
    keyup: function() {
        formatCurrency($(this));
    },
    blur: function() {
        formatCurrency($(this), "blur");
    }
});
function formatNumber(n) {
    // format number 1000000 to 1,234,567
    return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
}
function formatCurrency(input, blur) {
    // appends $ to value, validates decimal side
    // and puts cursor back in right position.

    // get input value
    var input_val = input.val();

    // don't validate empty input
    if (input_val === "") { return; }

    // original length
    var original_len = input_val.length;

    // initial caret position
    var caret_pos = input.prop("selectionStart");

    // check for decimal
    if (input_val.indexOf(".") >= 0) {

        // get position of first decimal
        // this prevents multiple decimals from
        // being entered
        var decimal_pos = input_val.indexOf(".");

        // split number by decimal point
        var left_side = input_val.substring(0, decimal_pos);
        var right_side = input_val.substring(decimal_pos);

        // add commas to left side of number
        left_side = formatNumber(left_side);

        // validate right side
        right_side = formatNumber(right_side);

        // On blur make sure 2 numbers after decimal
        if (blur === "blur") {
            right_side += "00";
        }

        // Limit decimal to only 2 digits
        right_side = right_side.substring(0, 2);

        // join number by .
        input_val = "$" + left_side + "." + right_side;

    } else {
        // no decimal entered
        // add commas to number
        // remove all non-digits
        input_val = formatNumber(input_val);
        input_val = "$" + input_val;

        // final formatting
        if (blur === "blur") {
            input_val += ".00";
        }
    }

    // send updated string to input
    input.val(input_val);

    // put caret back in the right position
    var updated_len = input_val.length;
    caret_pos = updated_len - original_len + caret_pos;
    input[0].setSelectionRange(caret_pos, caret_pos);
}
$('#submit_kind').on('click',function () {
    var id = $('#id_kind').val();
    var name = $('#kind_name').val()
    var data = {id: id,name: name};
    var url = $('#domain').attr('href');
    if(name ==""){
        $.ajax({
            method: 'POST',
            url: url + '/api/user/update-kind',
            data: data,
            async: false,
            success: function(result) {
                if(result.success){
                    alert(result.message)
                    $('#id_kind').val("")
                    $('#kind_name').val("")
                    $('#kind_contract').modal('hide')
                    location.reload();
                }else {
                    alert(result.message)
                }

            },
            error: function () {
                alert('Đã xãy ra lỗi');

            }

        })
    }
})
$('#kind_contract').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id_contarct = button.data('id_contract') // Extract info from data-* attributes
    var name_kind = button.data('name_kind')
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-body #id_kind').val(id_contarct)
    modal.find('.modal-body #kind_name').val(name_kind)
})
$('#status_contract').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id_contarct = button.data('id_contract') // Extract info from data-* attributes
    var name = button.data('name')
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-body #id_status_contract').val(id_contarct)
    modal.find('.modal-body #name_status_contract').val(name)
})
$('#branch').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id') // Extract info from data-* attributes
    var name = button.data('name')
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-body #modal_id_branch').val(id)
    modal.find('.modal-body #modal_name_branch').val(name)
})
$('#type_banner').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id') // Extract info from data-* attributes
    var name = button.data('name')
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-body #modal_id_typebanner').val(id)
    modal.find('.modal-body #modal_name_type').val(name)
})
$('#status_banner').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id') // Extract info from data-* attributes
    var name = button.data('name')
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-body #modal_id_status').val(id)
    modal.find('.modal-body #modal_name_status').val(name)
})
$('#nguon').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id') // Extract info from data-* attributes
    var name = button.data('name')
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-body #modal_id_nguon').val(id)
    modal.find('.modal-body #modal_name_nguon').val(name)
})
$('#type_customer').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id') // Extract info from data-* attributes
    var name = button.data('name')
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-body #modal_id_type_customer').val(id)
    modal.find('.modal-body #modal_name_type_customer').val(name)
})
$(document).on("click", ".delete_kind", function(){
    var id_kind = $(this).parents("tr");
    var id = id_kind[0].id
    var url = $('#domain').attr('href');
    $(this).parents("tr").remove();
    $.ajax({
        method: 'POST',
        url: url + '/api/user/delete-kind',
        data: {id: id},
        async: false,
        success: function (result) {
            if(result.success){

                alert(result.message)
            }
        },
        error: function () {
            alert('Đã xãy ra lỗi');
        }
    })
});
$('#add_kind').on('click',function () {
    var id = $('#id_contract').val();
    var name = $('#name_kind').val();
    var url = $('#domain').attr('href');
    $.ajax({
        method: 'POST',
        url: url + '/api/user/add-kind',
        data: {id: id, name: name},
        async: false,
        success: function (result) {
            if(id != "" && name != ""){
                if(result.success){
                    alert(result.message)
                    location.reload();
                }else{
                    alert(result.message)
                }
            }else {
                alert('Vui lòng nhập đầy đủ thông tin')
            }

        }
    })

})
$('#add_status_contract').on('click',function () {
    var id = $('#id_status_contract').val();
    var name = $('#name_status_contract').val();
    var url = $('#domain').attr('href');
    if(name ==""){
        $.ajax({
            method: 'POST',
            url: url + '/api/user/add-stt-contract',
            data: {id: id, name: name},
            async: false,
            success: function (result) {
                if(id != "" && name != ""){
                    if(result.success){
                        alert(result.message)
                        location.reload();
                    }else{
                        alert(result.message)
                    }
                }else {
                    alert('Vui lòng nhập đầy đủ thông tin')
                }

            },
            error: function () {
                alert('Đã xãy ra lỗi')
            }
        })
    }
})
$(document).on("click", ".delete_status_contract", function(){
    var id_status_contract = $(this).parents("tr");
    var id = id_status_contract[0].id
    var url = $('#domain').attr('href');

    $.ajax({
        method: 'POST',
        url: url + '/api/user/delete-stt-contract',
        data: {id: id},
        async: false,
        success: function (result) {
            if(result.success){
                id_status_contract.remove();
                alert(result.message)
            }else {
                alert(result.message)
            }
        },
        error: function () {
            alert('Đã xãy ra lỗi');
        }
    })
});
$('#submit_status_contract').on('click',function () {
    var id = $('#id_status_contract').val();
    var name = $('#name_status_contract').val()
    var data = {id: id,name: name};
    var url = $('#domain').attr('href');
    $.ajax({
        method: 'POST',
        url: url + '/api/user/update-stt-contract',
        data: data,
        async: false,
        success: function(result) {
            if(result.success){
                alert(result.message)
                $('#id_status_contract').val("")
                $('#kind_name').val("")
                $('#name_status_contract').modal('hide')
                location.reload();
            }else {
                alert(result.message)
            }

        },
        error: function () {
            alert('Đã xãy ra lỗi');

        }

    })
})
// Action branch
$('#add_branch').on('click',function () {
    var id = $('#id_branch').val();
    var name = $('#name_branch').val();
    var url = $('#domain').attr('href');
    $.ajax({
        method: 'POST',
        url: url + '/api/user/add-branch',
        data: {id: id, name: name},
        async: false,
        success: function (result) {
            if(id != "" && name != ""){
                if(result.success){
                    alert(result.message)
                    location.reload();
                }else{
                    alert(result.message)
                }
            }else {
                alert('Vui lòng nhập đầy đủ thông tin')
            }

        },
        error: function () {
            alert('Đã xãy ra lỗi')
        }
    })

})
$('#submit_branch').on('click',function () {
    var id = $('#modal_id_branch').val();
    var name = $('#modal_name_branch').val()
    var data = {id: id,name: name};
    var url = $('#domain').attr('href');
    if (name == ""){
        alert('Vui lòng nhập đày đủ thông tin')
    }else {
        $.ajax({
            method: 'POST',
            url: url + '/api/user/update-branch',
            data: data,
            async: false,
            success: function(result) {
                if(result.success){
                    alert(result.message)
                    $('#modal_id_branch').val("")
                    $('#modal_name_branch').val("")
                    $('#modal_name_branch').modal('hide')
                    location.reload();
                }else {
                    alert(result.message)
                }
            },
            error: function () {
                alert('Đã xãy ra lỗi');
            }

        })
    }

})
$(document).on("click", ".delete_branch", function(){
    var id_status_contract = $(this).parents("tr");
    var id = id_status_contract[0].id
    var url = $('#domain').attr('href');

    $.ajax({
        method: 'POST',
        url: url + '/api/user/delete-branch',
        data: {id: id},
        async: false,
        success: function (result) {
            if(result.success){
                id_status_contract.remove();
                alert(result.message)
            }else {
                alert(result.message)
            }
        },
        error: function () {
            alert('Đã xãy ra lỗi');
        }
    })
});
// Action type product
$('#submit_type_product').on('click',function () {
    var id = $('#id_typebanner').val();
    var name = $('#name_type').val()
    var data = {id: id,name: name};
    var url = $('#domain').attr('href');
    $.ajax({
        method: 'POST',
        url: url + '/api/user/add-type',
        data: data,
        async: false,
        success: function(result) {
            if(result.success){
                alert(result.message)
                location.reload();
            }else {
                alert(result.message)
            }

        },
        error: function () {
            alert('Đã xãy ra lỗi');

        }

    })
})
$('#submit_type').on('click',function () {
    var id = $('#modal_id_typebanner').val();
    var name = $('#modal_name_type').val()
    var data = {id: id,name: name};
    var url = $('#domain').attr('href');
    if (name == ""){
        alert('Vui lòng nhập đày đủ thông tin')
    }else {
        $.ajax({
            method: 'POST',
            url: url + '/api/user/update-type',
            data: data,
            async: false,
            success: function(result) {
                if(result.success){
                    alert(result.message)
                    $('#modal_id_typebanner').val("")
                    $('#modal_name_type').val("")
                    $('#modal_name_type').modal('hide')
                    location.reload();
                }else {
                    alert(result.message)
                }
            },
            error: function () {
                alert('Đã xãy ra lỗi');
            }

        })
    }

})
$(document).on("click", ".delete_type_banner", function(){
    var id_type = $(this).parents("tr");
    var id = id_type[0].id
    var url = $('#domain').attr('href');

    $.ajax({
        method: 'POST',
        url: url + '/api/user/delete-type',
        data: {id: id},
        async: false,
        success: function (result) {
            if(result.success){
                id_type.remove();
                alert(result.message)
            }else {
                alert(result.message)
            }
        },
        error: function () {
            alert('Đã xãy ra lỗi');
        }
    })
});
// Action status banner
$('#submit_product').on('click',function () {
    var id = $('#id_status').val();
    var name = $('#name_status').val()
    var data = {id: id,name: name};
    var url = $('#domain').attr('href');
    $.ajax({
        method: 'POST',
        url: url + '/api/user/add-status',
        data: data,
        async: false,
        success: function(result) {
            if(result.success){
                alert(result.message)
                $('#id_status').val("")
                $('#name_status').val("")
                $('#status_banner').modal('hide')
                location.reload()

            }else
                alert(result.message)

        },
        error: function () {
            alert('Đã xãy ra lỗi');

        }

    })
})
$('#submit_status_banner').on('click',function () {
    var id = $('#modal_id_status').val();
    var name = $('#modal_name_status').val()
    var data = {id: id,name: name};
    var url = $('#domain').attr('href');
    if (name == ""){
        alert('Vui lòng nhập đày đủ thông tin')
    }else {
        $.ajax({
            method: 'POST',
            url: url + '/api/user/update-status',
            data: data,
            async: false,
            success: function(result) {
                if(result.success){
                    alert(result.message)
                    $('#modal_id_status').val("")
                    $('#modal_name_status').val("")
                    location.reload();
                }else {
                    alert(result.message)
                }
            },
            error: function () {
                alert('Đã xãy ra lỗi');
            }

        })
    }

})
$(document).on("click", ".delete_status_banner", function(){
    var id_status = $(this).parents("tr");
    var id = id_status[0].id
    var url = $('#domain').attr('href');

    $.ajax({
        method: 'POST',
        url: url + '/api/user/delete-status',
        data: {id: id},
        async: false,
        success: function (result) {
            if(result.success){
                id_status.remove();
                alert(result.message)
            }else {
                alert(result.message)
            }
        },
        error: function () {
            alert('Đã xãy ra lỗi');
        }
    })
});
// Action nguồn khác hàng
$('#submit_nguon').on('click',function () {
    var id = $('#id_nguon').val();
    var name = $('#name_nguon').val()
    var data = {id: id,name: name};
    var url = $('#domain').attr('href');
    if(id == "" || name ==""){
        alert('Vui lòng nhập đầy đủ thông tin')
    }else {
        $.ajax({
            method: 'POST',
            url: url + '/api/user/add-nguon',
            data: data,
            async: false,
            success: function(result) {
                if(result.success){
                    alert(result.message)
                    $('#id_nguon').val("")
                    $('#name_nguon').val("")
                    location.reload()

                }else
                    alert(result.message)

            },
            error: function () {
                alert('Đã xãy ra lỗi');

            }

        })
    }

})
$('#submit_nguon_customer').on('click',function () {
    var id = $('#modal_id_nguon').val();
    var name = $('#modal_name_nguon').val()
    var data = {id: id,name: name};
    var url = $('#domain').attr('href');
    if (name == ""){
        alert('Vui lòng nhập đày đủ thông tin')
    }else {
        $.ajax({
            method: 'POST',
            url: url + '/api/user/update-nguon',
            data: data,
            async: false,
            success: function(result) {
                if(result.success){
                    alert(result.message)
                    $('#modal_id_nguon').val("")
                    $('#modal_name_nguon').val("")
                    location.reload();
                }else {
                    alert(result.message)
                }
            },
            error: function () {
                alert('Đã xãy ra lỗi');
            }
        })
    }
})
$(document).on("click", ".delete_nguon", function(){
    var id_status = $(this).parents("tr");
    var id = id_status[0].id
    var url = $('#domain').attr('href');
    $.ajax({
        method: 'POST',
        url: url + '/api/user/delete-nguon',
        data: {id: id},
        async: false,
        success: function (result) {
            if(result.success){
                id_status.remove();
                alert(result.message)
            }else {
                alert(result.message)
            }
        },
        error: function () {
            alert('Đã xãy ra lỗi');
        }
    })
});
// Action Loại khách hàng
$('#submit_type_customer').on('click',function () {
    var id = $('#id_type_customer').val();
    var name = $('#name_type_customer').val()
    var data = {id: id,name: name};
    var url = $('#domain').attr('href');
    if(id == "" || name ==""){
        alert('Vui lòng nhập đầy đủ thông tin')
    }else {
        $.ajax({
            method: 'POST',
            url: url + '/api/user/add-type-customer',
            data: data,
            async: false,
            success: function(result) {
                if(result.success){
                    alert(result.message)
                    $('#id_type_customer').val("")
                    $('#name_type_customer').val("")
                    location.reload()

                }else
                    alert(result.message)

            },
            error: function () {
                alert('Đã xãy ra lỗi');
            }
        })
    }
})
$('#modal_submit_type_customer').on('click',function () {
    var id = $('#modal_id_type_customer').val();
    var name = $('#modal_name_type_customer').val()
    var data = {id: id,name: name};
    var url = $('#domain').attr('href');
    if (name == ""){
        alert('Vui lòng nhập đày đủ thông tin')
    }else {
        $.ajax({
            method: 'POST',
            url: url + '/api/user/update-type-customer',
            data: data,
            async: false,
            success: function(result) {
                if(result.success){
                    alert(result.message)
                    $('#modal_id_type_customer').val("")
                    $('#modal_name_type_customer').val("")
                    location.reload();
                }else {
                    alert(result.message)
                }
            },
            error: function () {
                alert('Đã xãy ra lỗi');
            }

        })
    }

})
$(document).on("click", ".delete_type_customer", function(){
    var id_status = $(this).parents("tr");
    var id = id_status[0].id
    var url = $('#domain').attr('href');
    $.ajax({
        method: 'POST',
        url: url + '/api/user/delete-type-customer',
        data: {id: id},
        async: false,
        success: function (result) {
            if(result.success){
                id_status.remove();
                alert(result.message)
            }else {
                alert(result.message)
            }
        },
        error: function () {
            alert('Đã xãy ra lỗi');
        }
    })
});
function setDue() {
    var id = $('#id_contract').val();
    var url = $('#domain').attr('href');
    $.ajax({
        url: url+'/api/contract/set-due',
        method: 'POST',
        data: {id: id},
        async: false,
        success: function (result) {
            var datas = JSON.parse(result).due
            $.each(datas, function (index,ele) {
                $('#modal_date_start').val(ele.date_start)
                $('#modal_date_end').val(ele.date_end)
                $('#modal_status_contract').val(ele.status_contract)
                $('#modal_value_contract').val(ele.value_contract)
            })
        }
    })

}
function getNumber(element) {
    var input =$(element).val();
    number = new Intl.NumberFormat().format(input)
    number = number.toString();
    console.log(number)
    $(element).val(number);
}
$(".hover").mouseleave(
    function() {
        $(this).removeClass("hover");
    }
);
getTong()
$('#close-deleteContract').on('click',function () {
    var url = $('#domain').attr('href');
    var id =  $('#id_contract').val();
    $.ajax({
        method: 'POST',
        url: url + '/api/contract/close',
        data: {id: id},
        async: false,
        headers: {
            'Access-Control-Allow-Origin': '*',
            'Access-Control-Allow-Headers': '*'
        },
        success: function (result) {
                location.reload()
        }
    })
})
$('#openmode-deleteContract').on('click',function () {
    var url = $('#domain').attr('href');
    var id =  $('#id_contract').val();
    $.ajax({
        method: 'POST',
        url: url + '/api/contract/open',
        data: {id: id},
        async: false,
        headers: {
            'Access-Control-Allow-Origin': '*',
            'Access-Control-Allow-Headers': '*'
        },
        success: function (result) {
            location.reload()
        }
    })
})
function delete_setfeild(element) {
    var fielset = element.closest('fieldset');
    fielset.remove();
}
function getAllproduct(element) {
    var id_banner = element;
    var url = $('#domain').attr('href');
    $.ajax({
        url: url+'/api/contract/product-all',
        async: false,
        headers: {
            'Access-Control-Allow-Origin': '*',
            'Access-Control-Allow-Headers': '*'
        },
        method: 'POST',
        success: function (result) {
            var datas = JSON.parse(result).banner;
            $.each(datas,function (index,element) {
                $(id).append(`<option value="${element.id_banner}" selected>${element._name_banner}</option>`)
            })

        }
    })
}
var baloon = 2
$('#more_product').on('click',function () {
    $('#form_product').append(`
        <fieldset class="border-text border-text-product">
                    <legend class='text-left'><div type="button" id="delete_setfeild" onclick="delete_setfeild(this)" class="snip1548"><span>Thông Tin Sản Phẩm</span></div></legend>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-3 col-sm-12">
                                <label for="exampleFormControlSelect1">Tên Sản Phẩm</label>
                            </div>
                            <div class="col-md-9 col-sm-12">
                                <select class="form-control chosen-select" id="_name_banner_${baloon}" name="_name_banner_${baloon}" onclick="getListproduct(baloon)" onchange="product(baloon)">
                                    <option value="">--Chọn Pano--</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlSelect1">Mã Sản Phẩm</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <select class="form-control" id="id_banner_${baloon}" name="id_banner[]">
                                            <option value="">--Chọn Mã Pano--</option>
                                        </select>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlSelect1">Loại Hình Sản Phẩm</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <select class="form-control" id="id_typebanner_${baloon}" name="id_typebanner[]">
                                            <option value="">--Loại Hình--</option>
                                        </select>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-sm-12">
                                <label for="exampleFormControlInput1 uname">Địa Chỉ</label>
                            </div>
                            <div class="col-md-9 col-sm-12">
                                <input type="text" class="form-control" id="banner_adress_${baloon}"
                                       name="banner_adress[]"
                                       placeholder="Địa Chỉ Pano" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlSelect1">Tỉnh/Thành Phố</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <select class="form-control" id="tinh_${baloon}" name="tinh[]">
                                            <option value="">--Tỉnh/Thành Phố--</option>
                                        </select>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlSelect1">Quận/Huyện</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <select class="form-control" id="quan_${baloon}" name="quan[]">
                                            <option value="">--Quận/Huyện--</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlSelect1">Kết Cấu</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input type="text" class="form-control" value="" id="id_system_${baloon}" name="id_system[]"
                                               placeholder="Kết Cấu" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlSelect1">Kích Thước</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input type="text" class="form-control" value="" id="size_banner_${baloon}" name="size_banner[]"
                                               placeholder="Kích Thước" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-sm-12">
                                <label for="exampleFormControlInput1 uname">Giá Năm</label>
                            </div>
                            <div class="col-md-9 col-sm-12">
                                <input type="text" class="form-control" id="gianam_${baloon}" name="gianam_${baloon}"
                                       placeholder="Giá Năm" value="" required>
                                <div class="invalid-feedback">Địa chỉ không được để trống</div>
                            </div>
                        </div>
                    </div>
                </fieldset>
    `);
    baloon++
})

function product(element) {
    var count = element;
    if(count == 1){
        count = count;
    }else if(count > 1){
        count = count - 1;
    }
    var _name_banner = $('#_name_banner_'+count);
    var id_banner = $('#id_banner_'+count);
    var id_type_banner = $('#id_typebanner_'+count);
    var banner_adress = $('#banner_adress_'+count);
    var tinh = $('#tinh_'+count);
    var quan = $('#quan_'+count);
    var id_system = $('#id_system_'+count);
    var size_banner = $('#size_banner_'+count);
    var gianam = $('#gianam_'+count);
    var url = $('#domain').attr('href');
    var data = _name_banner.val();
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
            if(datas.length>0){
                $.each(datas,function (index, elements) {
                    id_banner.append(`<option value="${elements.id_banner}" selected>${elements.id_banner}</option>`)
                    id_type_banner.append(`<option value="${elements.id_typebanner}" selected>${elements.name_type}</option>`)
                    banner_adress.val(elements.banner_adress)
                    if(count > 1){
                        tinh.append(`<option value="${elements._code}">${elements._name}</option>`)
                    }
                    tinh.val(elements.tinh)
                    quan.append(`<option value="${elements.quan}" selected>${elements._name_district}</option>`)
                    id_system.val(elements.id_system)
                    size_banner.val(elements.size_banner);
                    gianam.val(elements.gianam);
                    console.log(elements)
                })
            }
        }
    })
}
//only use in funtion Contract
function getListproduct(element) {
    var count = element - 1;
    var _name_banner = $('#_name_banner_' + count);
    var chill_name = _name_banner.children();console.log(chill_name)
    if(count > 1){
        var url = $('#domain').attr('href');
        $.ajax({
            url: url + '/api/contract/product-all',
            async: false,
            headers: {
                'Access-Control-Allow-Origin': '*',
                'Access-Control-Allow-Headers': '*'
            },
            method: 'POST',
            success: function (result) {
                var datas = JSON.parse(result).banner;
                $.each(datas, function (index, ele) {
                    _name_banner.append(`<option value="${ele.id_banner}">${ele._name_banner}</option>`)
                })

            }
        })
    }

}
//show product in contract
showProduct()
function showProduct() {
    var data = $('#id_contract').val();
    var url = $('#domain').attr('href');
    $.ajax({
        url: url + '/api/contract/show/'+ data,
        async: false,
        headers: {
            'Access-Control-Allow-Origin': '*',
            'Access-Control-Allow-Headers': '*'
        },
        method: 'POST',
        success: function (result) {
            var datas = JSON.parse(result).show;
            $.each(datas, function (index, ele) {
                $('#show_product').append(`
                    <fieldset class="border-text border-text-product">
                    <legend class='text-left'>Thông Tin Sản Phẩm</legend>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-3 col-sm-12">
                                <label for="exampleFormControlSelect1">Tên</label>
                            </div>
                            <div class="col-md-9 col-sm-12">
                                <select class="form-control chosen-select" id="_name_banner" name="_name_banner">
                                            <option value="${ele.id_banner}" selected>${ele._name_banner}</option>

                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlSelect1">Mã Sản Phẩm</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <select class="form-control" id="id_banner" name="id_banner">
                                                        <option value="${ele.id_banner}" selected>${ele.id_banner}</option>
                                        </select>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlSelect1">Loại Hình Sản Phẩm</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <select class="form-control" id="id_typebanner" name="id_typebanner">
                                            <option value="${ele.id_typebanner}">${ele.name_type}</option>
                                        </select>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-sm-12">
                                <label for="exampleFormControlInput1 uname">Địa Chỉ</label>
                            </div>
                            <div class="col-md-9 col-sm-12">
                                <input type="text" class="form-control" id="banner_adress"
                                       name="banner_adress"
                                       placeholder="Địa Chỉ Pano" value="${ele.banner_adress}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlSelect1">Tỉnh/Thành Phố</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <select class="form-control" id="tinh" name="tinh" onchange="getQuan(this)">
                                            <option value="${ele.tinh}">${ele._name_province}</option>
                                        </select>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlSelect1">Quận/Huyện</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <select class="form-control" id="quan" name="quan">
                                            <option value="${ele.quan}">${ele._name_district}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlSelect1">Kết Cấu</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input type="text" class="form-control" value="${ele.id_system}" id="id_system" name="id_system"
                                               placeholder="Kết Cấu" >
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-3 col-sm-12">
                                <label for="exampleFormControlInput1 uname">Giá Năm</label>
                            </div>
                            <div class="col-md-9 col-sm-12">
                                <input type="text" class="form-control" id="gianam" name="gianam"
                                       placeholder="Giá Năm" value="${ele.gianam}">
                            </div>
                        </div>
                    </div>

                </fieldset>
                `)
            })

        }
    })
}


function finder() {
    var data = $('#id_banner').val();
    var url = $('#domain').attr('href');

}
