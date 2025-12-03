<?php foreach ($dataStanic as $row): ?>
<tr class="text-center">
    <td><?= date('d.m.Y', strtotime($row->date)) ?></td>
    <td><?= esc($row->quality) ?></td>
    <td><?= esc($row->min_5cm) ?></td>
    <td><?= esc($row->min_2m) ?></td>
    <td><?= esc($row->mid_2m) ?></td>
    <td><?= esc($row->max_2m) ?></td>
    <td><?= esc($row->humidity) ?></td>
    <td><?= esc($row->mid_wwind ?? $row->mid_wind) ?></td>
    <td><?= esc($row->max_wind) ?></td>
    <td><?= esc($row->sun_length) ?></td>
    <td><?= esc($row->mid_cloud) ?></td>
    <td><?= esc($row->precipitation) ?></td>
    <td><?= esc($row->mid_air_pressure) ?></td>
</tr>
<?php endforeach; ?>