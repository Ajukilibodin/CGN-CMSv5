@extends('masters.admin')

@section('contenttitle')

@endsection
@section('content')
<!-- analytıc özet başlangıç : row 1-->
<div class="row">

  <div class="col-md-3 col-sm-6">
    <div class="widget widget-stats bg-green">
      <div class="stats-icon"><i class="fa fa-desktop"></i></div>
      <div class="stats-info">
        <h4>TOTAL VISITORS</h4>
        <p>3,291,922</p>
      </div>
      <div class="stats-link">
        <a href="javascript:;">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
      </div>
    </div>
  </div>

  <div class="col-md-3 col-sm-6">
    <div class="widget widget-stats bg-blue">
      <div class="stats-icon"><i class="fa fa-chain-broken"></i></div>
      <div class="stats-info">
        <h4>BOUNCE RATE</h4>
        <p>20.44%</p>
      </div>
      <div class="stats-link">
        <a href="javascript:;">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
      </div>
    </div>
  </div>

  <div class="col-md-3 col-sm-6">
    <div class="widget widget-stats bg-purple">
      <div class="stats-icon"><i class="fa fa-users"></i></div>
      <div class="stats-info">
        <h4>UNIQUE VISITORS</h4>
        <p>1,291,922</p>
      </div>
      <div class="stats-link">
        <a href="javascript:;">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
      </div>
    </div>
  </div>

  <div class="col-md-3 col-sm-6">
    <div class="widget widget-stats bg-red">
      <div class="stats-icon"><i class="fa fa-clock-o"></i></div>
      <div class="stats-info">
        <h4>AVG TIME ON SITE</h4>
        <p>00:12:23</p>
      </div>
      <div class="stats-link">
        <a href="javascript:;">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
      </div>
    </div>
  </div>

</div>
<!-- analytıc özet bitiş : row 1-->


<!-- begin row 2-->
<div class="row">

  <!-- analytıc grafik başlangıç -->
  <div class="col-md-8">
    <div class="panel panel-inverse" data-sortable-id="index-1">
      <div class="panel-heading">
        <h4 class="panel-title">Website Analytics (Last 7 Days)</h4>
      </div>
      <div class="panel-body">
        <div id="interactive-chart" class="height-sm"></div>
      </div>
    </div>
  </div>
  <!-- analytıc grafik başlangıç -->


  <!-- EK RAPOR / ÖZET  BAŞLANGIÇ-->
  <div class="col-md-4">
    <div class="panel panel-inverse" data-sortable-id="index-6">
      <div class="panel-heading">
        <h4 class="panel-title">Analytics Details</h4>
      </div>
      <div class="panel-body p-t-0">
        <table class="table table-valign-middle m-b-0">
          <thead>
            <tr>
              <th></th>
              <th>Önceki Hafta</th>
              <th>Geçen Hafta</th>
              <th>Yön</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><label class="label label-danger">Unique Visitor</label></td>
              <td>13,203</td>
              <td>13,203</span></td>
              <td> <span class="text-danger"><i class="fa fa-arrow-down"></i></span></td>
            </tr>
            <tr>
              <td><label class="label label-warning">Bounce Rate</label></td>
              <td>28.2%</td>
              <td>28.2%</td>
              <td> <span class="text-success"><i class="fa fa-arrow-up"></i></span></td>
            </tr>
            <tr>
              <td><label class="label label-success">Total Page Views</label></td>
              <td>1,230,030</td>
              <td>1,230,030</td>
              <td> <span class="text-danger"><i class="fa fa-arrow-down"></i></span></td>
            </tr>
            <tr>
              <td><label class="label label-primary">Avg Time On Site</label></td>
              <td>00:03:45</td>
              <td>00:03:45</td>
              <td> <span class="text-success"><i class="fa fa-arrow-up"></i></span></td>
            </tr>
            <tr>
              <td><label class="label label-default">% New Visits</label></td>
              <td>40.5%</td>
              <td>40.5%</td>
              <td> <span class="text-danger"><i class="fa fa-arrow-down"></i></span></td>
            </tr>
            <tr>
              <td><label class="label label-inverse">Return Visitors</label></td>
              <td>73.4%</td>
              <td>73.4%</td>
              <td> <span class="text-success"><i class="fa fa-arrow-up"></i></span></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

  </div>
  <!-- EK RAPOR / ÖZET  BİTİŞ-->

