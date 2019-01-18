

var modules = [];
var volume = [];
var taxe = [];
var prixht = [];

$(document).ready(function() {
    function ajax()
    {
        $.post
        (
            'getTypesformations.php',
            function (data) {
                modules = [];
                volume = [];
                taxe  = [];
                prixht = [];

                data=JSON.parse(data);
                data.forEach(function (element)
                {
                    modules.push(element["nom"]);
                    volume.push(element["volumeHorraire"]);
                    taxe.push(element["taux"]);
                    prixht.push(element["prixht"]);
                });
                remplirTable();
            }
        )
    }
    setInterval(function () {
        ajax();
    }, 5000);

    ajax();

});
    function remplirTable() {
        let newCell, newRow;

        let str = "\t<thead>\n" +
            "\t\t<tr>\n" +
            "\t\t\t<th>Formation</th>\n" +
            "\t\t\t<th>Volume horraire</th>\n" +
            "\t\t\t<th>Prix HT</th>\n" +
            "\t\t\t<th>Taxe</th>\n" +
            "\t\t\t<th>Prix TTI</th>\n" +
            "\t\t</tr>\n" +
            "\t\t</thead>\n" +
            "\t\t<tbody>\n" +
            "\t\t</tbody>";

        let tableRef = $("#tarifs")[0];

        $("#tarifs").html(str);

        for (let i = 0; i < prixht.length; i++)
        {
            newRow = tableRef.insertRow(tableRef.rows.length);

            newCell = newRow.insertCell(0);
          //  newCell.innerHTML = data.module[i];
            newCell.innerHTML = modules[i];

            newCell = newRow.insertCell(1);
            newCell.innerHTML = volume[i];

            newCell = newRow.insertCell(2);
            newCell.innerHTML = prixht[i];

            newCell = newRow.insertCell(3);
            newCell.innerHTML = taxe[i];

            newCell = newRow.insertCell(4);
            newCell.innerHTML = parseInt(prixht[i]) + parseInt(prixht[i] * taxe[i] / 100);
        }

    }




