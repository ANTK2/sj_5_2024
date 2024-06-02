<?php 
class ArticleDetails {
    private $dbConn;

    public function __construct(Database $db) {
        $this->dbConn = $db->getConn();
    }

    public function getArticleById($id) {
        $sql = "SELECT * FROM articles WHERE id = ? ";
        $stmt = $this->dbConn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result ? $result->fetch_assoc() : null;
    }

    public function renderArticleDetails($id) {
        $article = $this->getArticleById($id);

        if ($article) {
            echo '<div class="container py-3">';
            echo '<div class="row">';
            echo '<div class="col-md-12">';
            echo '<div class="article-details">';
            echo '<h1 class="article-title">' . htmlspecialchars($article['headline']) . '</h1>';
            echo '<h5 class="article-subtitle text-muted">' . htmlspecialchars($article['subhead']) . '</h5>';
            echo '<img src="' . htmlspecialchars($article['img_path']) . '" class="article-image" alt="Article Image">';
            echo '<p class="article-text text-muted pb-3"><b>' . htmlspecialchars($article['date']) . '</b></p>';
            echo '<div class="article-text" style="font-family: \'Times New Roman\', Times, serif !important;">';
            $paragraphs = explode("\n", htmlspecialchars($article['text']));
            foreach ($paragraphs as $paragraph) {
                echo '<p>' . trim($paragraph) . '</p>';
            }
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        } else {
            echo '<p class="text-center">Article not found.</p>';
        }
    }
}
?>