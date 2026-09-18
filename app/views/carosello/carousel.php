<?php
/**
 * Partial: carosello immagini.
 * Richiede $slides = array di ['tipo'=>'placeholder'|'file', 'classe'=>..., 'src'=>...]
 * Il JS esterno (assets/js/turismo-carousel.js) si occupa del funzionamento.
 */
$slides = $slides ?? [];
if (count($slides) === 0) {
    $slides = [['tipo' => 'placeholder', 'classe' => 'ph-1']];
}
?>
<div class="carousel" data-carousel>
    <div class="carousel-track">
        <?php foreach ($slides as $i => $slide): ?>
            <div class="carousel-slide<?= $i === 0 ? ' is-active' : '' ?>">
                <?php if (($slide['tipo'] ?? '') === 'file' && !empty($slide['src'])): ?>
                    <img src="<?= e($slide['src']) ?>" alt="" loading="lazy">
                <?php else: ?>
                    <div class="carousel-placeholder <?= e($slide['classe'] ?? 'ph-1') ?>">
                        <span>Foto in arrivo</span>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
    <?php if (count($slides) > 1): ?>
        <button type="button" class="carousel-nav prev" aria-label="Foto precedente">‹</button>
        <button type="button" class="carousel-nav next" aria-label="Foto successiva">›</button>
        <div class="carousel-dots">
            <?php foreach ($slides as $i => $slide): ?>
                <span class="carousel-dot<?= $i === 0 ? ' is-active' : '' ?>"></span>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>