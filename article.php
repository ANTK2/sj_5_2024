<?php
include_once 'parts/header.php';
if (!isset($_GET['id'])) {
    echo '<p>No Article ID Provided</p>';
    exit;
}
$id = intval($_GET['id']);
?>
<style>
    .article-details {
        padding: 20px;
        background-color: #fff;
    }
    .article-title {
        font-size: 2.5rem;
        font-weight: bold;
        margin-top: 20px;
    }
    .article-subtitle {
        font-size: 1.5rem;
        margin-bottom: 20px;
    }
    .article-text p {
        font-size: 1.125rem;
        line-height: 1.6;
        margin-bottom: 1.5rem;
    }
    .article-image {
        width: 100%;
        max-height: 500px;
        object-fit: contain;
        margin-bottom: 20px;
    }
    .container {
        max-width: 800px;
        margin: 0 auto;
    }
</style>
<?php 
$articleDetails = new ArticleDetails($db);
$articleDetails->renderArticleDetails($id);
?>
<?php include_once 'parts/footer.php';?>