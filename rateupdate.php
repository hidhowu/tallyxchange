<?php
include 'includes/db.php';
include 'includes/functions.php';


if(isset($_POST['create'])){

    $ratename1 = $_POST['ratename'];
    $buyrate1 = $_POST['buyrate'];
    $sellrate1 = $_POST['sellrate'];

    prepared_query($connection, 'insert into rates (funds, buyrate, sellrate) values(?,?,?)', [$ratename1, $buyrate1, $sellrate1]);
}


if(isset($_GET['delete'])){
    $id = $_GET['delete'];

    prepared_query($connection, 'delete from rates where id = ?',[$id]);
}


if(isset($_GET['update'])){


    $id = $_GET['id'];
    $buyrate = $_GET['buyrate'];
    $sellrate = $_GET['sellrate'];

    prepared_query($connection, 'update rates set buyrate  = ?, sellrate = ? where id  = ?', [$buyrate, $sellrate, $id]);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, follow">
    <title>Tally Digital Services Rate Updater</title>
    <link rel="stylesheet" href="https://tallyxchange.com/css/styles.css">
    <link rel="stylesheet" href="https://tallyxchange.com/css/tailwind.css">

    <link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"
/>

<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
</head>
<body>


<?php
 include 'includes/nav.php';
?>


<div class="w-11/12 px-6 py-5 mx-auto my-10 border border-lightgray md:shadow-lg md:w-10/12 lg:w-8/12 xl:w-6/12" id="">

    <div class="" id="">
        <p class="text-2xl font-semibold anek" id="">Update Rate</p>
    
        
        <?php
    
    $query = prepared_select($connection, 'select * from rates where id != ?', [0])->fetch_all(MYSQLI_ASSOC);
    
    foreach ($query as $rates){
    
    ?>
        <form action="" class="" id="" method="GET">
    
            <div class="justify-around my-6 md:flex" id="">
                <label for="<?php echo $rates['funds']; ?>" class="my-3 mr-4 font-medium md:my-0 anek md:text-lg" id=""><?php echo $rates['funds']; ?></label>
                <input type="text" class="h-10 px-2 my-3 mr-4 text-sm border rounded-md md:text-base md:my-0 border-lightgray" id="<?php echo $rates['funds']; ?>" value="<?php echo $rates['buyrate']; ?>" name="buyrate"> 

                <input type="text" class="h-10 px-2 my-3 mr-4 text-sm border rounded-md md:text-base md:my-0 border-lightgray" id="<?php echo $rates['funds']; ?>" value="<?php echo $rates['sellrate']; ?>" name="sellrate"> 

                <input type="text" class="hidden h-10 px-2 my-3 mr-4 text-sm border rounded-md md:text-base md:my-0 border-lightgray" id="<?php echo $rates['funds']; ?>" value="<?php echo $rates['id']; ?>" name="id">
    
                
                <input type="submit" class="px-3 py-2 my-3 font-medium leading-none text-white rounded-md bg-green anek md:text-lg md:my-0 " id="" value='Update Rate' name="update">
                <a href="?delete=<?php echo $rates['id']; ?>" class="px-3 py-2 my-3 mr-4 text-sm font-medium leading-none text-white bg-black rounded-md md:text-base md:my-0 " id="">Delete Rate</a>
            </div>
    
        </form>
    
        <?php
        }
        ?>
    
    </div>
    
    
    <hr class="my-10 border border-lightgray" id="">
    
    <form action="" class="" id="" method="POST">
        <p class="text-2xl font-semibold anek" id="">Add a new Rate</p>
    
    
            <div class="w-full my-4" id="">
                <label for="ratename" class="text-lg font-medium anek" id="">Input Funds Name</label><br>
                <input type="text" class="w-full h-10 px-2 border rounded-md border-lightgray" id="ratename" value="" name="ratename">
            </div>
    
            <div class="my-4" id="">
                <label for="buyrate" class="text-lg font-medium anek" id="">Input Buy Rate in Naira</label><br>
                <input type="text" class="w-full h-10 px-2 border rounded-md border-lightgray" id="buyrate" value="" name="buyrate">
            </div>

            <div class="my-4" id="">
                <label for="sellrate" class="text-lg font-medium anek" id="">Input Sell Rate in Naira</label><br>
                <input type="text" class="w-full h-10 px-2 border rounded-md border-lightgray" id="sellrate" value="" name="sellrate">
            </div>
        
    
        <input type="submit" class="px-3 py-2 text-lg font-medium leading-none text-white rounded-md bg-green anek" id="" value='Create Rate' name="create">
    
    </form>
</div>

    
    <!-- footer -->
    <?php
    include 'includes/footer.php';
    ?>




</body>
<script>

    function opener(){
        var menu = document.getElementById('drawer');
        menu.classList.remove('hidden');
    }
    
    
    function closer(){
        var menu = document.getElementById('drawer');
        menu.classList.add('hidden');
    }
</script>    
</html>