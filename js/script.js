function sortByColor(order) {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.querySelector("table");
    switching = true;
    while (switching) {
        switching = false;
        rows = table.rows;
        for (i = 1; i < (rows.length - 1); i++) {
            shouldSwitch = false;
            x = rows[i].getElementsByTagName("td")[5];
            y = rows[i + 1].getElementsByTagName("td")[5];
            if ((order === 'asc' && x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) ||
                (order === 'desc' && x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase())) {
                shouldSwitch = true;
                break;
            }
        }
        if (shouldSwitch) {
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
        }

        var oppositeIcon = order === 'asc' ? document.querySelector('.sort-toggle-asc') : document.querySelector('.sort-toggle-desc');
        var currentIcon = order === 'asc' ? document.querySelector('.sort-toggle-desc') : document.querySelector('.sort-toggle-asc');
        
        if (oppositeIcon) {
            oppositeIcon.style.display = "none";
        }
        if (currentIcon) {
            currentIcon.style.display = "inline-block"; // Show the current icon
        }
    }
}