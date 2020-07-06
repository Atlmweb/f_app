<script src="https://js.paystack.co/v1/inline.js"></script>
<script>
    //const API_publicKey = '<?=$key;?>';//test
    const API_publicKey = 'pk_test_a628924cfe272a4f7c6830355d5661ea6ef28107';//test
    var eml = document.getElementById('email').value;
    var cur = document.getElementById('currency_code').value;
    var amt = document.getElementById('amount').value;
    var mid = document.getElementById('member_id').value;
    var loc = document.getElementById('result').value;
    var pur = document.getElementById('purpose').value;
    var p_id = document.getElementById('giving_cat_id').value;
    var pho = document.getElementById('phone').value;
    var refs = document.getElementById('ref').value +'-'+pur+'-'+p_id;
    var m = document.getElementById('alert');


    function payWithPaystack(){
        var handler = PaystackPop.setup({
            key: API_publicKey,
            email: eml,
            amount: amt,
            currency: 'NGN',
            ref: refs,
            metadata: {
                custom_fields: [
                    {
                        display_name: "Mobile Number",
                        variable_name: "mobile_number",
                        value: pho
                    }
                ]
            },
            callback: function(response){
                window.location.replace(loc);
                //alert('success. transaction ref is ' + response.reference);
            },
            onClose: function(){
                alert('window closed');
            }
        });
        handler.openIframe();
    }
</script>