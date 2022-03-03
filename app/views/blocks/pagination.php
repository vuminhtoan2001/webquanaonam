<nav aria-label="Page navigation example">
    <ul class="pagination pagination-sm" style="justify-content: center;">
        <?php
            if($current_page >1){
                $prev = $current_page-1;

        ?>
        <li class="page-item">
        <a class="page-link" href="?&page=<?=$prev?>" aria-label="Previous" style="color:black">
            <span aria-hidden="true" >&laquo;</span>
        </a>
        </li>
        <?php } ?>
        <?php
            if($current_page >3){ ?>
                <li class="page-item" ><a class="page-link" href="?&page=1" style="color:black">First</a></li>
            <?php } ?>
        <?php for( $num =1 ;$num <= $sum_page; $num++){
            if($num != $current_page){
                if($num > $current_page -3 && $num < $current_page +3){

        ?>

        <li class="page-item" ><a class="page-link" href="?&page=<?=$num?>" style="color:black"><?=$num?></a></li>
            <?php
                }
            }else{
            ?>
                <strong class="page-item page-link" style="background-color:black; color:white"><?=$num?></strong>
            <?php }?>

        <?php } ?>
        <?php
            if($current_page <= $sum_page -3){
                $endpage= $sum_page;
                ?>
                <li class="page-item" ><a class="page-link" href="?&page=<?=$endpage?>" style="color:black">Last</a></li>
            <?php } ?>
        <?php
        if($current_page < $sum_page){
            $next = $current_page+1;

        ?>
        <li class="page-item">
        <a class="page-link" href="?&page=<?=$next?>" aria-label="Next" style="color:black">
            <span aria-hidden="true">&raquo;</span>
        </a>
        </li>
        <?php } ?>
    </ul>
 </nav>