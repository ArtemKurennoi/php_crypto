<div class="container">
    <h1>Курс криптовалюты</h1>
    <div class="box">

        <!-- echo out the system feedback (error and success messages) -->
        <?php $this->renderFeedbackMessages(); ?>

        <table style="font-size: revert" id="crypt">
            <thead>
            <tr>
                <td>Монета</td>
                <td>Название</td>
                <td>Курс к доллару</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($this as $value){
                foreach ($value as $item){
            ?>
            <tr >
                <td ><?=$item[0]?> </td>
                <td ><?=$item[1]?> </td>
                <td ><?=(round($item[2],3))?> </td>
            </tr>
            <?php }
            }?>
            </tbody>
        </table>

    </div>
</div>