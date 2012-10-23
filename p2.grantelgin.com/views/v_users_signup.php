<form method="POST" action="/users/p_signup">

  
	<br><br>
	First Name<br>
	<input type="text" name="first_name">
	<br><br>
	
	Last Name<br>
	<input type="text" name="last_name">
	<br><br>

	Email<br>
	<input type="text" name="email">
	<br><br>

	Password<br>
	<input type="password" name="password">
	<br><br>

	<input type="submit">
	<br><br>

<!-- START: Livefyre Embed -->
<div id="livefyre-comments"></div>
<script type="text/javascript" src="http://zor.livefyre.com/wjs/v3.0/javascripts/livefyre.js"></script>
<script type="text/javascript">
(function () {
    var articleId = fyre.conv.load.makeArticleId(null);
    fyre.conv.load({}, [{
        el: 'livefyre-comments',
        network: "livefyre.com",
        siteId: "314846",
        articleId: articleId,
        signed: false,
        collectionMeta: {
            articleId: articleId,
            url: fyre.conv.load.makeCollectionUrl(),
        }
    }], function() {});
}());
</script>
<!-- END: Livefyre Embed -->
</form>