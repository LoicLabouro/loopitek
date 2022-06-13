</body>
	<section>
		<div class="font">
			<footer>
				<div class="container">
					<div class="grey">
						<div class="row">
							<div class="col-md-2">
								<img src="" class="logo rounded-circle">					
							</div>
							<div class="col-md-3">
								<span class="font1"><h6 class="titre6">Loopitek, la nouveauté à l'état brute</h6></span>
								<p><img src="Vue/img/phone.png"> 04 71 04 04 04</p>
								<p><img src="Vue/img/mail.png"> <a href="mailto:contact@musiqueDJ.com"> contact@Loopitek.com</a></p>	
							</div>
							<div class="col-md-3">
								<span class="font1"><h6 class="titre6">Plan du site</h6></span>
								<ul class="ulfooter">
									<li><a href="index.php?page=Controler&param=Accueil">Accueil</a></li>
									<li><a href="index.php?page=Controler&param=Galerie">Galerie</a></li>
									<li><a href="index.php?page=Controler&param=Trance">Trance</a></li>
									<li><a href="index.php?page=Controler&param=Raggatek">Raggatek</a></li>
									<li><a href="index.php?page=Controler&param=Frenchcore">Frenchcore</a></li>
									<li><a href="index.php?page=Controler&param=Hardstyle">Hardstyle</a></li>
									<li><a href="index.php?page=Controler&param=Electro">Electro</a></li>
									<li><a href="index.php?page=Controler&param=Entree">Connexion</a></li>
								</ul>
							</div>
							<div class="col-md-4">
								<span class="font1"><h6 class="titre6">Suivez nous</h6></span>
									<img src="Vue/img/twitter.png">
									<img src="Vue/img/fb.png">
									<img src="Vue/img/yt.png">
									<img src="Vue/img/insta.png">
							</div>
						</div>
					</div>	
				</div>
				<div class="container-fluid copyright">
					<div class="row">
						<div class="col">
							<p align="center">2L @Droits d'auteur réservés</p>	
						</div>
						<div class="col">
							<ul class="ulcopyright">
								<li><a href="#">Loopitek.com</a></li>
								<li><a href="#">A propos</a></li>
								<li><a href="#">Blog musique</a></li>
								<li><a href="#">FAQ</a></li>
								<li><a href="#">Contactez nous</a></li>
							</ul>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</section>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!-- js pour la galerie-->
<script>
    let modalId = $('#image-gallery');
    $(document)
        .ready(function () {

            loadGallery(true, 'a.thumbnail');

            //This function disables buttons when needed
            function disableButtons(counter_max, counter_current) {
                $('#show-previous-image, #show-next-image')
                    .show();
                if (counter_max === counter_current) {
                    $('#show-next-image')
                        .hide();
                } else if (counter_current === 1) {
                    $('#show-previous-image')
                        .hide();
                }
            }
            /**
             *
             * @param setIDs        Sets IDs when DOM is loaded. If using a PHP counter, set to false.
             * @param setClickAttr  Sets the attribute for the click handler.
             */
            function loadGallery(setIDs, setClickAttr) {
                let current_image,
                    selector,
                    counter = 0;
                $('#show-next-image, #show-previous-image')
                    .click(function () {
                        if ($(this)
                            .attr('id') === 'show-previous-image') {
                            current_image--;
                        } else {
                            current_image++;
                        }

                        selector = $('[data-image-id="' + current_image + '"]');
                        updateGallery(selector);
                    });
                function updateGallery(selector) {
                    let $sel = selector;
                    current_image = $sel.data('image-id');
                    $('#image-gallery-title')
                        .text($sel.data('title'));
                    $('#image-gallery-image')
                        .attr('src', $sel.data('image'));
                    disableButtons(counter, $sel.data('image-id'));
                }
                if (setIDs == true) {
                    $('[data-image-id]')
                        .each(function () {
                            counter++;
                            $(this)
                                .attr('data-image-id', counter);
                        });
                }
                $(setClickAttr)
                    .on('click', function () {
                        updateGallery($(this));
                    });
            }
        });
    // build key actions
    $(document)
        .keydown(function (e) {
            switch (e.which) {
                case 37: // left
                    if ((modalId.data('bs.modal') || {})._isShown && $('#show-previous-image').is(":visible")) {
                        $('#show-previous-image')
                            .click();
                    }
                    break;
                case 39: // right
                    if ((modalId.data('bs.modal') || {})._isShown && $('#show-next-image').is(":visible")) {
                        $('#show-next-image')
                            .click();
                    }
                    break;

                default:
                    return; // exit this handler for other keys
            }
            e.preventDefault(); // prevent the default action (scroll / move caret)
        });
</script>
<!-- script input fike -->
<script>
    $(function() {

        // We can attach the `fileselect` event to all file inputs on the page
        $(document).on('change', ':file', function() {
            var input = $(this),
                numFiles = input.get(0).files ? input.get(0).files.length : 1,
                label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
            input.trigger('fileselect', [numFiles, label]);
        });

        // We can watch for our custom `fileselect` event like this
        $(document).ready( function() {
            $(':file').on('fileselect', function(event, numFiles, label) {

                var input = $(this).parents('.input-group').find(':text'),
                    log = numFiles > 1 ? numFiles + ' files selected' : label;

                if( input.length ) {
                    input.val(log);
                } else {
                    if( log ) alert(log);
                }

            });
        });
</script>
</html>