@extends('admin.layouts.app')
@section('content')
<div class="w-full px-6 py-6 mx-auto">
    <div class="flex flex-wrap -mx-3">
        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row -mx-3">
                        <div class="flex-none w-2/3 max-w-full px-3">
                            <div>
                                <p class="mb-0 font-sans text-sm font-semibold leading-normal uppercase dark:text-white dark:opacity-60">Data User</p>
                                <h5 class="mb-2 font-bold dark:text-white">{{ $user }} Orang</h5>
                            </div>
                        </div>
                        <div class="px-3 text-right basis-1/3">
                            <div class="inline-block w-12 h-12 text-center mt-3">
                                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15 0C10.875 0 7.5 4.2 7.5 9.375C7.5 14.55 10.875 18.75 15 18.75C19.125 18.75 22.5 14.55 22.5 9.375C22.5 4.2 19.125 0 15 0ZM7.1625 18.75C3.1875 18.9375 0 22.2 0 26.25V30H30V26.25C30 22.2 26.85 18.9375 22.8375 18.75C20.8125 21.0375 18.0375 22.5 15 22.5C11.9625 22.5 9.1875 21.0375 7.1625 18.75Z" fill="#ECD687"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row -mx-3">
                        <div class="flex-none w-2/3 max-w-full px-3">
                            <div>
                                <p class="mb-0 font-sans text-sm font-semibold leading-normal uppercase dark:text-white dark:opacity-60">Layak Pakai</p>
                                <h5 class="mb-2 font-bold dark:text-white">{{ $pakai }} Barang</h5>
                            </div>
                        </div>
                        <div class="px-3 text-right basis-1/3">
                            <div class="inline-block w-12 h-12 text-center mt-3">
                                <svg width="30" height="25" viewBox="0 0 30 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M24.4968 0L21.8599 2.75159L11.2357 13.3758L8.14013 10.3949L5.38854 7.64331L0 13.0318L2.75159 15.7834L8.48408 21.5159L11.121 24.2675L13.8726 21.5159L27.2484 8.14013L30 5.38854L24.4968 0Z" fill="#5ECBE3"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row -mx-3">
                        <div class="flex-none w-2/3 max-w-full px-3">
                            <div>
                                <p class="mb-0 font-sans text-sm font-semibold leading-normal uppercase dark:text-white dark:opacity-60">Layak Repair</p>
                                <h5 class="mb-2 font-bold dark:text-white">{{ $repair }} Barang</h5>
                            </div>
                        </div>
                        <div class="px-3 text-right basis-1/3">
                            <div class="inline-block w-12 h-12 text-center mt-3">
                                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M20.6139 0C15.4534 0 11.2652 4.19476 11.2652 9.3633C11.2652 10.5618 11.5644 11.6854 11.9757 12.7715L1.0938 23.5581C-0.3646 25.0187 -0.3646 27.4906 1.0938 28.9513C1.8417 29.7004 2.81396 30 3.78623 30C4.75849 30 5.73076 29.6629 6.47865 28.9513L17.2484 18.0524C18.2954 18.4644 19.4173 18.764 20.6513 18.764C25.8118 18.764 30 14.5693 30 9.40075C30 8.8015 30 8.20225 29.8878 7.64045L26.2605 11.2734H18.7816V3.78277L22.4088 0.149813C21.8479 0.0374532 21.2496 0.0374532 20.6513 0.0374532L20.6139 0ZM3.78623 24.3446C4.83328 24.3446 5.65597 25.1685 5.65597 26.2172C5.65597 27.2659 4.83328 28.0899 3.78623 28.0899C2.73917 28.0899 1.91648 27.2659 1.91648 26.2172C1.91648 25.1685 2.73917 24.3446 3.78623 24.3446Z" fill="#E35E5E"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row -mx-3">
                        <div class="flex-none w-2/3 max-w-full px-3">
                            <div>
                                <p class="mb-0 font-sans text-sm font-semibold leading-normal uppercase dark:text-white dark:opacity-60">Data Keseluruhan</p>
                                <h5 class="mb-2 font-bold dark:text-white">{{ $semua }} Barang</h5>
                            </div>
                        </div>
                        <div class="px-3 text-right basis-1/3">
                            <div class="inline-block w-12 h-12 text-center mt-3">
                                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M13.125 0C9.4875 0 6.225 1.5 3.8625 3.8625L15 15V0.1125C14.4 0.0375 13.7625 0 13.125 0ZM18.75 3.975V16.7625L8.55 26.9625C10.8375 28.8375 13.6875 30 16.875 30C24.1125 30 30 24.1125 30 16.875C30 10.275 25.0875 4.9125 18.75 3.975ZM3.4125 8.8875C1.3125 10.9125 0 13.725 0 16.875C0 20.475 1.725 23.5875 4.35 25.65L12.3375 17.6625L3.4125 8.8875Z" fill="#42BE8A"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-wrap mt-6 -mx-3">
        <div class="w-full max-w-full px-3 mt-0 mb-6 lg:mb-0 lg:flex-none">
            {{-- <div class="relative flex flex-col h-full min-w-0 break-words bg-white border-0 border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl dark:bg-gray-950 border-black-125 rounded-2xl bg-clip-border" style="height: 523px;"> --}}
            <div class="w-full  p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <canvas id="myChart" height="" class="w-full h-full"></canvas>
            </div>
            {{-- </div> --}}
        </div>
    </div>
</div>
@endsection
@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.0/chart.min.js" integrity="sha512-asxKqQghC1oBShyhiBwA+YgotaSYKxGP1rcSYTDrB0U6DxwlJjU59B67U8+5/++uFjcuVM8Hh5cokLjZlhm3Vg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
        var ctx = document.getElementById('myChart').getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: [
                    @foreach ($chart as $item)
                    '{{ $item->status_return }}',
                    @endforeach
                ],
				datasets: [{
					label: 'Total Data',
					data: [ @foreach ($chart as $item)
                        {{ $item->total }},
                    @endforeach],
					backgroundColor: [
						'rgba(255, 99, 132, 0.2)',
					],
					borderColor: [
						'rgba(255, 99, 132, 1)',
					],
					borderWidth: 2
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero: true
						}
					}],
					xAxes: [{
						categoryPercentage: 0.99,
						barPercentage: 0.99,
						gridLines: {
							display: false
						}
					}]
				},
				showLines: true,
				legend: {
					labels: {
						boxWidth: 0
					}
				}
			}
		});
</script>
@endpush
