<?php
include 'db.php';
include 'functions.php';


if(isset($_POST['from'], $_POST['to'], $_POST['amount'])){

    $from = $_POST['from'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    if($from == 'naira'){

        $fromval = 'naira';
        $final = $amount;
    }else{
        
        $fromquery = prepared_query($connection, 'select * from rates where id  = ?', [$from])->get_result()->fetch_assoc();
        $fromval = $fromquery['funds'];
        $fromrate = $fromquery['buyrate'];
        $amount;
        $fromrate;

        $final = $amount * $fromrate;

    }



    if($to == 'naira'){
        $fund = 'Naira';

        $output ='<p class="anek" id="">At the rate of <span class="text-green" id="">'.$fromrate.' / $</span> You will recieve</p>
        <p class="text-3xl font-semibold anek" id="">&#8358;'.$final.'</p>
        <p class="anek" id="">in '.$fund.'</p>';
    }else{
    $toquery = prepared_query($connection, 'select * from rates where id  = ?', [$to])->get_result()->Fetch_assoc();
    $toval = $toquery['funds'];
    $torate = $toquery['sellrate'];
    $final = $final / $torate;


    $fund = $toval.' Funds';

    $output ='<p class="anek" id="">At the rate of <span class="text-green" id="">'.$torate.' / $</span> You will recieve</p>
    <p class="text-3xl font-semibold anek" id="">$'.$final.'</p>
    <p class="anek" id="">in '.$fund.'</p>';
    }
}
die($output);
?>