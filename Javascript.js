// UNCOMPLETED


function func() {
    alert("nice!");

    var day = document.getElementById("day");
    var month = document.getElementById("month");
    var year = document.getElementById("year");
    var dayVal = day.value;
    var monthVal = month.value;
    var yearVal = year.value;
    var dayLab = document.getElementById("dayLab");
    var monLab = document.getElementById("monLab");
    var yrLab = document.getElementById("yrLab");
    var err_lab = document.getElementsByClassName("err_lab");
    var err_lab2 = document.getElementsByClassName("err_lab2")

    if (!dayVal || !monthVal || !yearVal) {
        dayLab.style.color = "hsl(0, 100%, 67%)";
        monLab.style.color = "hsl(0, 100%, 67%)";
        yrLab.style.color = "hsl(0, 100%, 67%)";
        day.style.border = "1.5px solid hsl(0, 100%, 67%)"
        month.style.border = "1.5px solid hsl(0, 100%, 67%)"
        year.style.border = "1.5px solid hsl(0, 100%, 67%)"
        
        for( var i=0, length = err_lab.length; i < length; i++ ){
            err_lab[i].style.display = "inline"
        }
    }
    else {
        dayLab.style.color = "";
        monLab.style.color = "";
        yrLab.style.color = "";
        document.getElementById("form").submit();
    }
}


