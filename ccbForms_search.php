<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head> 
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.3/jquery-ui.js"></script>          

 
        <style>  
            <?php 
//             include 'css/skeleton.css' ; 
//             include 'css/remindme_v2.css' ;
             
            ?>
    
    .page-title{
        display:none;
    }

    </style> 
    
<script type="text/javascript">
    $(function() {
      $( "#tabs" ).tabs();
    }); 
	jQuery(document).ready(function($) {	
		jQuery( '.get_c' ).on('keyup', function() {	
			// alert("dds");	
			var query=jQuery(this).val();
		    var quy_len = query.length;
			// alert(quy_len);		
			if(quy_len >3){
				alert('inside');
				// var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";	
				var ulr_ajax = "<?php echo plugins_url('secure_forms/ajax_search_file.php'); ?>";
				jQuery.ajax({	
					method: "POST",		
					url: ulr_ajax,	
					data: { 'action': 'ok', 'query':query},	
					success : function( response ) {   
					alert(response);        
					}		
				});
			}
		});
	});
    
</script>
 

    </head> 
<body> 
 <input type="text" class="get_c">
<?php add_action( 'wp_footer', 'wp_ajax_ok' );function wp_ajax_ok(){	return $_POST['query'];}
   function wp_ajax_me(){	   $q=$_POST['query'];
    $rm_options = get_option('ccb_forms_option_name');  
    $webservice_url = $rm_options['webservice_url'];      
 
    include_once 'ccb/functions.php';
    global $wpdb;  
    $searchParms = array(
        "LastName" =>$query 
    );
    $returnParms = array(
        "ClientID" => "",
        "LastName"  => "",
        "FirstName"  => ""
    );
    $rs= ccb_search($searchParms, $returnParms) ;   }
    //foreach ($rs as $row){   //echo "<pre>"; print_r($row);
       // echo "<br>" . $row["ClientID"] . $row["LastName"] . " " . $row["FirstName"];
     //}
	
	$rs_temp = "this is that"; 
  
   include_once 'ccb/functions.php'; 

$rm_options = get_option('ccb_forms_option_name');
  $webservice_url = $rm_options['webservice_url'];        
  
  global $wpdb; 
  $searchParms = array(        "LastName" =>'%'.$query.'%'     );  
  $returnParms = array(        "ClientID" => "",        "LastName"  => "",        "FirstName"  => ""    );  
  $rs= ccb_search($searchParms, $returnParms);
  
  foreach ($rs as $row){
	  echo "<pre>"; print_r($row);     
	  echo "<br>" . $row["ClientID"] . $row["LastName"] . " " . $row["FirstName"];  
	  }
     ?>
    <h3>Search</h3>
    </body>
</html>
