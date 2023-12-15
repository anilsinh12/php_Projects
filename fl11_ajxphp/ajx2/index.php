 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
 </head>

 <script>

//   if the readyState value equals 4, which means the request is completed and we’ve got a response from the server.
 
//   if the status code equals 200, which means the request was successful. 

//   Finally, we fetch the response which is stored in the responseText property of the XMLHttpRequest object.


// function AjaxCallWithPromise() {
//     return new Promise(function (resolve, reject) {

//         const xmlhttp = new XMLHttpRequest();
//         xmlhttp.onreadystatechange = function (){

//             if (xmlhttp.readyState === 4) && (xmlhttp.status == 200) {
//                     resolve(xmlhttp.responseText);
//                 } else {
//                     reject('Error Code: ' +  xmlhttp.status + ' Error Message: ' + xmlhttp.statusText);
//                 }
//             
//         }
//         xmlhttp.open('GET', 'request_ajax_data.php');
//         xmlhttp.send();
//     });
// }


// AjaxCallWithPromise().then(
//     data => { console.log('Success Response: ' + data) },
//     error => { console.log(error) }
// );
    function showuser(str){
        if (str=="") {
            document.getElementById("info").innerHTML="";
            return;
        }
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() {
            if (this.readyState == 4 && this.status == 200) {
            document.getElementById("info").innerHTML=this.responseText;
            }
        }
        xmlhttp.open("GET","process.php?id="+str,true);
        xmlhttp.send();
    }
 </script>
 <body>
    <form>
         <select name="user" id="" onchange="showuser(this.value)">
            <option value="">Select a person:</option>
            <option value="1">Anilsinh</option>
            <option value="2">Rohit</option>
            <option value="3">Amit</option>
            <option value="4">Priti</option>
         </select>
    </form>
    <div id="infouser">
        <p>Person information..</p>
            <div id="info"></div>
    </div>
 </body>
 </html>