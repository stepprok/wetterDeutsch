<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container mt-4 mb-5">
    <div class="text-center">
        <h1 class="p-2" style="font-style: italic; font-size: 60px; margin-top: 40px;">
            Všecky stanice v Německu
        </h1>

        <img src="<?= base_url('img/icon2.png'); ?>"
            class="img-fluid mt-3"
            style="width: 120px; margin-top: -50px;"
            alt="Ikona">
    </div>

    <div class="d-flex justify-content-end mb-4">
        <a class="btn btn-outline-secondary" href="<?= base_url(); ?>" role="button">
            <i class="fa-solid fa-arrow-right-from-bracket"></i> Zpět na seznam zemí
        </a>
    </div>

    <div class="row">
        <?php foreach ($stanice as $row): ?>
            <div class="col-lg-6 col-md-6 col-12 mb-4">
                <div class="card shadow-sm h-100 border-start border-secondary border-5">
                    <div class="card-body">
                        <h5 class="card-title mb-3 fw-bold text-center">
                            <?= anchor('data/' . $row->S_ID, $row->place, ['class' => 'text-decoration-none text-dark']); ?>
                        </h5>
                        <img src="<?= base_url('img/vlajky/' . $row->picflag); ?>" class="img-fluid w-100"
                            style="max-height: 250px; object-fit: contain;"
                            alt="Vlajka <?= $row->name ?>"><br>

                        <ul class="list-unstyled small">
                            <li><i class="fas fa-compass me-2"></i> **Šířka:** <?= $row->geo_latitude ?></li>
                            <li><i class="fas fa-compass me-2"></i> **Délka:** <?= $row->geo_longtitude ?></li>
                            <li><i class="fas fa-mountain me-2"></i> **Výška:** <?= $row->height ?> m. n. m.</li>
                        </ul>

                        <a href="<?= base_url('data/' . $row->S_ID); ?>" class="btn btn-sm btn-outline-dark mt-2 ">
                            Zobrazit data <i class="fas fa-chart-line ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>

<?= $this->endSection(); ?>