@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Dashboard
                </div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card text-white bg-primary">
                                <div class="card-body pb-0">
                                    <div class="text-value">{{ $usersCount }}</div>
                                    <div>Total de usuários</div>
                                    <br />
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card text-white bg-primary">
                                <div class="card-body pb-0">
                                    <div class="text-value">{{ $productsCount }}</div>
                                    <div>Total de produtos</div>
                                    <br />
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card text-white bg-primary">
                                <div class="card-body pb-0">
                                    <div class="text-value">{{ $ordersCount }}</div>
                                    <div>Total de pedidos</div>
                                    <br />
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="pb-5" id="ordersPerDay"></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    @parent

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <script type="text/javascript">
        let highchartsOptions = Highcharts.setOptions({
                lang: {
                    printChart: 'Imprimir',
                    viewFullscreen: 'Ver em tela inteira',
                    exitFullscreen: "Sair do modo de tela inteira",
                    viewData: "Ver como tabela",
                    hideData: "Esconder tabela",
                    viewTable: 'Ver tabela de dados',
                    loading: 'Aguarde...',
                    months: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
                    weekdays: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
                    shortMonths: ['Jan', 'Feb', 'Mar', 'Abr', 'Maio', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
                    exportButtonTitle: "Exportar",
                    printButtonTitle: "Imprimir",
                    rangeSelectorFrom: "De",
                    rangeSelectorTo: "Até",
                    rangeSelectorZoom: "Periodo",
                    downloadPNG: 'Download imagem PNG',
                    downloadJPEG: 'Download imagem JPEG',
                    downloadPDF: 'Download documento PDF',
                    downloadSVG: 'Download imagem SVG',
                    // resetZoom: "Reset",
                    // resetZoomTitle: "Reset,
                    // thousandsSep: ".",
                    // decimalPoint: ','
                }
            }
        );

        $(document).ready(function () {
            Highcharts.chart('ordersPerDay', {
                credits: false,
                chart: {
                    type: 'line'
                },
                title: {
                    text: 'Quantidade de pedidos por dia'
                },
                subtitle: {
                    text: ''
                },
                xAxis: {
                    categories: [{!! $ordersPerDay->map(fn($item) => '"'.$item->formattedDate.'"')->implode(',') !!}],
                },
                yAxis: {
                    title: {
                        text: 'Pedidos'
                    }
                },
                plotOptions: {
                    line: {
                        dataLabels: {
                            enabled: true
                        },
                        enableMouseTracking: true
                    }
                },
                series: [
                    {
                        "name":"Quantidade de pedidos por dia",
                        "data": [{{ $ordersPerDay->implode("quantity", ",") }}]
                    }
                ]
            });
        });
    </script>
@endsection
