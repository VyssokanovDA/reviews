<div class="col-md-3">
    <h3 class="my-4">Поиск</h3>
    <div>
        <form class="form-inline" action="search.php">
            <input name="id" class="form-control mr-sm-2" type="search" placeholder="Введите id компании..." aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Искать отзывы</button>
        </form>

    </div>
<?php
/*include 'settings.php';
if(is_array($reviews)){
    $n = 0;
    $time = array_column($reviews, 'time');
    array_multisort($time, SORT_DESC, $reviews);
    foreach ($reviews as $review) {

        if(($review["rating"])>=4)
        {
            $last_good[$n] = $review;
            $n++;
        }
    }
    var_dump($last_good);
}*/


?>

</div>