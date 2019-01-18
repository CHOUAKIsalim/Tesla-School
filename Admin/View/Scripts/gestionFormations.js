

    function SupprimerFormation(id)
    {
        var r = confirm("Voulez vous vraiment supprimer cette formation");
        if(r===true)
        {
            $.post
            (
                'Controller/supprimerFormation.php',
                {
                    id : id
                },
                function (data) {
                    alert("Formation Supprimée avec succes");
                },
                'text'
            );

        }
    }

    function SupprimerTypeFormation(id)
    {
        var r = confirm("Voulez vous vraiment supprimer ce type formation");
        if(r===true)
        {
            $.post
            (
                'Controller/supprimerTypeFormation.php',
                {
                    id : id
                },
                function (data) {
                    alert("Type Formation Supprimé avec succes");
                },
                'text'
            );

        }
    }

$(document).ready(function() {


        $("#add").click(function () {
            //Récuperation des valeurs des inputs
            let formation = $("#nomFormation").val();
            let typeFormationId = $("#typeFormationIdd").val();

            //Inserer dans la base de données

            $.post
            (
                'Controller/insererFormation.php',
                {
                    nom: formation,
                    type: typeFormationId
                },
                function (data) {
                    alert("Formation Ajoutée avec succes !");
                });
        });

        $("#addType").click(function ()
        {
            //Récuperation des valeurs des inputs
            let formation = $("#nomTypeFormation").val();
            let volume = $("#volumehorraire").val();
            let ht = $("#ht").val();
            let taxe = $("#taxe").val();
            let form = $("#formation").val();


            //Inserer dans la base de données

            $.post
            (
                'Controller/insererTypeFormation.php',
                {
                    nom : formation,
                    volumeHorraire : volume,
                    prixht : ht,
                    taux : taxe,
                    formation :form
                },
                function (data) {
                    alert("Type Formation Ajouté Avec Succes");
                    let newCell;
                    let tableRef = $("#tarifs")[0];
                    let newRow = tableRef.insertRow(tableRef.rows.length);
                    newCell = newRow.insertCell(0);
                    newCell.innerHTML = formation;

                    newCell = newRow.insertCell(1);
                    newCell.innerHTML = form;

                    newCell = newRow.insertCell(2);
                    newCell.innerHTML = volume;

                    newCell = newRow.insertCell(3);
                    newCell.innerHTML = ht;

                    newCell = newRow.insertCell(4);
                    newCell.innerHTML = taxe;

                    newCell = newRow.insertCell(5);
                    newCell.innerHTML = parseInt(ht) + parseInt(ht * taxe / 100);

                    newCell = newRow.insertCell(6);
                    newCell.innerHTML = "<button onclick='SupprimerFormation()'> Supprimer </button>"
                },
                'text'
            );
        });
        $("#editFormation").click(function () {
            let id = $("#formationModifSelect").val();
            let typeformationId = $("#newTypeFormationid").val();

            $.post
            (
                'modifierFormation.php',
                {
                    typeformationId : typeformationId,
                    id : id
                },
                function (data) {
                    alert("Modification Faite Avec Succes");
                }
            )
        });

        $("#editType").click(function () {
            let id = $("#typeFormationSelectModif").val();
            let volumehorraireModif = $("#volumehorraireModif").val();
            let htModif = $("#htModif").val();
            let idtaxeModif = $("#taxeModif").val();

            $.post
            (
                'modifierTypeFormation.php',
                {
                    id : id,
                    volumeHorraire: volumehorraireModif,
                    prixht : htModif,
                    taux : idtaxeModif
                },
                function (data) {
                    alert("Modification Faite Avec Succes");
                }
            )
        });
        $("#typeFormationId").on('change', function () {
        })
});