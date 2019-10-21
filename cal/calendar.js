var db = require('../db');

var calendar = {
    getcalendar: function(callback)
    {
        return db.query('SELECT * from webservices', callback);
    },
    createcalendar: function (Matiere, callback) {
        return db.query('Insert into webservices(evenement, date, lieu, importance) values(?, ?)',[webservices.evenement, webservices.date, webservices.lieu, webservices.importance], callback);
    }
}
