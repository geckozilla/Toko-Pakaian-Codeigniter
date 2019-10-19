$( document ).ready(function() {
   var BASE_URL = '/TokoCI2/';
   console.log(BASE_URL)

   // $('#kota_asal').select2({
   //    placeholder: 'Pilih kota/kabupaten asal',
   //    language: "id"
   // });
  
   $('#kota_tujuan').select2({
      placeholder: 'Pilih Kota Tujuan',
      language: "id"
   });
  
     $.ajax({
       type: "GET",
       dataType: "html",
       url: BASE_URL + 'ongkir/data_kota/kotatujuan',
       success: function(msg){
       $("select#kota_asal").html(msg);                                                     
       }
     });    
   
  $.ajax({
       type: "GET",
       dataType: "html",
       url: BASE_URL + 'ongkir/data_kota/kotatujuan',
       success: function(msg){
       $("select#kota_tujuan").html(msg);                                                     
       }
    });
  
    $("#ongkir").submit(function(e) {
       e.preventDefault();
       $.ajax({
           url: BASE_URL + 'ongkir/cek_ongkir',
           type: 'post',
           data: $( this ).serialize(),
           success: function(data) {
             console.log(data);
             document.getElementById("response_ongkir").innerHTML = data;
           }
       });
   });
  
 });