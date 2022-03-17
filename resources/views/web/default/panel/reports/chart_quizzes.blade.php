@extends(getTemplate() .'.panel.layouts.panel_layout')

@push('styles_top')
    <link rel="stylesheet" href="/assets/default/vendors/daterangepicker/daterangepicker.min.css">
    <link rel="stylesheet" href="/assets/default/vendors/select2/select2.min.css">
@endpush

@section('content')

    <section>
        <h2 class="section-title">{{ trans('panel.chart_quizzes') }} {{date('Y')}}</h2>      
    </section>

    <div id="chart" style="margin-top:30px"></div>

    </section>

@endsection

@push('scripts_bottom')
    <script src="{{asset('apexcharts-bundle/dist/apexcharts.min.js')}}"></script>
    <script>
        var options = {
          series: [{
            name: "{{ trans('panel.percent') }}",
            data: [{{implode(',',$data)}}]
        }],
          chart: {
          height: 350,
          type: 'line',
          zoom: {
            enabled: false
          }
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          curve: 'straight'
        },
        title: {
          text: '{{ trans('panel.chart_quizzes') }} {{date('Y')}}',
          align: 'left'
        },
        grid: {
          row: {
            colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
            opacity: 0.5
          },
        },
        xaxis: {
          categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    </script>
@endpush
