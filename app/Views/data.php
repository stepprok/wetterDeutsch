<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="d-flex justify-content-end mb-4">
    <a class="btn btn-outline-secondary" href="<?= base_url('stanice/' . $stanice->bundesland); ?>">
        <i class="fas fa-arrow-left me-2"></i> Zpět na seznam stanic
    </a>
</div>

<div class="text-center mb-5">
    <h1 class="p-2" style="font-style: italic; font-size: 60px;">
        Data pro stanici <?= esc($stanice->place); ?>
    </h1>
    <p class="lead text-muted">Přehled meteorologických dat</p>
    <img src="<?= base_url('img/icon4.png'); ?>" class="img-fluid my-3" style="width: 100px;">
</div>

<div class="table-responsive shadow-lg rounded-3">
    <table class="table table-bordered table-striped table-hover table-sm align-middle" id="data-table">
        <thead class="table-dark text-center">
            <tr>
                <th>Datum</th>
                <th>Kvalita</th>
                <th>Min. T 5cm</th>
                <th>Min. T 2m</th>
                <th>Mid. T 2m</th>
                <th>Max. T 2m</th>
                <th>Vlhkost</th>
                <th>Mid. Vítr</th>
                <th>Max. Vítr</th>
                <th>Světlo</th>
                <th>Mid. Mraky</th>
                <th>Srážky</th>
                <th>Mid. Tlak</th>
            </tr>
        </thead>
        <tbody id="data-body">
            <?= view('partials/dataRows', ['dataStanic' => $dataStanic]) ?>
        </tbody>
    </table>
</div>

<script>
let page = 1;
let loading = false;
const id = <?= json_encode($idStanice) ?>;

$(window).on('scroll', function () {
    if (loading) return;

    if ($(window).scrollTop() + $(window).height() >= $(document).height() - 100) {
        
        loading = true;
        page++; 
        
        $.get("<?= base_url('dataAjax/') ?>" + "/" + id + "?scroll=" + page, function (data) {
            if (data.trim() !== "") {
                $("#data-body").append(data);
                loading = false;

            } else {
                loading = false;
                console.log("Konec dat k načítání.");
            }
        }).fail(function() {
            loading = false;
            console.error("Chyba při načítání dat.");
        });
    }
});
</script>

<?= $this->endSection(); ?>
