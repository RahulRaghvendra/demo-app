@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />
<style>
    .fancybox__content {
        border-radius: 10px; 
        overflow: hidden; 
        height: auto ;  / Automatically adjust height /
    }
    .fancybox__inner {
        height: auto ; / Ensure inner content adjusts accordingly /
    }
</style>
<script>
function closeChildBox() {
    $('.carousel__button').trigger('click');
}

function setDropdown(response, elementId) {
    var select = $('#' + elementId);
    select.empty();
    select.append(response);
    if(elementId == "clientid"){
        checkClient();
    }
}

function setTextValue(response, elementId) {
    var textBox = $('#' + elementId);
    textBox.val(response);
    textBox.text(response);
}

Fancybox.bind("[data-fancybox]", {
    trapFocus: true, 
    click: false 
});
</script>
@endpush