const reservedDates = ['2025-02-10', '2025-02-15', '2025-02-20'];

  flatpickr("#bday", {
    disable: reservedDates.map(date => new Date(date)),
    dateFormat: "Y-m-d",
    locale: "fr"
  });


