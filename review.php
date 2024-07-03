<?php
include 'includes/db.php';
include 'includes/functions.php';


if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $star = $_POST['star'];

    prepared_query($connection, 'insert into review (name, rating, rating_desc) values(?,?,?)', [$name, $star, $desc]);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta data-n-head="ssr" data-hid="description" name="description" content="Tallyxchange is a digital currency exchanger which helps you convert your Digital currency to naira Paypal, Venmo, Zelle, Apple Pay">
    
    <meta data-n-head="ssr" property="og:url" content="https://tallyxchange.com/review">
    <link data-n-head="ssr" rel="icon" type="https://tallyxchange.com/image/png" sizes="32x32" href="/icons/favicon-32x32.png">
    <title>Tally X Review</title>
    <link rel="stylesheet" href="https://tallyxchange.com/css/styles.css">
    <link rel="stylesheet" href="https://tallyxchange.com/css/tailwind.css">

    <link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"
/>

<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
</head>
<body class="bg-lightgray2">


<?php
 include 'includes/nav.php';
?>


<div class=" my-10" id="">
    <p class="text-xl anek font-semibold text-center my-3 text-darkgray" id="">Let Us hear About Your Experience With Us</p>

    <div class="border border-lightgray2 bg-white w-full md:w-9/12 lg:w-6/12 md:rounded-lg mx-auto md:shadow-lg px-3 md:px-8 py-6" id="">
        <form action="" class="anek text-lg" id="" method="POST">
            <div class="my-7" id="">

                <label for="name">Name</label><br>
                <input type="text" class="border border-gray rounded-md h-10 w-full mt-2 px-3" id="name" name ="name"><br>
            </div>
           
            <div class="my-7" id="">

                <p class="mt-6 mb-3 " id="">Rate your Experience</p>
    
                <input type="radio" name='star' value="5" class=" mb-4" id="star5">
                <label for="star5" class=" mb-4">Excellent</label><br>
    
                <input type="radio" name='star' value="4" class=" mb-4" id="star4">
                <label for="star4" class=" mb-4">Very Good</label><br>
    
                <input type="radio" name='star' value="3" class=" mb-4" id="star3">
                <label for="star3" class=" mb-4">Good</label><br>
    
                <input type="radio" name='star' value="2" class="mb-4" id="star2">
                <label for="star2" class=" mb-4">Bad</label><br>
    
                <input type="radio" name='star' value="1" class=" mb-4" id="star1">
                <label for="star1" class=" mb-4">Too Bad</label><br>
    

            </div>
            
            <div class="my-7" id="">
                
                <label for="textarea" class="mt-6">Tell Us about your Experience</label>
                <textarea name="desc" id="textarea" cols="30" rows="10" class="border border-gray rounded-md h-36 w-full mt-2 px-3 py-2"></textarea>

            </div>

            <div class="flex justify-end w-full my-4" id="">

                <input type="submit" class="bg-green rounded-md px-3 py-2.5 text-white anek leading-none" value="Submit Review" id="" name="submit">
            </div>
        </form>
    </div>
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