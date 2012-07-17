<!-- Twitter Bootstrap -->
<link rel="stylesheet" href="/pivot-js/css/bootstrap.min.css" type="text/css" />
<link rel="stylesheet" href="/pivot-js/css/subnav.css" type="text/css" />
<link rel="stylesheet" href="/pivot-js/css/pivot.css" type="text/css" />

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

<script type="text/javascript" src="/pivot-js/javascripts/subnav.js"></script>
<script type="text/javascript" src="/pivot-js/javascripts/accounting.min.js"></script>
<script type="text/javascript" src="/pivot-js/javascripts/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/pivot-js/javascripts/dataTables.bootstrap.js"></script>


<!-- jquery_pivot must be loaded after pivot.js and jQuery -->
<script type="text/javascript" src="/pivot-js/pivot.js"></script>
<script type="text/javascript" src="/pivot-js/jquery_pivot.js"></script>


<div class="main-container">
  <div class="subnav">
    <ul class="nav nav-pills">
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
          Campos de Filtros
          <b class="caret"></b>
        </a>
        <ul class="dropdown-menu stop-propagation" style="overflow:auto;max-height:450px;padding:10px;">
          <div id="filter-list"></div>
        </ul>
      </li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
          Campos de Fila
          <b class="caret"></b>
        </a>
        <ul class="dropdown-menu stop-propagation" style="overflow:auto;max-height:450px;padding:10px;">
          <div id="row-label-fields"></div>
        </ul>
      </li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
          Campos de Columna
          <b class="caret"></b>
        </a>
        <ul class="dropdown-menu stop-propagation" style="overflow:auto;max-height:450px;padding:10px;">
          <div id="column-label-fields"></div>
        </ul>
      </li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
          Campos de Datos
          <b class="caret"></b>
        </a>
        <ul class="dropdown-menu stop-propagation" style="overflow:auto;max-height:450px;padding:10px;">
          <div id="summary-fields"></div>
        </ul>
      </li>
      <li class="dropdown pull-right">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
          Reportes Predefinidos
          <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
         <li><a id="canned-by-month" href="#">Comparativo por mes</a></li>
        </ul>
      </li>
    </ul>
  </div>
  <hr/>

  <span id="pivot-detail"></span>

  <hr/>
  <div id="results"></div>
</div>


<script type="text/javascript">


  $(document).ready(function() {

var data = {};
data.callbacks = {afterUpdateResults: function(){
  $('#results > table').dataTable({
    "sDom": "<'row-fluid'<'span6'l><'span6'f>>t<'row-fluid'<'span6'i><'span6'p>>",
    "iDisplayLength": 50,
    "aLengthMenu": [[25, 50, 100, -1], [25, 50, 100, "All"]],
    "sPaginationType": "bootstrap",
    "oLanguage": {
      "sLengthMenu": "_MENU_ registros por página"
    }
  });
}};


data.json= <?php echo $sf_data->getRaw('json')?>;

data.fields = [
  {name: 'p__id',   type: 'string',   filterable: true},


  {name: 'comprador', type: 'string', filterable: true, pseudo: true,
    pseudoFunction: function(row){ return (row.s__0);}
  },
  {name: 'vendedor', type: 'string', filterable: true, pseudo: true,
    pseudoFunction: function(row){ return (row.s3__1);}
  },
  {name: 'd__published_value',    type: 'float',  rowLabelable: false, summarizable: 'sum', displayFunction: function(value){ return accounting.formatMoney(value)}},
  {name: 'al vendedor', type: 'float', rowLabelable: false, pseudo: true,
    pseudoFunction: function(row){ return row.d__published_value * row.d__commission/100 },
    summarizable: 'sum', displayFunction: function(value){ return accounting.formatMoney(value)}},

  {name: 'mes', type: 'string', filterable: true, pseudo: true, columnLabelable: true, 
    pseudoFunction: function(row){
      var date;
      if(row.p__dm_bought_on!=''){
        date = new Date(row.p__dm_bought_on);
      }
      else{
        date = new Date(row.p__created_at);
      } 
      return date.getFullYear() + '-' + pivot.utils().padLeft((date.getMonth() + 1),2,'0')}
  },



  
/*
  {name: 'status',   type: 'string',   filterable: true},
  {name: 'deal_id',   type: 'string',   filterable: true},
  {name: 'user_id',   type: 'string',   filterable: true},
  {name: 'quantity',   type: 'string',   filterable: true},
  {name: 'price',   type: 'string',   filterable: true},
  {name: 'offer',   type: 'string',   filterable: true},
  {name: 'real_value',   type: 'string',   filterable: true},
  {name: 'saved',   type: 'string',   filterable: true},
  {name: 'code',   type: 'string',   filterable: true},
  {name: 'dm_bought_on',   type: 'string',   filterable: true},
  {name: 'dm_id',   type: 'string',   filterable: true},
  {name: 'dm_amount',   type: 'string',   filterable: true},
  {name: 'dm_net_amount',   type: 'string',   filterable: true},
  {name: 'dm_method',   type: 'string',   filterable: true},
  {name: 'dm_medium',   type: 'string',   filterable: true},
  {name: 'dm_installments',   type: 'string',   filterable: true},
  {name: 'created_at',   type: 'string',   filterable: true},
  {name: 'updated_at',   type: 'string',   filterable: true},

*/  
];

data.rowLabels =['comprador'];


data.summaries = ["d__published_value", "al vendedor"];

    $('').pivot_display('setup', data);

    // prevent dropdown from closing after selection
    $('.stop-propagation').click(function(event){
      event.stopPropagation();
    });

    // **Sexy** In your console type pivot.config() to view your current internal structure 
    // (the full initialize object).  Pass it to setup and you have a canned report.
    $('#canned-by-month').click(function(event){
      $('').pivot_display('reprocess_display', {filters:{p__status:'A'},rowLabels:["vendedor"],columnLabels:["mes"],summaries:["d__published_value"]})
    });
    
    
    

    
    
    
    
  });
</script>
