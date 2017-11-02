@extends ('principal.principal')

@section ('contenido')

	
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <div class="table-responsive" >
      <table class="table table-striped table-bordered table-condensed table-hover">
      <tr>
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    
    <!-- Wrapper for slides -->
    <div class="carousel-inner" width="50" >
      <div class="item active">
        <center><img class="img-responsive" src="http://portal.andina.com.pe/EDPfotografia3/Thumbnail/2016/06/28/000363509W.jpg" alt="Nevados Peru" style="width:100%; height: 420px ;"></center>
      </div>

      <div class="item">
        <center><img class="img-responsive" src="http://img.inforegion.pe.s3.amazonaws.com/wp-content/uploads/2015/05/vias-junin.jpg" alt="Vias Junin" style="width:100%; height: 420px;"></center>
      </div>
    
      <div class="item">
        <center><img class="img-responsive" src="http://portal.andina.com.pe/EDPfotografia/Thumbnail/2013/12/14/000227772W.jpg" alt="Carretera andina" style="width:100%;height: 420px; "></center>
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
   <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</tr>
<tr>

    
    <div class="panel panel-default" style="background-color:black;">
        <div class="panel-body" >
            <strong><h4 style="color:white;">Sistema de VIASlibres</h4></strong>
          <p style="text-align:left; background-color:black; color:white; font-family:calibri;">El sistema encargado de velar por el optimo desarrollo de deteccion deincidentes en carreteras , a fin de que el usuario pueda reportar uno y se pueda tomar las medidas correctivas correctas ante este incidente.</p>
        </div>
      </div>
      
    
</tr>
</table>

</div>
</div>
</div>

	
@stop