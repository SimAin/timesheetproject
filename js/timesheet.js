$( document ).ready(function() {
    
    var total = 0;
    var displayTotal = document.getElementById("totalHours");
    var allHours = document.querySelectorAll(".hours");

    function calcTotal() {
        total = 0
        allHours.forEach(function(node) {
            total += Number(node.value);
        });
        displayTotal.value = total
    }

    $("input").on("change", function() {
        calcTotal();
    });

    calcTotal();
});