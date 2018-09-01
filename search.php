<?php
include 'settings.php';
?>
<!doctype html>
<html lang="en">
<head>
    <? include_once 'includes/head.php'; ?>
</head>
<body>
    <div class="container">
        <div class="row">
            <!-- Content -->
            <div class="col-md-9">
                <?php
                if(is_array($reviews)):
                    echo "<h1>" . $name . "</h1>";
                    echo "<h6>" . $address . "</h6>";
                    echo "<h1 class='text-danger'>" . $rating . "</h1>";

                    /*Сортировка отзывов по времени*/
                    $time = array_column($reviews, 'time');
                    array_multisort($time, SORT_DESC, $reviews);
                    //var_dump($time);
                            ?>
                <h1>ОТЗЫВЫ</h1>
                    <br/> <br/>
                <?
                    foreach ($reviews as $review) {
                        $dt = new DateTime("@".$review["time"]);
                        $photolink = ($review["profile_photo_url"]);
                ?>
                        <div class="profile">
                        <img class="circle" src="<?php echo $photolink; ?>" alt="profile image"> </div>
                <?php
                       echo "<b><a href={$review["author_url"]} target='_blank'>{$review["author_name"]}</a></b><br/>"; // print author name
                       echo "<span style='color:gray;font-size:10pt'>{$dt->format('d-m-Y')}</span><br/>"; // print date

                       for($i=1;$i<=($review["rating"]);$i++)  //print rating
                       {
                           echo '<span style="color:red">&#9733;</span>';
                       }

                       for($i=1;$i<=5-($review["rating"]);$i++)
                       {
                           echo '<span style="color:gray">&#9733;</span>';
                       }

                       echo " {$review["text"]} <br/>";    //print review
                       echo " {$review["relative_time_description"]} <br/>"; // relative_time_description [eg: month a go]
                       echo "<br/>";

                       echo "<br/> <br/>";
                    }
                ?>
                <? else: ?>
                    <h1>Отзывы отсутствуют</h1>
                <? endif; ?>

            </div>
            <?php include 'includes/sidebar.php'; ?>
            <div class="clearfix"></div>
        </div>
    </div>

</body>
</html>
