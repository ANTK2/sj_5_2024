<?php
class ArticleShowFrontpage {
    private $dbConn;

    public function __construct(Database $db) {
        $this->dbConn = $db->getConn();
    }

    public function getNewestArticle() {
        $sql = "SELECT * FROM articles ORDER BY id DESC LIMIT 1";
        $result = $this->dbConn->query($sql);
        return $result ? $result->fetch_assoc() : null;
    }

    public function getRecentArticles($limit = 4) {
        $sql = "SELECT * FROM articles ORDER BY id DESC LIMIT 1, $limit";
        $result = $this->dbConn->query($sql);
        return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
    }

    public function render() {
        $newestArticle = $this->getNewestArticle();
        $recentArticles = $this->getRecentArticles();

        echo '<div class="container">';
        echo '<div class="row equal-height">';
        
        echo '<div class="col-md-8 col-sm-12 left-column">';
        if ($newestArticle) {
            echo '<a href="article.php?id=' . htmlspecialchars($newestArticle['id']) . '">';
            echo '<div class="card mb-4">';
            echo '<img src="' . htmlspecialchars($newestArticle['img_path']) . '" class="card-img-top fixed-image-height" alt="Article Image">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title truncate">' . htmlspecialchars($newestArticle['headline']) . '</h5>';
            echo '<h6 class="card-subtitle mb-2 text-muted truncate">' . htmlspecialchars($newestArticle['subhead']) . '</h6>';
            echo '<p class="card-text truncate-multiline line-clamp-3">' . htmlspecialchars($newestArticle['text']) . '</p>';
            echo '</a>';
            echo '</div>';
            echo '</div>';
        } else {
            echo '<p>No articles found.</p>';
        }
        echo '</div>';

        echo '<div class="col-md-4 col-sm-12 right-column">';
        echo '<div class="article-list">';
        if ($recentArticles) {
            foreach ($recentArticles as $article) {
                echo '<div class="article-item">';
                echo '<a href="article.php?id=' . htmlspecialchars($article['id']) . '">';
                echo '<h5 class="card-title truncate">' . htmlspecialchars($article['headline']) . '</h5>';
                echo '<h6 class="card-subtitle mb-2 text-muted truncate">' . htmlspecialchars($article['subhead']) . '</h6>';
                echo '</a>';
                echo '</div>';
            }
        } else {
            echo '<p>No recent articles found.</p>';
        }
        echo '</div>';
        echo '</div>';

        echo '</div>';
        echo '</div>';
    }
}
?>
