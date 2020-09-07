<html> 

<form >
  <script src="https://js.paystack.co/v1/inline.js"></script>
  <script type="text/javascript">
   var amount = "<?php echo $_REQUEST['amount']; ?>";
   var ref = "<?php echo $_REQUEST['ref']; ?>";
   var email = "<?php echo $_REQUEST['email']; ?>";
   var membership_number = "<?php echo $_REQUEST['membership_number']; ?>";
   var invoice_number = "<?php echo $_REQUEST['invoice_number']; ?>";
</script>

  <button type="button" onclick="payWithPaystack(amount,ref,email,membership_number,invoice_number)">Make Payment</button> 
</form>
 
<script>
  function payWithPaystack(amount,ref,email,membership_number,invoice_number){
    var handler = PaystackPop.setup({
      key: 'pk_live_5700e72ac96f8aafda7af34e76b1dcfd1b6ec8b2',
      email: email,
      amount: amount,
      ref: ref,
      metadata: {
         custom_fields: [
            {
                display_name: "Membership Number",
                variable_name: "membership_number",
                value: membership_number
            },
			 {
                display_name: "Invoice Number",
                variable_name: "invoice_number",
                value: invoice_number
            },
			{
                display_name: "Order Number",
                variable_name: "order_number",
                value: ref
            }
         ]
      },
      callback: function(response){
          alert('success. transaction ref is ' + response.reference);
      },
      onClose: function(){
          alert('window closed');
      }
    });
    handler.openIframe();
  }
</script>



</html>