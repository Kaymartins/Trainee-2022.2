<nav aria-label="Paginacao" class='d-flex justify-content-center' style="background-color:#272226;">
    <ul class="pagination mt-3 pagin">
            <li class="page-item <?= $pag <= 1 ? "disabled" : "" ?>">
                <a class="page-link text-dark button-pag" href="?pagina=<?=$pag > 1 ? $pag - 1 : 1 ?>" aria-label="Previous">
                    <span class="but-preview" aria-hidden="true">&laquo;</span>
                    <span class="but-preview" class="sr-only">Previous</span>
                </a>
            </li>
        <?php for ($pagNum = 1 ; $pagNum <= $tot_pag; $pagNum++) : ?>
            <li class="page-item <?= $pagNum == $pag ? "active" : "" ?>">
                <a href="?pagina=<?= $pagNum ?>" class="page-link text-dark but-num">
                    <?= $pagNum ?>
                </a>
            </li>
        <?php endfor; ?>
        <li class="page-item <?= $pag >= $tot_pag ? "disabled" : "" ?>">
            <a class="page-link text-dark  button-pag-next" href="?pagina=<?=$pag < $tot_pag ? $pag + 1 : $tot_pag ?>" aria-label="Next">
                <span class="but-next" class="sr-only">Next</span>
                <span class="but-next" aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
</nav>   