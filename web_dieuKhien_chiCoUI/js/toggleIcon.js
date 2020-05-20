function toggleIcon(e) {
    $(e.target)
        .prev('.card-header')
        .find(".fa")
        .toggleClass('fa-plus fa-minus');
}
$('.tab-pane').on('hidden.bs.collapse', toggleIcon);
$('.tab-pane').on('shown.bs.collapse', toggleIcon);