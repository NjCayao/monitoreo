<?php
  if(Core::$user->kind==3){ Core::redir("./?view=reports"); }
    $dateB = new DateTime(date('Y-m-d'));
    $dateA = $dateB->sub(DateInterval::createFromDateString('30 days'));
    $sd= strtotime(date_format($dateA,"Y-m-d"));
    $ed = strtotime(date("Y-m-d"));
    $ntot = 0;
    $nsells = 0;
  for($i=$sd;$i<=$ed;$i+=(60*60*24)){
    $operations = SellData::getGroupByDateOp(date("Y-m-d",$i),date("Y-m-d",$i),2);
    $res = SellData::getGroupByDateOp(date("Y-m-d",$i),date("Y-m-d",$i),1);
    $spends = SpendData::getGroupByDateOp(date("Y-m-d",$i),date("Y-m-d",$i));
  //  echo $operations[0]->t;
    $sr = $res[0]->tot!=null?$res[0]->tot:0;
    $sl = $operations[0]->t!=null?$operations[0]->t:0;
    $sp = $spends[0]->t!=null?$spends[0]->t:0;
    $ntot+=($sl-($sp+$sr));
    $nsells += $operations[0]->c;
  }
?>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <h1 style="text-align: center;">SISTEMA REPORTES EQUIPOS</h1>
      <h4>REPORTES: Equipos</h4>
      <!-- <a href="./?view=newproduct" class="btn btn-default">Nuevo Producto</a>
      <a href="./?view=inventary&stock=<?php echo StockData::getPrincipal()->id; ?>" class="btn btn-default">Inventario Principal</a>
      <a href="./?view=smallbox&opt=all" class="btn btn-default">Caja chica</a> -->
    <!--  <a href="./?view=messages&opt=all" class="btn btn-default">Mensajes</a> -->
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-aqua"><i class="fa fa-glass"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Personal en días libres</span>
          <span class="info-box-number"><?php echo count(ProductData::getAll()); ?><small></small></span>
        </div><!-- /.info-box-content -->
      </div><!-- /.info-box -->
    </div><!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-red"><i class="fa fa-male"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Total Operadores</span>
          <span class="info-box-number"><?php echo count(UserData::getAllOperators());?></span>
        </div><!-- /.info-box-content -->
      </div><!-- /.info-box -->
    </div><!-- /.col -->
    <!-- fix for small devices only -->
    <!-- <div class="clearfix visible-sm-block"></div>
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-green"><i class="fa fa-shopping-cart"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Ventas del mes</span>
          <span class="info-box-number"><?php echo $nsells;?></span>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-yellow"><i class="fa fa-area-chart"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Ingresos del Mes</span>
          <span class="info-box-number">S/ <?php echo number_format($ntot,2,".",",");?></span>
        </div>
      </div>
    </div> -->
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              <p class="text-center">
                <strong>Balance de los ultimos 30 dias Reportes</strong>
              </p>

              <?php
                $dateB = new DateTime(date('Y-m-d'));
                $dateA = $dateB->sub(DateInterval::createFromDateString('30 days'));
                $sd= strtotime(date_format($dateA,"Y-m-d"));
                $ed = strtotime(date("Y-m-d"));
              ?>
              <div id="graph" class="animate" data-animate="fadeInUp" ></div>
              <script>

                <?php
                echo "var c=0;";
                echo "var dates=Array();";
                echo "var data=Array();";
                echo "var total=Array();";
                for($i=$sd;$i<=$ed;$i+=(60*60*24)){
                  $operations = SellData::getGroupByDateOp(date("Y-m-d",$i),date("Y-m-d",$i),2);
                  $res = SellData::getGroupByDateOp(date("Y-m-d",$i),date("Y-m-d",$i),1);
                  $spends = SpendData::getGroupByDateOp(date("Y-m-d",$i),date("Y-m-d",$i));
                //  echo $operations[0]->t;
                  $sr = $res[0]->tot!=null?$res[0]->tot:0;
                  $sl = $operations[0]->t!=null?$operations[0]->t:0;
                  $sp = $spends[0]->t!=null?$spends[0]->t:0;
                  echo "dates[c]=\"".date("Y-m-d",$i)."\";";
                  echo "data[c]=".($sl-($sp+$sr)).";";
                  echo "total[c]={x: dates[c],y: data[c]};";
                  echo "c++;";
                }
                ?>
                // Use Morris.Area instead of Morris.Line
                Morris.Area({
                  element: 'graph',
                  data: total,
                  xkey: 'x',
                  ykeys: ['y',],
                  labels: ['Y']
                }).on('click', function(i, row){
                  console.log(i, row);
                });
              </script>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>