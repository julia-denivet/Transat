<html>
    <body>
    <main id="contact">
            <h1>CONTACTS</h1>
			<section id="contact_section_blanc">
				<form id="contact_form" method="post">
					<fieldset><legend>VOS COORDONNEES</legend>
                        <input type="text" id="nom" name="nom" tabindex="1" placeholder="NOM" required/>
                        <input type="text" id="prenom" name="prenom" tabindex="2" placeholder="PRENOM" required/>
						<input type="text" id="email" name="email" tabindex="3" placeholder="MAIL" required/>
					</fieldset>

					<fieldset><legend>VOTRE MESSAGE</legend>
                        <select  id="objet"  name="objet" tabindex="4" placeholder="OBJET"name="sujet" required>
                                <option value="sujet-1" selected>-Sujet-</option>
                                <option value="m">Médical</option>
                                <option value="j">Juridique</option>
                                <option value="s">Sociale</option>
                                <option value="a">Autres sujets</option>
                        </select>
						<textarea name="message" placeholder="MESSAGE" required></textarea>
                        <input type="submit" name="Valider" class="btn btn-primary button_valider"></input>
                    
					</fieldset>
				</form>
			</section>
		</main>
    </body>
</html>

