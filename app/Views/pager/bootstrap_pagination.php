<?php
/**
 * Minimal Bootstrap 5 Pagination Template for CodeIgniter 4
 *
 * @var \CodeIgniter\Pager\PagerRenderer $pager
 */
?>

<nav aria-label="Page navigation">
    <ul class="pagination justify-content-center">
        <?php foreach ($pager->links() as $link) : ?>
            <li class="page-item <?= $link['active'] ? 'active' : '' ?>">
                <a href="<?= $link['uri'] ?>" class="page-link"><?= $link['title'] ?></a>
            </li>
        <?php endforeach ?>
    </ul>
</nav>
