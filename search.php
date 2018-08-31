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
            <?php include 'includes/sidebar.php'; ?>
            <div class="col-md-9">
                <?php
                //var_dump($reviews);
                if(is_array($reviews)):
                    echo "<h1>" . $name . "</h1>";
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
                    //var_dump($last_good);

                ?>
                <? else: ?>
                    <h1>Отзывы отсутствуют</h1>
                    <?=$reviews ?>
                    <?/* session_destroy(); */?><!--
                    --><?/* return; */?>
                <? endif; ?>

            </div>
            <div class="clearfix"></div>
        </div>
    </div>

</body>
</html>
