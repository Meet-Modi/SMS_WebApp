var calendar = document.getElementById("calendar-table");
var gridTable = document.getElementById("table-body");
var currentDate = new Date();
var selectedDate = currentDate;
var selectedDayBlock = null;
var globalEventObj = {};

var sidebar = document.getElementById("sidebar");

function createCalendar(date, side) {
   var currentDate = date;
   var startDate = new Date(currentDate.getFullYear(), currentDate.getMonth(), 1);
   
   var monthTitle = document.getElementById("month-name");
   var monthName = currentDate.toLocaleString("en-US", {
      month: "long"
   });
   
   var yearNum = currentDate.toLocaleString("en-US", {
      year: "numeric"
   });
   console.log(currentDate.getMonth()+1);   
   console.log(yearNum);   
   
   monthTitle.innerHTML = `${monthName} ${yearNum}`;
   
   if (side == "left") {
      gridTable.className = "animated fadeOutRight";
   } else {
      gridTable.className = "animated fadeOutLeft";
   }
   
   setTimeout(() => {
      gridTable.innerHTML = "";
      
      var newTr = document.createElement("div");
      newTr.className = "row";
      //newTr.style.backgroundColor = "red";
      var currentTr = gridTable.appendChild(newTr);
      
      for (let i = 1; i < startDate.getDay(); i++) {
         let emptyDivCol = document.createElement("div");
         emptyDivCol.className = "col empty-day";
         currentTr.appendChild(emptyDivCol);
      }
      
      var lastDay = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 0);
      lastDay = lastDay.getDate();
      
      var obj = { operation : "R", month : currentDate.getMonth()+1, year : yearNum, readmode : "readMonth"};
      var myJSON = JSON.stringify(obj);
      console.log(myJSON);
      $.ajax({
         url: "http://localhost/SMS_WebApp/api/service/CRUD_service.php",
         type : "POST",
         contentType : 'application/json',
         data : myJSON,
         success : function(result){
            var totalrows = result.length;
            console.log(result);
            for (let i = 1; i <= lastDay; i++) {
               if (currentTr.children.length >= 7) {
                  currentTr = gridTable.appendChild(addNewRow());
               }
               let currentDay = document.createElement("div");
               currentDay.className = "col";      
               //currentDay.style.backgroundColor = "red";
               
               for(let j = 0; j<result.length;j++){
                  if (i == result[j].day) {
                     console.log("HI" + currentDate.getFullYear() + currentDate.getMonth());
                     selectedDayBlock = currentDay;
                     currentDay.style.backgroundColor = "#ADD8E6";
                  }
               }
               currentDay.innerHTML = i;
               
               //show marks
               if (globalEventObj[new Date(currentDate.getFullYear(), currentDate.getMonth(), i).toDateString()]) {
                  let eventMark = document.createElement("div");
                  eventMark.className = "day-mark";
                  currentDay.appendChild(eventMark);
               }
               
               currentTr.appendChild(currentDay);
            }
            
            for (let i = currentTr.getElementsByTagName("div").length; i < 7; i++) {
               let emptyDivCol = document.createElement("div");
               emptyDivCol.className = "col empty-day";
               currentTr.appendChild(emptyDivCol);
            }
         },
         error: function(xhr, status, error){
            alert(error);
         }
      });
      
      if (side == "left") {
         gridTable.className = "animated fadeInLeft";
      } else {
         gridTable.className = "animated fadeInRight";
      }
      
      function addNewRow() {
         let node = document.createElement("div");
         node.className = "row";
         return node;
      }
      
   }, !side ? 0 : 270);
}

createCalendar(currentDate);


var prevButton = document.getElementById("prev");
var nextButton = document.getElementById("next");

prevButton.onclick = function changeMonthPrev() {
   currentDate = new Date(currentDate.getFullYear(), currentDate.getMonth() - 1);
   createCalendar(currentDate, "left");
}
nextButton.onclick = function changeMonthNext() {
   currentDate = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1);
   createCalendar(currentDate, "right");
}

function addEvent(title, desc) {
   if (!globalEventObj[selectedDate.toDateString()]) {
      globalEventObj[selectedDate.toDateString()] = {};
   }
   globalEventObj[selectedDate.toDateString()][title] = desc;
}

function showEvents() {
   //let sidebarEvents = document.getElementById("sidebarEvents");
   let objWithDate = globalEventObj[selectedDate.toDateString()];
   /* console.log(selectedDate.getDate());
   console.log(selectedDate.getMonth() + 1);
   console.log(selectedDate.getFullYear());
   console.log(selectedDate.toDateString());
   for(){
      var obj = { operation : "R", date : our_date};
      var myJSON = JSON.stringify(obj);   
   }*/
   var our_date = selectedDate.getFullYear() + "-" + (selectedDate.getMonth() + 1) + "-" + selectedDate.getDate();
   var service_table = document.getElementById("service_tbody");
   var obj = { operation : "R", date : our_date, readmode : "readDate"};
   var myJSON = JSON.stringify(obj);
   console.log(myJSON);
   
   $.ajax({
      url: "http://localhost/SMS_WebApp/api/service/CRUD_service.php",
      type : "POST",
      contentType : 'application/json',
      data : myJSON,
      success : function(result){
         var totalrows = result.length;
         var rowhtml = "";
         console.log("First");
         console.log(result);
         if(totalrows == 0){
            service_table.innerHTML = "<tr> <td align='center' colspan='5'>No services on "+ our_date +"!</td></tr>";
         }
         else{
            for(var i = 0;i < totalrows;i++){
               rowhtml += "<tr><td>"+ result[i].billingname +"</td><td>"+ result[i].firstname + " " + result[i].lastname +"</td><td>"+ result[i].quantity +"</td><td>"+ result[i].status +"</td>";
               rowhtml += "<td><div class='row' style='padding-left: 10px;padding-right: 10px;'><a href='ViewService/ViewService.html?service_id=" + result[i].serviceid + "&customer_id=" + result[i].customerid + "'class='w-size1 bg4 bo-rad-23 hov1 trans-0-4' style='border: none;'><center>View/Update</center></a></div></td>";
            }
            
            
            console.log(rowhtml);
            service_table.innerHTML = rowhtml;
         }
         
      },
      error: function(xhr, status, error){
         alert(error);
         //         $('#response').html("<div class='alert alert-danger'>Unable to add AMC.</div>");
      }
   });
   
   
}

gridTable.onclick = function (e) {
   
   if (!e.target.classList.contains("col") || e.target.classList.contains("empty-day")) {
      return;
   }
   
   if (selectedDayBlock) {
      if (selectedDayBlock.classList.contains("blue") && selectedDayBlock.classList.contains("lighten-3")) {
         selectedDayBlock.classList.remove("blue");
         selectedDayBlock.classList.remove("lighten-3");
      }
   }
   selectedDayBlock = e.target;
   selectedDayBlock.classList.add("blue");
   selectedDayBlock.classList.add("lighten-3");
   
   selectedDate = new Date(currentDate.getFullYear(), currentDate.getMonth(), parseInt(e.target.innerHTML));
   
   showEvents();
   
}
