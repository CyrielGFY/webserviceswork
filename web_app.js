
var express = require('express');
var app = express();

var calendarcontroller = require('./cal/calendarcontroller');
app.use('/calendars', calendarcontroller);

module.exports = app;
