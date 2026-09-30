$(document).ready(function () {

	$('#timeend, #timestart').each(function() {
	
		//store the last selected value
		$(this).data('lastSelected', $(this).val());
		
	});

	$('#timeend, #timestart').change(function() {
	
		if(!checkTiming($(this))) {
			//reverse the timings if the newly selected one cannot be validated
		    $(this).val($(this).data('lastSelected'));
		}
		else {
			$(this).data('lastSelected', $(this).val());
		}
		
	});

    function checkTiming($currentcontrol) {

        //check that both controls exist
        timestartexists = $currentcontrol.parentsUntil('form').parent().find('#timestart:visible').length;
        timeendexists = $currentcontrol.parentsUntil('form').parent().find('#timeend:visible').length;

        if (timestartexists && timeendexists) {
            timestart = $currentcontrol.parentsUntil('form').parent().find('#timestart').val();
            timeend = $currentcontrol.parentsUntil('form').parent().find('#timeend').val();

            //change timestart from e.g. 5:15 PM to 1715
            if (timestart.length == 7) { //0:00 AM
                timestart_hr = timestart.substr(0,1);
                timestart_min = timestart.substr(2,2);
                timestart_ampm = timestart.substr(5,2);
            }
            else {
                timestart_hr = timestart.substr(0,2);
                timestart_min = timestart.substr(3,2);
                timestart_ampm = timestart.substr(6,2);
            }
            if (timestart_ampm == "PM" && timestart_hr != "12") {
                timestart_hr = parseInt(timestart_hr) + 12;
            }
            timestart = (parseInt(timestart_hr) * 100) + parseInt(timestart_min);

            //change timeend from e.g. 5:15 PM to 1715
            if (timeend.length == 7) { //0:00 AM
                timeend_hr = timeend.substr(0,1);
                timeend_min = timeend.substr(2,2);
                timeend_ampm = timeend.substr(5,2);
            }
            else {
                timeend_hr = timeend.substr(0,2);
                timeend_min = timeend.substr(3,2);
                timeend_ampm = timeend.substr(6,2);
            }
            if (timeend_ampm == "PM" && timeend_hr != "12") {
                timeend_hr = parseInt(timeend_hr) + 12;
            }
            timeend = (parseInt(timeend_hr) * 100) + parseInt(timeend_min);

            if (timestart >= timeend) {
                swal('Error', 'Start time cannot be same or after end time.', 'error');
                return false;
            }

        }

        return true;
    }
	
});
