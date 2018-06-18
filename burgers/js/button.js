function ajax_post(){
    // Create our XMLHttpRequest object
    let hr = new XMLHttpRequest();
    // Create some variables we need to send to our PHP file
    var url = "worker.php";

    let name = document.getElementById("name").value;
    let phone = document.getElementById("phone").value;

    let email = document.getElementById("email").value;
    let street = document.getElementById("street").value;
    let home = document.getElementById("home").value;
    let part = document.getElementById("part").value;
    let appt = document.getElementById("appt").value;
    let floor = document.getElementById("floor").value;
    let comment = document.getElementById("comment").value;


    let change = document.getElementById("change").checked;
    let cardPayment = document.getElementById("cardPayment").checked;
    let callBack = document.getElementById("callBack").checked;
    let status = document.getElementById("status");


    let vars = "name="+name+"&phone="+phone+"&email="+email+"&street="+street+
               "&home="+home+"&part="+part+"&appt="+appt+"&floor="+floor+
              "&change="+change+"&cardPayment="+cardPayment+"&callBack="+callBack+"&comment="+comment;

    status.innerHTML =vars;
    hr.open("POST", url, true);
    //Set content type header information for sending url encoded variables in the request
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    //Access the onreadystatechange event for the XMLHttpRequest object
    hr.onreadystatechange = function()
    {
        if(hr.readyState == 4 && hr.status == 200) {
            let return_data = hr.responseText;
            status.innerHTML = return_data;
        }
    }
    //Send the data to PHP now... and wait for response to update the status div
     hr.send(vars); // Actually execute the request
    status.innerHTML = "processing...";
}