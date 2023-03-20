<script>
    const admissionFeeCheckbox = document.querySelector('input[name="adm_cb"]');
    const admissionFeeInput = document.querySelector('#admissionfee');
    
    const idFeeCheckbox = document.querySelector('input[name="id_cb"]');
    const idFeeInput = document.querySelector('#idcardfee');

    const examFeeCheckbox = document.querySelector('input[name="exam_cb"]');
    const examFeeInput = document.querySelector('#examfee');

    const compositeFeeCheckbox = document.querySelector('input[name="composite_cb"]');
    const admissionFeeInput = document.querySelector('#postcompositefee');
    const computerFeeCheckbox = document.querySelector('input[name="computer_cb"]');
    const computerFeeInput = document.querySelector('#postcomputer');



    admissionFeeCheckbox.addEventListener('change', function () {
        if (this.checked) {
            admissionFeeInput.value = "<?php echo $admfee; ?>";
        } else {
            admissionFeeInput.value = "";
        }
    });


</script>