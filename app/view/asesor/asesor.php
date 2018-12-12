<section class="content-header">
    <h1><b>ASESOR: </b></h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <div class="form-group has-feedback">
                    <span class="input-group-text"><label for="anio">Año:</label></span>
                    <select name="anio" id="anio" class="form-control">
                        <option value="">2016</option>
                        <option value="">2017</option>
                        <option value="">2018</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <div class="form-group has-feedback">
                    <span class="input-group-text"><label for="mes">Mes:</label></span>
                    <select name="mes" id="mes" class="form-control">
                        <option value="">Enero</option>
                        <option value="">Febrero</option>
                        <option value="">Marzo</option>
                        <option value="">Abril</option>
                        <option value="">Mayo</option>
                        <option value="">Junio</option>
                        <option value="">Julio</option>
                        <option value="">Agosto</option>
                        <option value="">Septiembre</option>
                        <option value="">Octubre</option>
                        <option value="">Noviembre</option>
                        <option value="">Diciembre</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <br>
            <button type="button" class="btn btn-success" id="buscar">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Reporte General (Nov 2018)</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body chart-responsive">

                    <div class="row">
                        <div class="col-md-3 text-center">
                            <input type="text" class="knob" value="30" data-width="150" data-height="150" data-bgColor="#e6e6e6" data-fgColor="#00a65a" readonly="">
                            <div class="knob-label">ERROR CRÍTICO</div>
                        </div>

                        <div class="col-xs-6 col-md-3 text-center">
                            <input type="text" class="knob" value="50" data-width="150" data-height="150" data-bgColor="#e6e6e6" data-fgColor="#f39c12" readonly="">
                            <div class="knob-label">ERROR NO CRÍTICO</div>
                        </div>

                        <div class="col-md-3 text-center">
                            <input type="text" class="knob" value="30" data-width="150" data-height="150" data-bgColor="#e6e6e6" data-fgColor="#dd4b39" readonly="">
                            <div class="knob-label">ERROR CRÍTICO</div>
                        </div>

                        <div class="col-xs-6 col-md-3 text-center">
                            <input type="text" class="knob" value="50" data-width="150" data-height="150" data-bgColor="#e6e6e6" data-fgColor="#3c8dbc" readonly="">
                            <div class="knob-label">ERROR NO CRÍTICO</div>
                        </div>
                    </div>
                        

                    
                </div>
            </div>
        </div>


                    
        
    </div>
    <hr>
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Reporte Detallado (Nov 2018)</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
					</div>
				</div>
				<div class="box-body chart-responsive">
					<div class="chart" id="repo_detallado"></div>
				</div>
			</div>
		</div>
	</div>
</section>
<script src="../../libs/plugins/knob/knob.js"></script>
<script src="../../js/asesor/asesor.js"></script>
<script type="text/javascript">
    //Reporte detallado
    var bar = new Morris.Bar({
      element: 'repo_detallado',
      resize: true,
      data: [
      	{y: '01', a: 100, b: 100, c: 100, d: 100},
        {y: '05', a: 100, b: 100, c: 100, d: 100},
        {y: '08', a: 80, b: 100, c: 100, d: 0},
        {y: '08', a: 100, b: 0, c: 100, d: 100},
        {y: '10', a: 100, b: 100, c: 100, d: 0},
        {y: '15', a: 100, b: 100, c: 0, d: 100},
        {y: '16', a: 40, b: 0, c: 100, d: 100},
        {y: '19', a: 40, b: 0, c: 100, d: 100}
      ],
      barColors: ["#00a65a", "#f39c12", "#dd4b39", "#3c8dbc"],
      xkey: 'y',
      ykeys: ['a', 'b', 'c', 'd'],
      labels: ['ENC', 'ECS', 'ECO', 'ECC'],
      hideHover: 'auto'
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $("select").select2();
    });
</script>