<?php
session_start();
/**
 * Created by PhpStorm.
 * User: Dmitry
 * Date: 01.09.2018
 * Time: 2:34
 */
if(isset($_SESSION["reviews"])) {
    $reviews = $_SESSION["reviews"];
    foreach ($reviews as $review) {
        if ($review["author_name"] == $_GET["author"] && $review["time"] == $_GET["time"]) {
            $dt = new DateTime("@" . $review["time"]);
            $photolink = ($review["profile_photo_url"]);
            ?>
            <div class="profile">
                <img class="circle" src="<?php echo $photolink; ?>" alt="profile image"></div>
            <?php
            echo "<b><a href={$review["author_url"]} target='_blank'>{$review["author_name"]}</a></b><br/>"; // print author name
            echo "<span style='color:gray;font-size:10pt'>{$dt->format('d-m-Y')}</span><br/>"; // print date

            for ($i = 1; $i <= ($review["rating"]); $i++)  //print rating
            {
                echo '<span style="color:red">&#9733;</span>';
            }

            for ($i = 1; $i <= 5 - ($review["rating"]); $i++) {
                echo '<span style="color:gray">&#9733;</span>';
            }

            echo " {$review["text"]} <br/>";    //print review
            echo " {$review["relative_time_description"]} <br/>"; // relative_time_description [eg: month a go]
        }
    }
}

/*if( isset( $_POST['back'] ) ){

    return;
}
*/?><!--
<form method="POST">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="back">Назад</button>
</form>-->