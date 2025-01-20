
# Smart Charging App - Roadmap

## Overzicht
De Smart Charging App maakt het mogelijk om gegevens van de slimme meter uit te lezen (zoals energieverbruik), het laadproces te starten en stoppen via QR-codes, en een overzicht van het energieverbruik per locatie te bekijken. De admin heeft een dashboard met belangrijke statistieken.

## Fasen en Tijdlijn

### Fase 1: Project Setup
- Zet de ontwikkelomgeving op met **Laravel** voor zowel de backend als frontend.
- Maak de initiële projectstructuur aan.
- Configureer de **MySQL** database.
- Installeer en configureer **Laravel Breeze** voor eenvoudige authenticatie en gebruikersrollen (admin en klant).

### Fase 2: Gebruikersauthenticatie en Rollen
- Ontwikkel een eenvoudige loginpagina met Laravel Breeze.
- Implementeer gebruikersauthenticatie met behulp van de Laravel-database.
- Definieer de rollen van de gebruiker (admin en klant) met Laravel Breeze.
- Test de registratie, login en rolbeheerfunctionaliteit.

### Fase 3: Dashboard Ontwikkeling
- Creëer de lay-out voor het dashboard in **Laravel Blade**.
- Integreer de backend met de frontend om **laadsessies** en andere gegevens op te halen via API's.
- Toon de gegevens van het energieverbruik, zoals energie (kWh), kosten, en duur van de sessie.
- Zorg ervoor dat klanten en admin gebruikers toegang hebben tot verschillende dashboardfuncties.

### Fase 4: MQTT Integratie voor Slimme Meter
- Implementeer **MQTT**-functionaliteit in de backend van de Laravel-app om verbinding te maken met de slimme meter (Shelly 1PM Plus).
- Configureer de MQTT-client in Laravel voor real-time gegevensuitwisseling.
- Lees waarden uit zoals energieverbruik, spanning en stroom via de slimme meter.
- Toon de uitgelezen gegevens op het dashboard voor de klant (bijvoorbeeld kWh, kosten, etc.).

### Fase 5: QR Code Functionaliteit voor Laden Starten en Stoppen
- Genereer een **QR-code** voor elke outlet die verbonden is met de slimme meter.
- Klanten kunnen de QR-code scannen bij de slimme meter om het laden te starten en stoppen.
- Implementeer de mogelijkheid om het laadproces via de app te starten en te stoppen door het scannen van de QR-code.
- Zorg ervoor dat het laadproces stopt wanneer de klant dit via de app aangeeft.

### Fase 6: Overzicht van Laden op Locatie
- Maak een overzicht van de **laadsessies** per locatie beschikbaar voor klanten.
- Toon hoeveel energie er geladen is (in kWh), en de kosten op basis van het energieverbruik.
- Zorg ervoor dat klanten het overzicht van hun verbruik kunnen inzien, zowel in het dashboard als op hun profiel.

### Fase 7: Betaling Integratie
- Kies een betalingsgateway (bijv. Stripe of PayPal).
- Ontwikkel de betalingsverwerkingsfunctionaliteit.
- Integreer betalingsbevestiging en werk de laadsessie bij na succesvolle betaling.
- Test het betalingsproces voor zowel admin als klant.

### Fase 8: Admin Dashboard - Overzicht van Sockets en kWh
- Voeg op de homepage van het admin-dashboard een overzicht toe:
    - **Aantal Aangesloten Sockets**: Toon het aantal aangesloten sockets.
    - **Totaal Geconsumeerde kWh**: Toon de totale hoeveelheid geladen energie in kWh.
- Dit is voorlopig de enige weergave op de homepage voor de admin.

### Fase 9: Testen en Implementatie
- Voer unit- en integratietests uit voor alle functionaliteiten.
- Los geïdentificeerde bugs of problemen op.
- Bereid de app voor op productie (productiebouw).
- Zet de app in op een cloudservice (bijv. Heroku, AWS).

### Fase 10: Post-Lancering
- Monitor de prestaties van de app en verzamel gebruikersfeedback.
- Implementeer updates en nieuwe functies op basis van gebruikersverzoeken.
- Onderhoud de server en database.

## Mijlpalen
- **MVP Lancering:** Eind van Fase 6.
- **Gebruikersfeedback Verzameling:** Na de MVP-lancering.
- **Functieverbeteringen:** Start na het verzamelen van gebruikersfeedback.

## Conclusie
Deze bijgewerkte roadmap weerspiegelt de verandering van Firebase naar een eenvoudige Laravel-gebaseerde login en de nieuwe functionaliteiten zoals de admin-dashboard weergave van sockets en kWh. Laat me weten als er nog verdere aanpassingen nodig zijn!

