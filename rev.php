<?php
include 'includes/db.php';
include 'includes/functions.php';


if(isset($_GET['delete'])){
    $id = $_GET['delete'];

    prepared_query($connection, 'delete from review where id  = ?', [$id]);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tally Digital Services Reviews</title>
    <link rel="stylesheet" href="https://tallyxchange.com/css/styles.css">
    <link rel="stylesheet" href="https://tallyxchange.com/css/tailwind.css">
<meta name="robots" content="noindex">
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
    <div class="flex flex-col lg:flex-row w-11/12 flex-wrap my-10" id="">


        <?php
        $data = prepared_select($connection, 'select * from review where id != ? order by id DESC', [0])->fetch_all(MYSQLI_ASSOC);
        foreach($data as $rev){
            ?>
        <div class="border border-gray mx-auto px-3 py-3 w-72 my-6" id="">
            <div class="anek my-3" id=""><?php echo $rev['rating_desc'] ?></div>

            <div class="anek" id=""><span class="font-semibold my-6">Stars:</span><?php echo $rev['rating'] ?> Stars</div> <br>

            <a href="?delete=<?php echo $rev['id'] ?>" class="my-10 bg-black text-white px-3 py-2" id="">Delete Review</a>
        </div>

        <?php
        }
        ?>


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