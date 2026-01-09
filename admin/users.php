<?php
include "auth.php";
include "../config/db.php";

$users = $conn->query("SELECT * FROM users ORDER BY id DESC")->fetchAll();
?>

<link rel="stylesheet" href="../assets/css/admin.css">

<div class="admin-container">
    <h1>🧑‍💼 Quản lý người dùng</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Quyền</th>
                <th>Hành động</th>
            </tr>
        </thead>

        <tbody>
        <?php foreach ($users as $u): ?>
            <tr>
                <td><?= $u['id'] ?></td>
                <td><?= htmlspecialchars($u['name']) ?></td>
                <td><?= htmlspecialchars($u['email']) ?></td>
                <td>
                    <?= $u['role'] == 'admin' ? 'Admin' : 'User' ?>
                </td>
                <td class="action">
                    <?php if ($u['role'] != 'admin'): ?>
                        <a class="delete" 
                           onclick="return confirm('Xóa user?')" 
                           href="user_delete.php?id=<?= $u['id'] ?>">🗑️</a>
                    <?php else: ?>
                        <span style="color:#888">—</span>
                    <?php endif ?>
                </td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
</div>
