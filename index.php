<?php include 'parts/header.php';
?>
<br><br><br>
<div class="container py-5">
    <div class="row">
        <div class="col-lg-9">
            <?php 
            $articleShow = new ArticleShowFrontpage($db);
            $articleShow->render();
            ?>
        </div>
        <div class="col-lg-3">
            <?php 
            $latestNews = new LatestNews($db);
            $latestNews->renderLatestNews();
            ?>
        </div>
    </div>
</div>
<?php include 'parts/footer.php'?>