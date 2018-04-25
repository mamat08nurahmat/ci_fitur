<!DOCTYPE html>  
 <html>  
 <head>  
      <title>Webslesson | <?php echo $title; ?></title>  
<!---
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />  
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
---->	  
	  
	  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	  
	  
 </head>  
 <body>  
      <div class="container">  
           <br /><br /><br />  
           <h3 align="center"><?php echo $title; ?></h3>  
		   
<!-- Trigger the modal with a button 
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">UPLOAD</button>		   
-->
		   
<button type="button" class="btn btn-info btn-lg" id="UploadBtn">UPLOAD</button>		   

           <br />  
           <br />  
           <div id="uploaded_image">  
           <?php echo $image_data; ?>  
           </div>  
      </div>  
 </body>  
 </html>  
 
 <script>  
function delete_(id) {
	console.log(id);
    //document.getElementById("demo").innerHTML = "Hello World";
    if(confirm('Are you sure delete this data?'))
    {
/*
*/	
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('main/ajax_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
alert('data terhapus');		
window.location.replace("<?=site_url('main/image_upload')?>");
console.log(data);
                //if success reload ajax table
//                $('#modal_form').modal('hide');
  //              reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });

    }
	
	
}



 $(document).ready(function(){  
 

 $("#UploadBtn").click(function(){
//        $("#myModal").modal();
		$("#myModal").modal("show");
    });

 

 

 
 
      $('#upload_form').on('submit', function(e){  
           e.preventDefault();  
           if($('#image_file').val() == '')  
           {  
                alert("Please Select the File");  
           }  
           else  
           {  
                $.ajax({  
                     url:"<?php echo base_url(); ?>main/ajax_upload",   
                     //base_url() = http://localhost/tutorial/codeigniter  
                     method:"POST",  
                     data:new FormData(this),  
                     contentType: false,  
                     cache: false,  
                     processData:false,  
                     success:function(data)  
                     {  
					  $("#myModal").modal("hide");
                          $('#uploaded_image').html(data);  
                     }  
                });  
           }  
      });  
 });  
 </script>  
 
 
 
 <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">UPLOAD DOKUMENT</h4>
        </div>
        <div class="modal-body">
		
<!---
           <form method="post" id="upload_form" align="center" enctype="multipart/form-data">  
                <input type="file" name="image_file" id="image_file" />  
				<input type="text" name="keterangan" id="keterangan" />  
				
                <br />  
                <br />  
                <input type="submit" name="upload" id="upload" value="Upload" class="btn btn-info" />  
           </form>  		
--->		
<form method="post" id="upload_form" align="center" enctype="multipart/form-data">  
  <div class="form-group">
    <label for="exampleFormControlInput1">File</label>
    <input type="file" class="form-control" id="image_file" name="image_file" >
  </div>
  <div class="form-group">
    <label for="jenis_file">Jenis File</label>
    <select class="form-control" id="jenis_file" name="jenis_file">
      <option value="akte">Akte</option>
      <option value="dokumen">Dokumen</option>
      <option value="perjanjian_kerjasama">Perjanjian Kerjasama</option>
    </select>
  </div>
  <div class="form-group">
    <label for="keterangan">Keterangan</label>
    <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
  </div>
  
  <div class="form-group">
  <input type="submit" name="upload" id="upload" value="Upload" class="btn btn-info" />     
  </div>
  
</form>
		
		
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
