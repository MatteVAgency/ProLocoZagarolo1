<?php
require_once __DIR__ . '/../models/News.php';

class NewsController
{
    private function model(): News { return new News(db()); }

    private function auth(): void {
        if (empty($_SESSION['admin_id'])) {
            header('Location: ' . url('/admin/login'));
            exit;
        }
    }

    private function slugify(string $title): string {
        $slug = strtolower(trim($title));
        $slug = preg_replace('/[^a-z0-9]+/i', '-', $slug) ?? '';
        return trim($slug, '-');
    }

    public function index(): void {
        $pageTitle = 'News — Pro Loco Zagarolo';
        $pageDescription = 'Tutte le comunicazioni, iniziative ed eventi della Pro Loco di Zagarolo.';
        $news = $this->model()->latest(50);
        require __DIR__ . '/../views/news/index.php';
    }

    public function show(string $slug): void {
        $article = $this->model()->findBySlug($slug);
        if (!$article) {
            http_response_code(404);
            $pageTitle = 'News non trovata — Pro Loco Zagarolo';
            $pageDescription = 'La news richiesta non è disponibile.';
            require __DIR__ . '/../views/errors/404.php';
            return;
        }
        $pageTitle = $article['title'] . ' — Pro Loco Zagarolo';
        $pageDescription = mb_substr(strip_tags($article['content']), 0, 160);
        require __DIR__ . '/../views/news/show.php';
    }

    public function admin(): void {
        $this->auth();
        $pageTitle = 'Dashboard Admin — Pro Loco Zagarolo';
        $pageDescription = 'Area amministrativa della Pro Loco di Zagarolo.';
        $news = $this->model()->all();
        $publishedCount = $this->model()->countPublished();
        require __DIR__ . '/../views/admin/dashboard.php';
    }

    public function create(): void {
        $this->auth();
        $pageTitle = 'Nuova news — Pro Loco Zagarolo';
        $pageDescription = 'Crea una nuova news per il sito della Pro Loco di Zagarolo.';
        $error = null;
        $article = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!verify_csrf($_POST['csrf'] ?? null)) die('CSRF non valido');
            $title = trim($_POST['title'] ?? '');
            $content = trim($_POST['content'] ?? '');
            $slug = trim($_POST['slug'] ?? '') ?: $this->slugify($title);
            $status = ($_POST['status'] ?? 'draft') === 'published' ? 'published' : 'draft';
            $published = $status === 'published' ? date('Y-m-d H:i:s') : null;

            if ($title === '' || $content === '') {
                $error = 'Titolo e contenuto sono obbligatori.';
            } elseif ($this->model()->slugExists($slug)) {
                $error = 'Lo slug scelto è già in uso. Scegline un altro.';
            } else {
                try {
                    $image = handle_news_image_upload($_FILES['image'] ?? [], null);
                } catch (RuntimeException $ex) {
                    $error = $ex->getMessage();
                }

                if (!$error) {
                    $this->model()->create([
                        'title' => $title, 'slug' => $slug, 'content' => $content,
                        'image' => $image ?? null, 'published_at' => $published, 'status' => $status,
                        'author_id' => $_SESSION['admin_id']
                    ]);
                    header('Location: ' . url('/admin')); exit;
                }
            }
        }

        require __DIR__ . '/../views/admin/form.php';
    }

    public function edit(int $id): void {
        $this->auth();
        $article = $this->model()->find($id);
        if (!$article) { http_response_code(404); echo 'News non trovata'; return; }

        $pageTitle = 'Modifica news — Pro Loco Zagarolo';
        $pageDescription = 'Modifica una news del sito della Pro Loco di Zagarolo.';
        $error = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!verify_csrf($_POST['csrf'] ?? null)) die('CSRF non valido');
            $title = trim($_POST['title'] ?? '');
            $content = trim($_POST['content'] ?? '');
            $slug = trim($_POST['slug'] ?? '');
            $status = ($_POST['status'] ?? 'draft') === 'published' ? 'published' : 'draft';
            $published = $status === 'published' ? ($article['published_at'] ?: date('Y-m-d H:i:s')) : null;
            $removeImage = isset($_POST['remove_image']);

            if ($title === '' || $content === '' || $slug === '') {
                $error = 'Compila tutti i campi obbligatori.';
            } elseif ($this->model()->slugExists($slug, $id)) {
                $error = 'Lo slug scelto è già in uso. Scegline un altro.';
            } else {
                try {
                    $currentImage = $removeImage ? null : $article['image'];
                    if ($removeImage && $article['image']) {
                        $old = __DIR__ . '/../../public/' . $article['image'];
                        if (is_file($old)) @unlink($old);
                    }
                    $image = handle_news_image_upload($_FILES['image'] ?? [], $currentImage);
                } catch (RuntimeException $ex) {
                    $error = $ex->getMessage();
                }

                if (!$error) {
                    $this->model()->update($id, compact('title', 'slug', 'content', 'status', 'published') + ['image' => $image ?? null]);
                    header('Location: ' . url('/admin')); exit;
                }
            }
        }

        require __DIR__ . '/../views/admin/form.php';
    }

    public function delete(int $id): void {
        $this->auth();
        if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !verify_csrf($_POST['csrf'] ?? null)) die('Richiesta non valida');
        $article = $this->model()->find($id);
        if ($article && $article['image']) {
            $path = __DIR__ . '/../../public/' . $article['image'];
            if (is_file($path)) @unlink($path);
        }
        $this->model()->delete($id);
        header('Location: ' . url('/admin')); exit;
    }
}