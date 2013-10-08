#Use cases

* Skapa en ny medlem med namn, personnummer och unikt medlemsnummer skall genereras.
* Lista alla medlemmar på två sätt:
** “kompakt lista”; med namn, medlemsnummer och antal båtar
** “fullständig lista”; med namn, personnummer, medlemsnummer och båtar med båtinformation.
* Ta bort en medlem
* Ändra en medlems uppgifter
* Titta på en specifik medlems uppgifter
* Registrera en ny båt på en medlem med båttyp (Segelbåt, Motorseglare, Motorbåt, Kajak/Kanot, Övrigt) och längd
* Ta bort en båt
* Ändra en båt
* Persistens (dvs registret skall sparas och laddas t.ex. från en textfil)
* Strikt Model-Vy separation (d.v.s. Modellen skall ej innehålla några som helst kopplingar till vyn, eller användargränssnittet)
* God kodkvalité (t.ex. konsekvent kodstandard, ingen kodduplicering)
* Objektorienterad Design och Implementation (t.ex. Objekt kopplas samman med associationer inte med text eller sifferbaserade nycklar)
* Enkel felhantering. Applikationen ska inte krascha vid felaktig inmatning men det behövs ingen användarvänlig felhantering.