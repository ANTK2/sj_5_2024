<?php
class ArticleManager {
    private $db;

    public function __construct(Database $db) {
        $this->db = $db;
    }

    public function getAllArticles() {
        $sql = "SELECT * FROM articles";
        return $this->db->query($sql);
    }

    public function getArticleById($id) {
        $sql = "SELECT * FROM articles WHERE id = ?";
        $stmt = $this->db->getConn()->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function addArticle($headline, $subhead, $text, $img_path, $date, $category_id) {
        $sql = "INSERT INTO articles (headline, subhead, text, img_path, date, category_id) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->getConn()->prepare($sql);
        $stmt->bind_param("sssssi", $headline, $subhead, $text, $img_path, $date, $category_id);
        return $stmt->execute();
    }

    public function editArticle($id, $headline, $subhead, $text, $img_path, $date, $category_id) {
        $sql = "UPDATE articles SET headline = ?, subhead = ?, text = ?, img_path = ?, date = ?, category_id = ? WHERE id = ?";
        $stmt = $this->db->getConn()->prepare($sql);
        $stmt->bind_param("sssssii", $headline, $subhead, $text, $img_path, $date, $category_id, $id);
        return $stmt->execute();
    }

    public function deleteArticle($id) {
        $sql = "DELETE FROM articles WHERE id = ?";
        $stmt = $this->db->getConn()->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function renderArticles() {
        $articles = $this->getAllArticles();
        while ($article = $articles->fetch_assoc()) {
            $this->renderArticleRow($article);
            $this->renderEditModal($article);
        }
    }

    private function renderArticleRow($article) {
        echo '<tr>
            <td class="py-2 px-4">' . htmlspecialchars($article['id']) . '</td>
            <td class="py-2 px-4">' . htmlspecialchars($article['headline']) . '</td>
            <td class="py-2 px-4">' . htmlspecialchars($article['subhead']) . '</td>
            <td class="py-2 px-4">' . htmlspecialchars($article['img_path']) . '</td>
            <td class="py-2 px-4">' . htmlspecialchars($article['date']) . '</td>
            <td class="py-2 px-4">' . htmlspecialchars($article['category_id']) . '</td>
            <td class="py-2 px-4">
                <button class="flex items-center bg-zinc-700 text-white px-2 py-1 rounded-md mr-2" data-bs-toggle="modal" data-bs-target="#editModal' . $article['id'] . '">
                    <i class="fas fa-edit mr-1"></i>Edit
                </button>
                <a href="index.php?delete=' . $article['id'] . '" class="flex items-center bg-zinc-700 text-white px-2 py-1 rounded-md">
                    <i class="fas fa-trash-alt mr-1"></i>Delete
                </a>
            </td>
        </tr>';
    }

    private function renderEditModal($article) {
        echo '<div class="modal fade" id="editModal' . $article['id'] . '" tabindex="-1" aria-labelledby="editModalLabel' . $article['id'] . '" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel' . $article['id'] . '">Edit Article</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post">
                            <input type="hidden" name="id" value="' . $article['id'] . '">
                            <div class="mb-3">
                                <label for="headline" class="form-label">Headline</label>
                                <input type="text" class="form-control" id="headline" name="headline" value="' . htmlspecialchars($article['headline']) . '" required>
                            </div>
                            <div class="mb-3">
                                <label for="subhead" class="form-label">Subhead</label>
                                <input type="text" class="form-control" id="subhead" name="subhead" value="' . htmlspecialchars($article['subhead']) . '" required>
                            </div>
                            <div class="mb-3">
                                <label for="text" class="form-label">Text</label>
                                <textarea class="form-control" id="text" name="text" rows="3" required>' . htmlspecialchars($article['text']) . '</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="img_path" class="form-label">Image Path</label>
                                <input type="text" class="form-control" id="img_path" name="img_path" value="' . htmlspecialchars($article['img_path']) . '" required>
                            </div>
                            <div class="mb-3">
                                <label for="date" class="form-label">Date</label>
                                <input type="date" class="form-control" id="date" name="date" value="' . htmlspecialchars($article['date']) . '" required>
                            </div>
                            <div class="mb-3">
                                <label for="category_id" class="form-label">Category ID</label>
                                <input type="number" class="form-control" id="category_id" name="category_id" value="' . htmlspecialchars($article['category_id']) . '" required>
                            </div>
                            <button type="submit" class="btn btn-primary" name="edit_submit">Save changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>';
    }

    public function renderAddModal() {
        echo '<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">Add New Article</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post">
                            <div class="mb-3">
                                <label for="headline" class="form-label">Headline</label>
                                <input type="text" class="form-control" id="headline" name="headline" required>
                            </div>
                            <div class="mb-3">
                                <label for="subhead" class="form-label">Subhead</label>
                                <input type="text" class="form-control" id="subhead" name="subhead" required>
                            </div>
                            <div class="mb-3">
                                <label for="text" class="form-label">Text</label>
                                <textarea class="form-control" id="text" name="text" rows="3" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="img_path" class="form-label">Image Path</label>
                                <input type="text" class="form-control" id="img_path" name="img_path" required>
                            </div>
                            <div class="mb-3">
                                <label for="date" class="form-label">Date</label>
                                <input type="date" class="form-control" id="date" name="date" required>
                            </div>
                            <div class="mb-3">
                                <label for="category_id" class="form-label">Category ID</label>
                                <input type="number" class="form-control" id="category_id" name="category_id" required>
                            </div>
                            <button type="submit" class="btn btn-primary" name="add_submit">Add Article</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>';
    }
}
?>
