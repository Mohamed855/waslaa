const startTimeInput = document.getElementById('start_time');
const endTimeInput = document.getElementById('end_time');
const examinationTimeInput = document.getElementById('examination_time');

function generateTimeOptions() {
    const timeOptionsSelect = document.getElementsByClassName('available_times');
    const weekDays = [ "Saturday", "Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday"];

    let startTime = new Date(`2000-01-01T${startTimeInput.value}`);
    const endTime = new Date(`2000-01-01T${endTimeInput.value}`);

    if (endTime < startTime) {
        endTime.setHours(endTime.getHours() + 24);
    }

    let currentTime = startTime;

    let exam_ms= parseInt(examinationTimeInput.value) * 60000;
    let duration_ms = endTime.getTime() - startTime.getTime();
    let countOfAvailableTimes = Math.round( duration_ms / exam_ms );

    for (let i = 0; i < timeOptionsSelect.length; i++) {
        timeOptionsSelect[i].innerHTML = "";
        let newContent = "";
        startTime = new Date(`2000-01-01T${startTimeInput.value}`);
        let currentTime = startTime;

        for (let j = 0; j < countOfAvailableTimes; j++) {
            let time = currentTime.toTimeString().slice(0, 5);
            let formattedTime = formatAMPM(currentTime);
            newContent += `
                <div class="col-4 col-sm-3 col-md-4 col-lg-3">
                    <input type="checkbox" name="d_${weekDays[i]}_t_${time}" value="${time}" checked style="cursor:pointer" class="time_checkbox">
                    <label class="small" for="d_${weekDays[i]}_t_${time}">${formattedTime}</label>
                </div>
            `;
            currentTime.setMinutes(currentTime.getMinutes() + parseInt(examinationTimeInput.value));
        }

        timeOptionsSelect[i].innerHTML = newContent;
    }
}

function formatAMPM(date) {
    let hours = date.getHours();
    let minutes = date.getMinutes();
    const ampm = hours >= 12 ? 'pm' : 'am';
    hours %= 12;
    hours = hours || 12;
    minutes = minutes < 10 ? `0${minutes}` : minutes;
    return `${hours}:${minutes} ${ampm}`;
}

startTimeInput.addEventListener('input', generateTimeOptions);
endTimeInput.addEventListener('input', generateTimeOptions);
examinationTimeInput.addEventListener('input', generateTimeOptions);

function generateDaysTimes(day){
    let selectedDay = document.getElementById('d_' + day);
    let dayTimes = document.getElementById(day + '_times');

    if (selectedDay.checked){
        dayTimes.style.display = 'block';
    } else {
        dayTimes.style.display = 'none';
    }
}

function selectAllDays() {
    let select_all_days = document.getElementById("select_all_days");
    let day_checkboxes = document.getElementsByClassName("day_checkbox");
    for (let i = 0; i < day_checkboxes.length; i++) {
        day_checkboxes[i].checked = select_all_days.checked;
        generateDaysTimes(day_checkboxes[i].value);
    }
}
function selectAllTimes() {
    let select_all_times = document.getElementById("select_all_times");
    let time_checkboxes = document.getElementsByClassName("time_checkbox");
    for (let i = 0; i < time_checkboxes.length; i++) {
        time_checkboxes[i].checked = select_all_times.checked;
    }
}
document.getElementById("select_all_days").addEventListener("click", selectAllDays);
document.getElementById("select_all_times").addEventListener("click", selectAllTimes);
