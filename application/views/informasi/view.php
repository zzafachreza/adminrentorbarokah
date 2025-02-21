
<div class="container-fluid" style="margin-top:2%">
 <div class="bg-white row" style="margin-top:2%;margin-bottom:2%">
     <div class="col col-sm-6">
         <a href="<?php echo site_url($modul) ?>" class="btn bg-white text-black col col-sm-12"><i class="flaticon2-left-arrow-1"></i> Back</a>
     </div>
 
   

    
  </div>
  
   <?php
		$id = $this->uri->segment(3);	  		
	  	$row =	$this->db->query("SELECT * FROM data_$modul WHERE id_informasi='$id'")->row_object()
	  		
	  		?>
        
			   
			    <h3><?php  echo $row->judul ?></h3>
	
			
			    <img src="<?php  echo  site_url().$row->{'foto_'.$modul} ?>" height="200" />
		
		
			   <p><?php  echo $row->keterangan ?></p>


 


</div>



