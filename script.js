function showDetails()
{
    let today = new Date();

    document.getElementById("info").innerHTML =
    "ABC Company Portal Active | Today: " + today.toDateString();
}