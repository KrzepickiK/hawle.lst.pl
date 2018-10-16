<div class="container">   
<table id="dataTable" class="table table-striped table-bordered table-hover" style="width:100%">
    <thead>
        <tr>
           <?php if($settings['lp']):?>
              <?php $lp=0;?>
               <th>Lp</th>
            <?php endif;?>
            <?php foreach($headings as $th): ?>
            <th><?php echo $th; ?></th>
            <?php endforeach;?>
            <th></th>
        </tr>
    </thead>
    <tbody>
       
        <?php foreach($rows as $row): ?>
        <?php $wzNo=$row['no'] ?>
        <?php $lp++; ?>
        <tr>
           <?php if($settings['lp']):?>
               <td><?php echo $lp; ?></td>
            <?php endif;?>
            
            <?php foreach($row as $cell):?>
            <td>
                <?php echo $cell; ?>
            </td>
            <?php endforeach;?>
            <td>
               <form action="<?php echo site_url('wz/wz_details'); ?>" method="post">
                <button class="btn btn-primary" name="wzno" value="<?php echo $wzNo ?>">Podgląd</button>
               </form>
            </td>
        </tr>
        <?php endforeach;?>
        
    </tbody>
    <?php if($settings['footerHeading']):?>
    <tfoot>
        <tr>
           <?php if($settings['lp']):?>
               <th>Lp</th>
            <?php endif;?>
            <?php foreach($headings as $th): ?>
            <th>
                <?php echo $th; ?>
            </th>
            <?php endforeach;?>
        </tr>
    </tfoot>
    <?php endif;?>
</table>
</div>