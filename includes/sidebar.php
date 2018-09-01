<div class="col-md-3">
    <h3 class="my-4">Поиск</h3>
    <div>
        <form class="form-inline" action="search.php">
            <input name="id" class="form-control mr-sm-2" type="search" placeholder="Введите id компании..." aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Искать отзывы</button>
        </form>

    </div>
    <br/> <br/>
    <?
    if(is_array($reviews)) {
        $n = 0;
        foreach ($reviews as $review) {
            /*Фильтрация отзывов с рейтингом не меньше 4*/
            if(($review["rating"])>=4)
            {
                $last_good[$n] = $review;
                $n++;
                if ($n == 2){
                    break;
                }
            }
        }
        foreach ($last_good as $review) {
            echo "<a href='single.php?author={$review["author_name"]}&time={$review["time"]}'>";
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
            echo " {$review["relative_time_description"]} <br/>"; // relative_time_description [eg: month a go]
            echo "<br/>";

            echo "<br/> <br/>";
            echo "</a>";
        }
    }
    ?>
</div>