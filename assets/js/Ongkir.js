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
    // let newData = JSON.stringify( data , null, '\t');
    // console.log(newData);
    $('.serviceRO').children('option').remove();

    $('.serviceRO').append(data.map(function(sObj){
      return '<option data-harga="'+sObj.cost.map(a => a.value)+'" data-est="'+sObj.cost.map(a => a.etd)+'" value="'+sObj.service+'">'+sObj.service +'</option>'
    }));

    $('.serviceRO :nth-child(1)').prop('selected', true);
    $('#ROest').text('Estimasi ' + $('.serviceRO').find(':selected').data('est') + ' Hari')
    $('#ROcost').text('Rp ' + formatMoney($('.serviceRO').find(':selected').data('harga')))

    $('.serviceRO').on('change', function() {
      $('#ROest').text('Estimasi ' + $('.serviceRO').find(':selected').data('est') + ' Hari')
      $('#ROcost').text('Rp ' + formatMoney($('.serviceRO').find(':selected').data('harga')))
    });
    
  }

  $('#kurir').on('change', function() {
    $('.serviceRO').children('option').remove();
    $('.serviceRO').prop('disabled', true);
    $('#ROest').text('')
    $('#ROcost').text('')
  });

  $('#kota_tujuan').on('change', function() {
    $('.serviceRO').children('option').remove();
    $('.serviceRO').prop('disabled', true);
    $('#ROest').text('')
    $('#ROcost').text('')
  });

  function formatMoney(amount, decimalCount = 0, decimal = ".", thousands = ",") {
    try {
      decimalCount = Math.abs(decimalCount);
      decimalCount = isNaN(decimalCount) ? 0 : decimalCount;
  
      const negativeSign = amount < 0 ? "-" : "";
  
      let i = parseInt(amount = Math.abs(Number(amount) || 0).toFixed(decimalCount)).toString();
      let j = (i.length > 3) ? i.length % 3 : 0;
  
      return negativeSign + (j ? i.substr(0, j) + thousands : '') + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousands) + (decimalCount ? decimal + Math.abs(amount - i).toFixed(decimalCount).slice(2) : "");
    } catch (e) {
      console.log(e)
    }
  };

 });