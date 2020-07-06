
<!---->
<script src="https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script> <!--Live
<!--<script src="https://api.alphapay.live/apv1/api/alphaPay"></script> <!--Live -->
<!--<script src="https://ravesandboxapi.flutterwave.com/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>-->
<script>

    //const API_publicKey = 'FLWPUBK-87ba9ff57208bb9a4858536d929aa859-X';//test
    const API_publicKey = 'FLWPUBK-1beb6ca9cea567480a782f5f99294d64-X'; //live-nungua
	
    function payWithRave() {

           var pur = document.getElementById('giving_cat_id');
          //category name for description of what was given for
           var eml  = document.getElementById('email').value;
           var cur  = document.getElementById('currency_code').value;
           var amt  = document.getElementById('amount').value;
           var fn   = document.getElementById('first_name').value;
           var ln   = document.getElementById('last_name').value;
           var pho  = document.getElementById('phone').value;
           var loc  = document.getElementById('result').value;
           var m    = document.getElementById('alert'); //DOM element for txn status message
           var gdesc = pur.options[pur.selectedIndex].innerHTML;

           //for email purposes, needs refactoring

           var p_id = document.getElementById('giving_cat_id').value;


           var exp  = document.getElementById('expectation').value;

           //ref should directly come from form
           var ref  = document.getElementById('ref').value +'-'+p_id+'-'+gdesc+'-'+exp;

           //meta information






           if(cur ==='GHS'){
               var nation = 'GH';
           } else {
               var nation = 'NG';
           }




           var x = getpaidSetup({
               PBFPubKey: API_publicKey,
               customer_email: eml,
               amount: amt,
               country: nation,
               currency: cur,
               txref: ref,
               redirect_url:loc,
               custom_description:'Thank you for sowing into the gospel',
               custom_logo: 'https://loveworldims.org/assets/img/grow_pay.png',
               customer_phone: pho,
               customer_firstname: fn,
               customer_lastname: ln,
               onclose: function(){},
               callback: function(response) {
                   var txref = response.tx.txRef; // collect txRef returned and pass to a server page to complete status check.
                   console.log("This is the response returned after a charge", response);
                   console.log(fn);
                   if (response.tx.chargeResponseCode =='00' || response.tx.chargeResponseCode == "0") {
                      m.innerHTML= '<?php echo ('<span class="text-success">Payment successful Redirecting, please wait...</span>');?>';


                   } else {
                       m.innerHTML= '<?php echo ('<span class="text-danger">Transaction error, pls retry</span>');?>';
                   }

                   x.close(); // use this to close the modal immediately after payment.


               }
           });
       }
</script>