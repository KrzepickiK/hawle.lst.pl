<!--<pre>-->

<?php
//echo $wzDetails['wzHeader']['CUSTOMERDOCNO'];
//print_r($wzDetails);
//print_r($_POST);
//print_r($_SESSION);
//print_r($availableWarehouses);
?>
<!--</pre>-->

<style>
.table tbody > tr > td {
    vertical-align: middle;
}
</style>
<div class="container">

    <table class="table table-hover table-bordered">

        <tr>
            <td colspan="2" style="vertical-align:middle; font-weight:bold;">Wystawił:</td>
            <td style="vertical-align:middle; font-weight:bold;">Odbiorca:</td>
            <td rowspan="2" class="bg-info text-center text-primary">
                <h1>Wydanie</h1>
                <div class="form-group">
                    <label for="selMag">Wybierz magazyn:</label>
                    <form action="" method="post" id="submitChangeForm">
                        <input hidden type="text" value="<?php echo $wzDetails['wzHeader']['tempid'] ?>" name="tempid">
                        <select id="selMag" class="submit--this form-control" name="headerMag">
                            <option value="<?php echo $wzDetails['wzHeader']['TOMAG']; ?>">
                                <?php echo $wzDetails['wzHeader']['tomagname'];?>
                            </option>
                            <?php foreach($availableWarehouses as $warehouse): ?>
                            <option value="<?php echo $warehouse['code']; ?>">
                                <?php echo $warehouse['description']; ?>
                            </option>
                            <?php endforeach;?>
                        </select>
                    </form>
                </div>
            </td>
            <td>Nr zamówienia klienta</td>
            <td colspan="3">
                <form action="" method="post" id="submitChangeForm">
                    <input hidden type="text" value="<?php echo $wzDetails['wzHeader']['tempid'] ?>" name="tempid">
                    <input type="text" name="customerDocNo" class="submit--this" value="<?php echo $wzDetails['wzHeader']['CUSTOMERDOCNO']; ?>">
                </form>
            </td>
        </tr>
        <tr>
            <td rowspan="2" colspan="2">
                <h4>Fabryka Armatury <br>Hawle Spółka z o.o.</h4>
                <p>
                    ul. Piaskowa 9 <br>
                    62-028 Koziegłowy,<br>
                    Polska
                </p>
            </td>
            <td rowspan="2">
                <h4>
                Numer klienta:
                <?php echo $wzDetails['wzHeader']['SELLTO'];?>
                                    </h4>
            </td>
            <td>Data przyjęcia</td>
            <td colspan="3">2018-10-16</td>
        </tr>
        <tr>
            <td class="bg-info text-center"><b class="text-primary">Wprowadzone</b></td>
            <td>Uwagi</td>
            <td colspan="3" style="padding:0;margin:0;">
                <form action="" method="post" id="submitChangeForm">
                    <input hidden type="text" value="<?php echo $wzDetails['wzHeader']['tempid'] ?>" name="tempid">
                    <textarea style="padding:0;margin:0;" name="headerDesc" id="" class="submit--this" cols="40" rows="5"><?php echo rtrim(ltrim($wzDetails['wzHeader']['DESCRIPTION'])); ?></textarea>
                </form>

            </td>
        </tr>
        <tr>
            <th class="vert-aligned">Lp</th>
            <th class="vert-aligned">Kod twaru</th>
            <th class="vert-aligned">Opis</th>
            <th class="vert-aligned">Cecha</th>
            <th class="vert-aligned">Ilość</th>
            <th class="vert-aligned">Z magazynu</th>
            <th class="vert-aligned" colspan="2">Uwagi</th>
        </tr>
        <?php $lp=0;?>
        <?php foreach($wzDetails['wzLines'] as $line): ?>
        <?php $lp++; ?>
        <tr>
            <td class="vert-aligned">
                <?php echo $lp ?>
            </td>
            <td class="vert-aligned">
                <?php echo $line['ITEMCODE']; ?>
            </td>
            <td class="vert-aligned">
                <?php echo $line['DESCRIPTION']; ?>
            </td>
            <td class="vert-aligned">
                <?php echo $line['attribute']; ?>
            </td>
            <td class="vert-aligned">
                <?php echo $line['QUANTITY']; ?>
            </td>
            <td class="vert-aligned">
                <?php echo $line['REGIONALWAREHOUSECODE']; ?>
            </td>
            <td class="vert-aligned">
                <form action="" method="post" id="submitChangeForm">
                    <input hidden type="text" value="<?php echo $wzDetails['wzHeader']['tempid'] ?>" name="tempid">
                    <input hidden type="text" value="<?php echo $line['LINENO'] ?>" name="lineNo">
                    <textarea style="padding:0;margin:0;" name="lineDescription" id="" class="submit--this" cols="18" rows="2"><?php echo rtrim(ltrim($line['lineDesc'])); ?></textarea>
                </form>


            </td>
            <td class="vert-aligned">
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteQuestion<?php echo $line['LINENO']; ?>">
                    <i class="fas fa-times"></i>
                </button>
            </td>
            <!--            <td><?php #echo $line['DESCRIPTION']; ?></td>-->
        </tr>

        <!-- czy usunąć linię zamówienia? -->
        <div class="modal fade" id="deleteQuestion<?php echo $line['LINENO']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Czy usunąć pozycję ?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h4>
                            Kod towaru:
                            <?php echo $line['ITEMCODE']; ?>
                        </h4>
                        <h4>
                            Ilość:
                            <?php echo $line['QUANTITY']; ?>
                        </h4>
                    </div>
                    <div class="modal-footer">
                        <form action="" method="post">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Anuluj</button>
                            <input hidden type="text" name="dellineno" value="<?php echo $line['LINENO'];?>">
                            <input hidden type="text" value="<?php echo $wzDetails['wzHeader']['tempid'] ?>" name="tempid">
                            <input hidden type="text" name="deleteline" value="true">
                            <button type="submit" class="btn btn-danger">USUŃ!</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php endforeach;?>



        <tr>
            <td colspan="3" class="vert-aligned">
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteQuestion">
                    ANULUJ
                </button>
            </td>
            <td colspan="5" class="text-right" class="vert-aligned">
                <a href="<?php echo site_url('order/order_confirm/'.$wzDetails['wzHeader']['tempid']); ?>" class="btn btn-success btn-lg">POTWIERDŹ</a>
            </td>
        </tr>
    </table>
</div>

<!-- czy usunąć zamówienie? -->
<div class="modal fade" id="deleteQuestion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Czy usunąć zamówienie ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    Czy chcesz anulować aktualne zamówienie ?
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">NIE</button>
                <a href="<?php echo site_url('order/order_delete/'.$wzDetails['wzHeader']['tempid']); ?>" type="button" class="btn btn-danger">TAK</a>
            </div>
        </div>
    </div>
</div>







<!--
<form action="" method="get" id="submitChangeForm">
  <input type="checkbox" class="submit--this" name="p[]" value="1">
</form>

<form id="zmien">
  <input type="text" class="to" name="Search" value="Search" autocomplete="off" />
  <input type="submit" name="Search" value="Search" />
</form>
-->