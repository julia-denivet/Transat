<html>
    <body>
    <main id="contact">
            <h1>CONTACTS</h1>
			<section id="contact_section_blanc">
				<form id="contact_form" method="post">
					<fieldset><legend>Vos coordonnées</legend>
                        <input type="text" id="nom" name="nom" tabindex="1" placeholder="Nom" required/>
                        <input type="text" id="prenom" name="prenom" tabindex="2" placeholder="Prenom" required/>
						<input type="text" id="email" name="email" tabindex="3" placeholder="Mail" required/>
					</fieldset>

					<fieldset><legend>Votre message</legend>
                        <select  id="objet"  name="objet" tabindex="4" placeholder="OBJET"name="sujet" required>
                                <option value="sujet-1" selected>-Sujet-</option>
                                <option value="m">Médical</option>
                                <option value="j">Juridique</option>
                                <option value="s">Sociale</option>
                                <option value="a">Autres sujets</option>
                        </select>
						<textarea name="message" placeholder="Message" required></textarea>
                        <input type="submit" name="Valider" class="button_valider"></input>
                    
					</fieldset>
				</form>
			</section>
		</main>
    </body>
</html>

