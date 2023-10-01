var batchingPlantSelect = document.getElementById("batchingPlantSelect");
var otherBatchingPlantInput = document.getElementById("otherBatchingPlantInput");

batchingPlantSelect.addEventListener("change", function () {
    if (batchingPlantSelect.value === "other") {
        otherBatchingPlantInput.style.display = "block";
    } else {
        otherBatchingPlantInput.style.display = "none";
    }
});

//methodPaymentSelect
var methodPaymentSelectSelect = document.getElementById("methodPaymentSelectSelect");
var methodPaymentSelectInput = document.getElementById("methodPaymentSelectInput");

methodPaymentSelectSelect.addEventListener("change", function () {
    if (methodPaymentSelectSelect.value === "other") {
        methodPaymentSelectInput.style.display = "block";
    } else {
        methodPaymentSelectInput.style.display = "none";
    }
});