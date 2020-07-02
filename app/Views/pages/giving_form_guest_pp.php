<?php echo form_open('#',['method'=>'post','class'=>'cd-form']);?>
<span id="alert"></span>

    <p class="fieldset">
        <input type="hidden" id="church_id" name="church_id" value="237">
        <input type="hidden" id="user_id" name="user_id" value="1">

        <input type="hidden" id="result" name="result" value="https://live.christembassynungua.org/home/thank_you">
        <input type="hidden" id="ref" name="result" value="1">


    </p>

    <p class="fieldset">
        <input type="text" class="full-width has-padding has-border" id="first_name" name="first_name" value="" placeholder="First Name">
    </p>

    <p class="fieldset">
        <input type="text" class="full-width has-padding has-border" id="last_name" name="last_name" value="" placeholder="Last Name">
    </p>

    <p class="fieldset">
        <input type="text" class="full-width has-padding has-border" id="phone" name="phone" value="" placeholder="Phone">
    </p>


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

            <option value="project_perfection">Project Perfection</option>



        </select>
    </p>


    <p class="fieldset">
        <label class="image-replace cd-email" for="signup-email">Expectations/Desired harvest/Testimony</label>
        <textarea id="expectation" name="expectation" rows="4" style="width: 100%; border-color: #d8d8d8" placeholder="Expectations/Desired harvest/Testimony" class="full-width has-padding has-border"></textarea>

    </p>



</p>


<p class="fieldset">
    <label class="image-replace cd-email" for="signup-email">E-mail</label>
    <input id="email" name="email_address" class="full-width has-padding has-border" id="signup-email" type="email" placeholder="E-mail" value="" required>
</p>







</form>
</div>
<div class="modal-footer">
    <p class="fieldset">
        <button class="btn btn-blue btn-effect" type="submit" onClick="payWithRave()" value="Create account" style="background-color: dodgerblue" ><i class="fa fa-credit-card"></i> Pay with Card or Momo</button>
        <button class="btn btn-blue btn-effect" data-dismiss="modal" type="submit" value="Create account" style="background-color: dodgerblue;  margin-right: 5px" >Cancel</button>
    </p>

</div>


<?php echo $this->include('gateways/flutterwave')?>