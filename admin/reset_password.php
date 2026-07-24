<?php
// ============================================================
// admin/reset_password.php
// Bono Heart Initiative — Admin Password Reset
// ============================================================

require_once dirname(__DIR__) . '/includes/config.php';
require_once dirname(__DIR__) . '/includes/Database.php';

// Admin account
$email = 'admin@bonoheartinitiative.org';

// New password
$newPassword = 'BHI@2026';

// Generate secure bcrypt hash
$hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

try {

    // Update password using the SAME Database class
    // used by admin/login.php
    $affectedRows = Database::execute(
        "UPDATE admin_users
         SET password = ?, updated_at = NOW()
         WHERE email = ?",
        [$hashedPassword, $email]
    );

    if ($affectedRows > 0) {

        echo "<h2>Password Reset Successful</h2>";

        echo "<p>Email: <strong>" .
             htmlspecialchars($email) .
             "</strong></p>";

        echo "<p>New password: <strong>" .
             htmlspecialchars($newPassword) .
             "</strong></p>";

        echo "<p style='color:red;'>
                <strong>IMPORTANT:</strong>
                Delete reset_password.php immediately after
                completing the password reset.
              </p>";

    } else {

        // Check if the account exists
        $admin = Database::fetchOne(
            "SELECT id, email, is_active
             FROM admin_users
             WHERE email = ?",
            [$email]
        );

        if (!$admin) {

            echo "<h2>Account Not Found</h2>";

            echo "<p>
                    No admin account exists with the email:
                    <strong>" .
                    htmlspecialchars($email) .
                    "</strong>
                  </p>";

        } else {

            echo "<h2>Password Reset Did Not Change Anything</h2>";

            echo "<p>Admin account found.</p>";

            echo "<p>Email: " .
                 htmlspecialchars($admin['email']) .
                 "</p>";

            echo "<p>Account active: " .
                 ($admin['is_active'] ? 'YES' : 'NO') .
                 "</p>";

            echo "<p>
                    If the account is inactive, run the SQL command
                    below in phpMyAdmin:
                  </p>";

            echo "<pre>
UPDATE admin_users
SET is_active = 1
WHERE email = 'admin@bonoheartinitiative.org';
</pre>";

        }
    }

} catch (Throwable $e) {

    echo "<h2>Password Reset Error</h2>";

    echo "<p>" .
         htmlspecialchars($e->getMessage()) .
         "</p>";

}
?>