$('.datepicker').pickadate({
    //création de la liste déroulante pour les mois
    selectMonths: true,
    //création d'une liste déroulante sur 120 années
    selectYears: 120,
    labelMonthNext: 'Mois suivant',
    labelMonthPrev: 'Mois précédent',
    labelMonthSelect: 'Selectionner le mois',
    labelYearSelect: 'Selectionner une année',
    monthsFull: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
    monthsShort: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
    weekdaysFull: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
    weekdaysShort: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
    weekdaysLetter: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S'],
    //Permet de définir la date maximal du datepicker, ici 13 ans en arrière par rapport à aujourd'hui
    min: -365 * 120,
    max: -365 * 15,
    today: '',  
    clear: 'Réinitialiser',
    close: 'Fermer',
    //Permet de défnir la date afficher dans l'input correspondant.
    format: 'dd/mm/yyyy',
    //à "false" indique que lorsqu'une date est sélectionner le datepicker ne se ferme pas
    closeOnSelect: false, 
});