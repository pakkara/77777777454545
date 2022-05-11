


<div id="offcanvas-docs" data-uk-offcanvas="overlay: true">
  <div class="uk-offcanvas-bar">
    <button class="uk-offcanvas-close" type="button" data-uk-close></button>
    <h5 class="uk-margin-top">Contact us</h5>
    <ul class="uk-nav uk-nav-default doc-nav">
      <li class="uk-active"><a href="https://t.me/hyper_chats">Join Group</a></li>
      <li><a href="https://t.me/hyper_chats">Join Channel</a></li>
    </ul>
  
  </div>
</div>

<div id="offcanvas" data-uk-offcanvas="flip: true; overlay: true">
  <div class="uk-offcanvas-bar">
    <a class="uk-logo" href="index.html">Flex</a>
    <button class="uk-offcanvas-close" type="button" data-uk-close></button>
    <ul class="uk-nav uk-nav-primary uk-nav-offcanvas uk-margin-top uk-text-center">
      <li ><a href="./">Home</a></li>
      <li ><a href="./support">Support</a></li>
      <?php if($userLogged === false){ ?>
      <li>
        <div class="uk-navbar-item"><a class="uk-button uk-button-primary" href="contact.html">Login</a></div>
      </li>
      <?php } else { ?>
        <li>
        <div class="uk-navbar-item"><a class="uk-button uk-button-primary logoutbtn" href="./logout?seession_destroy=true">Logout</a></div>
      </li>

        <?php } ?>
    </ul>
    <div class="uk-margin-top uk-text-center">
      <div data-uk-grid class="uk-child-width-auto uk-grid-small uk-flex-center">
        <div>
          <a href="https://twitter.com/" data-uk-icon="icon: twitter" class="uk-icon-link" target="_blank"></a>
        </div>
        <div>
          <a href="https://www.facebook.com/" data-uk-icon="icon: facebook" class="uk-icon-link" target="_blank"></a>
        </div>
        <div>
          <a href="https://www.instagram.com/" data-uk-icon="icon: instagram" class="uk-icon-link" target="_blank"></a>
        </div>
        <div>
          <a href="https://vimeo.com/" data-uk-icon="icon: vimeo" class="uk-icon-link" target="_blank"></a>
        </div>
      </div>
    </div>
  </div>
</div>

<footer class="uk-section uk-text-center uk-text-muted">
	<div class="uk-container uk-container-small">
		<div>
			<ul class="uk-subnav uk-flex-center">
				<li><a href="./">Home</a></li>
				<li><a href="./support">Support</a></li>
				<li><a href="contact.html">Contact</a></li>
			</ul>
		</div>
		<div class="uk-margin-medium">
			<div data-uk-grid class="uk-child-width-auto uk-grid-small uk-flex-center">
				<div class="uk-first-column">
					<a href="https://twitter.com/" data-uk-icon="icon: twitter" class="uk-icon-link uk-icon" target="_blank"></a>
				</div>
				<div>
					<a href="https://www.facebook.com/" data-uk-icon="icon: facebook" class="uk-icon-link uk-icon"
						target="_blank"></a>
				</div>
				<div>
					<a href="https://www.instagram.com/" data-uk-icon="icon: instagram" class="uk-icon-link uk-icon"
						target="_blank"></a>
				</div>
				<div>
					<a href="https://vimeo.com/" data-uk-icon="icon: vimeo" class="uk-icon-link uk-icon" target="_blank"></a>
				</div>
			</div>
		</div>
		<div class="uk-margin-medium uk-text-small uk-link-muted">Crafted by <a  
				href="https://drifter.works/">HYPERBISWA</a></div>
	</div>
</footer>