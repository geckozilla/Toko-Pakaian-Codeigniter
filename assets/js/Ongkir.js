$( document ).ready(function() {
   var BASE_URL = '/TokoCI2/';
   console.log(BASE_URL)
  
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
           dataType: 'json',
           data: $( this ).serialize(),
           success: function(data) {
              $('.serviceRO').prop('disabled', false);
              pecahData(data);
           }
       });
   });

   function pecahData(data)
  {
    let newData = JSON.stringify( data , null, '\t');
    console.log(newData);
    $(".serviceRO option[value='pilih']").remove();

    $('.serviceRO').append(data.map(function(sObj){
      return '<option data-harga="'+sObj.cost.map(a => a.value)+'" data-est="'+sObj.cost.map(a => a.etd)+'" value="'+sObj.service+'">'+sObj.service +'</option>'
    }));

    $('#ROest').text('Estimasi ' + $('.serviceRO').find(':selected').data('est') + ' Hari')
    $('#ROcost').text('Rp ' + $('.serviceRO').find(':selected').data('harga'))

    $('.serviceRO').on('change', function() {
      $('#ROest').text('Estimasi ' + $(this).find(':selected').data('est') + ' Hari')
      $('#ROcost').text('Rp ' + $(this).find(':selected').data('harga'))
    });
    
  }

  $('#kurir').on('change', function() {
    $('.serviceRO').children('option').remove();
    $('.serviceRO').prop('disabled', true);
  });
  
 });