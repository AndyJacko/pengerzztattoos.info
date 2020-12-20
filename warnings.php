<?php if(!isset($_COOKIE['pengeucookie'])) { ?>
<script type="text/javascript">
function SetCookie(c_name,value,expiredays) {
var exdate=new Date()
	exdate.setDate(exdate.getDate()+expiredays)
	document.cookie=c_name+ "=" +escape(value)+";path=/"+((expiredays==null) ? "" : ";expires="+exdate.toGMTString())
}
</script>
<?php } ?>
<?php 
if(!isset($_COOKIE['pengeucookie']))
{ ?>
<div id="eucookielaw" class="container-fluid">
  <div class="row">
    <div class="col-md-8 offset-md-2">
      <p class="text-center">We use cookies to ensure that we give you the best experience on our website. If you continue to use this site we will assume that you are happy with it.&nbsp;&nbsp;<br class="d-lg-none"><br class="d-lg-none"><a id="removecookie" class="btn btn-outline-primary btn-sm">OK</a></p>
    </div>
  </div>
</div>
<script type="text/javascript">
	if(document.cookie.indexOf("pengeucookie") ===-1 ){
		$("#eucookielaw").show();
	}	
    $("#removecookie").click(function () {
		SetCookie('pengeucookie','pengeucookie',365*10)
      $("#eucookielaw").remove();
    });
</script>
<?php } ?>