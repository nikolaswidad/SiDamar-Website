document.addEventListener("DOMContentLoaded", function() {
    var searchInput = document.getElementById("table-search");
searchInput.addEventListener("input", searchTable);

function searchTable() {
    var input = searchInput.value.toLowerCase();
    var table = document.getElementById("events-table");
    var rows = table.getElementsByTagName("tr");

    for (var i = 0; i < rows.length; i++) {
        var rowData = rows[i].textContent.toLowerCase();

        if (rowData.includes(input)) {
            rows[i].style.display = "";
        } else {
            rows[i].style.display = "none";
        }
    }
}

function sortTable(column) {
    var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
    table = document.getElementById("events-table");
    switching = true;
    dir = "asc"; // Set the default sorting direction to ascending
    while (switching) {
        switching = false;
        rows = table.rows;
        for (i = 1; i < (rows.length - 1); i++) {
            shouldSwitch = false;
            x = rows[i].getElementsByTagName("td")[column].innerText;
            y = rows[i + 1].getElementsByTagName("td")[column].innerText;
            if (dir === "asc") {
                if (x.toLowerCase() > y.toLowerCase()) {
                    shouldSwitch = true;
                    break;
                }
            } else if (dir === "desc") {
                if (x.toLowerCase() < y.toLowerCase()) {
                    shouldSwitch = true;
                    break;
                }
            }
        }
        if (shouldSwitch) {
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
            switchcount++;
        } else {
            if (switchcount === 0 && dir === "asc") {
                dir = "desc";
                switching = true;
            }
        }
    }
}
});

