
$(function () {
  $(".datepickerBirthday").datepicker({
    clearBtn: true,
    format: 'DD dd MM yyyy',
    language: "fr",
    orientation: "bottom right",
    autoclose: true,
    todayHighlight: true,
    datesDisabled: ['11/06/2017', '11/21/2017'],
    toggleActive: true,
    defaultViewDate: { year: 1977, month: 04, day: 25 }
  });

});
