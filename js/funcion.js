

function validar (){
   
    var pri = document.getElementById("fecha_inicio").value;
    var seg = document.getElementById("fecha_fin").value;
    var date1 = new Date (pri);
    var date2 = new Date (seg);
    

    var dates = {
        convert:function(d) {
            // Converts the date in d to a date-object. The input can be:
            //   a date object: returned without modification
            //  an array      : Interpreted as [year,month,day]. NOTE: month is 0-11.
            //   a number     : Interpreted as number of milliseconds
            //                  since 1 Jan 1970 (a timestamp) 
            //   a string     : Any format supported by the javascript engine, like
            //                  "YYYY/MM/DD", "MM/DD/YYYY", "Jan 31 2009" etc.
            //  an object     : Interpreted as an object with year, month and date
            //                  attributes.  **NOTE** month is 0-11.
            return (
                d.constructor === Date ? d :
                d.constructor === Array ? new Date(d[0],d[1],d[2]) :
                d.constructor === Number ? new Date(d) :
                d.constructor === String ? new Date(d) :
                typeof d === "object" ? new Date(d.year,d.month,d.date) :
                NaN
            );
        },
        compare:function(a,b) {
            // Compare two dates (could be of any type supported by the convert
            // function above) and returns:
            //  -1 : if a < b
            //   0 : if a = b
            //   1 : if a > b
            // NaN : if a or b is an illegal date
            // NOTE: The code inside isFinite does an assignment (=).
            return (
                isFinite(a=this.convert(a).valueOf()) &&
                isFinite(b=this.convert(b).valueOf()) ?
                (a>b)-(a<b) :
                NaN
            );
        },
        
        
    }
    var res = dates.compare(date1,date2);
    switch (res) {
        case -1:
            // a < b
            
            document.getElementById('formulario').submit();
            return true;
        case 0:
            // b == a
            swal("Error!", "La campaña debe durar por lo menos 24 Horas", "error");
            returnToPreviousPage();
            return false;
        case 1:
            // b > a
            swal("Error!", "La fecha de finalización debe ser posterior a la de inicio", "error");
            returnToPreviousPage();
            return false;
            
        default:
            break;
    }

}



