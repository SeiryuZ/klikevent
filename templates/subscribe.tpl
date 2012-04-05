{include file="header.tpl" title="Klikevent.com" jquery="true"  }

<div class="hero-unit">
	<h1>Subscribe to Us!</h1>
	<p>We will send you all goodness of KlikEvent directly to your email inbox.</p>
	<form action="process-subscribe.php" method="post">
		<div class="control-group">
          	<div class="controls">
            	<input type="text" placeholder="Your Email Here" class="subscribe-input" name="email" id="input01" size="30">
        	</div>
    	</div>
    	<button class="btn-large btn-primary text-center" onClick="javascript: processSubscribe();">Subscribe</button>
    	<div class=" add-top {if $res == 'er' || $res  == 'be'} alert-error {elseif $res == 'ok'} alert-success {/if}">
    		{if $res == 'er'}
    		<a class="close" data-dismiss="alert">x</a>
    		<h3 class="alert-heading">Error</h3>
    		Mohon Maaf, ada masalah dengan website kami
    		{elseif $res == 'be'}
    		<a class="close" data-dismiss="alert">x</a>
    		<h3 class="alert-heading">Email tidak valid</h3>
    		 Coba sekali lagi
    		{elseif $res == 'ok'}
    		<a class="close" data-dismiss="alert">x</a>
    		<h3 class="alert-heading">Sukses!</h3>
    		Email anda sudah dimasukan ke database kami
    		{/if}
    	</div>
	</form>
</div>

<hr/>

{include file="footer.tpl"}