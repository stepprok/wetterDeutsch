<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container mt-5">
    <div class="text-center">
        <h1 class="p-2" style="font-style: italic; font-size: 60px; margin-top: 40px;">
            Přehled zemí v Německu
        </h1>

        <img src="<?= base_url('img/icon2.png'); ?>" 
             class="img-fluid mt-3"
             style="width: 120px; margin-top: -50px;" 
             alt="Ikona">
    </div>
    <div class="d-flex justify-content-end mb-4">
        <a class="btn btn-outline-secondary" href="<?= base_url('vsechnystanice'); ?>" role="button">
        <i class="fa-solid fa-arrow-right-from-bracket"></i> Všechny stanice
        </a>
    </div>

    <div class="table-responsive table-striped mt-5">
        <?php
        $table = new \CodeIgniter\View\Table();

        $template = [
            'table_open'            => '<table class="table table-bordered table-striped table-hover align-middle">',
            'thead_open'            => '<thead class="table-dark">',
            'thead_close'           => '</thead>',
            'heading_row_start'     => '<tr>',
            'heading_row_end'       => '</tr>',
            'heading_cell_start'    => '<th class="text-center">',
            'heading_cell_end'      => '</th>',
            'tbody_open'            => '<tbody>',
            'tbody_close'           => '</tbody>',
            'row_start'             => '<tr>',
            'row_end'               => '</tr>',
            'cell_start'            => '<td class="text-center">',
            'cell_end'              => '</td>',
            'row_alt_start'         => '<tr>',
            'row_alt_end'           => '</tr>',
            'cell_alt_start'        => '<td class="text-center">',
            'cell_alt_end'          => '</td>',
            'table_close'           => '</table>'
        ];

        $table->setTemplate($template);
        $table->setHeading('ID', 'Název', 'Zkratka');

        foreach ($zeme as $row) {
            $table->addRow(
                $row->id,
                anchor('stanice/' . $row->id, $row->name),
                $row->short_name
            );
        }

        echo $table->generate();
        ?>
    </div>

</div>

<?= $this->endSection(); ?>
