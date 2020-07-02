<?php echo form_open('register',['method'=>'post','class'=>'cd-form']);?>
<span id="alert"></span>
<?php msg()//TODO make church id read from config file?>








<?php $f = explode(' ',$_SESSION['logged_in']['name'],3);
$phone = $_SESSION['logged_in']['phone'];
$member = $_SESSION['logged_in']['phone'];
$first = $f[0].' '.$f[1]; $last = $f[2];

?>
    <p class="fieldset">
        <select id="currency_code" name="currency" class="selectpicker bootstrap-select table-bordered">
            <option value="GHS">GHS</option>
            <option value="NGN">NGN</option>
            <option value="USD">USD</option>
            <option value="GBP">GBP</option>
            <option value="EUR">EUR</option>
        </select>
    </p>

    <p class="fieldset">

        <label class="image-replace cd-password" for="signup-password">Amount</label>
        <input id="amount" name="amount" class="full-width has-padding has-border" id="signup-password" type="text" placeholder="Amount" required>
    </p>

    <p class="fieldset">

        <?php
        $q = ask_db('cat_id,cat_name','ff_giving_cat');
        ?>
        <select id="giving_cat_id" name="title" class="selectpicker bootstrap-select table-bordered" required>

            <option value=""><?php echo lang('Front.select_cat');?></option>

            <?php foreach ($q as $key => $val) {
                echo '<option value="'.$val['cat_id'].'">'.$val['cat_name'].'</option>';
            }?>

        </select>
    </p>


    <p class="fieldset">
        <label class="image-replace cd-email" for="signup-email">Expectations/Desired harvest/Testimony</label>
        <textarea id="expectation" name="expectation" rows="4" style="width: 100%; border-color: #d8d8d8" placeholder="Expectations/Desired harvest/Testimony" class="full-width has-padding has-border"></textarea>

    </p>
<p class="fieldset">
    <input type="hidden" id="church_id" name="church_id" value="237">
    <input type="hidden" id="user_id" name="user_id" value="'.<?php echo $_SESSION['logged_in']['user_id']?>.'">
    <input type="hidden" id="first_name" name="first_name" value="<?=$first?>">
    <input type="hidden" id="last_name" name="last_name" value="<?=$last?>">
    <input type="hidden" id="phone" name="phone" value="<?=$phone?>">
    <input type="hidden" id="result" name="result" value="https://live.christembassynungua.org/home/process_seeds">
<!--    <input type="hidden" id="result" name="result" value="http://localhost:8888/f_app/public/home/process_seeds">-->
    <input type="hidden" id="ref" name="result" value="<?php echo $_SESSION['logged_in']['user_id']?>">


</p>


</p>

<p class="fieldset">
    <label class="image-replace cd-username">Full name</label>
    <input class="full-width has-padding has-border" type="text" name="first_name" placeholder="First Name" autocomplete="off" value="<?=$title?>" required>

</p>
<p class="fieldset">
    <label class="image-replace cd-email" for="signup-email">E-mail</label>
    <input id="email" name="email_address" class="full-width has-padding has-border" id="signup-email" type="email" placeholder="E-mail" value="<?php echo $_SESSION['logged_in']['email']?>" required>
</p>







</form>
</div>
<div class="modal-footer">
    <p class="fieldset">
        <button class="btn btn-blue btn-effect" type="submit" onClick="payWithRave()" value="Create account" style="background-color: dodgerblue" ><i class="fa fa-credit-card"></i> Pay with Card or Momo</button>
        <button class="btn btn-blue btn-effect" data-dismiss="modal" type="submit" value="Create account" style="background-color: dodgerblue" >Cancel</button>
    </p>

</div>


<?php echo $this->include('gateways/flutterwave')?>