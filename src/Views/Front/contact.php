
 <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Contactez-moi</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
            <?php if (isset($erreur)):
                if($erreur): 
                    foreach($erreur as $e):
                    ?>
                <p class="msg-error"><?= $e ?></p>
                <?php
                endforeach;

                endif;
            endif;
            ?>
            <?php if (isset($valide)):
                if($valide): 
                    
                    ?>
                <p class="msg-success"><?= $valide ?></p>
                <?php
                

                endif;
            endif;
            ?>
            
                <div class="col-lg-8 col-lg-offset-2">
                    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                    <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                    <form method="POST" action="contactPost#contact">
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label for="nom">Nom</label>
                                <input type="text" class="form-control" placeholder="Nom" id="nom" name="nom" value="<?php if(isset($nom)) echo htmlspecialchars($nom) ?>" required data-validation-required-message="Please enter your name.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label for="prenom">Prénom</label>
                                <input type="text" class="form-control" placeholder="Prenom" id="prenom" name="prenom" value="<?php if(isset($prenom)) echo htmlspecialchars($prenom) ?>" required data-validation-required-message="Please enter your name.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" placeholder="Email" id="email" name="email" value="<?php if(isset($email)) echo htmlspecialchars($email) ?>" required data-validation-required-message="Please enter your email address.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label for="confirmEmail">Confirmation Email</label>
                                <input type="email" class="form-control" placeholder="Confirmation Email" id="confirmEmail" name="confirmEmail" required data-validation-required-message="Please enter your email address.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label for="objet">Objet</label>
                                <input type="text" class="form-control" placeholder="objet" id="objet" name="objet" required data-validation-required-message="Please enter a message.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label for="message">Message</label>
                                <textarea rows="5" class="form-control" placeholder="Message" id="message" name="message" required data-validation-required-message="Please enter a message."></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <br>
                        <div id="success"></div>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <button type="submit" class="btn btn-success btn-lg">Envoyer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
