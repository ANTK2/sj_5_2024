<?php
include "parts/header.php";
include_once 'classes/Database.php';
include_once 'classes/ArticleManager.php';

$db = new Database();
$articleManager = new ArticleManager($db);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add_submit'])) {
        $headline = $_POST['headline'];
        $subhead = $_POST['subhead'];
        $text = $_POST['text'];
        $img_path = $_POST['img_path'];
        $date = $_POST['date'];
        $category_id = $_POST['category_id'];

        $articleManager->addArticle($headline, $subhead, $text, $img_path, $date, $category_id);
        header("Location: index.php");
        exit();
    }

    if (isset($_POST['edit_submit'])) {
        $id = $_POST['id'];
        $headline = $_POST['headline'];
        $subhead = $_POST['subhead'];
        $text = $_POST['text'];
        $img_path = $_POST['img_path'];
        $date = $_POST['date'];
        $category_id = $_POST['category_id'];

        $articleManager->editArticle($id, $headline, $subhead, $text, $img_path, $date, $category_id);
        header("Location: index.php");
        exit();
    }
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $articleManager->deleteArticle($id);
    header("Location: index.php");
    exit();
}
?>
<style>
    .wrap-text {
        word-wrap: break-word;
        white-space: normal;
    }
</style>

<div class="container py-5">
    <div class="flex-1 overflow-y-auto p-4">
        <table class="w-full bg-white shadow-md rounded-lg">
            <thead>
                <tr>
                    <th class="py-2 px-4 bg-zinc-200">ID</th>
                    <th class="py-2 px-4 bg-zinc-200">Headline</th>
                    <th class="py-2 px-4 bg-zinc-200">Subhead</th>

                    <th class="py-2 px-4 bg-zinc-200">Image Path</th>
                    <th class="py-2 px-4 bg-zinc-200">Date</th>
                    <th class="py-2 px-4 bg-zinc-200">Category ID</th>
                    <th class="py-2 px-4 bg-zinc-200">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $articleManager->renderArticles(); ?>
            </tbody>
        </table>
        <button class="mt-4 bg-zinc-700 text-white px-3 py-2 rounded-md" data-bs-toggle="modal" data-bs-target="#addModal">
            <i class="fas fa-plus mr-2"></i>Add New Article
        </button>
    </div>
</div>

<?php $articleManager->renderAddModal(); ?>

<?php include "parts/footer.php"; ?>
