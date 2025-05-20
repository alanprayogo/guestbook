@extends('layouts.app')

@section('page-title', 'Dashboard')

@section('content')
    <!-- Grid -->
    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6 lg:grid-cols-4">
        {{-- stat-card --}}
        <x-stat-card title="Tamu VIP" value="{{ $vip }}" href="#" />
        <x-stat-card title="Tamu Check-In" value="{{ $tamuCheckin }}" href="#" />
        <x-stat-card title="Tamu di Venue" value="{{ $tamuVenue }}" href="#" />
        <x-stat-card title="Jumlah Souvenir" value="{{ $totalSouvenir }}" href="#" />
        {{-- <x-stat-card title="Tamu Hadir" value="{{ $tamuHadir}}" href="#" /> --}}
        {{-- <x-stat-card title="Tamu Belum Hadir" value="{{ $tamuTidakHadir }}" href="#" /> --}}
        {{-- <x-stat-card title="Checked-In" value="75,422" href="#" /> --}}
        {{-- <x-stat-card title="Absent / No Show" value="11,613" href="#" /> --}}
        {{-- stat-card --}}

    </div>

    <div class="grid grid-cols-2 gap-4 sm:grid-cols-1 sm:gap-6 lg:grid-cols-2">

        <x-card-container>
            <div class="p-4">
                <div class="h-75 flex flex-col items-center justify-center">
                    <div id="hs-pie-chart"></div>

                    <!-- Legend Indicator -->
                    <div class="mt-3 flex items-center justify-center gap-x-4 sm:mt-6 sm:justify-end">
                        <div class="inline-flex items-center">
                            <span class="me-2 inline-block size-2.5 rounded-sm bg-blue-600"></span>
                            <span class="text-[13px] text-gray-600 dark:text-neutral-400">
                                Checked-In
                            </span>
                        </div>
                        <div class="inline-flex items-center">
                            <span class="me-2 inline-block size-2.5 rounded-sm bg-cyan-500"></span>
                            <span class="text-[13px] text-gray-600 dark:text-neutral-400">
                                Absent / No Show
                            </span>
                        </div>
                    </div>
                    <!-- End Legend Indicator -->
                </div>
            </div>
        </x-card-container>
        <x-card-container>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/CGoxTMkNbmQ?si=LBK9asz4AQ0vbXr2"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </x-card-container>
    </div>

    <script src="https://preline.co/assets/js/hs-apexcharts-helpers.js"></script>

    <script>
        const tamuHadir = {{ $tamuCheckin }};
        const tamuTidakHadir = {{ $tamuTidakHadir }};
        window.addEventListener('load', () => {
            // Apex Pie Chart
            (function() {
                buildChart('#hs-pie-chart', () => ({
                    chart: {
                        height: '100%',
                        type: 'pie',
                        zoom: {
                            enabled: false
                        }
                    },
                    series: [tamuHadir, tamuTidakHadir],
                    labels: ['Checked-In', 'Absent / No Show'],
                    title: {
                        show: false
                    },
                    dataLabels: {
                        style: {
                            fontSize: '20px',
                            fontFamily: 'Inter, ui-sans-serif',
                            fontWeight: '400',
                            colors: ['#fff', '#fff']
                        },
                        dropShadow: {
                            enabled: false
                        },
                        formatter: (value) => `${value.toFixed(1)} %`
                    },
                    plotOptions: {
                        pie: {
                            dataLabels: {
                                offset: -15
                            }
                        }
                    },
                    legend: {
                        show: false
                    },
                    stroke: {
                        width: 4
                    },
                    grid: {
                        padding: {
                            top: -10,
                            bottom: -14,
                            left: -9,
                            right: -9
                        }
                    },
                    tooltip: {
                        enabled: false
                    },
                    states: {
                        hover: {
                            filter: {
                                type: 'none'
                            }
                        }
                    }
                }), {
                    colors: ['#3b82f6', '#22d3ee', '#e5e7eb'],
                    stroke: {
                        colors: ['rgb(255, 255, 255)']
                    }
                }, {
                    colors: ['#3b82f6', '#22d3ee', '#404040'],
                    stroke: {
                        colors: ['rgb(38, 38, 38)']
                    }
                });
            })();
        });
    </script>
    <!-- End Grid -->
@endsection
