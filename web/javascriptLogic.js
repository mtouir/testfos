
    $(document).ready(function() {
        createChart();

        $('#dashboardLink')   .click(refreshPage);
        $('#articlesLink')    .click(refreshPage);
        $('#veterinairesLink').click(refreshPage);
        $('#dresseursLink')   .click(refreshPage);
        $('#hotelsLink')      .click(refreshPage);
        $('#promeneursLink')  .click(refreshPage);
        $('#associationsLink').click(refreshPage);
        $('#magasinsLink')    .click(refreshPage);
        $('#forumsLink')      .click(refreshPage);
    });
var createChart = function () {
    $.ajax({
        url: (document.URL + 'boxes').replace(/#/g, ''),
        type: 'POST',
        dataType: 'json',
        success: function (response) {
            $('#veterinairesNumber').text(response.veterinaires);
            $('#annoncesNumber').text(response.annonces);
            $('#inscriptionsNumber').text(response.inscriptions);
            $('#magasinsNumber').text(response.magasins);
        }
    });

    $.ajax({
        url: (document.URL + 'associationsChart').replace(/#/g, ''),
        type: 'POST',
        dataType: 'json',
        success: function (response) {
            $("#associationsChart").kendoChart({
                title: {
                    position: "bottom",
                    text: "Pourcentage des évènements par association\n organisés en Tunisie pendant l'été 2017"
                },
                legend: {
                    visible: false
                },
                chartArea: {
                    background:"transparent",
                    height:500
                },
                seriesDefaults: {
                    labels: {
                        visible: true,
                        background: "transparent",
                        template: "#= category #: \n #= value#%"
                    }
                },
                series: [{
                    type: "pie",
                    startAngle: 150,
                    data: response
                }],
                tooltip: {
                    visible: true,
                    template: "#= category # :  #= value #% ",
                    format: "{0}%"
                }
            });
        }
    });

    $.ajax({
        url: (document.URL + 'meilleursDresseursChart').replace(/#/g, ''),
        type: 'POST',
        dataType: 'json',
        success: function (response) {
            $("#meilleursDresseursChart").kendoChart({
                chartArea: {
                    background:"transparent",
                    height:500
                },
                title: {
                    position: "bottom",
                    text: "Classement des 5 meilleurs dresseurs"
                },
                legend: {
                    position: "bottom"
                },
                seriesDefaults: {
                    type: "column"
                },
                series: [{
                    name: "Dresseur 1",
                    data: [4.5]
                }, {
                    name: "Dresseur 2",
                    data: [4]
                }, {
                    name: "Dresseur 3",
                    data: [3.8]
                }, {
                    name: "Dresseur 4",
                    data: [3.5]
                },{
                    name: "Dresseur 5",
                    data: [3]
                }],
                valueAxis: {
                    labels: {
                        format: "{0} points"
                    },
                    line: {
                        visible: false
                    },
                    axisCrossingValue: 0
                },
                tooltip: {
                    visible: true,
                    format: "{0}%",
                    template: "#= series.name # : #= value # points"
                }
            });
        }
    });

    $.ajax({
        url: (document.URL + 'dresseursParRegionChart').replace(/#/g, ''),
        type: 'POST',
        dataType: 'json',
        success: function (response) {
            $("#dresseursParRegionChart").kendoChart({
                chartArea: {
                    background:"transparent",
                    height:500
                },
                title: {
                    text: ""
                },
                legend: {
                    position: "bottom"
                },
                seriesDefaults: {
                    type: "radarLine"
                },
                series: [{
                    name: "Nombre de vétérinaires par gouvernorat",
                    data: [116, 165, 215, 75, 100, 49, 80, 116, 108, 90, 76, 91, 255, 120, 80, 90, 200, 150, 100, 53, 90, 110, 100, 190]
                }],
                categoryAxis: {
                    categories: [
                        "Tunis", "Ben Arous", "Ariana", "Nabeul",
                        "Bizerte", "Manouba", "Beja", "Jendouba",
                        "Kef", "Seliana", "Kairouan", "Zaghouan",
                        "Gabés", "Gafsa", "Tozeur", "Kasserine",
                        "Kébili", "Mahdia", "Médenine", "Monastir",
                        "Sfax", "Sousse", "Sidi Bouzid", "Tataouine"
                    ]
                },
                valueAxis: {
                    visible: false
                },
                tooltip: {
                    visible: true,
                    template: "#= category # :  #= value # ",
                    format: "{0}"
                }
            });
        }
    });

    $.ajax({
        url: (document.URL + 'annoncesParCategorieChart').replace(/#/g, ''),
        type: 'POST',
        dataType: 'json',
        success: function (response) {
            $("#annoncesParCategorieChart").kendoChart({
                title: {
                    position: "bottom",
                    text: "Nombre d'annonces par catégorie"
                },
                legend: {
                    visible: false
                },
                chartArea: {
                    background:"transparent",
                    height:500
                },
                seriesDefaults: {
                    labels: {
                        visible: true,
                        background: "transparent",
                        template: "#= category #: \n #= value#"
                    }
                },
                series: [{
                    type: "pie",
                    startAngle: 150,
                    data: [{
                        category: "Animaux perdus",
                        value: 30,
                        color: "#9de219"
                    },{
                        category: "Vente",
                        value: 110,
                        color: "#90cc38"
                    },{
                        category: "Achat",
                        value: 50,
                        color: "#068c35"
                    },{
                        category: "Adoption",
                        value: 6,
                        color: "#006634"
                    },{
                        category: "Accouplement",
                        value: 17,
                        color: "#004d38"
                    },{
                        category: "Promenades",
                        value: 11,
                        color: "#033939"
                    }]
                }],
                tooltip: {
                    visible: true,
                    template: "#= category # :  #= value # ",
                    format: "{0}"
                }
            });
        }
    });
};

var refreshPage = function(e) {
    // Clear the dashboard
    clearPage();
    // Get the id of the clicked hyperlink
    var id = e.currentTarget.id;

    // Set the header's text depending on the clicked hyperlink
    if (id !== 'articlesLink') {
        $('#header').text((e.currentTarget.innerText).substr(0, (e.currentTarget.innerText).lastIndexOf('s') + 1));
    }
    // Show the correspondent grid
    if (id === 'dashboardLink') {
        $('#dashboardSection').show();
        createChart();
    } else if (id === 'articlesLink') {
        $('#header').text(e.currentTarget.children[1].innerText);
        $('#articlesSection').show();
        showArticlesGrid();
    } else if (id === 'veterinairesLink') {
        $('#veterinairesSection').show();
        showVeterinairesGrid();
    } else if (id === 'dresseursLink') {
        $('#dresseursSection').show();
        showdresseursGrid();
    } else if (id === 'hotelsLink') {
        $('#hotelsSection').show();
        showhotelsGrid();
    } else if (id === 'promeneursLink') {
        $('#promeneursSection').show();
        showPromeneursGrid();
    } else if (id === 'associationsLink') {
        $('#associationsSection').show();
        showAssociationsGrid();
    } else if (id === 'magasinsLink') {
        $('#magasinsSection').show();
        showMagasinsGrid();
    } else if (id === 'forumsLink') {
        $('#forumsSection').show();
        showForumGrid();
    }
};

var clearPage = function() {
        $('#dashboardSection')   .hide();
        $('#articlesSection')    .hide();
        $('#veterinairesSection').hide();
        $('#dresseursSection')   .hide();
        $('#hotelsSection')      .hide();
        $('#promeneursSection')  .hide();
        $('#associationsSection').hide();
        $('#magasinsSection')    .hide();
        $('#forumsSection')      .hide();
    };

var showAssociationsGrid = function () {
        var url = document.URL + 'associationsGrid';
        url = url.replace(/#/g, '');
    var deleteUrl = document.URL + 'deleteAssociationsGrid';
    deleteUrl = deleteUrl.replace(/#/g, '');

                $("#associationsGrid").kendoGrid({
                    dataBound: function (e) {
                        $('.k-grid-Supprimer').css({'background-color': '#dd4b39 !important;', 'border-color': '#d73925 !important;', 'color': '#fff'});
                        $('#associationsCounter').text(e.sender.dataSource._data.length);
                    },
                    dataSource: {
                        transport: {
                            read: {
                                url: url,
                                type: 'POST'
                            }
                        },
                        schema: {
                            model: {
                                fields: {
                                    titre:       { type: "string" },
                                    vocation:    { type: "string" },
                                    description: { type: "string" },
                                    adresse:     { type: "string" },
                                    tel:         { type: "string" },
                                    site:        { type: "string" },
                                    mail:        { type: "string" }
                                }
                            }
                        },
                        pageSize: 10
                    },
                    height: 450,
                    scrollable: true,
                    sortable: true,
                    filterable: true,
                    pageable: {
                        input: true,
                        numeric: false
                    },
                    columns: [
                        {
                            field: "titre",
                            title: "Titre",
                            width: "50px"
                        },
                        {
                            field: "vocation",
                            title: "Vocation",
                            width: "50px"
                        },
                        {
                            field: "description",
                            title: "Description",
                            width: "50px"
                        },
                        {
                            field: "adresse",
                            title: "Adresse",
                            width: "50px"
                        },
                        {
                            field: "tel",
                            title: "Téléphone",
                            width: "50px"
                        },
                        {
                            field: "site",
                            title: "Site web",
                            width: "50px"
                        },
                        {
                            field: "mail",
                            title: "E-Mail",
                            width: "50px"
                        },
                        {
                            command: [
                                {
                                    text: "Supprimer",
                                    click: function (e) {
                                        var id = $("#associationsGrid").data('kendoGrid').dataItem($(e.target).closest("tr")).id;
                                        $.ajax({
                                            url: deleteUrl + '/' + id,
                                            type: 'POST',
                                            data: {
                                                'id': id
                                            },
                                            success: function (response) {
                                                if (response.toString().toUpperCase().indexOf('ERROR') === -1) {
                                                    $("#associationsGrid").data('kendoGrid').dataSource.read();
                                                } else {
                                                    alert('Erreur lors de la suppression.');
                                                }
                                            }
                                        });
                                    }
                                }
                            ],
                            title: "Actions",
                            width: "50px"
                        }
                    ]
                }).data('kendoGrid');
    };

var showArticlesGrid = function () {
    var url = document.URL + 'articlesGrid';
    url = url.replace(/#/g, '');
    var validateUrl = document.URL + 'validateArticlesGrid';
    validateUrl = validateUrl.replace(/#/g, '');

            var wnd, detailsTemplate;

            $("#articlesGrid").kendoGrid({
                selectable: true,
                dataBound: function (e) {
                    $('.k-grid-Détails').css({'background-color': '#269abc !important;', 'border-color': '#1b6d85 !important;', 'color': '#fff'});
                    $('.k-grid-Approuver').css({'background-color': '#00a65a !important;', 'border-color': '#008d4c !important;', 'color': '#fff'});
                    $('#articlesCounter').text(e.sender.dataSource._data.length);
                },
                dataSource: {
                    transport: {
                        read: {
                            url: url,
                            type: 'POST'
                        }
                    },
                    schema: {
                        model: {
                            fields: {
                                titre:   { type: "string" },
                                date:    { type: "string" },
                                contenu: { type: "string" }
                            }
                        }
                    },
                    pageSize: 10,
                },
                height: 450,
                scrollable: true,
                sortable: true,
                filterable: true,
                pageable: {
                    input: true,
                    numeric: false
                },
                columns: [
                    {
                        field: "titre",
                        title: "Titre",
                        width: "100px"
                    },
                    {
                        field: "date",
                        title: "Date de sortie",
                        width: "70px"
                    },
                    {
                        field: "contenu",
                        title: "Contenu",
                        width: "220px"
                    },
                    {
                        command: [
                            {
                                text: "Détails",
                                click: showDetails
                            },{
                                text: "Approuver",
                                click: function (e) {
                                    var id = $("#articlesGrid").data('kendoGrid').dataItem($(e.target).closest("tr")).id;
                                    $.ajax({
                                        url: validateUrl + '/' + id,
                                        type: 'POST',
                                        data: {
                                            'id': id
                                        },
                                        success: function (response) {
                                            if (response.toString().toUpperCase().indexOf('ERROR') === -1) {
                                                $("#articlesGrid").data('kendoGrid').dataSource.read();
                                            } else {
                                                alert('Erreur lors de l\'approbation.');
                                            }
                                        }
                                    });
                                }
                            }
                        ],
                        title: "Actions",
                        width: "120px"
                    }
                ]
            }).data('kendoGrid');

            wnd = $("#details")
                .kendoWindow({
                    title: "Détails de l'article",
                    modal: true,
                    visible: false,
                    resizable: false,
                    width: 600,
                    height: 450
                }).data("kendoWindow");

            detailsTemplate = kendo.template($("#template").html());

            function showDetails (e) {
                e.preventDefault();
                var dataItem = this.dataItem($(e.currentTarget).closest("tr"));
                wnd.content(detailsTemplate(dataItem));
                wnd.open().center();
            }
};

var showVeterinairesGrid = function () {
    var url = document.URL + 'veterinairesGrid';
    url = url.replace(/#/g, '');
    var deleteUrl = document.URL + 'deleteVeterinairesGrid';
    deleteUrl = deleteUrl.replace(/#/g, '');

            $("#veterinairesGrid").kendoGrid({
                dataBound: function (e) {
                    $('.k-grid-Supprimer').css({'background-color': '#dd4b39 !important;', 'border-color': '#d73925 !important;', 'color': '#fff'});
                    $('#veterinairesCounter').text(e.sender.dataSource._data.length);
                },
                dataSource: {
                    transport: {
                        read: {
                            url: url,
                            type: 'POST'
                        }
                    },
                    schema: {
                        model: {
                            fields: {
                                id:          { type: "string" },
                                nom:         { type: "string" },
                                prenom:      { type: "string" },
                                adresse:     { type: "string" },
                                description: { type: "string" },
                                tel:         { type: "string" },
                                site:        { type: "string" },
                                gouvernorat: { type: "string" },
                                delegation:  { type: "string" }
                            }
                        }
                    },
                    pageSize: 10
                },
                height: 450,
                scrollable: true,
                sortable: true,
                selectable: true,
                filterable: true,
                pageable: {
                    input: true,
                    numeric: false
                },
                columns: [
                    {
                        field: "nom",
                        title: "Nom",
                        width: "50px"
                    },
                    {
                        field: "prenom",
                        title: "Prénom",
                        width: "50px"
                    },
                    {
                        field: "adresse",
                        title: "Adresse",
                        width: "50px"
                    },
                    {
                        field: "description",
                        title: "Description",
                        width: "50px"
                    },
                    {
                        field: "tel",
                        title: "Téléphone",
                        width: "50px"
                    },
                    {
                        field: "site",
                        title: "Site web",
                        width: "50px"
                    },
                    {
                        field: "gouvernorat",
                        title: "Gouvernorat",
                        width: "50px"
                    },
                    {
                        field: "delegation",
                        title: "Délégation",
                        width: "50px"
                    },
                    {
                        command: [
                            {
                                text: "Supprimer",
                                click: function (e) {
                                    var id = $("#veterinairesGrid").data('kendoGrid').dataItem($(e.target).closest("tr")).id;
                                    $.ajax({
                                        url: deleteUrl + '/' + id,
                                        type: 'POST',
                                        data: {
                                            'id': id
                                        },
                                        success: function (response) {
                                            if (response.toString().toUpperCase().indexOf('ERROR') === -1) {
                                                $("#veterinairesGrid").data('kendoGrid').dataSource.read();
                                            } else {
                                                alert('Erreur lors de la suppression.');
                                            }
                                        }
                                    });
                                }
                            }
                        ],
                        title: "Actions",
                        width: "50px"
                    }
                ]
            }).data('kendoGrid');
};

var showdresseursGrid = function () {
    var url = document.URL + 'dresseursGrid';
    url = url.replace(/#/g, '');
    var deleteUrl = document.URL + 'deleteDresseursGrid';
    deleteUrl = deleteUrl.replace(/#/g, '');

            $("#dresseursGrid").kendoGrid({
                selectable: true,
                dataBound: function (e) {
                    $('.k-grid-Supprimer').css({'background-color': '#dd4b39 !important;', 'border-color': '#d73925 !important;', 'color': '#fff'});
                    $('#dresseursCounter').text(e.sender.dataSource._data.length);
                },
                dataSource: {
                    transport: {
                        read: {
                            url: url,
                            type: 'POST'
                        }
                    },
                    schema: {
                        model: {
                            fields: {
                                nom:         { type: "string" },
                                prenom:      { type: "string" },
                                adresse:     { type: "string" },
                                description: { type: "string" },
                                tel:         { type: "string" },
                                gouvernorat: { type: "string" },
                                delegation:  { type: "string" }
                            }
                        }
                    },
                    pageSize: 10
                },
                height: 450,
                scrollable: true,
                sortable: true,
                filterable: true,
                pageable: {
                    input: true,
                    numeric: false
                },
                columns: [
                    {
                        field: "nom",
                        title: "Nom",
                        width: "50px"
                    },
                    {
                        field: "prenom",
                        title: "Prénom",
                        width: "50px"
                    },
                    {
                        field: "adresse",
                        title: "Adresse",
                        width: "50px"
                    },
                    {
                        field: "description",
                        title: "Description",
                        width: "50px"
                    },
                    {
                        field: "tel",
                        title: "Téléphone",
                        width: "50px"
                    },
                    {
                        field: "gouvernorat",
                        title: "Gouvernorat",
                        width: "50px"
                    },
                    {
                        field: "delegation",
                        title: "Délégation",
                        width: "50px"
                    },
                    {
                        command: [
                            {
                                text: "Supprimer",
                                click: function (e) {
                                    var id = $("#dresseursGrid").data('kendoGrid').dataItem($(e.target).closest("tr")).id;
                                    $.ajax({
                                        url: deleteUrl + '/' + id,
                                        type: 'POST',
                                        data: {
                                            'id': id
                                        },
                                        success: function (response) {
                                            if (response.toString().toUpperCase().indexOf('ERROR') === -1) {
                                                $("#dresseursGrid").data('kendoGrid').dataSource.read();
                                            } else {
                                                alert('Erreur lors de la suppression.');
                                            }
                                        }
                                    });
                                }
                            }
                        ],
                        title: "Actions",
                        width: "50px"
                    }
                ]
            }).data('kendoGrid');
};

var showhotelsGrid = function () {
    var url = document.URL + 'hotelsGrid';
    url = url.replace(/#/g, '');
    var deleteUrl = document.URL + 'deleteHotelsGrid';
    deleteUrl = deleteUrl.replace(/#/g, '');

            $("#hotelsGrid").kendoGrid({
                selectable: true,
                dataBound: function (e) {
                    $('.k-grid-Supprimer').css({'background-color': '#dd4b39 !important;', 'border-color': '#d73925 !important;', 'color': '#fff'});
                    $('#hotelsCounter').text(e.sender.dataSource._data.length);
                },
                dataSource: {
                    transport: {
                        read: {
                            url: url,
                            type: 'POST'
                        }
                    },
                    schema: {
                        model: {
                            fields: {
                                nom:         { type: "string" },
                                prix:        { type: "string" },
                                adresse:     { type: "string" },
                                site:        { type: "string" },
                                description: { type: "string" },
                                tel:         { type: "string" },
                                gouvernorat: { type: "string" },
                                delegation:  { type: "string" }
                            }
                        }
                    },
                    pageSize: 10
                },
                height: 450,
                scrollable: true,
                sortable: true,
                filterable: true,
                pageable: {
                    input: true,
                    numeric: false
                },
                columns: [
                    {
                        field: "nom",
                        title: "Nom",
                        width: "50px"
                    },
                    {
                        field: "prix",
                        title: "Prix",
                        width: "50px"
                    },
                    {
                        field: "adresse",
                        title: "Adresse",
                        width: "50px"
                    },
                    {
                        field: "site",
                        title: "Site web",
                        width: "50px"
                    },
                    {
                        field: "description",
                        title: "Description",
                        width: "50px"
                    },
                    {
                        field: "tel",
                        title: "Téléphone",
                        width: "50px"
                    },
                    {
                        field: "gouvernorat",
                        title: "Gouvernorat",
                        width: "50px"
                    },
                    {
                        field: "delegation",
                        title: "Délégation",
                        width: "50px"
                    },
                    {
                        command: [
                            {
                                text: "Supprimer",
                                click: function (e) {
                                    var id = $("#hotelsGrid").data('kendoGrid').dataItem($(e.target).closest("tr")).id;
                                    $.ajax({
                                        url: deleteUrl + '/' + id,
                                        type: 'POST',
                                        data: {
                                            'id': id
                                        },
                                        success: function (response) {
                                            if (response.toString().toUpperCase().indexOf('ERROR') === -1) {
                                                $("#hotelsGrid").data('kendoGrid').dataSource.read();
                                            } else {
                                                alert('Erreur lors de la suppression.');
                                            }
                                        }
                                    });
                                }
                            }
                        ],
                        title: "Actions",
                        width: "50px"
                    }
                ]
            }).data('kendoGrid');
};

var showPromeneursGrid = function () {
    var url = document.URL + 'promeneursGrid';
    url = url.replace(/#/g, '');
    var deleteUrl = document.URL + 'deletePromeneursGrid';
    deleteUrl = deleteUrl.replace(/#/g, '');

            $("#promeneursGrid").kendoGrid({
                selectable: true,
                dataBound: function (e) {
                    $('.k-grid-Supprimer').css({'background-color': '#dd4b39 !important;', 'border-color': '#d73925 !important;', 'color': '#fff'});
                    $('#promeneursCounter').text(e.sender.dataSource._data.length);
                },
                dataSource: {
                    transport: {
                        read: {
                            url: url,
                            type: 'POST'
                        }
                    },
                    schema: {
                        model: {
                            fields: {
                                nom:         { type: "string" },
                                prenom:      { type: "string" },
                                adresse:     { type: "string" },
                                desc:        { type: "string" },
                                tel:         { type: "string" },
                                prix:        { type: "string" },
                                gouvernorat: { type: "string" },
                                delegation:  { type: "string" }
                            }
                        }
                    },
                    pageSize: 10
                },
                height: 450,
                scrollable: true,
                sortable: true,
                filterable: true,
                pageable: {
                    input: true,
                    numeric: false
                },
                columns: [
                    {
                        field: "nom",
                        title: "Nom",
                        width: "50px"
                    },
                    {
                        field: "prenom",
                        title: "Prénom",
                        width: "50px"
                    },
                    {
                        field: "adresse",
                        title: "Adresse",
                        width: "50px"
                    },
                    {
                        field: "desc",
                        title: "Description",
                        width: "50px"
                    },
                    {
                        field: "tel",
                        title: "Téléphone",
                        width: "50px"
                    },
                    {
                        field: "prix",
                        title: "Prix",
                        width: "50px"
                    },
                    {
                        field: "gouvernorat",
                        title: "Gouvernorat",
                        width: "50px"
                    },
                    {
                        field: "delegation",
                        title: "Délégation",
                        width: "50px"
                    },
                    {
                        command: [
                            {
                                text: "Supprimer",
                                click: function (e) {
                                    var id = $("#promeneursGrid").data('kendoGrid').dataItem($(e.target).closest("tr")).id;
                                    $.ajax({
                                        url: deleteUrl + '/' + id,
                                        type: 'POST',
                                        data: {
                                            'id': id
                                        },
                                        success: function (response) {
                                            if (response.toString().toUpperCase().indexOf('ERROR') === -1) {
                                                $("#promeneursGrid").data('kendoGrid').dataSource.read();
                                            } else {
                                                alert('Erreur lors de la suppression.');
                                            }
                                        }
                                    });
                                }
                            }
                        ],
                        title: "Actions",
                        width: "50px"
                    }
                ]
            }).data('kendoGrid');
};

var showMagasinsGrid = function () {
    var url = document.URL + 'magasinsGrid';
    url = url.replace(/#/g, '');
    var deleteUrl = document.URL + 'deleteMagasinsGrid';
    deleteUrl = deleteUrl.replace(/#/g, '');

            $("#magasinsGrid").kendoGrid({
                selectable: true,
                dataBound: function (e) {
                    $('.k-grid-Supprimer').css({'background-color': '#dd4b39 !important;', 'border-color': '#d73925 !important;', 'color': '#fff'});
                    $('#magasinsCounter').text(e.sender.dataSource._data.length);
                },
                dataSource: {
                    transport: {
                        read: {
                            url: url,
                            type: 'POST'
                        }
                    },
                    schema: {
                        model: {
                            fields: {
                                titre:       { type: "string" },
                                adresse:     { type: "string" },
                                description: { type: "string" },
                                tel:         { type: "string" },
                                site:        { type: "string" },
                                mail:        { type: "string" },
                                gouvernorat: { type: "string" },
                                delegation:  { type: "string" }
                            }
                        }
                    },
                    pageSize: 10
                },
                height: 450,
                scrollable: true,
                sortable: true,
                filterable: true,
                pageable: {
                    input: true,
                    numeric: false
                },
                columns: [
                    {
                        field: "titre",
                        title: "Titre",
                        width: "50px"
                    },
                    {
                        field: "adresse",
                        title: "Adresse",
                        width: "50px"
                    },
                    {
                        field: "description",
                        title: "Description",
                        width: "50px"
                    },
                    {
                        field: "tel",
                        title: "Téléphone",
                        width: "50px"
                    },
                    {
                        field: "site",
                        title: "Site web",
                        width: "50px"
                    },
                    {
                        field: "mail",
                        title: "E-Mail",
                        width: "50px"
                    },
                    {
                        field: "gouvernorat",
                        title: "Gouvernorat",
                        width: "50px"
                    },
                    {
                        field: "delegation",
                        title: "Délégation",
                        width: "50px"
                    },
                    {
                        command: [
                            {
                                text: "Supprimer",
                                click: function (e) {
                                    var id = $("#magasinsGrid").data('kendoGrid').dataItem($(e.target).closest("tr")).id;
                                    $.ajax({
                                        url: deleteUrl + '/' + id,
                                        type: 'POST',
                                        data: {
                                            'id': id
                                        },
                                        success: function (response) {
                                            if (response.toString().toUpperCase().indexOf('ERROR') === -1) {
                                                $("#magasinsGrid").data('kendoGrid').dataSource.read();
                                            } else {
                                                alert('Erreur lors de la suppression.');
                                            }
                                        }
                                    });
                                }
                            }
                        ],
                        title: "Actions",
                        width: "50px"
                    }
                ]
            }).data('kendoGrid');

};

var showForumGrid = function () {
    var url = document.URL + 'forumsGrid';
    url = url.replace(/#/g, '');
    var deleteUrl = document.URL + 'deleteForumsGrid';
    deleteUrl = deleteUrl.replace(/#/g, '');

            $("#forumsGrid").kendoGrid({
                selectable: true,
                dataBound: function (e) {
                    $('.k-grid-Supprimer').css({'background-color': '#dd4b39 !important;', 'border-color': '#d73925 !important;', 'color': '#fff'});
                    $('#forumsCounter').text(e.sender.dataSource._data.length);
                },
                dataSource: {
                    transport: {
                        read: {
                            url: url,
                            type: 'POST'
                        }
                    },
                    schema: {
                        model: {
                            fields: {
                                titre:       { type: "string" },
                            }
                        }
                    },
                    pageSize: 10
                },
                height: 450,
                scrollable: true,
                sortable: true,
                filterable: true,
                pageable: {
                    input: true,
                    numeric: false
                },
                columns: [
                    {
                        field: "titre",
                        title: "Titre",
                        width: "450px"
                    },
                    {
                        command: [
                            {
                                text: "Supprimer",
                                click: function (e) {
                                    var id = $("#forumsGrid").data('kendoGrid').dataItem($(e.target).closest("tr")).id;
                                    $.ajax({
                                        url: deleteUrl + '/' + id,
                                        type: 'POST',
                                        data: {
                                            'id': id
                                        },
                                        success: function (response) {
                                            if (response.toString().toUpperCase().indexOf('ERROR') === -1) {
                                                $("#forumsGrid").data('kendoGrid').dataSource.read();
                                            } else {
                                                alert('Erreur lors de la suppression.');
                                            }
                                        }
                                    });
                                }
                            }
                        ],
                        title: "Actions",
                        width: "70px"
                    }
                ]
            }).data('kendoGrid');
};

