<div class="col-4">
    <?php foreach ($users as $user): ?>
        <?=$user['name']?> <?=$user['email']?>
        <a href="editUser.php?id=<?=$user['id']?>">Редактировать</a>
        <a href="deleteUser.php?id=<?=$user['id']?>">Удалить</a>
        <br />
    <?php endforeach; ?>
</div>