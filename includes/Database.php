<?php
// ============================================================
// includes/Database.php
// PDO singleton — use Database::get() anywhere
// ============================================================

require_once __DIR__ . '/config.php';

class Database {

    private static ?PDO $instance = null;

    public static function get(): PDO {
        if (self::$instance === null) {
            $dsn = sprintf(
                'mysql:host=%s;dbname=%s;charset=%s',
                DB_HOST, DB_NAME, DB_CHARSET
            );
            try {
                self::$instance = new PDO($dsn, DB_USER, DB_PASS, [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES   => false,
                ]);
            } catch (PDOException $e) {
                // Never expose credentials in production
                http_response_code(500);
                die(json_encode([
                    'success' => false,
                    'message' => 'Database connection failed. Please try again later.'
                ]));
            }
        }
        return self::$instance;
    }

    // Convenience: run a query and return all rows
    public static function fetchAll(string $sql, array $params = []): array {
        $stmt = self::get()->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }

    // Convenience: run a query and return one row
    public static function fetchOne(string $sql, array $params = []): ?array {
        $stmt = self::get()->prepare($sql);
        $stmt->execute($params);
        $row = $stmt->fetch();
        return $row ?: null;
    }

    // Convenience: execute (INSERT / UPDATE / DELETE)
    public static function execute(string $sql, array $params = []): int {
        $stmt = self::get()->prepare($sql);
        $stmt->execute($params);
        return (int) $stmt->rowCount();
    }

    // Last insert id
    public static function lastId(): int {
        return (int) self::get()->lastInsertId();
    }
}
