<style>
    .fc-calendar-container {
        position: relative;
        height: 400px;
        width: 400px;
    }

    .fc-calendar {
        width: 100%;
        height: 100%;
    }

    .fc-calendar .fc-head {
        height: 30px;
        line-height: 30px;
        background: #ccc;
        color: #fff;
    }

    .fc-calendar .fc-body {
        position: relative;
        width: 100%;
        height: 100%;
        height: -moz-calc(100% - 30px);
        height: -webkit-calc(100% - 30px);
        height: calc(100% - 30px);
        border: 1px solid #ddd;
    }

    .fc-calendar .fc-row {
        width: 100%;
        border-bottom: 1px solid #ddd;
    }

    .fc-four-rows .fc-row  {
        height: 25%;
    }

    .fc-five-rows .fc-row  {
        height: 20%;
    }

    .fc-six-rows .fc-row {
        height: 16.66%;
        height: -moz-calc(100%/6);
        height: -webkit-calc(100%/6);
        height: calc(100%/6);
    }

    .fc-calendar .fc-row > div,
    .fc-calendar .fc-head > div {
        float: left;
        height: 100%;
        width:  14.28%; /* 100% / 7 */
        width: -moz-calc(100%/7);
        width: -webkit-calc(100%/7);
        /*width: calc(100%/7);*/
        position: relative;
    }

    /* IE 9 is rounding up the calc it seems */
    .ie9 .fc-calendar .fc-row > div,
    .ie9 .fc-calendar .fc-head > div {
        width:  14.2%;
    }

    .fc-calendar .fc-row > div {
        border-right: 1px solid #ddd;
        padding: 4px;
        overflow: hidden;
        position: relative;
    }

    .fc-calendar .fc-head > div {
        text-align: center;
    }

    .fc-calendar .fc-row > div > span.fc-date {
        position: absolute;
        width: 30px;
        height: 20px;
        font-size: 20px;
        line-height: 20px;
        font-weight: 700;
        color: #ddd;
        text-shadow: 0 -1px 0 rgba(255,255,255,0.8);
        bottom: 5px;
        right: 5px;
        text-align: right;
    }

    .fc-calendar .fc-row > div > span.fc-weekday {
        padding-left: 5px;
        display: none;
    }

    .fc-calendar .fc-row > div.fc-today {
        background: #fff4c3;
    }

    .fc-calendar .fc-row > div.fc-out {
        opacity: 0.6;
    }

    .fc-calendar .fc-row > div:last-child,
    .fc-calendar .fc-head > div:last-child {
        border-right: none;
    }

    .fc-calendar .fc-row:last-child {
        border-bottom: none;
    }

    /* Custom calendar elements */

    .custom-calendar-wrap {
        margin: 10px auto;
        position: relative;
        overflow: hidden;
    }

    .custom-inner {
        background: #fff;
        box-shadow: 0 1px 3px rgba(0,0,0,0.2);
    }

    .custom-inner:before,
    .custom-inner:after  {
        content: '';
        width: 99%;
        height: 50%;
        position: absolute;
        background: #f6f6f6;
        bottom: -4px;
        left: 0.5%;
        z-index: -1;
        box-shadow: 0 1px 3px rgba(0,0,0,0.2);
    }

    .custom-inner:after {
        content: '';
        width: 98%;
        bottom: -7px;
        left: 1%;
        z-index: -2;
    }

    .custom-header {
        background: #fff;
        padding: 5px 10px 10px 10px;
        position: relative;
        border-top: 5px solid #B61117;
        border-bottom: 1px solid #ddd;
    }

    .custom-header h2,
    .custom-header h3 {
        text-align: center;
        text-transform: uppercase;
    }

    .custom-header h2 {
        color: #495468;
        font-weight: 300;
        font-size: 18px;
        margin-top: 10px;
        margin-bottom: 0px;
    }

    .custom-header h3 {
        margin-top: 0;
        font-size: 10px;
        font-weight: 700;
        color: #b7bbc2;
    }

    .custom-header nav span {
        position: absolute;
        top: 17px;
        width: 30px;
        height: 30px;
        color: transparent;
        cursor: pointer;
        margin: 0 1px;
        font-size: 20px;
        line-height: 30px;
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        -khtml-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    .custom-header nav span:first-child {
        left: 5px;
    }

    .custom-header nav span:last-child {
        right: 5px;
    }

    .custom-header nav span:before {
        font-family: 'fontawesome-selected';
        color: #B61117;
        position: absolute;
        text-align: center;
        width: 100%;
    }

    .custom-header nav span.custom-prev:before {
        content: '\25c2';
    }

    .custom-header nav span.custom-next:before {
        content: '\25b8';
    }

    .custom-header nav span:hover:before {
        color: #495468;
    }

    .custom-content-reveal {
        background: #f6f6f6;
        background: rgba(246, 246, 246, 0.9);
        width: 100%;
        height: 100%;
        position: absolute;
        z-index: 100;
        top: 100%;
        left: 0px;
        text-align: center;
        -webkit-transition: all 0.6s ease-in-out;
        -moz-transition: all 0.6s ease-in-out;
        -o-transition: all 0.6s ease-in-out;
        -ms-transition: all 0.6s ease-in-out;
        transition: all 0.6s ease-in-out;
    }

    .custom-content-reveal span.custom-content-close {
        position: absolute;
        top: 15px;
        right: 10px;
        width: 20px;
        height: 20px;
        text-align: center;
        background: #B61117;
        box-shadow: 0 1px 1px rgba(0,0,0,0.1);
        cursor: pointer;
        line-height: 13px;
        padding: 0;
    }

    .custom-content-reveal span.custom-content-close:after {
        content: 'x';
        font-size: 18px;
        color: #fff;
    }

    .custom-content-reveal a,
    .custom-content-reveal span {
        /*font-size: 22px;*/
        font-size: 14px;
        padding: 10px 30px;
        display: block;
    }

    .custom-content-reveal h4 {
        text-transform: uppercase;
        font-size: 13px;
        font-weight: 300;
        letter-spacing: 3px;
        color: #777;
        padding: 20px;
        background: #fff;
        border-bottom: 1px solid #ddd;
        border-top: 5px solid #B61117;
        box-shadow: 0 1px rgba(255,255,255,0.9);
        margin-bottom: 30px;
    }

    .custom-content-reveal span {
        color: #888;
    }

    .custom-content-reveal a {
        color: #B61117;
    }

    .custom-content-reveal a:hover {
        color: #333;
    }

    /* Modifications */

    .fc-calendar-container {
        /*height: 400px;*/
        height: 260px;
        width: auto;
        padding: 0px;
        background: #f6f6f6;
        box-shadow: inset 0 1px rgba(255,255,255,0.8);
    }

    .fc-calendar .fc-head {
        background: transparent;
        color: #B61117;
        font-weight: bold;
        text-transform: uppercase;
        font-size: 12px;
    }

    .fc-calendar .fc-row > div {
        background: #fff;
        cursor: pointer;
    }

    .fc-calendar .fc-row > div:empty {
        background: transparent;
    }

    .fc-calendar .fc-row > div > span.fc-date {
        top: 50%;
        left: 50%;
        text-align: center;
        margin: -10px 0 0 -15px;
        color: #686a6e;
        font-weight: 400;
        font-size: small;
        pointer-events: none;
    }

    .fc-calendar .fc-row > div.fc-today {
        background: #B61117;
        box-shadow: inset 0 -1px 1px rgba(0,0,0,0.1);
    }

    .fc-calendar .fc-row > div.fc-today > span.fc-date {
        color: #fff;
        text-shadow: 0 1px 1px rgba(0,0,0,0.1);
    }

    .fc-calendar .fc-row > div.fc-content:after {
        content: '\00B7';
        text-align: center;
        width: 20px;
        margin-left: -10px;
        position: absolute;
        color: #DDD;
        font-size: 70px;
        line-height: 20px;
        left: 46%;
        bottom: 3px;
    }

    .fc-calendar .fc-row > div.fc-today.fc-content:after {
        color: #DDD;
    }

    .fc-calendar .fc-row > div.fc-content:hover:after{
        color: #B61117;
    }

    .fc-calendar .fc-row > div.fc-today.fc-content:hover:after{
        color: #fff;
    }

    .fc-calendar .fc-row > div > div a,
    .fc-calendar .fc-row > div > div span {
        display: none;
        font-size: 22px;
    }

    @media screen and (max-width: 400px) {
        .fc-calendar-container {
            height: 300px;
        }
        .fc-calendar .fc-row > div > span.fc-date {
            font-size: 15px;
        }
    }
</style>
<script>
    /**
     * jquery.calendario.js v1.0.0
     * http://www.codrops.com
     *
     * Licensed under the MIT license.
     * http://www.opensource.org/licenses/mit-license.php
     *
     * Copyright 2012, Codrops
     * http://www.codrops.com
     */
    ;( function( $, window, undefined ) {

        'use strict';

        $.Calendario = function( options, element ) {

            this.$el = $( element );
            this._init( options );

        };

        // the options
        $.Calendario.defaults = {
            /*
            you can also pass:
            month : initialize calendar with this month (1-12). Default is today.
            year : initialize calendar with this year. Default is today.
            caldata : initial data/content for the calendar.
            caldata format:
            {
                'MM-DD-YYYY' : 'HTML Content',
                'MM-DD-YYYY' : 'HTML Content',
                'MM-DD-YYYY' : 'HTML Content'
                ...
            }
            */
            weeks : [ 'Pazar', 'Pazartesi', 'Salı', 'Çarşamba', 'Perşembe', 'Cuma', 'Cumartesi' ],
            weekabbrs : [ 'Paz', 'Pzt', 'Sal', 'Çar', 'Per', 'Cum', 'Cts' ],
            months : [ 'Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 'Temmuz', 'Ağustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık' ],
            monthabbrs : [ 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec' ],
            // choose between values in options.weeks or options.weekabbrs
            displayWeekAbbr : false,
            // choose between values in options.months or options.monthabbrs
            displayMonthAbbr : false,
            // left most day in the calendar
            // 0 - Sunday, 1 - Monday, ... , 6 - Saturday
            startIn : 1,
            onDayClick : function( $el, $content, dateProperties ) { return false; }
        };

        $.Calendario.prototype = {

            _init : function( options ) {

                // options
                this.options = $.extend( true, {}, $.Calendario.defaults, options );

                this.today = new Date();
                this.month = ( isNaN( this.options.month ) || this.options.month == null) ? this.today.getMonth() : this.options.month - 1;
                this.year = ( isNaN( this.options.year ) || this.options.year == null) ? this.today.getFullYear() : this.options.year;
                this.caldata = this.options.caldata || {};
                this._generateTemplate();
                this._initEvents();

            },
            _initEvents : function() {

                var self = this;

                this.$el.on( 'click.calendario', 'div.fc-row > div', function() {

                    var $cell = $( this ),
                        idx = $cell.index(),
                        $content = $cell.children( 'div' ),
                        dateProp = {
                            day : $cell.children( 'span.fc-date' ).text(),
                            month : self.month + 1,
                            monthname : self.options.displayMonthAbbr ? self.options.monthabbrs[ self.month ] : self.options.months[ self.month ],
                            year : self.year,
                            weekday : idx + self.options.startIn,
                            weekdayname : self.options.weeks[ idx + self.options.startIn ]
                        };

                    if( dateProp.day ) {
                        self.options.onDayClick( $cell, $content, dateProp );
                    }

                } );

            },
            // Calendar logic based on http://jszen.blogspot.pt/2007/03/how-to-build-simple-calendar-with.html
            _generateTemplate : function( callback ) {

                var head = this._getHead(),
                    body = this._getBody(),
                    rowClass;

                switch( this.rowTotal ) {
                    case 4 : rowClass = 'fc-four-rows'; break;
                    case 5 : rowClass = 'fc-five-rows'; break;
                    case 6 : rowClass = 'fc-six-rows'; break;
                }

                this.$cal = $( '<div class="fc-calendar ' + rowClass + '">' ).append( head, body );

                this.$el.find( 'div.fc-calendar' ).remove().end().append( this.$cal );

                if( callback ) { callback.call(); }

            },
            _getHead : function() {

                var html = '<div class="fc-head">';

                for ( var i = 0; i <= 6; i++ ) {

                    var pos = i + this.options.startIn,
                        j = pos > 6 ? pos - 6 - 1 : pos;

                    html += '<div>';
                    html += this.options.displayWeekAbbr ? this.options.weekabbrs[ j ] : this.options.weeks[ j ];
                    html += '</div>';

                }

                html += '</div>';

                return html;

            },
            _getBody : function() {

                var d = new Date( this.year, this.month + 1, 0 ),
                    // number of days in the month
                    monthLength = d.getDate(),
                    firstDay = new Date( this.year, this.month, 1 );

                // day of the week
                this.startingDay = firstDay.getDay();

                var html = '<div class="fc-body"><div class="fc-row">',
                    // fill in the days
                    day = 1;

                // this loop is for weeks (rows)
                for ( var i = 0; i < 7; i++ ) {

                    // this loop is for weekdays (cells)
                    for ( var j = 0; j <= 6; j++ ) {

                        var pos = this.startingDay - this.options.startIn,
                            p = pos < 0 ? 6 + pos + 1 : pos,
                            inner = '',
                            today = this.month === this.today.getMonth() && this.year === this.today.getFullYear() && day === this.today.getDate(),
                            content = '';

                        if ( day <= monthLength && ( i > 0 || j >= p ) ) {

                            inner += '<span class="fc-date">' + day + '</span><span class="fc-weekday">' + this.options.weekabbrs[ j + this.options.startIn > 6 ? j + this.options.startIn - 6 - 1 : j + this.options.startIn ] + '</span>';

                            // this day is:
                            var strdate = ( this.month + 1 < 10 ? '0' + ( this.month + 1 ) : this.month + 1 ) + '-' + ( day < 10 ? '0' + day : day ) + '-' + this.year,
                                dayData = this.caldata[ strdate ];

                            if( dayData ) {
                                content = dayData;
                            }

                            if( content !== '' ) {
                                inner += '<div>' + content + '</div>';
                            }

                            ++day;

                        }
                        else {
                            today = false;
                        }

                        var cellClasses = today ? 'fc-today ' : '';
                        if( content !== '' ) {
                            cellClasses += 'fc-content';
                        }

                        html += cellClasses !== '' ? '<div class="' + cellClasses + '">' : '<div>';
                        html += inner;
                        html += '</div>';

                    }

                    // stop making rows if we've run out of days
                    if (day > monthLength) {
                        this.rowTotal = i + 1;
                        break;
                    }
                    else {
                        html += '</div><div class="fc-row">';
                    }

                }
                html += '</div></div>';

                return html;

            },
            // based on http://stackoverflow.com/a/8390325/989439
            _isValidDate : function( date ) {

                date = date.replace(/-/gi,'');
                var month = parseInt( date.substring( 0, 2 ), 10 ),
                    day = parseInt( date.substring( 2, 4 ), 10 ),
                    year = parseInt( date.substring( 4, 8 ), 10 );

                if( ( month < 1 ) || ( month > 12 ) ) {
                    return false;
                }
                else if( ( day < 1 ) || ( day > 31 ) )  {
                    return false;
                }
                else if( ( ( month == 4 ) || ( month == 6 ) || ( month == 9 ) || ( month == 11 ) ) && ( day > 30 ) )  {
                    return false;
                }
                else if( ( month == 2 ) && ( ( ( year % 400 ) == 0) || ( ( year % 4 ) == 0 ) ) && ( ( year % 100 ) != 0 ) && ( day > 29 ) )  {
                    return false;
                }
                else if( ( month == 2 ) && ( ( year % 100 ) == 0 ) && ( day > 29 ) )  {
                    return false;
                }

                return {
                    day : day,
                    month : month,
                    year : year
                };

            },
            _move : function( period, dir, callback ) {

                if( dir === 'previous' ) {

                    if( period === 'month' ) {
                        this.year = this.month > 0 ? this.year : --this.year;
                        this.month = this.month > 0 ? --this.month : 11;
                    }
                    else if( period === 'year' ) {
                        this.year = --this.year;
                    }

                }
                else if( dir === 'next' ) {

                    if( period === 'month' ) {
                        this.year = this.month < 11 ? this.year : ++this.year;
                        this.month = this.month < 11 ? ++this.month : 0;
                    }
                    else if( period === 'year' ) {
                        this.year = ++this.year;
                    }

                }

                this._generateTemplate( callback );

            },
            /*************************
             ******PUBLIC METHODS *****
             **************************/
            getYear : function() {
                return this.year;
            },
            getMonth : function() {
                return this.month + 1;
            },
            getMonthName : function() {
                return this.options.displayMonthAbbr ? this.options.monthabbrs[ this.month ] : this.options.months[ this.month ];
            },
            // gets the cell's content div associated to a day of the current displayed month
            // day : 1 - [28||29||30||31]
            getCell : function( day ) {

                var row = Math.floor( ( day + this.startingDay - this.options.startIn ) / 7 ),
                    pos = day + this.startingDay - this.options.startIn - ( row * 7 ) - 1;

                return this.$cal.find( 'div.fc-body' ).children( 'div.fc-row' ).eq( row ).children( 'div' ).eq( pos ).children( 'div' );

            },
            setData : function( caldata ) {

                caldata = caldata || {};
                $.extend( this.caldata, caldata );
                this._generateTemplate();

            },
            // goes to today's month/year
            gotoNow : function( callback ) {

                this.month = this.today.getMonth();
                this.year = this.today.getFullYear();
                this._generateTemplate( callback );

            },
            // goes to month/year
            goto : function( month, year, callback ) {

                this.month = month;
                this.year = year;
                this._generateTemplate( callback );

            },
            gotoPreviousMonth : function( callback ) {
                this._move( 'month', 'previous', callback );
            },
            gotoPreviousYear : function( callback ) {
                this._move( 'year', 'previous', callback );
            },
            gotoNextMonth : function( callback ) {
                this._move( 'month', 'next', callback );
            },
            gotoNextYear : function( callback ) {
                this._move( 'year', 'next', callback );
            }

        };

        var logError = function( message ) {

            if ( window.console ) {

                window.console.error( message );

            }

        };

        $.fn.calendario = function( options ) {

            var instance = $.data( this, 'calendario' );

            if ( typeof options === 'string' ) {

                var args = Array.prototype.slice.call( arguments, 1 );

                this.each(function() {

                    if ( !instance ) {

                        logError( "cannot call methods on calendario prior to initialization; " +
                            "attempted to call method '" + options + "'" );
                        return;

                    }

                    if ( !$.isFunction( instance[options] ) || options.charAt(0) === "_" ) {

                        logError( "no such method '" + options + "' for calendario instance" );
                        return;

                    }

                    instance[ options ].apply( instance, args );

                });

            }
            else {

                this.each(function() {

                    if ( instance ) {

                        instance._init();

                    }
                    else {

                        instance = $.data( this, 'calendario', new $.Calendario( options, this ) );

                    }

                });

            }

            return instance;

        };

    } )( jQuery, window );
</script>
<div class="col-md-3">
    <script>
        ;window.Modernizr=function(a,b,c){function z(a){j.cssText=a}function A(a,b){return z(m.join(a+";")+(b||""))}function B(a,b){return typeof a===b}function C(a,b){return!!~(""+a).indexOf(b)}function D(a,b){for(var d in a){var e=a[d];if(!C(e,"-")&&j[e]!==c)return b=="pfx"?e:!0}return!1}function E(a,b,d){for(var e in a){var f=b[a[e]];if(f!==c)return d===!1?a[e]:B(f,"function")?f.bind(d||b):f}return!1}function F(a,b,c){var d=a.charAt(0).toUpperCase()+a.slice(1),e=(a+" "+o.join(d+" ")+d).split(" ");return B(b,"string")||B(b,"undefined")?D(e,b):(e=(a+" "+p.join(d+" ")+d).split(" "),E(e,b,c))}var d="2.6.2",e={},f=!0,g=b.documentElement,h="modernizr",i=b.createElement(h),j=i.style,k,l={}.toString,m=" -webkit- -moz- -o- -ms- ".split(" "),n="Webkit Moz O ms",o=n.split(" "),p=n.toLowerCase().split(" "),q={},r={},s={},t=[],u=t.slice,v,w=function(a,c,d,e){var f,i,j,k,l=b.createElement("div"),m=b.body,n=m||b.createElement("body");if(parseInt(d,10))while(d--)j=b.createElement("div"),j.id=e?e[d]:h+(d+1),l.appendChild(j);return f=["&#173;",'<style id="s',h,'">',a,"</style>"].join(""),l.id=h,(m?l:n).innerHTML+=f,n.appendChild(l),m||(n.style.background="",n.style.overflow="hidden",k=g.style.overflow,g.style.overflow="hidden",g.appendChild(n)),i=c(l,a),m?l.parentNode.removeChild(l):(n.parentNode.removeChild(n),g.style.overflow=k),!!i},x={}.hasOwnProperty,y;!B(x,"undefined")&&!B(x.call,"undefined")?y=function(a,b){return x.call(a,b)}:y=function(a,b){return b in a&&B(a.constructor.prototype[b],"undefined")},Function.prototype.bind||(Function.prototype.bind=function(b){var c=this;if(typeof c!="function")throw new TypeError;var d=u.call(arguments,1),e=function(){if(this instanceof e){var a=function(){};a.prototype=c.prototype;var f=new a,g=c.apply(f,d.concat(u.call(arguments)));return Object(g)===g?g:f}return c.apply(b,d.concat(u.call(arguments)))};return e}),q.touch=function(){var c;return"ontouchstart"in a||a.DocumentTouch&&b instanceof DocumentTouch?c=!0:w(["@media (",m.join("touch-enabled),("),h,")","{#modernizr{top:9px;position:absolute}}"].join(""),function(a){c=a.offsetTop===9}),c},q.csstransitions=function(){return F("transition")};for(var G in q)y(q,G)&&(v=G.toLowerCase(),e[v]=q[G](),t.push((e[v]?"":"no-")+v));return e.addTest=function(a,b){if(typeof a=="object")for(var d in a)y(a,d)&&e.addTest(d,a[d]);else{a=a.toLowerCase();if(e[a]!==c)return e;b=typeof b=="function"?b():b,typeof f!="undefined"&&f&&(g.className+=" "+(b?"":"no-")+a),e[a]=b}return e},z(""),i=k=null,function(a,b){function k(a,b){var c=a.createElement("p"),d=a.getElementsByTagName("head")[0]||a.documentElement;return c.innerHTML="x<style>"+b+"</style>",d.insertBefore(c.lastChild,d.firstChild)}function l(){var a=r.elements;return typeof a=="string"?a.split(" "):a}function m(a){var b=i[a[g]];return b||(b={},h++,a[g]=h,i[h]=b),b}function n(a,c,f){c||(c=b);if(j)return c.createElement(a);f||(f=m(c));var g;return f.cache[a]?g=f.cache[a].cloneNode():e.test(a)?g=(f.cache[a]=f.createElem(a)).cloneNode():g=f.createElem(a),g.canHaveChildren&&!d.test(a)?f.frag.appendChild(g):g}function o(a,c){a||(a=b);if(j)return a.createDocumentFragment();c=c||m(a);var d=c.frag.cloneNode(),e=0,f=l(),g=f.length;for(;e<g;e++)d.createElement(f[e]);return d}function p(a,b){b.cache||(b.cache={},b.createElem=a.createElement,b.createFrag=a.createDocumentFragment,b.frag=b.createFrag()),a.createElement=function(c){return r.shivMethods?n(c,a,b):b.createElem(c)},a.createDocumentFragment=Function("h,f","return function(){var n=f.cloneNode(),c=n.createElement;h.shivMethods&&("+l().join().replace(/\w+/g,function(a){return b.createElem(a),b.frag.createElement(a),'c("'+a+'")'})+");return n}")(r,b.frag)}function q(a){a||(a=b);var c=m(a);return r.shivCSS&&!f&&!c.hasCSS&&(c.hasCSS=!!k(a,"article,aside,figcaption,figure,footer,header,hgroup,nav,section{display:block}mark{background:#FF0;color:#000}")),j||p(a,c),a}var c=a.html5||{},d=/^<|^(?:button|map|select|textarea|object|iframe|option|optgroup)$/i,e=/^(?:a|b|code|div|fieldset|h1|h2|h3|h4|h5|h6|i|label|li|ol|p|q|span|strong|style|table|tbody|td|th|tr|ul)$/i,f,g="_html5shiv",h=0,i={},j;(function(){try{var a=b.createElement("a");a.innerHTML="<xyz></xyz>",f="hidden"in a,j=a.childNodes.length==1||function(){b.createElement("a");var a=b.createDocumentFragment();return typeof a.cloneNode=="undefined"||typeof a.createDocumentFragment=="undefined"||typeof a.createElement=="undefined"}()}catch(c){f=!0,j=!0}})();var r={elements:c.elements||"abbr article aside audio bdi canvas data datalist details figcaption figure footer header hgroup mark meter nav output progress section summary time video",shivCSS:c.shivCSS!==!1,supportsUnknownElements:j,shivMethods:c.shivMethods!==!1,type:"default",shivDocument:q,createElement:n,createDocumentFragment:o};a.html5=r,q(b)}(this,b),e._version=d,e._prefixes=m,e._domPrefixes=p,e._cssomPrefixes=o,e.testProp=function(a){return D([a])},e.testAllProps=F,e.testStyles=w,e.prefixed=function(a,b,c){return b?F(a,b,c):F(a,"pfx")},g.className=g.className.replace(/(^|\s)no-js(\s|$)/,"$1$2")+(f?" js "+t.join(" "):""),e}(this,this.document),function(a,b,c){function d(a){return"[object Function]"==o.call(a)}function e(a){return"string"==typeof a}function f(){}function g(a){return!a||"loaded"==a||"complete"==a||"uninitialized"==a}function h(){var a=p.shift();q=1,a?a.t?m(function(){("c"==a.t?B.injectCss:B.injectJs)(a.s,0,a.a,a.x,a.e,1)},0):(a(),h()):q=0}function i(a,c,d,e,f,i,j){function k(b){if(!o&&g(l.readyState)&&(u.r=o=1,!q&&h(),l.onload=l.onreadystatechange=null,b)){"img"!=a&&m(function(){t.removeChild(l)},50);for(var d in y[c])y[c].hasOwnProperty(d)&&y[c][d].onload()}}var j=j||B.errorTimeout,l=b.createElement(a),o=0,r=0,u={t:d,s:c,e:f,a:i,x:j};1===y[c]&&(r=1,y[c]=[]),"object"==a?l.data=c:(l.src=c,l.type=a),l.width=l.height="0",l.onerror=l.onload=l.onreadystatechange=function(){k.call(this,r)},p.splice(e,0,u),"img"!=a&&(r||2===y[c]?(t.insertBefore(l,s?null:n),m(k,j)):y[c].push(l))}function j(a,b,c,d,f){return q=0,b=b||"j",e(a)?i("c"==b?v:u,a,b,this.i++,c,d,f):(p.splice(this.i++,0,a),1==p.length&&h()),this}function k(){var a=B;return a.loader={load:j,i:0},a}var l=b.documentElement,m=a.setTimeout,n=b.getElementsByTagName("script")[0],o={}.toString,p=[],q=0,r="MozAppearance"in l.style,s=r&&!!b.createRange().compareNode,t=s?l:n.parentNode,l=a.opera&&"[object Opera]"==o.call(a.opera),l=!!b.attachEvent&&!l,u=r?"object":l?"script":"img",v=l?"script":u,w=Array.isArray||function(a){return"[object Array]"==o.call(a)},x=[],y={},z={timeout:function(a,b){return b.length&&(a.timeout=b[0]),a}},A,B;B=function(a){function b(a){var a=a.split("!"),b=x.length,c=a.pop(),d=a.length,c={url:c,origUrl:c,prefixes:a},e,f,g;for(f=0;f<d;f++)g=a[f].split("="),(e=z[g.shift()])&&(c=e(c,g));for(f=0;f<b;f++)c=x[f](c);return c}function g(a,e,f,g,h){var i=b(a),j=i.autoCallback;i.url.split(".").pop().split("?").shift(),i.bypass||(e&&(e=d(e)?e:e[a]||e[g]||e[a.split("/").pop().split("?")[0]]),i.instead?i.instead(a,e,f,g,h):(y[i.url]?i.noexec=!0:y[i.url]=1,f.load(i.url,i.forceCSS||!i.forceJS&&"css"==i.url.split(".").pop().split("?").shift()?"c":c,i.noexec,i.attrs,i.timeout),(d(e)||d(j))&&f.load(function(){k(),e&&e(i.origUrl,h,g),j&&j(i.origUrl,h,g),y[i.url]=2})))}function h(a,b){function c(a,c){if(a){if(e(a))c||(j=function(){var a=[].slice.call(arguments);k.apply(this,a),l()}),g(a,j,b,0,h);else if(Object(a)===a)for(n in m=function(){var b=0,c;for(c in a)a.hasOwnProperty(c)&&b++;return b}(),a)a.hasOwnProperty(n)&&(!c&&!--m&&(d(j)?j=function(){var a=[].slice.call(arguments);k.apply(this,a),l()}:j[n]=function(a){return function(){var b=[].slice.call(arguments);a&&a.apply(this,b),l()}}(k[n])),g(a[n],j,b,n,h))}else!c&&l()}var h=!!a.test,i=a.load||a.both,j=a.callback||f,k=j,l=a.complete||f,m,n;c(h?a.yep:a.nope,!!i),i&&c(i)}var i,j,l=this.yepnope.loader;if(e(a))g(a,0,l,0);else if(w(a))for(i=0;i<a.length;i++)j=a[i],e(j)?g(j,0,l,0):w(j)?B(j):Object(j)===j&&h(j,l);else Object(a)===a&&h(a,l)},B.addPrefix=function(a,b){z[a]=b},B.addFilter=function(a){x.push(a)},B.errorTimeout=1e4,null==b.readyState&&b.addEventListener&&(b.readyState="loading",b.addEventListener("DOMContentLoaded",A=function(){b.removeEventListener("DOMContentLoaded",A,0),b.readyState="complete"},0)),a.yepnope=k(),a.yepnope.executeStack=h,a.yepnope.injectJs=function(a,c,d,e,i,j){var k=b.createElement("script"),l,o,e=e||B.errorTimeout;k.src=a;for(o in d)k.setAttribute(o,d[o]);c=j?h:c||f,k.onreadystatechange=k.onload=function(){!l&&g(k.readyState)&&(l=1,c(),k.onload=k.onreadystatechange=null)},m(function(){l||(l=1,c(1))},e),i?k.onload():n.parentNode.insertBefore(k,n)},a.yepnope.injectCss=function(a,c,d,e,g,i){var e=b.createElement("link"),j,c=i?h:c||f;e.href=a,e.rel="stylesheet",e.type="text/css";for(j in d)e.setAttribute(j,d[j]);g||(n.parentNode.insertBefore(e,n),m(c,0))}}(this,document),Modernizr.load=function(){yepnope.apply(window,[].slice.call(arguments,0))};</script>
    <p class="lead">Mydemy™ Calendar</p>
    <aside class="widget">
        <div class="box_wrapper">
            <div class="widget">
                <div class="widget_border"></div>
                <p></p>
                <div class="custom-calendar-wrap">
                    <div id="custom-inner" class="custom-inner">
                        <div class="custom-header clearfix">
                            <h2 id="custom-month" class="custom-month">Ocak</h2>
                            <h3 id="custom-year" class="custom-year">2022</h3>
                        </div>
                        <div id="calendar" class="fc-calendar-container"><div class="fc-calendar fc-six-rows"><div class="fc-head"><div>Pzt</div><div>Sal</div><div>Çar</div><div>Per</div><div>Cum</div><div>Cts</div><div>Paz</div></div><div class="fc-body"><div class="fc-row"><div></div><div></div><div></div><div></div><div></div><div><span class="fc-date">1</span><span class="fc-weekday">Cts</span></div><div><span class="fc-date">2</span><span class="fc-weekday">Paz</span></div></div><div class="fc-row"><div><span class="fc-date">3</span><span class="fc-weekday">Pzt</span></div><div><span class="fc-date">4</span><span class="fc-weekday">Sal</span></div><div><span class="fc-date">5</span><span class="fc-weekday">Çar</span></div><div><span class="fc-date">6</span><span class="fc-weekday">Per</span></div><div><span class="fc-date">7</span><span class="fc-weekday">Cum</span></div><div><span class="fc-date">8</span><span class="fc-weekday">Cts</span></div><div><span class="fc-date">9</span><span class="fc-weekday">Paz</span></div></div><div class="fc-row"><div class="fc-today "><span class="fc-date">10</span><span class="fc-weekday">Pzt</span></div><div><span class="fc-date">11</span><span class="fc-weekday">Sal</span></div><div><span class="fc-date">12</span><span class="fc-weekday">Çar</span></div><div><span class="fc-date">13</span><span class="fc-weekday">Per</span></div><div><span class="fc-date">14</span><span class="fc-weekday">Cum</span></div><div><span class="fc-date">15</span><span class="fc-weekday">Cts</span></div><div><span class="fc-date">16</span><span class="fc-weekday">Paz</span></div></div><div class="fc-row"><div><span class="fc-date">17</span><span class="fc-weekday">Pzt</span></div><div><span class="fc-date">18</span><span class="fc-weekday">Sal</span></div><div><span class="fc-date">19</span><span class="fc-weekday">Çar</span></div><div><span class="fc-date">20</span><span class="fc-weekday">Per</span></div><div><span class="fc-date">21</span><span class="fc-weekday">Cum</span></div><div><span class="fc-date">22</span><span class="fc-weekday">Cts</span></div><div><span class="fc-date">23</span><span class="fc-weekday">Paz</span></div></div><div class="fc-row"><div><span class="fc-date">24</span><span class="fc-weekday">Pzt</span></div><div><span class="fc-date">25</span><span class="fc-weekday">Sal</span></div><div><span class="fc-date">26</span><span class="fc-weekday">Çar</span></div><div><span class="fc-date">27</span><span class="fc-weekday">Per</span></div><div><span class="fc-date">28</span><span class="fc-weekday">Cum</span></div><div><span class="fc-date">29</span><span class="fc-weekday">Cts</span></div><div><span class="fc-date">30</span><span class="fc-weekday">Paz</span></div></div><div class="fc-row"><div><span class="fc-date">31</span><span class="fc-weekday">Pzt</span></div><div></div><div></div><div></div><div></div><div></div><div></div></div></div></div></div>
                    </div>
                </div>
            </div>
        </div>
    </aside>
</div>