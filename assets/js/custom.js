$(document).ready( function () {
    $('#myTable').DataTable();
    myTable();
    $('#home_page').click(function(){
        myTable();
    });
    $('#deleted_files').click(function(){
        var type="deleted_files";
        myTable(type);
    });
    $('#uploaded_files').click(function(){
        var type="uploaded_files";
        myTable(type);
    });
    
    $('#submit').submit(function(e){
      e.preventDefault(); 
         $.ajax({
             url:'MyDirectory/Upload',
             type:"post",
             data:new FormData(this),
             processData:false,
             dataType:'json',
             contentType:false,
             cache:false,
             async:false,
              success: function(data){
                if(data.error){
                    swal(data.error.replace(/<\/?[^>]+>/gi, ''));
                }else if(data.upload_data){
                          swal(" file has been Uploaded!", {
                                  icon: "success",
                                }).then(function() {
                                     window.location.reload();
                          });
                }else{
                    swal("Something went wrong!");
                  }
           }
         });
    });  
    
} );
    function myTable(type){
        $.ajax({
            type:'POST',
            url:'MyDirectory/getdata',
            asyn:false,
            dataType:'json',
            data:{table_type:type},
            success:function(data){
                var table="<table id='myTable' class='display'>\n\
                         <thead>\n\
                         <tr>\n\
                         <th>File</th>\n\
                         <th>Action</th>\n\
                         </tr>\n\
                         </thead>\n\
                         <tbody id='table_body'>";
                if(data.length==0){
                      table+="<tr style='text-align: center;'><td>No files in the directory</td></tr>";
                }
                else if(data.length!=0){
                    $.each( data, function( key, value ) {
                       table+='<tr><td>'+value+'</td>';
                       if(type=="deleted_files"){
                         table+='<td>Deleted</td>';
                       }else if(type=="uploaded_files"){
                        table+='<td>Uploaded</td>';
                       }else{
                         table+='<td><a href="javascript:void(0);" class="btn btn-danger btn-sm deleteRecord" data-id="'+value+'">delete</a></td></tr>';
                       }
                    });
                    
                } 
                table+='</tbody></table>';
                $('#directory_list').html(table);
                $('#myTable').DataTable();
            }
        });

    }
    $('#directory_list').on('click','.deleteRecord',function(){
        var file_name=$(this).data('id');
        deleteRecord(file_name);
    });
    function deleteRecord(file_name){
            // var table=$('#employeeListing').DataTable();     
        swal({
              title: "Are you sure?",
              text: "Once deleted, you will not be able to recover this file!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                    $.ajax({
                        type:'ajax',
                        url:'MyDirectory/delete_file',
                        asyn:false,
                        type : "POST",
                        data:{'file_name':file_name},
                        dataType:'json',
                        success:function(data){
                            if(data){
                                swal(" file has been deleted!", {
                                  icon: "success",
                                }).then(function() {
                                     window.location.reload();
                                   });
                            }else{
                                swal("Something went wrong!");
                            }
                        }
                    });
              } else {
                swal("Your file is safe!");
              }
            });

    }