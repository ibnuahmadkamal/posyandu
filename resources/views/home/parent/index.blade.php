@extends('master-admin')

@section('content')

	<!-- Section: boxes -->

	@if(!empty($data_balita) && !empty($data_pencarian))

    <section id="boxes" class="home-section paddingtop-80">
	
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-6">
					<div class="wow fadeInUp" data-wow-delay="0.2s">
						<div class="box">

							<a href="{{ route('get_pdf_pencarian', $data_balita->id) }}" class="btn btn-danger" style="color:white">
								Download PDF
							</a>

							<a href="{{ route('tampilkan_semua_riwayat', $data_balita->id) }}" class="btn btn-success" style="color:white">Tampilkan semua riwayat</a>
							
							<i class="fa fa-check fa-3x circled bg-skin"></i>
							<h4 class="h-bold">Data Balita</h4>
							
							<div class="well well-trans">
							    <div class="wow fadeInRight" data-wow-delay="0.1s">
								    <ul class="lead-list">
								        <li>
								        	<span class="fa fa-lock fa-2x icon-success"></span> 
								        	<span class="list">
								        		<strong>ID / No. Registrasi Balita</strong><br /> {{ $data_balita->no_reg }}
								        	</span>
								        </li>

								        <li>
								        	<span class="fa fa-user fa-2x icon-success"></span>
								        	<span class="list"><strong>Nama Balita</strong><br />
								        		{{ $data_balita->nama_balita }}
								        	</span>
								        </li>

								        <li>
								        	<span class="fa fa-calendar fa-2x icon-success"></span>
								        	<span class="list"><strong>Tanggal Lahir</strong><br />
								        		{{ $data_balita->tgl_lahir }}
								        	</span>
								        </li>

								        <li>
								        	<span class="fa fa-child fa-2x icon-success"></span>
								        	<span class="list"><strong>Jenis Kelamin</strong><br />
								        		
								        		@if($data_balita->jenis_kelamin == 'P')

								        			{{ "PEREMPUAN" }}

								        		@else

								        			{{ "LAKI-LAKI" }}

								        		@endif

								        	</span>
								        </li>

								        <li>
								        	<span class="fa fa-wheelchair fa-2x icon-success"></span>
								        	<span class="list"><strong>Nama Ayah</strong><br />
								        		{{ $data_balita->nama_ayah }}
								        	</span>
								        </li>

								        <li>
								        	<span class="fa fa-wheelchair fa-2x icon-success"></span>
								        	<span class="list"><strong>Nama Ibu</strong><br />
								        		{{ $data_balita->nama_ibu }}
								        	</span>
								        </li>								        
								    </ul>

							    </div>
							</div> 
						</div>
					</div>
				</div>

				<div class="col-sm-6 col-md-6">
					<div class="wow fadeInUp" data-wow-delay="0.2s">
						<div class="box">
							
							<i class="fa fa-check fa-3x circled bg-skin"></i>
							<h4 class="h-bold">Riwayat Pemeriksaan Balita</h4> 
							
							<div class="well well-trans">
							    <div class="wow fadeInRight" data-wow-delay="0.1s">

								    <ul class="lead-list">
								        <li>
								        	<span class="fa fa-check fa-2x icon-success"></span> 
								        	<span class="list">
								        		<strong>Tanggal Periksa</strong><br /> {{ $data_pencarian->periksa->tgl_periksa }}
								        	</span>
								        </li>

								        <li>						        		  	<?php
								        		$umur = (strtotime($data_pencarian->periksa->tgl_periksa) - strtotime($data_pencarian->dataBalita->tgl_lahir)) / (60 * 60 * 24 * 30 );
								        		/**
								        		 * pembulatan umur
								        		 */
								        		$umur_bulat = floor($umur);
								        	?>
								        	<span class="fa fa-check fa-2x icon-success"></span>
								        	<span class="list"><strong>Umur</strong><br />
								        		{{ $umur_bulat }} Bulan
								        	</span>
								        </li>

								        <li>
								        	<span class="fa fa-check fa-2x icon-success"></span>
								        	<span class="list"><strong>Berat Badan</strong><br />
								        		{{ $data_pencarian->periksa->berat_badan }} Kg
								        	</span>
								        </li>

								        <li>
								        	<span class="fa fa-check fa-2x icon-success"></span>
								        	<span class="list"><strong>Tinggi Badan</strong><br />
								        		{{ $data_pencarian->periksa->tinggi_badan }} cm
								        	</span>
								        </li>

								        <li>
								        	<span class="fa fa-check fa-2x icon-success"></span>
								        	<span class="list"><strong>BB / U</strong><br />
								        		{{ $data_pencarian->zbbu }} |

								        		@if($data_pencarian->zbbu < -3)

								        		    {{ "Gizi Buruk" }}

								        		@elseif($data_pencarian->zbbu >= -3 && $data_pencarian->zbbu < -2)

								        		    {{ "Gizi Kurang" }}

								        		@elseif($data_pencarian->zbbu >= -2 && $data_pencarian->zbbu <= 2)

								        		    {{ "Gizi Baik" }}

								        		@elseif($data_pencarian->zbbu > 2)

								        		    {{ "Gizi Lebih" }}

								        		@endif

								        	</span>
								        </li>

								        <li>
								        	<span class="fa fa-check fa-2x icon-success"></span>
								        	<span class="list"><strong>TB / U</strong><br />
								        		{{ $data_pencarian->ztbu }} |

								        		@if($data_pencarian->ztbu < -3)

								        		    {{ "Sangat Pendek" }}

								        		@elseif($data_pencarian->ztbu >= -3 && $data_pencarian->ztbu < -2)

								        		    {{ "Pendek" }}

								        		@elseif($data_pencarian->ztbu >= -2 && $data_pencarian->ztbu <= 2)

								        		    {{ "Normal" }}

								        		@elseif($data_pencarian->ztbu > 2)

								        		    {{ "Tinggi" }}

								        		@endif

								        	</span>
								        </li>

								        <li>
								        	<span class="fa fa-check fa-2x icon-success"></span>
								        	<span class="list"><strong>BB / TB</strong><br />
								        		{{ $data_pencarian->zbbtb }} |

								        		@if($data_pencarian->zbbtb < -3)

								        		    {{ "Sangat Kurus" }}

								        		@elseif($data_pencarian->zbbtb >= -3 && $data_pencarian->zbbtb < -2)

								        		    {{ "Kurus" }}

								        		@elseif($data_pencarian->zbbtb >= -2 && $data_pencarian->zbbtb <= 2)

								        		    {{ "Normal" }}

								        		@elseif($data_pencarian->zbbtb > 2)

								        		    {{ "Gemuk" }}

								        		@endif

								        	</span>
								        </li>

								        <li>
								        	<span class="fa fa-check fa-2x icon-success"></span>
								        	<span class="list"><strong>Kebutuhan Energi & Protein / hari </strong><br />
								        		{{ $data_pencarian->energi }} Kkal | {{ $data_pencarian->protein }} gr
								        	</span>
								        </li>
								        
								    </ul>
								    
							    </div>
							</div> 
						</div>
					</div>
				</div>
			
			</div>
		</div>


		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-12">
					<div class="wow fadeInUp" data-wow-delay="0.2s">
						<div class="box">

							<i class="fa fa-check fa-3x circled bg-skin"></i>
							<h4 class="h-bold">Grafik Hasil Pemeriksaan</h4>

							@if (empty($grafik_score))
							    
							    <h4> Tidak ada riwayat pemeriksaan</h4>

							@else

							    <div id="grafikBalita" style="width:100%; height: 400px;"></div>

							@endif

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- /Section: boxes -->

	@else

    <section id="intro" class="intro">
        <div class="intro-content">
            <div class="container" style="min-height:420px">
                <div class="row">

                    <div class="col-lg-12">

                         
                        <div class="wow fadeInDown" data-wow-offset="0" data-wow-delay="0.1s">
                            <h1 class="h-ultra">Maaf.. data tidak ditemukan</h1>
                            <h2 class="h-ultra">Posyandu Melati</h2>
                        </div>
                        <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.1s">
                            <h4 class="h-light">Melayani Dengan Sepenuh<span style="color:red"> <i class="fa fa-heart"></i> </span></h4>
                        </div>

                        <div class="well well-trans">
                            <div class="wow fadeInRight" data-wow-delay="0.1s">

                            <ul class="lead-list">
                                <li><span class="fa fa-check fa-2x icon-success"></span> <span class="list"><strong>ID / No. Registrasi Salah</strong><br />
                                ID / No. Registrasi Balita anda tidak terdaftar atau salah</span></li>
                                
                            </ul>

                            </div>
                        </div>       
                    </div>
                </div>
            </div>
        </div>
    </section>


	@endif

	<script>

	    var chartData = <?php  echo $grafik_score; ?>

	    var chart;

	    AmCharts.ready(function () {
	        // SERIAL CHART
	        chart = new AmCharts.AmSerialChart();
	        chart.dataProvider = chartData;
	        chart.categoryField = "month";
	        chart.startDuration = 1;

	        // AXES
	        // category
	        var categoryAxis = chart.categoryAxis;
	        categoryAxis.labelRotation = 90;
	        categoryAxis.gridPosition = "start";

	        // value
	        // in case you don't want to change default settings of value axis,
	        // you don't need to create it, as one value axis is created automatically.

	        // GRAPH
	        var graph = new AmCharts.AmGraph();
	        graph.valueField = "zbbu";
	        graph.balloonText = " zbbu : <b>[[value]]</b>";
	        graph.type = "column";
	        graph.lineAlpha = 0;
	        graph.fillAlphas = 0.8;
	        chart.addGraph(graph);
	        
	        var graph = new AmCharts.AmGraph();
	        graph.valueField = "ztbu";
	        graph.balloonText = "ztbu: <b>[[value]]</b>";
	        graph.type = "column";
	        graph.lineAlpha = 0;
	        graph.fillAlphas = 0.8;
	        chart.addGraph(graph);
	        
	        var graph = new AmCharts.AmGraph();
	        graph.valueField = "zbbtb";
	        graph.balloonText = "zbbtb: <b>[[value]]</b>";
	        graph.type = "column";
	        graph.lineAlpha = 0;
	        graph.fillAlphas = 0.8;
	        chart.addGraph(graph);

	        var graph = new AmCharts.AmGraph();
	        graph.valueField = "berat_badan";
	        graph.balloonText = "berat_badan: <b>[[value]]</b>";
	        graph.type = "column";
	        graph.lineAlpha = 0;
	        graph.fillAlphas = 0.8;
	        chart.addGraph(graph);

	        var graph = new AmCharts.AmGraph();
	        graph.valueField = "tinggi_badan";
	        graph.balloonText = "tinggi_badan: <b>[[value]]</b>";
	        graph.type = "column";
	        graph.lineAlpha = 0;
	        graph.fillAlphas = 0.8;
	        chart.addGraph(graph);

	        // CURSOR
	        var chartCursor = new AmCharts.ChartCursor();
	        chartCursor.cursorAlpha = 0;
	        chartCursor.zoomable = false;
	        chartCursor.categoryBalloonEnabled = false;
	        chart.addChartCursor(chartCursor);

	        chart.creditsPosition = "top-right";

	        chart.write("grafikBalita");
	    });

	</script>

@endsection