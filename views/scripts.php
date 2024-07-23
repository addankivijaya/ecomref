
    <script type="text/javascript">
     function changeqty(id,qty)
     {
		    //var valu = parseInt($("#qty"+qty).html(),10);
		    var valu = $("#qty"+qty).text();
        if(valu > 100)
        {
          alert("Quantity Should not be more than 100.");
          var op = 1;
          jQuery(".value").text(op);
          location.reload();
        }
        else if(valu <= 0)
        {
          alert("Quantity Should not be zero or less than Zero.");
          var op = 1;
          jQuery(".value").text(op);
          location.reload();
        }
        else
        {
        jQuery.ajax({
           type: "POST",
           url: '<?php echo site_url();?>cart/updatecart',
           data: "valu="+valu+"&id="+id,
           complete: function(data)
           {
             var op = data.responseText.trim();
             jQuery("#cartid").html(op);
           }
        });
      }
	}
    function deletecartcheckout(valu)
    {
      jQuery.ajax({
         type: "POST", url: '<?php echo site_url();?>cart/deletecart', data: "valu="+valu,
         complete: function(data){
            var op = data.responseText.trim();
           jQuery("#cartid").html(op);
         }
     });
  }
</script>

<script type="text/javascript">
  /*function addtocart(valu)
	{ 
        var quantity = parseInt($(".value1").text(),10);
        $.ajax({
            type: "POST",
            url: '<?php echo site_url();?>cart/insertcart',
            data: "quantity="+quantity+"&valu="+valu,
            complete: function(data)
            {
                var op = data.responseText.trim();
                $("#cartdivid").html(op);
				        $("#ccr").notify("Cart Added","success", { position:"left" });
            }
        });
    }*/
</script>

<script type="text/javascript">
  function remove_effect(valu)
  {
    var size1 = $("#idsz"+valu).val();
    if(size1 == 0)
    {
      $("#iid"+valu).html("<span style='padding:4px;font-size:13px;background-color:#E23525; border-radius: 25px;color:#fff;text-align:center'>select Size</span>");
    } else
    {
      $("#iid"+valu).empty();
    }
  }
  
</script>

<script type="text/javascript">
  function addcart(valu)
  {
    var quantity = 1;
    var size     = $("#idsz"+valu).val();
    if(size == "" || size == 0)
    {
      $("a#changeme"+valu).prop('href','##');
      $("#iid"+valu).html("<span style='padding:4px;font-size:13px;background-color:#E23525; border-radius: 25px;color:#fff;text-align:center'>select Size</span>");
      $("#idsz"+valu).focus();
      return false;
    } else
    {
      $.ajax({
        type: "POST",
        url : '<?php echo site_url();?>cart/insertcart',
        data: "quantity="+quantity+"&valu="+valu+"&size="+size,
        beforeSend:function()
        {
          $("#iid"+valu).html("");
          $("a#changeme"+valu).prop('href','#');
        },
        complete: function(data)
        {
          var op = data.responseText.trim();
          //alert(op);
          $("#cartdivid").html(op);
          $("#ccr").notify("Cart Added","success", { position:"left" });
        }
      });
    }
  }
</script>


<script type="text/javascript">
  function addtocart(valu)
  {
    var quantity = parseInt($(".value1").text(),10);
    var size     = $("#idszu"+valu).val();
    //alert(size);
    if(size == "" || size == 0)
    {
      $("a#changemeu"+valu).prop('href','##');
      $("#iidu"+valu).html("<span style='padding-top:5px;margin-top:6px;padding-bottom:5px;background-color:#eaecea;border-radius:10px;font-size:9px;color:red;margin-top:10px;'><b>Please select Size<b></span>");
      $("#idszu"+valu).focus();
      return false;
    } else
    { 
      $.ajax({
        type: "POST",
        url : '<?php echo site_url();?>cart/insertcart',
        data: "quantity="+quantity+"&valu="+valu+"&size="+size,
        beforeSend:function()
        {
          $("#iidu"+valu).html("");
          $("a#changemeu"+valu).prop('href','#');
        },
        complete: function(data)
        {
          //alert(data);
          var op = data.responseText.trim();
          $("#cartdivid").html(op);
          $("#ccr").notify("Cart Added","success", { position:"left" });
        }
      });
    }
  }
</script>

<script type="text/javascript">
function deleteheadcart(valu)
{
  $.ajax({
     type: "POST", url: '<?php echo site_url();?>cart/deleteheadcart', data: "valu="+valu,
     complete: function(data)
     {
      var op = data.responseText.trim();
      $("#cartdivid").html(op);
     }
   });
}
</script>

<script type="text/javascript">
function deletecart(valu)
{
  $.ajax({
     type: "POST", url: '<?php echo site_url();?>cart/deletecart', data: "valu="+valu,
     complete: function(data)
     {
      var op = data.responseText.trim();
      $("#cartdivid").html(op);
     }
   });
}
</script>
<script>
setTimeout(function() {
 $('.checkout-empty').fadeOut("slow");
}, 3000);
</script>

<script>
    $(document).ready(function(){
        // Add minus icon for collapse element which is open by default
        $(".collapse.in").each(function(){
          $(this).siblings(".panel-heading").find(".glyphicon").addClass("glyphicon-minus").removeClass("glyphicon-plus");
        });
        // Toggle plus minus icon on show hide of collapse element
        $(".collapse").on('show.bs.collapse', function(){
          $(this).parent().find(".glyphicon").removeClass("glyphicon-plus").addClass("glyphicon-minus");
        }).on('hide.bs.collapse', function(){
          $(this).parent().find(".glyphicon").removeClass("glyphicon-minus").addClass("glyphicon-plus");
        });
    });
</script>
