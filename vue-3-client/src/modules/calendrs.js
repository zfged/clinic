
$("#calendar-1").ionCalendar({
    lang: "ru",
    sundayFirst: false,
    years: "2010-2025",
    format: "YYYY-MM-DD",
    onClick: function(date){

        window.localStorage.setItem("scheduledate",date);
        genschedule(date,window.localStorage.getItem('selectClub'));
        ShowGraph()
    }
});

$("#calendar-2").ionCalendar({
    lang: "ru",
    startDate: "2021-01-01",
    sundayFirst: false,
    years: "2010-2025",
    format: "YYYY-MM-DD",
    onClick: function(date){
        alert(date)
    }
});
$("#calendar-3").ionCalendar({
    lang: "ru",
    startDate: "2021-02-01",
    sundayFirst: false,
    years: "2010-2025",
    format: "YYYY-MM-DD",
    onClick: function(date){
        alert(date)
    }
});
$("#calendar-4").ionCalendar({
    lang: "ru",
    startDate: "2021-02-01",
    sundayFirst: false,
    years: "2010-2025",
    format: "YYYY-MM-DD",
    onClick: function(date){
        alert(date)
    }
});
$("#calendar-5").ionCalendar({
    lang: "ru",
    startDate: "2021-02-01",
    sundayFirst: false,
    years: "2010-2025",
    format: "YYYY-MM-DD",
    onClick: function(date){
        alert(date)
    }
});
$("#calendar-6").ionCalendar({
    lang: "ru",
    sundayFirst: false,
    years: "2010-2025",
    format: "YYYY-MM-DD",
    onClick: function(date){
        window.localStorage.setItem("scheduledate",date);
        staffworklist();
        getnameclub()
    }
});
