<nav aria-label="Paginacao" class='mt-3'>
    <ul class="pagination">
        <li class="page-item <?= $pag <= 1 ? "disabled" : "" ?>">
            <a class="page-link text-dark" href="?pagina=<?=$pag > 1 ? $page - 1 : 1 ?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
            </a>
        </li>
        <?php for ($pag = 1 ; $pag <= $tot_pag; $pag++) : ?>
            <li class="page-item">
                <a href="?pagina=<?= $pag ?>" class="page-link text-dark">
                    <?= $pag ?>
                </a>
            </li>
        <?php endfor; ?>
        <li class="page-item <?= $pag >= $tot_pag ? "disabled" : "" ?>">
            <a class="page-link text-dark" href="?pagina=<?=$pag < $tot_pag ? $page + 1 : $tot_pag ?>" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
            </a>
        </li>



    </ul>











</nav>   