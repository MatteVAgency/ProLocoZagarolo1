<?php
declare(strict_types=1);

class News
{
    public function __construct(private PDO $db) {}

    public function latest(int $limit = 3): array
    {
        $limit = max(1, min($limit, 20));
        $stmt = $this->db->query(
            "SELECT * FROM news WHERE status='published'
             ORDER BY published_at DESC, id DESC LIMIT {$limit}"
        );
        return $stmt->fetchAll();
    }

    public function all(): array
    {
        return $this->db->query("SELECT * FROM news ORDER BY created_at DESC")->fetchAll();
    }

    public function countPublished(): int
    {
        return (int)$this->db->query("SELECT COUNT(*) FROM news WHERE status='published'")->fetchColumn();
    }

    public function findBySlug(string $slug): ?array
    {
        $stmt = $this->db->prepare("SELECT * FROM news WHERE slug=? AND status='published' LIMIT 1");
        $stmt->execute([$slug]);
        return $stmt->fetch() ?: null;
    }

    public function find(int $id): ?array
    {
        $stmt = $this->db->prepare("SELECT * FROM news WHERE id=?");
        $stmt->execute([$id]);
        return $stmt->fetch() ?: null;
    }

    public function slugExists(string $slug, ?int $excludeId = null): bool
    {
        if ($excludeId !== null) {
            $stmt = $this->db->prepare("SELECT id FROM news WHERE slug=? AND id<>? LIMIT 1");
            $stmt->execute([$slug, $excludeId]);
        } else {
            $stmt = $this->db->prepare("SELECT id FROM news WHERE slug=? LIMIT 1");
            $stmt->execute([$slug]);
        }
        return (bool)$stmt->fetch();
    }

    public function create(array $data): int
    {
        $stmt = $this->db->prepare(
            "INSERT INTO news(title,slug,content,image,published_at,status,author_id)
             VALUES(?,?,?,?,?,?,?)"
        );
        $stmt->execute([
            $data['title'], $data['slug'], $data['content'], $data['image'] ?? null,
            $data['published_at'] ?? null, $data['status'], $data['author_id'] ?? null
        ]);
        return (int)$this->db->lastInsertId();
    }

    public function update(int $id, array $data): bool
    {
        $stmt = $this->db->prepare(
            "UPDATE news SET title=?, slug=?, content=?, image=?, published_at=?, status=? WHERE id=?"
        );
        return $stmt->execute([
            $data['title'], $data['slug'], $data['content'], $data['image'] ?? null,
            $data['published_at'] ?? null, $data['status'], $id
        ]);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->db->prepare("DELETE FROM news WHERE id=?");
        return $stmt->execute([$id]);
    }
}