let message = '';
function calculate(){
    $('#calc').text('Calculating...');

   let from =  $('select#from').children("option:selected").val();
   let to =  $('select#to').children("option:selected").val();
   let amount =  $('input#amount').val();

//    console.log(amount);
   if(amount >1){
        if(from != to){


            $.ajax({
                url: 'includes/calculate.php',
                method: 'POST',
                dataType: 'text',
                data: {
                    from:from,
                    to:to,
                    amount:amount,
                    // section:section
                },
            
                success: function(data) {
                
                    let output = data;

                    $('#calculate_container').html(output);
                    // console.log(output);
                $('#proceed').removeClass('hidden');
                $('#calc').text('Convert');
                
                }
            });

        }else{
         message = 'You cant convert a currency to itself';
         $('#calculate_container').html(message);
         $('#calc').text('Convert');


        }
   }else{
    message = 'Amount must be greater than 1';
    $('#calculate_container').html(message);
    $('#calc').text('Convert');

    

   }

   
}