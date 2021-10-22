<form method="post" action="{{ $data->endPoint }}">
    <input name="merchantId" type="hidden" value="{{ $data->merchantId }}">
    <input name="accountId" type="hidden" value="{{ $data->accountId }}">
    <input name="description" type="hidden" value="{{ $data->description }}">
    <input name="referenceCode" type="hidden" value="{{ $data->referenceCode }}">
    <input name="amount" type="hidden" value="{{ $data->amount }}">
    <input name="tax" type="hidden" value="{{ $data->tax }}">
    <input name="taxReturnBase" type="hidden" value="{{ $data->taxReturnBase }}">
    <input name="currency" type="hidden" value="{{ $data->currency }}">
    <input name="signature" type="hidden" value="{{ $data->signature }}">
    <input name="test" type="hidden" value="{{ $data->test }}">
    <input name="buyerFullName" type="hidden" value="{{ $data->buyerFullName }}">
    <input name="buyerEmail" type="hidden" value="{{ $data->buyerEmail }}">
    <input name="responseUrl" type="hidden" value="{{ $data->responseUrl }}">
    <input name="confirmationUrl" type="hidden" value="{{ $data->confirmationUrl }}">
    <input name="extra1" type="hidden" value="{{ $data->extra1 }}">
    <input name="extra2" type="hidden" value="{{ $data->extra2 }}">

    <input name="Submit" id="payu_action" type="submit" value="Enviar" style="display: none;">
</form>

<script>
window.onload=function() {

    var button = document.getElementById('payu_action');
    button.click();

}
</script>