</div><!-- end row 2-->



<!-- begin row 3-->
<div class="row">
  <!-- begin col-12 -->
  <div class="col-md-12">
    <!-- begin panel -->
    <div class="panel panel-inverse">
      <div class="panel-heading">

        <h4 class="panel-title">Data Table - Default</h4>
      </div>
      <div class="panel-body">
        <div class="table-responsive">
          <table id="data-table" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>Rendering engine</th>
                <th>Browser</th>
                <th>Platform(s)</th>
                <th>Engine version</th>
                <th>CSS grade</th>
              </tr>
            </thead>
            <tbody>
              <tr class="odd gradeX">
                <td>Trident</td>
                <td>Internet Explorer 4.0</td>
                <td>Win 95+</td>
                <td>4</td>
                <td>X</td>
              </tr>
              <tr class="even gradeC">
                <td>Trident</td>
                <td>Internet Explorer 5.0</td>
                <td>Win 95+</td>
                <td>5</td>
                <td>C</td>
              </tr>
              <tr class="odd gradeA">
                <td>Trident</td>
                <td>Internet Explorer 5.5</td>
                <td>Win 95+</td>
                <td>5.5</td>
                <td>A</td>
              </tr>
              <tr class="even gradeA">
                <td>Trident</td>
                <td>Internet Explorer 6</td>
                <td>Win 98+</td>
                <td>6</td>
                <td>A</td>
              </tr>
              <tr class="odd gradeA">
                <td>Trident</td>
                <td>Internet Explorer 7</td>
                <td>Win XP SP2+</td>
                <td>7</td>
                <td>A</td>
              </tr>
              <tr class="even gradeA">
                <td>Trident</td>
                <td>AOL browser (AOL desktop)</td>
                <td>Win XP</td>
                <td>6</td>
                <td>A</td>
              </tr>
              <tr class="gradeA">
                <td>Gecko</td>
                <td>Firefox 1.0</td>
                <td>Win 98+ / OSX.2+</td>
                <td>1.7</td>
                <td>A</td>
              </tr>
              <tr class="gradeA">
                <td>Gecko</td>
                <td>Firefox 1.5</td>
                <td>Win 98+ / OSX.2+</td>
                <td>1.8</td>
                <td>A</td>
              </tr>
              <tr class="gradeA">
                <td>Gecko</td>
                <td>Firefox 2.0</td>
                <td>Win 98+ / OSX.2+</td>
                <td>1.8</td>
                <td>A</td>
              </tr>
              <tr class="gradeA">
                <td>Gecko</td>
                <td>Firefox 3.0</td>
                <td>Win 2k+ / OSX.3+</td>
                <td>1.9</td>
                <td>A</td>
              </tr>
              <tr class="gradeA">
                <td>Gecko</td>
                <td>Camino 1.0</td>
                <td>OSX.2+</td>
                <td>1.8</td>
                <td>A</td>
              </tr>
              <tr class="gradeA">
                <td>Gecko</td>
                <td>Camino 1.5</td>
                <td>OSX.3+</td>
                <td>1.8</td>
                <td>A</td>
              </tr>
              <tr class="gradeA">
                <td>Gecko</td>
                <td>Netscape 7.2</td>
                <td>Win 95+ / Mac OS 8.6-9.2</td>
                <td>1.7</td>
                <td>A</td>
              </tr>
              <tr class="gradeA">
                <td>Gecko</td>
                <td>Netscape Browser 8</td>
                <td>Win 98SE+</td>
                <td>1.7</td>
                <td>A</td>
              </tr>
              <tr class="gradeA">
                <td>Gecko</td>
                <td>Netscape Navigator 9</td>
                <td>Win 98+ / OSX.2+</td>
                <td>1.8</td>
                <td>A</td>
              </tr>
              <tr class="gradeA">
                <td>Gecko</td>
                <td>Mozilla 1.0</td>
                <td>Win 95+ / OSX.1+</td>
                <td>1</td>
                <td>A</td>
              </tr>
              <tr class="gradeA">
                <td>Gecko</td>
                <td>Mozilla 1.1</td>
                <td>Win 95+ / OSX.1+</td>
                <td>1.1</td>
                <td>A</td>
              </tr>
              <tr class="gradeA">
                <td>Gecko</td>
                <td>Mozilla 1.2</td>
                <td>Win 95+ / OSX.1+</td>
                <td>1.2</td>
                <td>A</td>
              </tr>
              <tr class="gradeA">
                <td>Gecko</td>
                <td>Mozilla 1.3</td>
                <td>Win 95+ / OSX.1+</td>
                <td>1.3</td>
                <td>A</td>
              </tr>
              <tr class="gradeA">
                <td>Gecko</td>
                <td>Mozilla 1.4</td>
                <td>Win 95+ / OSX.1+</td>
                <td>1.4</td>
                <td>A</td>
              </tr>
              <tr class="gradeA">
                <td>Gecko</td>
                <td>Mozilla 1.5</td>
                <td>Win 95+ / OSX.1+</td>
                <td>1.5</td>
                <td>A</td>
              </tr>
              <tr class="gradeA">
                <td>Gecko</td>
                <td>Mozilla 1.6</td>
                <td>Win 95+ / OSX.1+</td>
                <td>1.6</td>
                <td>A</td>
              </tr>
              <tr class="gradeA">
                <td>Gecko</td>
                <td>Mozilla 1.7</td>
                <td>Win 98+ / OSX.1+</td>
                <td>1.7</td>
                <td>A</td>
              </tr>
              <tr class="gradeA">
                <td>Gecko</td>
                <td>Mozilla 1.8</td>
                <td>Win 98+ / OSX.1+</td>
                <td>1.8</td>
                <td>A</td>
              </tr>
              <tr class="gradeA">
                <td>Gecko</td>
                <td>Seamonkey 1.1</td>
                <td>Win 98+ / OSX.2+</td>
                <td>1.8</td>
                <td>A</td>
              </tr>
              <tr class="gradeA">
                <td>Gecko</td>
                <td>Epiphany 2.20</td>
                <td>Gnome</td>
                <td>1.8</td>
                <td>A</td>
              </tr>
              <tr class="gradeA">
                <td>Webkit</td>
                <td>Safari 1.2</td>
                <td>OSX.3</td>
                <td>125.5</td>
                <td>A</td>
              </tr>
              <tr class="gradeA">
                <td>Webkit</td>
                <td>Safari 1.3</td>
                <td>OSX.3</td>
                <td>312.8</td>
                <td>A</td>
              </tr>
              <tr class="gradeA">
                <td>Webkit</td>
                <td>Safari 2.0</td>
                <td>OSX.4+</td>
                <td>419.3</td>
                <td>A</td>
              </tr>
              <tr class="gradeA">
                <td>Webkit</td>
                <td>Safari 3.0</td>
                <td>OSX.4+</td>
                <td>522.1</td>
                <td>A</td>
              </tr>
              <tr class="gradeA">
                <td>Webkit</td>
                <td>OmniWeb 5.5</td>
                <td>OSX.4+</td>
                <td>420</td>
                <td>A</td>
              </tr>
              <tr class="gradeA">
                <td>Webkit</td>
                <td>iPod Touch / iPhone</td>
                <td>iPod</td>
                <td>420.1</td>
                <td>A</td>
              </tr>
              <tr class="gradeA">
                <td>Webkit</td>
                <td>S60</td>
                <td>S60</td>
                <td>413</td>
                <td>A</td>
              </tr>
              <tr class="gradeA">
                <td>Presto</td>
                <td>Opera 7.0</td>
                <td>Win 95+ / OSX.1+</td>
                <td>-</td>
                <td>A</td>
              </tr>
              <tr class="gradeA">
                <td>Presto</td>
                <td>Opera 7.5</td>
                <td>Win 95+ / OSX.2+</td>
                <td>-</td>
                <td>A</td>
              </tr>
              <tr class="gradeA">
                <td>Presto</td>
                <td>Opera 8.0</td>
                <td>Win 95+ / OSX.2+</td>
                <td>-</td>
                <td>A</td>
              </tr>
              <tr class="gradeA">
                <td>Presto</td>
                <td>Opera 8.5</td>
                <td>Win 95+ / OSX.2+</td>
                <td>-</td>
                <td>A</td>
              </tr>
              <tr class="gradeA">
                <td>Presto</td>
                <td>Opera 9.0</td>
                <td>Win 95+ / OSX.3+</td>
                <td>-</td>
                <td>A</td>
              </tr>
              <tr class="gradeA">
                <td>Presto</td>
                <td>Opera 9.2</td>
                <td>Win 88+ / OSX.3+</td>
                <td>-</td>
                <td>A</td>
              </tr>
              <tr class="gradeA">
                <td>Presto</td>
                <td>Opera 9.5</td>
                <td>Win 88+ / OSX.3+</td>
                <td>-</td>
                <td>A</td>
              </tr>
              <tr class="gradeA">
                <td>Presto</td>
                <td>Opera for Wii</td>
                <td>Wii</td>
                <td>-</td>
                <td>A</td>
              </tr>
              <tr class="gradeA">
                <td>Presto</td>
                <td>Nokia N800</td>
                <td>N800</td>
                <td>-</td>
                <td>A</td>
              </tr>
              <tr class="gradeA">
                <td>Presto</td>
                <td>Nintendo DS browser</td>
                <td>Nintendo DS</td>
                <td>8.5</td>
                <td>C/A<sup>1</sup></td>
              </tr>
              <tr class="gradeC">
                <td>KHTML</td>
                <td>Konqureror 3.1</td>
                <td>KDE 3.1</td>
                <td>3.1</td>
                <td>C</td>
              </tr>
              <tr class="gradeA">
                <td>KHTML</td>
                <td>Konqureror 3.3</td>
                <td>KDE 3.3</td>
                <td>3.3</td>
                <td>A</td>
              </tr>
              <tr class="gradeA">
                <td>KHTML</td>
                <td>Konqureror 3.5</td>
                <td>KDE 3.5</td>
                <td>3.5</td>
                <td>A</td>
              </tr>
              <tr class="gradeX">
                <td>Tasman</td>
                <td>Internet Explorer 4.5</td>
                <td>Mac OS 8-9</td>
                <td>-</td>
                <td>X</td>
              </tr>
              <tr class="gradeC">
                <td>Tasman</td>
                <td>Internet Explorer 5.1</td>
                <td>Mac OS 7.6-9</td>
                <td>1</td>
                <td>C</td>
              </tr>
              <tr class="gradeC">
                <td>Tasman</td>
                <td>Internet Explorer 5.2</td>
                <td>Mac OS 8-X</td>
                <td>1</td>
                <td>C</td>
              </tr>
              <tr class="gradeA">
                <td>Misc</td>
                <td>NetFront 3.1</td>
                <td>Embedded devices</td>
                <td>-</td>
                <td>C</td>
              </tr>
              <tr class="gradeA">
                <td>Misc</td>
                <td>NetFront 3.4</td>
                <td>Embedded devices</td>
                <td>-</td>
                <td>A</td>
              </tr>
              <tr class="gradeX">
                <td>Misc</td>
                <td>Dillo 0.8</td>
                <td>Embedded devices</td>
                <td>-</td>
                <td>X</td>
              </tr>
              <tr class="gradeX">
                <td>Misc</td>
                <td>Links</td>
                <td>Text only</td>
                <td>-</td>
                <td>X</td>
              </tr>
              <tr class="gradeX">
                <td>Misc</td>
                <td>Lynx</td>
                <td>Text only</td>
                <td>-</td>
                <td>X</td>
              </tr>
              <tr class="gradeC">
                <td>Misc</td>
                <td>IE Mobile</td>
                <td>Windows Mobile 6</td>
                <td>-</td>
                <td>C</td>
              </tr>
              <tr class="gradeC">
                <td>Misc</td>
                <td>PSP browser</td>
                <td>PSP</td>
                <td>-</td>
                <td>C</td>
              </tr>
              <tr class="gradeU">
                <td>Other browsers</td>
                <td>All others</td>
                <td>-</td>
                <td>-</td>
                <td>U</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- end panel -->
  </div>
  <!-- end col-12 -->
</div>
<!-- end row 3-->
@endsection
