<?php if($items->hasPages()): ?>
    <div class="tg-pagenation-wrap">
        <nav>
            <ul class="nav-links pagination">
                <li>
                    <?php if($items->onFirstPage()): ?>
                        <span class="p-btn next page-numbers disabled">
                            Previous Page
                        </span>
                    <?php else: ?>
                        <a class="p-btn next page-numbers" href="<?php echo e($items->previousPageUrl()); ?>">
                            Previous Page
                        </a>
                    <?php endif; ?>
                </li>

                <?php
                    $start = max($items->currentPage() - 2, 1);
                    $end = min($start + 4, $items->lastPage());
                    $start = max(min($start, $items->lastPage() - 4), 1);
                ?>

                <?php if($start > 1): ?>
                    <li>
                        <a class="page-numbers" href="<?php echo e($items->url(1)); ?>">1</a>
                        <?php if($start > 2): ?>
                            <span class="page-numbers dots">...</span>
                        <?php endif; ?>
                    </li>
                <?php endif; ?>

                <?php for($i = $start; $i <= $end; $i++): ?>
                    <li>
                        <?php if($i == $items->currentPage()): ?>
                            <span aria-current="page" class="page-numbers active"><?php echo e($i); ?></span>
                        <?php else: ?>
                            <a class="page-numbers" href="<?php echo e($items->url($i)); ?>"><?php echo e($i); ?></a>
                        <?php endif; ?>
                    </li>
                <?php endfor; ?>

                <?php if($end < $items->lastPage()): ?>
                    <li>
                        <?php if($end < $items->lastPage() - 1): ?>
                            <span class="page-numbers dots">...</span>
                        <?php endif; ?>
                        <a class="page-numbers"
                            href="<?php echo e($items->url($items->lastPage())); ?>"><?php echo e($items->lastPage()); ?></a>
                    </li>
                <?php endif; ?>

                <li>
                    <?php if($items->hasMorePages()): ?>
                        <a class="p-btn next page-numbers" href="<?php echo e($items->nextPageUrl()); ?>">
                            Next Page
                        </a>
                    <?php else: ?>
                        <span class="p-btn next page-numbers disabled">
                            Next Page
                        </span>
                    <?php endif; ?>
                </li>
            </ul>
        </nav>
    </div>
<?php endif; ?>
<?php /**PATH D:\xampp\htdocs\archive\archive\resources\views/components/front/custom-pagination.blade.php ENDPATH**/ ?>